<?php

class ConfigSettingSeeder extends DatabaseSeeder
{
    public function run()
    {
       
        // //  Seed for quick codes
        // $quick = array(
        //     array("feed_source" => 1, "config_prop" => 'PORT', "created_at" => date('Y-m-d H:i:s'), "updated_at" => date('Y-m-d H:i:s')),
        //     array("feed_source" => 1, "config_prop" => 'MODE', "created_at" => date('Y-m-d H:i:s'), "updated_at" => date('Y-m-d H:i:s')),
        //     array("feed_source" => 1, "config_prop" => 'CLIENT_RECONNECT', "created_at" => date('Y-m-d H:i:s'), "updated_at" => date('Y-m-d H:i:s')),
        //     array("feed_source" => 1, "config_prop" => 'EQUIPMENT_IP', "created_at" => date('Y-m-d H:i:s'), "updated_at" => date('Y-m-d H:i:s')),
        //     array("feed_source" => 0, "config_prop" => 'COMPORT', "created_at" => date('Y-m-d H:i:s'), "updated_at" => date('Y-m-d H:i:s')),
        //     array("feed_source" => 0, "config_prop" => 'BAUD_RATE', "created_at" => date('Y-m-d H:i:s'), "updated_at" => date('Y-m-d H:i:s')),
        //     array("feed_source" => 0, "config_prop" => 'PARITY', "created_at" => date('Y-m-d H:i:s'), "updated_at" => date('Y-m-d H:i:s')),
        //     array("feed_source" => 0, "config_prop" => 'STOP_BITS', "created_at" => date('Y-m-d H:i:s'), "updated_at" => date('Y-m-d H:i:s')),
        //     array("feed_source" => 0, "config_prop" => 'APPEND_NEWLINE', "created_at" => date('Y-m-d H:i:s'), "updated_at" => date('Y-m-d H:i:s')),
        //     array("feed_source" => 0, "config_prop" => 'DATA_BITS', "created_at" => date('Y-m-d H:i:s'), "updated_at" => date('Y-m-d H:i:s')),
        //     array("feed_source" => 0, "config_prop" => 'APPEND_CARRIAGE_RETURN', "created_at" => date('Y-m-d H:i:s'), "updated_at" => date('Y-m-d H:i:s')),
        //     array("feed_source" => 2, "config_prop" => 'DATASOURCE', "created_at" => date('Y-m-d H:i:s'), "updated_at" => date('Y-m-d H:i:s')),
        //     array("feed_source" => 2, "config_prop" => 'DAYS', "created_at" => date('Y-m-d H:i:s'), "updated_at" => date('Y-m-d H:i:s')),
        //     array("feed_source" => 4, "config_prop" => 'BASE_DIRECTORY', "created_at" => date('Y-m-d H:i:s'), "updated_at" => date('Y-m-d H:i:s')),
        //     array("feed_source" => 4, "config_prop" => 'USE_SUB_DIRECTORIES', "created_at" => date('Y-m-d H:i:s'), "updated_at" => date('Y-m-d H:i:s')),
        //     array("feed_source" => 4, "config_prop" => 'SUB_DIRECTORY_FORMAT', "created_at" => date('Y-m-d H:i:s'), "updated_at" => date('Y-m-d H:i:s')),
        //     array("feed_source" => 4, "config_prop" => 'FILE_NAME_FORMAT', "created_at" => date('Y-m-d H:i:s'), "updated_at" => date('Y-m-d H:i:s')),
        //     array("feed_source" => 4, "config_prop" => 'FILE_EXTENSION', "created_at" => date('Y-m-d H:i:s'), "updated_at" => date('Y-m-d H:i:s')),
        //     array("feed_source" => 4, "config_prop" => 'FILE_SEPERATOR', "created_at" => date('Y-m-d H:i:s'), "updated_at" => date('Y-m-d H:i:s')),
        //     );
        // foreach ($quick as $codes)
        // {
        //     DB::table('ii_quickcodes')->insert($codes);
        // }
        // $this->command->info("Quick codes table seeded");
        //  Seed for interfaced equipment in blis client
     
    }
}