<?php

namespace App\Http\Controllers\Publico;

use App\Http\Controllers\Controller;
use App\Models\Configuration;
use App\Models\Menu;
use App\User;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index($url)
    {
        $configuration = Configuration::whereUrlAcesso($url)->first();
        $user = $configuration->user;
        $menus = $user->menus()->whereHas('ordem',function ($query) {
            $query->whereName('primario');
        })->get();

        if (!isset($configuration)) {
            abort(404);
        }
        return view('publico.index')->with([
            'configuration' => $configuration,
            'menus' => $menus
        ]);
    }

    public function menusSecundarios($url, $menuName)
    {
        $configuration = Configuration::whereUrlAcesso($url)->first();
        $user = $configuration->user;
        $menuPrincipal = $user->menus()->whereName($menuName)->first();
        $menus = ($menuPrincipal->associados);

        return view('publico.secundario')->with([
            'configuration' => $configuration,
            'menus' => $menus
        ]);
    }

    public function formularioEmail($url, $menuName)
    {
        $configuration = Configuration::whereUrlAcesso($url)->first();
        $user = $configuration->user;
        $menuPrincipal = $user->menus()->whereName($menuName)->first();
        $menus = ($menuPrincipal->associados);

        return view('publico.form-email')->with([
            'configuration' => $configuration,
            'menus' => $menus
        ]);
    }
}
