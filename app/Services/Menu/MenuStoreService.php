<?php


namespace App\Services\Menu;


use App\Models\Menu;
use App\Models\OrdemMenu;
use Illuminate\Support\Facades\Auth;

class MenuStoreService
{
    public static function store($request)
    {
        $request['user_id'] = Auth::user()->id;
        $request['ordem_menu_id'] = OrdemMenu::whereName('primario')->first()->id;
        Menu::create($request);
    }
}
