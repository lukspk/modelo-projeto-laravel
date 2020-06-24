@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
    <h1>Usuários</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header " style="margin-top: auto;
margin-bottom: auto;">
            <h3 class="card-title ">Listagem De Usuários</h3>
            <div class="card-tools">
                <!-- Buttons, labels, and many other things can be placed here! -->
                <!-- Here is a label for example -->
{{--                <span class="badge badge-primary">Label</span>--}}
                <a href="{{route('restrito.usuarios.create')}}" class="btn btn-sm btn-primary">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                    Cadastrar
                </a>
{{--                <input type="button" class="btn btn-default btn-sm" value="Cadastrar">--}}
            </div>

            </div>


            <!-- /.card-tools -->
        <!-- /.card-header -->
        <div class="card-body">
            <div class="table-responsive">

            </div>


            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12 col-md-6"></div>
                    <div class="col-sm-12 col-md-6"></div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table id="example2" class="table table-bordered  table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
                <thead>
                    <tr role="row">
                        <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" width="100px">Ações</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Nome</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">E-mail</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Perfil</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Data Criação</th>
                    </tr>
                </thead>
                <tbody>
                @if (isset($users))
                    @foreach($users as $user)
{{--                        {{dd($user)}}--}}
                        <tr role="row" class="odd">
                            <td tabindex="0" >
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Ações
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="{{route('restrito.usuarios.edit',$user->id)}}"> <span class="glyphicon glyphicon-pencil"></span>
                                            Editar</a>
                                    </div>
                                </div>


{{--                                <a href="{{route('restrito.menus.edit',$menu->id)}}" class="btn btn-sm btn-primary">--}}
{{--                                    <span class="glyphicon glyphicon-pencil"></span>--}}
{{--                                    Editar--}}
{{--                                </a>--}}
                            </td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->perfil->description}}</td>
                            <td>{{$user->created_at->format('d/m/Y')}}</td>
                        </tr>
                    @endforeach
                @endif

                </tbody>
{{--                            <tfoot>--}}
{{--                            <tr><th rowspan="1" colspan="1">Rendering engine</th><th rowspan="1" colspan="1">Browser</th><th rowspan="1" colspan="1">Platform(s)</th><th rowspan="1" colspan="1">Engine version</th><th rowspan="1" colspan="1">CSS grade</th></tr>--}}
{{--                            </tfoot>--}}
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-5" >
                       {{$users->links()}}
                    </div>
                    <div class="col-sm-12 col-md-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate"></div>
                   </div>
                </div>


        </div>
        <!-- /.card-body -->
{{--        <div class="card-footer">--}}
{{--            The footer of the card--}}
{{--        </div>--}}
        <!-- /.card-footer -->
    </div>
    <!-- /.card -->

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
