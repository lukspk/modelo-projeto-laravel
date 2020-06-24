<?php

namespace App\Http\Controllers\Restrito;

use App\Http\Controllers\Controller;
use App\Models\Configuration;
use App\Models\Perfil;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{

    public function index()
    {
        $users = User::paginate(15);
        return view('restrito.user.index')->with([
            'users' => $users
        ]);
    }

    public function create()
    {
        $perfis = Perfil::get()->pluck('description', 'id');
        return view('restrito.user.form')->with([
            'perfis' => $perfis
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $request = $request->all();
            $request['password'] = Hash::make($request['password']);

            $user = User::create($request);

            $configuration = Configuration::create([
                'url_acesso' => Str::slug($user->name, '-'),
                'user_id' => $user->id
            ]);

            DB::commit();
            return redirect()->route('restrito.usuarios.index')->with([
                'message' => 'Usuário Cadastrado com Sucesso',
                'type' => 'success'
            ]);
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->back()->with([
                'message' => 'Erro ao Cadastrar Usuário',
                'type' => 'error'
            ])->withInput();
        }

    }



    public function edit($id)
    {
        $user = User::find($id);
        $perfis = Perfil::get()->pluck('description', 'id');

        return view('restrito.user.form')->with([
            'user' => $user,
            'perfis' => $perfis
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $user = User::find($id);
        $request = $request->filled('password') ? $request->all() : $request->except(['password']);
        $user->update($request);

        return redirect()->back()->with([
            'message' => 'Usuário Atualizado',
            'type' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function openPerfilUser()
    {
        $user = Auth::user();

        return view('restrito.perfil.index')->with([
            'user' => $user
        ]);
    }
}
