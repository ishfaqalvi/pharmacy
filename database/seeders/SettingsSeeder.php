<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            [
                'key' 	=> 'per_page_items',
                'value' => '15',
            ],
            [
                'key' 	=> 'shiping_charges',
                'value' => '200',
            ],
            [
                'key'   => 'page_title_icon',
                'value' => 'upload/images/settings/derivative-favicon.png',
            ],
            [
                'key'   => 'minimum_receiving_order_amount',
                'value' => '1000',
            ],
            [
                'key'   => 'watsapp_number_order_receive',
                'value' => '',
            ],
            [
                'key'   => 'admin_email_order_receive1',
                'value' => '',
            ],
            [
                'key'   => 'admin_email_order_receive2',
                'value' => '',
            ],
            [
                'key'   => 'app_store_link',
                'value' => '',
            ],
            [
                'key'   => 'playstore_link',
                'value' => '',
            ],
            [
                'key'   => 'copyright_link',
                'value' => '',
            ],
            [
                'key'   => 'google_search_console_code',
                'value' => '',
            ],
            [
                'key'   => 'google_analytics_code',
                'value' => '',
            ],
            [
                'key'   => 'clarity_code',
                'value' => '',
            ],
            [
                'key'   => 'job_application_message',
                'value' => 'Thank you for submitting your resume',
            ],
            [
                'key'   => 'feadback_message',
                'value' => 'Thanks for filling out our form!',
            ],
            [
                'key'   => 'comment_message',
                'value' => 'Thanks for filling out our form!',
            ],
            [
                'key'   => 'newsletter_message',
                'value' => 'Thanks for reaching us.',
            ],




            [
                'key'   => 'website_title',
                'value' => 'Sakoon Pharmacy',
            ],
            [
                'key'   => 'website_fav_icon',
                'value' => 'images/settings/favicon.png',
            ],
            [
                'key'   => 'website_logo',
                'value' => 'images/settings/logo.png',
            ],
        ]);
    }
}
