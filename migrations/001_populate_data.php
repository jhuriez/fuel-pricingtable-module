<?php

namespace Fuel\Migrations;

class Populate_data
{
	public function up()
	{
		// Create theme
                $this->create_template_1();
                $this->create_template_2();
                $this->create_template_3();
	}

        public function down()
        {
            
        }
        
        public function create_template_1()
        {
            // Theme
            $theme = \LbPricingTable\Model\Pricingtable_Theme::forge(array(
                'name' => 'Template 1',
                'file' => 'pricingtable::themes/template1',
                'css_file' => 'modules/pricingtable/themes/template1/css/styles.css'
            ));
            
            // Pricing Table
            $pt = \LbPricingTable\Model\Pricingtable::forge(array(
                'title' => 'Example template 2',
            ));
            
            $pt->theme = $theme;
            
            // attributes titles
            $pt->attributes_title[] = \LbPricingTable\Model\Pricingtable_Attribute_Title::forge(array(
                'title' => 'Support', 'position' => 1
            ));
            $pt->attributes_title[] = \LbPricingTable\Model\Pricingtable_Attribute_Title::forge(array(
                'title' => 'Options', 'position' => 2
            ));
            $pt->attributes_title[] = \LbPricingTable\Model\Pricingtable_Attribute_Title::forge(array(
                'title' => 'Storage', 'position' => 3
            ));
            $pt->attributes_title[] = \LbPricingTable\Model\Pricingtable_Attribute_Title::forge(array(
                'title' => 'Bandwidth', 'position' => 4
            ));
            
            // Prices
            $price1 = \LbPricingTable\Model\Pricingtable_Price::forge(array(
                'title' => 'LIGHT',
                'is_new' => 0,
                'is_popular' => 0,
                'view_counter' => 0,
                'price' => 5,
                'price_text' => 'MONTHLY',
                'price_small_text' => 'Great for small business',
                'currency' => '$',
                'button_action_text' => 'JOIN',
                'button_action_url' => '#LIGHT',
                'small_text' => 'This is a small text',
                'position' => 1,
            )); 
            $price1->attributes_value[] = \LbPricingTable\Model\Pricingtable_Attribute_Value::forge(array(
                'title' => 'No', 'position' => 1, 'tooltip_info' => ''
            ));
            $price1->attributes_value[] = \LbPricingTable\Model\Pricingtable_Attribute_Value::forge(array(
                'title' => 'Basic', 'position' => 2, 'tooltip_info' => ''
            ));
            $price1->attributes_value[] = \LbPricingTable\Model\Pricingtable_Attribute_Value::forge(array(
                'title' => '100GB', 'position' => 3, 'tooltip_info' => ''
            ));
            $price1->attributes_value[] = \LbPricingTable\Model\Pricingtable_Attribute_Value::forge(array(
                'title' => '1TB', 'position' => 4, 'tooltip_info' => ''
            ));
            
          
            // Prices
            $price2 = \LbPricingTable\Model\Pricingtable_Price::forge(array(
                'title' => 'RUN',
                'is_new' => 0,
                'is_popular' => 1,
                'view_counter' => 0,
                'price' => 9,
                'price_text' => 'MONTHLY',
                'price_small_text' => 'Great for small business',
                'currency' => '$',
                'button_action_text' => 'JOIN',
                'button_action_url' => '#RUN',
                'small_text' => 'This is a small text',
                'position' => 2,
            )); 
            $price2->attributes_value[] = \LbPricingTable\Model\Pricingtable_Attribute_Value::forge(array(
                'title' => '24/7 Tech', 'position' => 1, 'tooltip_info' => ''
            ));
            $price2->attributes_value[] = \LbPricingTable\Model\Pricingtable_Attribute_Value::forge(array(
                'title' => 'Advanced', 'position' => 2, 'tooltip_info' => ''
            ));
            $price2->attributes_value[] = \LbPricingTable\Model\Pricingtable_Attribute_Value::forge(array(
                'title' => '200GB', 'position' => 3, 'tooltip_info' => ''
            ));
            $price2->attributes_value[] = \LbPricingTable\Model\Pricingtable_Attribute_Value::forge(array(
                'title' => '2TB', 'position' => 4, 'tooltip_info' => ''
            ));
            
          
            // Prices
            $price3 = \LbPricingTable\Model\Pricingtable_Price::forge(array(
                'title' => 'FLY',
                'is_new' => 0,
                'is_popular' => 0,
                'view_counter' => 0,
                'price' => 12,
                'price_text' => 'MONTHLY',
                'price_small_text' => 'Great for small business',
                'currency' => '$',
                'button_action_text' => 'JOIN',
                'button_action_url' => '#FLY',
                'small_text' => 'This is a small text',
                'position' => 3,
            )); 
            $price3->attributes_value[] = \LbPricingTable\Model\Pricingtable_Attribute_Value::forge(array(
                'title' => '24/7 Tech', 'position' => 1, 'tooltip_info' => ''
            ));
            $price3->attributes_value[] = \LbPricingTable\Model\Pricingtable_Attribute_Value::forge(array(
                'title' => 'Advanced', 'position' => 2, 'tooltip_info' => ''
            ));
            $price3->attributes_value[] = \LbPricingTable\Model\Pricingtable_Attribute_Value::forge(array(
                'title' => '500GB', 'position' => 3, 'tooltip_info' => ''
            ));
            $price3->attributes_value[] = \LbPricingTable\Model\Pricingtable_Attribute_Value::forge(array(
                'title' => '5TB', 'position' => 4, 'tooltip_info' => ''
            ));
            
          
            
            $pt->prices[] = $price1;
            $pt->prices[] = $price2;
            $pt->prices[] = $price3;
            
            $theme->save();
            return $pt->save();
        }
        
