<?php

namespace PricingTable;

class Controller_Backend_Pricingtable extends \PricingTable\Controller_Backend
{
    public function action_preview($id = null)
    {
        $pricingTable = \LbPricingTable\Pricingtable::find($id);
        
        \LbPricingTable\Pricingtable::css($pricingTable) and \Asset::css(\LbPricingTable\Pricingtable::css($pricingTable), array(), 'layout', false);
        \LbPricingTable\Pricingtable::js($pricingTable) and \Asset::js(\LbPricingTable\Pricingtable::js($pricingTable), array(), 'js_bottom', false);
        $data['pricingtable'] = \LbPricingTable\Pricingtable::render($pricingTable);
        
        $view = \Theme::instance($this->moduleName)->view('pricingtable::backend/pricingtable/preview', $data, false);
        \Theme::instance($this->moduleName)->set_partial('content', $view);
    }
    
    public function action_index()
    {
        // All pricingtable
        $data['pricingtables'] = \LbPricingTable\Model\Pricingtable::find('all');
        
        $view = \Theme::instance($this->moduleName)->view('pricingtable::backend/index', $data);
        \Theme::instance($this->moduleName)->set_partial('content', $view);
    }
    
    public function action_view($id = null)
    {
        $data['pricingtable'] = \LbPricingTable\Model\Pricingtable::find($id);
        
        if (\Input::post('change_position'))
        {
            // Change position of prices
            foreach(\Input::post('prices') as $id => $position)
            {
                $price = \LbPricingTable\Model\Pricingtable_Price::find($id);
                $price->position = $position;
                $price->save();
            }
        }
        
        $view = \Theme::instance($this->moduleName)->view('pricingtable::backend/pricingtable/view', $data);
        \Theme::instance($this->moduleName)->set_partial('content', $view);
    }
    
    public function action_add($id = null)
    {
        $isUpdate = ($id !== null) ? true : false;
        $data['isUpdate'] = $isUpdate;

        $form = \Fieldset::forge('pricingtableform', array('form_attributes' => array('class' => 'form-horizontal')));
        $form->add_model('LbPricingTable\\Model\\Pricingtable');
        $form->add('add', '', array('type' => 'submit', 'value' => ($isUpdate) ? 'Modifier' : 'Ajouter', 'class' => 'btn btn-primary'));
        $form->disable('created_at')->disable('updated_at');
        if ($isUpdate) {
            $pricingTable = \LbPricingTable\Model\Pricingtable::find(
                    $id, 
                    array('related' => array('attributes_title'), 'order_by' => 'attributes_title.position')
            );
        } else {
            $pricingTable = new \LbPricingTable\Model\Pricingtable();
        }
        $data['pricingtable'] = $pricingTable;
        $form->populate($pricingTable);

        if (\Input::post('add')) {
            // validate the input
            $form->validation()->run();

            // if validated, create the theme
            if (!$form->validation()->error()) {
                // Set from form
                $pricingTable->from_array(array(
                        'title' => $form->validated('title'),
                        'id_pricingtable_theme' => $form->validated('id_pricingtable_theme'),
                ));
                
                /**
                 * Manage attribute title
                 */
                
                list($pricingTable, $attributesTitleToDelete) = \LbPricingTable\Helper::manageCollection($pricingTable, '\LbPricingTable\Model\Pricingtable_Attribute_Title', 'attributes_title', $isUpdate, true, array('title', 'position'));
                
                if ($pricingTable->save()) {
                    foreach($attributesTitleToDelete as $attributeTitle)
                    {
                        $attributeTitle->delete();
                    }
                    
                    if($isUpdate)
                        $this->use_message and \Messages::success(__('pricingtable.pricingtable.notification.edited'));
                    else
                        $this->use_message and \Messages::success(__('pricingtable.pricingtable.notification.created'));
                    
                    \Response::redirect('/pricingtable/backend/');
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

        $view = \Theme::instance($this->moduleName)->view('pricingtable::backend/pricingtable/add', $data, false);
        \Theme::instance($this->moduleName)->set_partial('content', $view);
    }

    public function action_delete($id)
    {
        $pricingTable = \LbPricingTable\Model\Pricingtable::find($id);
        if ($pricingTable->delete()) {
            $this->use_message and \Messages::success(__('pricingtable.pricingtable.notification.deleted'));
        } else {
            $this->use_message and \Messages::error(__('pricingtable.error'));
        }
        
        \Response::redirect_back('pricingtable/backend');
    }
    
    public function action_migrate()
    {
        \Migrate::_init();
        \Migrate::current('concours', 'module');
        
        \Theme::instance()->set_partial('content', 'concours::backend/migrate');
    }
}
