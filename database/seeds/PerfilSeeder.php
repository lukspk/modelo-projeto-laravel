<?php

use Illuminate\Database\Seeder;

class PerfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrays = [
            [ 'name' => 'administrador', 'description' => 'Administrador' ],
            [ 'name' => 'advogado', 'description' => 'Advogado' ],
        ];

        foreach ($arrays as $perfil) {
            \App\Models\Perfil::create($perfil);
        }
    }
}
