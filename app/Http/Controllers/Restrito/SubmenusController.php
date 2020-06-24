<?php

namespace App\Http\Controllers\Restrito;

use App\Http\Controllers\Controller;
use App\Models\DadosRedirecionamento;
use App\Models\Menu;
use App\Models\OrdemMenu;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubmenusController extends Controller
{
    public function index($menuId)
    {
        $submenus = Menu::whereMenuId($menuId)->whereHas('ordem', function ($query) {
            $query->whereName('secundario');
        })->paginate(10);;
        return view('restrito.submenu.index')->with([
            'menus' => $submenus
        ]);
    }

    public function create($menuId)
    {
        return view('restrito.submenu.form');
    }

    public function store($menuId, Request $request)
    {
        $request = $request->all();
        $ordem = OrdemMenu::whereName('secundario')->first();

        Menu::create([
            'description' => $request['description'],
            'user_id' => Auth::id(),
            'ordem_menu_id' => $ordem->id,
            'menu_id' => $menuId
        ]);

        return redirect()->route('restrito.menus.submenus.index', $menuId)->with([
            'message' => 'SubMenu Cadastrado',
            'type' => 'success'
        ]);
    }

    public function getDadosRedirecionamento(Request $request)
    {
        $dados = DadosRedirecionamento::whereMenuId($request->id)->first();

        if (isset($dados)) {
            return Response()->json([
                'status' => true,
                'email' => $dados->email,
                'telefone' => $dados->telefone
            ]);
        } else {
            return Response()->json([
                'status' => false,
            ]);
        }
    }

    public function setDadosRedirecionamento(Request $request){

        $dados = DadosRedirecionamento::whereMenuId($request->menu_id)->first();

        if (isset($dados)) {
            $dados->update([
                'email' => $request->email,
                'telefone' => $request->telefone,
            ]);
        } else {

            DadosRedirecionamento::create([
                'email' => $request->email,
                'menu_id' => $request->menu_id,
                'telefone' => $request->telefone,
            ]);
        }
    }

}