        public function create_template_2()
        {
            $theme = \LbPricingTable\Model\Pricingtable_Theme::forge(array(
                'name' => 'Template 2',
                'file' => 'pricingtable::themes/template2',
                'css_file' => 'modules/pricingtable/themes/template2/styles.css'
            ));
            
            // Pricing Table
            $pt = \LbPricingTable\Model\Pricingtable::forge(array(
                'title' => 'Example template 1',
            ));
            $pt->theme = $theme;
            
            // attributes titles
            $pt->attributes_title[] = \LbPricingTable\Model\Pricingtable_Attribute_Title::forge(array(
                'title' => 'Disk Space', 'position' => 1
            ));
            $pt->attributes_title[] = \LbPricingTable\Model\Pricingtable_Attribute_Title::forge(array(
                'title' => 'Monthly Bandwidth', 'position' => 2
            ));
            $pt->attributes_title[] = \LbPricingTable\Model\Pricingtable_Attribute_Title::forge(array(
                'title' => 'Email Accounts', 'position' => 3
            ));
            $pt->attributes_title[] = \LbPricingTable\Model\Pricingtable_Attribute_Title::forge(array(
                'title' => 'subdomains', 'position' => 4
            ));
            
            // Prices
            $price1 = \LbPricingTable\Model\Pricingtable_Price::forge(array(
                'title' => 'ENTERPRISE',
                'is_new' => 0,
                'is_popular' => 0,
                'view_counter' => 0,
                'price' => 59,
                'price_text' => 'PER MONTH',
                'price_small_text' => '',
                'currency' => '$',
                'button_action_text' => 'SIGN UP',
                'button_action_url' => '#ENTERPRISE',
                'small_text' => '',
                'position' => 1,
            )); 
            $price1->attributes_value[] = \LbPricingTable\Model\Pricingtable_Attribute_Value::forge(array(
                'title' => '10GB', 'position' => 1, 'tooltip_info' => ''
            ));
            $price1->attributes_value[] = \LbPricingTable\Model\Pricingtable_Attribute_Value::forge(array(
                'title' => '100GB', 'position' => 2, 'tooltip_info' => ''
            ));
            $price1->attributes_value[] = \LbPricingTable\Model\Pricingtable_Attribute_Value::forge(array(
                'title' => '20', 'position' => 3, 'tooltip_info' => ''
            ));
            $price1->attributes_value[] = \LbPricingTable\Model\Pricingtable_Attribute_Value::forge(array(
                'title' => 'Unlimited', 'position' => 4, 'tooltip_info' => ''
            ));
            
            
            $price2 = \LbPricingTable\Model\Pricingtable_Price::forge(array(
                'title' => 'PROFESSIONAL',
                'is_new' => 0,
                'is_popular' => 0,
                'view_counter' => 0,
                'price' => 29,
                'price_text' => 'PER MONTH',
                'price_small_text' => '',
                'currency' => '$',
                'button_action_text' => 'SIGN UP',
                    'button_action_url' => '#PRO',
                'small_text' => '',
                'position' => 2,
            )); 
            $price2->attributes_value[] = \LbPricingTable\Model\Pricingtable_Attribute_Value::forge(array(
                'title' => '5GB', 'position' => 1, 'tooltip_info' => ''
            ));
            $price2->attributes_value[] = \LbPricingTable\Model\Pricingtable_Attribute_Value::forge(array(
                'title' => '50GB', 'position' => 2, 'tooltip_info' => ''
            ));
            $price2->attributes_value[] = \LbPricingTable\Model\Pricingtable_Attribute_Value::forge(array(
                'title' => '10', 'position' => 3, 'tooltip_info' => ''
            ));
            $price2->attributes_value[] = \LbPricingTable\Model\Pricingtable_Attribute_Value::forge(array(
                'title' => 'Unlimited', 'position' => 4, 'tooltip_info' => ''
            ));
            
            
            $price3 = \LbPricingTable\Model\Pricingtable_Price::forge(array(
                'title' => 'STANDARD',
                'is_new' => 0,
                'is_popular' => 1,
                'view_counter' => 0,
                'price' => 19,
                'price_text' => 'PER MONTH',
                'price_small_text' => '',
                'currency' => '$',
                'button_action_text' => 'SIGN UP',
                    'button_action_url' => '#STANDARD',
                'small_text' => '',
                'position' => 3,
            )); 
            $price3->attributes_value[] = \LbPricingTable\Model\Pricingtable_Attribute_Value::forge(array(
                'title' => '3GB', 'position' => 1, 'tooltip_info' => ''
            ));
            $price3->attributes_value[] = \LbPricingTable\Model\Pricingtable_Attribute_Value::forge(array(
                'title' => '25GB', 'position' => 2, 'tooltip_info' => ''
            ));
            $price3->attributes_value[] = \LbPricingTable\Model\Pricingtable_Attribute_Value::forge(array(
                'title' => '5', 'position' => 3, 'tooltip_info' => ''
            ));
            $price3->attributes_value[] = \LbPricingTable\Model\Pricingtable_Attribute_Value::forge(array(
                'title' => 'Unlimited', 'position' => 4, 'tooltip_info' => ''
            ));
            
            
            $price4 = \LbPricingTable\Model\Pricingtable_Price::forge(array(
                'title' => 'BASIC',
                'is_new' => 0,
                'is_popular' => 0,
                'view_counter' => 0,
                'price' => 9,
                'price_text' => 'PER MONTH',
                'price_small_text' => '',
                'currency' => '$',
                'button_action_text' => 'SIGN UP',
                    'button_action_url' => '#BASIC',
                'small_text' => '',
                'position' => 4,
            )); 
            $price4->attributes_value[] = \LbPricingTable\Model\Pricingtable_Attribute_Value::forge(array(
                'title' => '1GB', 'position' => 1, 'tooltip_info' => ''
            ));
            $price4->attributes_value[] = \LbPricingTable\Model\Pricingtable_Attribute_Value::forge(array(
                'title' => '10GB', 'position' => 2, 'tooltip_info' => ''
            ));
            $price4->attributes_value[] = \LbPricingTable\Model\Pricingtable_Attribute_Value::forge(array(
                'title' => '2', 'position' => 3, 'tooltip_info' => ''
            ));
            $price4->attributes_value[] = \LbPricingTable\Model\Pricingtable_Attribute_Value::forge(array(
                'title' => 'Unlimited', 'position' => 4, 'tooltip_info' => ''
            ));
            
            
            $pt->prices[] = $price1;
            $pt->prices[] = $price2;
            $pt->prices[] = $price3;
            $pt->prices[] = $price4;
            
            $theme->save();
            return $pt->save();
        }
        
