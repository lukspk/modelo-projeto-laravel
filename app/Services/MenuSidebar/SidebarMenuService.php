<?php


namespace App\Services\MenuSidebar;


//use Illuminate\Support\Facades\Auth;
//use Laravel\Ui\AuthCommand;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Facade;
//class FeedsFacade extends Facade
class SidebarMenuService extends Facade
{
    public static function getMenu()
    {
//        dd(Auth::user());
//        dd(Auth::user()->id)
//dd(;
//        dd(Auth::user());
        $array[] = [
            'text' => 'search',
            'search' => false,
            'topnav' => true,
        ];
//        dd(Auth::user());


//        if (Auth::user()->perfil)
        array_push($array,
            [
            'text' => 'blog',
            'url'  => 'admin/blog',
            'can'  => 'manage-blog',
            ],
            [
                'text' => 'Perfil',
                'url'  => 'admin/settings',
                'icon' => 'fas fa-fw fa-user',
            ],
            [
                'text' => 'Usuários',
                'url'  => 'restrito/usuarios',
                'icon' => 'fas fa-fw fa-user',
            ]
        );
        return $array;
        dd($array);
        $array[] = [
            [
                'text' => 'blog',
                'url'  => 'admin/blog',
                'can'  => 'manage-blog',
            ],

            [
                'text' => 'Perfil',
                'url'  => 'admin/settings',
                'icon' => 'fas fa-fw fa-user',
            ],
        ];
//        dd($array);
        return $array;
        return [
            [
                'text' => 'search',
                'search' => false,
                'topnav' => true,
            ],
            [
                'text' => 'blog',
                'url'  => 'admin/blog',
                'can'  => 'manage-blog',
            ],

            [
                'text' => 'Perfil',
                'url'  => 'admin/settings',
                'icon' => 'fas fa-fw fa-user',
            ],
            [
                'text' => 'Usuários',
                'url'  => 'restrito/usuarios',
                'icon' => 'fas fa-fw fa-user',
            ],
            [
                'text' => 'Menus',
                'url'  => 'restrito/menus',
                'icon' => 'fas fa-fw fa-bars',
            ],
            [
                'text' => 'Configuração',
                'url'  => 'restrito/configuracao',
                'icon' => 'fas fa-fw fa-cog',
            ],
        ];
    }
}
