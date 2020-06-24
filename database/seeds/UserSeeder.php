<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $perfil = \App\Models\Perfil::where('name', 'administrador')->first();
        $user = \App\User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin@123'),
            'perfil_id' => $perfil->id
        ]);
        \App\Models\Configuration::create([
            'url_acesso' => 'admin-site',
            'user_id' => $user->id
        ]);

    }
}
