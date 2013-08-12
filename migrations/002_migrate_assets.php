<?php

namespace Fuel\Migrations;

class Migrate_assets
{
	public function up()
	{
            if (is_dir(DOCROOT.'public/assets')) {
                // Create dir
                is_dir(DOCROOT.'public/assets/js/modules/pricingtable') or mkdir(DOCROOT.'public/assets/js/modules/pricingtable', 0755, TRUE);
                is_dir(DOCROOT.'public/assets/css/modules/pricingtable') or mkdir(DOCROOT.'public/assets/css/modules/pricingtable', 0755, TRUE);

                // Copy JS Assets
                \File::copy_dir(dirname(__FILE__).'/assets/js', DOCROOT.'public/assets/js/modules/pricingtable');
                // Copy CSS Assets
                \File::copy_dir(dirname(__FILE__).'/assets/css', DOCROOT.'public/assets/css/modules/pricingtable');
            } else {
                die('Unknow public path');
            }
	}

        public function down()
        {
            \File::delete_dir(DOCROOT.'assets/js/modules/pricingtable', true);
            \File::delete_dir(DOCROOT.'assets/css/modules/pricingtable', true);
        }
}