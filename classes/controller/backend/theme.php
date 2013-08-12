<?php

namespace PricingTable;

class Controller_Backend_Theme extends \PricingTable\Controller_Backend
{
    public function action_index()
    {
        // All theme
        $data['themes'] = \LbPricingTable\Model\Pricingtable_Theme::find('all');
        
        $view = \Theme::instance($this->moduleName)->view('pricingtable::backend/theme/index', $data);
        \Theme::instance($this->moduleName)->set_partial('content', $view);
    }
    
    public function action_add($id = null)
    {
        $isUpdate = ($id !== null) ? true : false;
        $data['isUpdate'] = $isUpdate;

        $form = \Fieldset::forge('themeform', array('form_attributes' => array('class' => 'form-horizontal')));
        $form->add_model('LbPricingTable\\Model\\Pricingtable_Theme');
        $form->add('add', '', array('type' => 'submit', 'value' => ($isUpdate) ? 'Modifier' : 'Ajouter', 'class' => 'btn btn-primary'));
        $form->disable('created_at')->disable('updated_at');
        if ($isUpdate) {
            $theme = \LbPricingTable\Model\Pricingtable_Theme::find($id);
        } else {
            $theme = new \LbPricingTable\Model\Pricingtable_Theme();
        }
        $data['theme'] = $theme;
        $form->populate($theme);

        if (\Input::post('add')) {
            // validate the input
            $form->validation()->run();

            // if validated, create the theme
            if (!$form->validation()->error()) {
                // Set from form
                $theme->from_array(array(
                        'name' => $form->validated('name'),
                        'file' => $form->validated('file'),
                        'css_file' => $form->validated('css_file'),
                        'js_file' => $form->validated('js_file'),
                ));
                
                
                if ($theme->save()) {
                    if($isUpdate)
                        $this->use_message and \Messages::success(__('pricingtable.theme.notification.edited'));
                    else
                        $this->use_message and \Messages::success(__('pricingtable.theme.notification.created'));
                    
                    \Response::redirect('/pricingtable/backend/theme/');
                } else {
                    $this->use_message and \Messages::error(__('pricingtable.error'));
                }
            } else {
                foreach ($form->validation()->error() as $error) {
                    $this->use_message and \Messages::error($error);
                }
            }
        }
        $form->repopulate();
        $data['form'] = $form;

        $view = \Theme::instance($this->moduleName)->view('pricingtable::backend/theme/add', $data, false);
        \Theme::instance($this->moduleName)->set_partial('content', $view);
    }

    public function action_delete($id)
    {
        $theme = \LbPricingTable\Model\Pricingtable_Theme::find($id);
        if ($theme->delete()) {
            $this->use_message and \Messages::success(__('pricingtable.theme.notification.deleted'));
        } else {
            $this->use_message and \Messages::error(__('pricingtable.error'));
        }
        
        \Response::redirect_back('pricingtable/backend/theme');
    }
}
