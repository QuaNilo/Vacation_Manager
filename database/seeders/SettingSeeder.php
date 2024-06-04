<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(!DB::table('settings')->where('slug','email')->exists()) {
            DB::table('settings')->insert([
                [
                    'type' => Setting::TYPE_TEXTFIELD,
                    'group' => 'main',
                    'name' => 'Email da plataforma',
                    'slug' => "email",
                    'options' => null,
                    'value' => 'geral@noop.pt',
                    'order_column' => 1,
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s")
                ]
            ]);
        }
        if(!DB::table('settings')->where('slug','page-description')->exists()) {
            DB::table('settings')->insert([
                [
                    'type' => Setting::TYPE_TEXTFIELD,
                    'group' => 'meta',
                    'name' => 'Descrição da página (metatag)',
                    'slug' => "page-description",
                    'options' => null,
                    'value' => 'Descrição da página',
                    'order_column' => 1,
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s")
                ]
            ]);
            DB::table('settings')->insert([
                [
                    'type' => Setting::TYPE_TEXTFIELD,
                    'group' => 'meta',
                    'name' => 'Palavras chave da página (metatag)',
                    'slug' => "page-keywords",
                    'options' => null,
                    'value' => 'noop, dashboard, plataforma',
                    'order_column' => 2,
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s")
                ]
            ]);
        }
        Cache::forget('setting-params');
        Cache::forget('setting-options');
    }
}
