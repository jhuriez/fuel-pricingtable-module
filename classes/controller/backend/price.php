<?php

namespace PricingTable;

class Controller_Backend_Price extends \PricingTable\Controller_Backend
{
    
    public function action_api()
    {
        switch(\Input::get('action')) {
            case 'get_attribute_title':
                $id = \Input::get('id');
                $pricingtable = \LbPricingTable\Model\Pricingtable::find(
                    $id, 
                    array('related' => array('attributes_title'), 'order_by' => 'attributes_title.position')
                );
                
                $data = array();
                foreach($pricingtable->attributes_title as $attribute_title)
                {
                    $data[] = $attribute_title->to_array();
                }
                
                return \Format::forge($data)->to_json();
                break;
        }
    }
    
    public function action_add($idPricingTable, $id = null)
    {
        $isUpdate = ($id !== null) ? true : false;
        $data['isUpdate'] = $isUpdate;

        $form = \Fieldset::forge('priceform', array('form_attributes' => array('class' => 'form-horizontal')));
        $form->add_model('LbPricingTable\\Model\\Pricingtable_Price');
        
        $form->add('add', '', array('type' => 'submit', 'value' => ($isUpdate) ? 'Modifier' : 'Ajouter', 'class' => 'btn btn-primary'));
        $form->disable('created_at')->disable('updated_at');
        
        if ($isUpdate) {
            $price = \LbPricingTable\Model\Pricingtable_Price::find(
                    $id,
                    array('related' => array('attributes_value'), 'order_by' => 'attributes_value.position')
            );
        } else {
            $price = new \LbPricingTable\Model\Pricingtable_Price();
        }
        $price->pricingtable = $data['pricingtable'] = \LbPricingTable\Model\Pricingtable::find($idPricingTable);
        
        $data['price'] = $price;

        $form->populate($price);

        if (\Input::post('add')) {
            // validate the input
            $form->validation()->run();

            // if validated, create the theme
            if (!$form->validation()->error()) {
                // Set from form
                $price->from_array(array(
                        'title' => $form->validated('title'),
                        'price' => $form->validated('price'),
                        'currency' => $form->validated('currency'),
                        'price_text' => $form->validated('price_text'),
                        'price_small_text' => $form->validated('price_small_text'),
                        'button_action_text' => $form->validated('button_action_text'),
                        'button_action_url' => $form->validated('button_action_url'),
                        'small_text' => $form->validated('small_text'),
                        'is_new' => ($form->validated('is_new')) ? : false,
                        'is_popular' => ($form->validated('is_popular')) ? : false,
                ));
                
                /**
                 * Manage attribute value
                 */
                list($price, $attributesValueToDelete) = \LbPricingTable\Helper::manageCollection($price, '\LbPricingTable\Model\Pricingtable_Attribute_Value', 'attributes_value', $isUpdate, true, array('title', 'position', 'tooltip_info'));
                
                if ($price->save()) {
                    foreach($attributesValueToDelete as $attributeValue)
                    {
                        $attributeValue->delete();
                    }
                    
                    if($isUpdate)
                        $this->use_message and \Messages::success(__('pricingtable.price.notification.edited'));
                    else
                        $this->use_message and \Messages::success(__('pricingtable.price.notification.created'));
                    
                    \Response::redirect('/pricingtable/backend/pricingtable/view/'.$idPricingTable);
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

        $view = \Theme::instance($this->moduleName)->view('pricingtable::backend/price/add', $data, false);
        \Theme::instance($this->moduleName)->set_partial('content', $view);
    }

    public function action_delete($id)
    {
        $price = \LbPricingTable\Model\Pricingtable_Price::find($id);
        if ($price->delete()) {
            $this->use_message and \Messages::success(__('pricingtable.price.notification.deleted'));
        } else {
            $this->use_message and \Messages::error(__('pricingtable.error'));
        }
        
        \Response::redirect_back('pricingtable/backend');
    }
}
