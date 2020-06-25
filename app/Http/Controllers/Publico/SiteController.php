<?php

namespace App\Http\Controllers\Publico;

use App\Http\Controllers\Controller;
use App\Models\Configuration;
use App\Models\Menu;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

    public function sendMail($url, $menu, Request $request)
    {
        $menu = Menu::whereName($menu)->first();

        if (isset($menu) && isset($menu->redirecionamento)) {
            $redirecionamento = $menu->redirecionamento;
            if (empty($redirecionamento->email)) {
                return redirect()->back()->with([
                    'message' => 'Email Não Cadastrado para Escritório',
                    'type' => 'error'
                ]);
            }
            Mail::to($redirecionamento->email)->send(new \App\Mail\Email($request->assunto,$request->mensagem));

            return redirect()->back()->with([
                'message' => 'E-mail enviado com Sucesso',
                'type' => 'success'
            ]);
        } else {
            return redirect()->back()->with([
                'message' => 'Tópico não possui redirecionamento de contato',
                'type' => 'error'
            ]);
        }
    }
}
