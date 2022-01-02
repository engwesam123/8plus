<?php

use App\Setting;
use App\SettingTranslation;
use Illuminate\Database\Seeder;

class SettingTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data = [
            'logo' => "backend/img/logo/large.png",
            'miniLogo' => "backend/img/logo/small.png",
            'default_logo' => "backend/img/logo/default.png",
            'phone' => '123456789',
        ];
        $setting = Setting::create($data);




        $dataTrans = [
            [
                'setting_id' => $setting->id,
                'blog_name' => 'Tasheed',
                'description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
                'locale' => 'en'
            ],
            [
                'setting_id' => $setting->id,
                'blog_name' => 'تشييد',
                'description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
                'locale' => 'ar'
            ]
        ];

        SettingTranslation::insert($dataTrans);
    }
}