        public function create_template_3()
        {
            $theme = \LbPricingTable\Model\Pricingtable_Theme::forge(array(
                'name' => 'Template 3',
                'file' => 'pricingtable::themes/template3',
                'css_file' => 'modules/pricingtable/themes/template3/css/styles.css'
            ));
            
            // Pricing Table
            $pt = \LbPricingTable\Model\Pricingtable::forge(array(
                'title' => 'Example template 3',
            ));
            $pt->theme = $theme;
            
            // attributes titles
            $pt->attributes_title[] = \LbPricingTable\Model\Pricingtable_Attribute_Title::forge(array(
                'title' => 'STORAGE SPACE', 'position' => 1
            ));
            $pt->attributes_title[] = \LbPricingTable\Model\Pricingtable_Attribute_Title::forge(array(
                'title' => 'BANDWIDTH', 'position' => 2
            ));
            $pt->attributes_title[] = \LbPricingTable\Model\Pricingtable_Attribute_Title::forge(array(
                'title' => 'MYSQL DATABASES', 'position' => 3
            ));
            $pt->attributes_title[] = \LbPricingTable\Model\Pricingtable_Attribute_Title::forge(array(
                'title' => 'SETUP', 'position' => 4
            ));
            $pt->attributes_title[] = \LbPricingTable\Model\Pricingtable_Attribute_Title::forge(array(
                'title' => 'PHP 5', 'position' => 5
            ));
            $pt->attributes_title[] = \LbPricingTable\Model\Pricingtable_Attribute_Title::forge(array(
                'title' => 'RUBY ON RAILS', 'position' => 6
            ));
            
            // Prices
            $price1 = \LbPricingTable\Model\Pricingtable_Price::forge(array(
                'title' => 'SMART STARTER',
                'is_new' => 0,
                'is_popular' => 0,
                'view_counter' => 0,
                'price' => 2.9,
                'price_text' => 'PRICE PER MONTH',
                'price_small_text' => '',
                'currency' => '$',
                'button_action_text' => 'SIGN UP',
                'button_action_url' => '#',
                'small_text' => '',
                'position' => 1,
            )); 
            $price1->attributes_value[] = \LbPricingTable\Model\Pricingtable_Attribute_Value::forge(array(
                'title' => '512 MB', 'position' => 1, 'tooltip_info' => ''
            ));
            $price1->attributes_value[] = \LbPricingTable\Model\Pricingtable_Attribute_Value::forge(array(
                'title' => '50 GB', 'position' => 2, 'tooltip_info' => ''
            ));
            $price1->attributes_value[] = \LbPricingTable\Model\Pricingtable_Attribute_Value::forge(array(
                'title' => 'UNLIMITED', 'position' => 3, 'tooltip_info' => ''
            ));
            $price1->attributes_value[] = \LbPricingTable\Model\Pricingtable_Attribute_Value::forge(array(
                'title' => '19.90 $', 'position' => 4, 'tooltip_info' => ''
            ));
            $price1->attributes_value[] = \LbPricingTable\Model\Pricingtable_Attribute_Value::forge(array(
                'title' => '[check]', 'position' => 5, 'tooltip_info' => ''
            ));
            $price1->attributes_value[] = \LbPricingTable\Model\Pricingtable_Attribute_Value::forge(array(
                'title' => '[check]', 'position' => 6, 'tooltip_info' => ''
            ));
            
          
            $price2 = \LbPricingTable\Model\Pricingtable_Price::forge(array(
                'title' => 'SMART MEDIUM',
                'is_new' => 0,
                'is_popular' => 0,
                'view_counter' => 0,
                'price' => 5.9,
                'price_text' => 'PRICE PER MONTH',
                'price_small_text' => '',
                'currency' => '$',
                'button_action_text' => 'SIGN UP',
                'button_action_url' => '#',
                'small_text' => '',
                'position' => 2,
            )); 
            $price2->attributes_value[] = \LbPricingTable\Model\Pricingtable_Attribute_Value::forge(array(
                'title' => '1 GB', 'position' => 1, 'tooltip_info' => ''
            ));
            $price2->attributes_value[] = \LbPricingTable\Model\Pricingtable_Attribute_Value::forge(array(
                'title' => '100 GB', 'position' => 2, 'tooltip_info' => ''
            ));
            $price2->attributes_value[] = \LbPricingTable\Model\Pricingtable_Attribute_Value::forge(array(
                'title' => 'UNLIMITED', 'position' => 3, 'tooltip_info' => ''
            ));
            $price2->attributes_value[] = \LbPricingTable\Model\Pricingtable_Attribute_Value::forge(array(
                'title' => '12.90 $', 'position' => 4, 'tooltip_info' => ''
            ));
            $price2->attributes_value[] = \LbPricingTable\Model\Pricingtable_Attribute_Value::forge(array(
                'title' => '[check]', 'position' => 5, 'tooltip_info' => ''
            ));
            $price2->attributes_value[] = \LbPricingTable\Model\Pricingtable_Attribute_Value::forge(array(
                'title' => '', 'position' => 6, 'tooltip_info' => ''
            ));
            
          
            $price3 = \LbPricingTable\Model\Pricingtable_Price::forge(array(
                'title' => 'SMART BUSINESS',
                'is_new' => 0,
                'is_popular' => 0,
                'view_counter' => 0,
                'price' => 9.9,
                'price_text' => 'PRICE PER MONTH',
                'price_small_text' => '',
                'currency' => '$',
                'button_action_text' => 'SIGN UP',
                'button_action_url' => '#',
                'small_text' => '',
                'position' => 3,
            )); 
            $price3->attributes_value[] = \LbPricingTable\Model\Pricingtable_Attribute_Value::forge(array(
                'title' => '2 GB', 'position' => 1, 'tooltip_info' => ''
            ));
            $price3->attributes_value[] = \LbPricingTable\Model\Pricingtable_Attribute_Value::forge(array(
                'title' => '150 GB', 'position' => 2, 'tooltip_info' => ''
            ));
            $price3->attributes_value[] = \LbPricingTable\Model\Pricingtable_Attribute_Value::forge(array(
                'title' => 'UNLIMITED', 'position' => 3, 'tooltip_info' => ''
            ));
            $price3->attributes_value[] = \LbPricingTable\Model\Pricingtable_Attribute_Value::forge(array(
                'title' => 'FREE', 'position' => 4, 'tooltip_info' => ''
            ));
            $price3->attributes_value[] = \LbPricingTable\Model\Pricingtable_Attribute_Value::forge(array(
                'title' => '', 'position' => 5, 'tooltip_info' => ''
            ));
            $price3->attributes_value[] = \LbPricingTable\Model\Pricingtable_Attribute_Value::forge(array(
                'title' => '[check]', 'position' => 6, 'tooltip_info' => ''
            ));
            
          
            $price4 = \LbPricingTable\Model\Pricingtable_Price::forge(array(
                'title' => 'SMART DELUXE',
                'is_new' => 0,
                'is_popular' => 0,
                'view_counter' => 0,
                'price' => 14.9,
                'price_text' => 'PRICE PER MONTH',
                'price_small_text' => '',
                'currency' => '$',
                'button_action_text' => 'SIGN UP',
                'button_action_url' => '#',
                'small_text' => '',
                'position' => 4,
            )); 
            $price4->attributes_value[] = \LbPricingTable\Model\Pricingtable_Attribute_Value::forge(array(
                'title' => '4 GB', 'position' => 1, 'tooltip_info' => ''
            ));
            $price4->attributes_value[] = \LbPricingTable\Model\Pricingtable_Attribute_Value::forge(array(
                'title' => 'UNLIMITED', 'position' => 2, 'tooltip_info' => ''
            ));
            $price4->attributes_value[] = \LbPricingTable\Model\Pricingtable_Attribute_Value::forge(array(
                'title' => 'UNLIMITED', 'position' => 3, 'tooltip_info' => ''
            ));
            $price4->attributes_value[] = \LbPricingTable\Model\Pricingtable_Attribute_Value::forge(array(
                'title' => 'FREE', 'position' => 4, 'tooltip_info' => ''
            ));
            $price4->attributes_value[] = \LbPricingTable\Model\Pricingtable_Attribute_Value::forge(array(
                'title' => '[check]', 'position' => 5, 'tooltip_info' => ''
            ));
            $price4->attributes_value[] = \LbPricingTable\Model\Pricingtable_Attribute_Value::forge(array(
                'title' => '[check]', 'position' => 6, 'tooltip_info' => ''
            ));
            
          
            
            $pt->prices[] = $price1;
            $pt->prices[] = $price2;
            $pt->prices[] = $price3;
            $pt->prices[] = $price4;
            
            $theme->save();
            return $pt->save();
        }
}