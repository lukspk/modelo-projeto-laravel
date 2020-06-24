<?php

use Illuminate\Database\Seeder;

class OrdemMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrays = [
          [ 'name' => 'primario', 'description' => 'Primário' ],
          [ 'name' => 'secundario', 'description' => 'Secundário' ],
          [ 'name' => 'terciario', 'description' => 'Terciário' ],
        ];

        foreach ($arrays as $menu) {
            \App\Models\OrdemMenu::create($menu);
        }
    }
}
