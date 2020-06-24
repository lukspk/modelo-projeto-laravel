<?php

namespace App\Http\Controllers\Restrito;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Services\Menu\MenuStoreService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenusController extends Controller
{
    public function index()
    {

        $menus = Menu::whereHas('ordem', function ($query) {
            $query->whereName('primario');
        })->where('user_id',Auth::user()->id)->paginate(10);
        return view('restrito.menu.index')->with([
            'menus' => $menus
        ]);
    }

    public function edit($id)
    {
        $menu = Menu::find($id);
        return view('restrito.menu.form')->with([
            'menu' => $menu
        ]);
    }

    public function  update($id, Request $request)
    {
        $menu = Menu::find($id);
        $menu->update($request->all());
        return redirect()->back()->with([
            'message' => 'Menu Atualizado',
            'type' => 'success'
        ]);
    }
    public function create()
    {
        return view('restrito.menu.form');
    }

    public function store(Request $request)
    {
        MenuStoreService::store($request->all());
        return redirect()->route('restrito.menus.index');
    }
}
