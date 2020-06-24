<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $guarded = [];
    use Sluggable;
    public function sluggable()
    {
        return [
            'name' => [
                'source' => 'description'
            ]
        ];
    }

    public function ordem()
    {
        return $this->hasOne(OrdemMenu::class,'id','ordem_menu_id');
    }

    public function associados()
    {
        return $this->hasMany(Menu::class,'menu_id','id');
    }

    public function redirecionamento()
    {
        return $this->hasOne(DadosRedirecionamento::class);
    }
}
