@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Usuários</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header " style="margin-top: auto;
margin-bottom: auto;">
            <h3 class="card-title ">Cadastro De Usuários</h3>
            <div class="card-tools">
                <!-- Buttons, labels, and many other things can be placed here! -->
                <!-- Here is a label for example -->
                {{--                <span class="badge badge-primary">Label</span>--}}

                {{--                <input type="button" class="btn btn-default btn-sm" value="Cadastrar">--}}
            </div>

        </div>


        <!-- /.card-tools -->
        <!-- /.card-header -->
        <div class="card-body">
            @if (isset($user))
                {!! Form::model($user,['route'=> ['restrito.usuarios.update',$user->id],'class'=>'form','method'=>'put', 'enctype' => 'multipart/form-data', 'id' => 'fileForm']) !!}
            @else
                {!! Form::open(['route'=>'restrito.usuarios.store','class'=>'form', 'enctype' => 'multipart/form-data', 'id' => 'fileForm']) !!}
            @endif
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('Nome',null,[]) !!}
                    {!! Form::text('name',null,['class'=>'form-control', 'required']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('E-mail',null,[]) !!}
                    {!! Form::input('email', 'email', null,['class'=>'form-control', 'required']) !!}
{{--                    {!! Form::text('email',null,['class'=>'form-control']) !!}--}}
                </div>

                <div class="form-group">
                    {!! Form::label('Senha',null,[]) !!}
                    {!! Form::input('password', 'password', null,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('Perfil',null,[]) !!}
                    {!! Form::select('perfil_id', $perfis, null,['class'=>'form-control', 'required']) !!}
                </div>
            </div>

        </div>
            <!-- /.card-body -->
                <div class="card-footer" align="right">


{{--                    <a href="{{route('menu.primario.create')}}" class="btn btn-sm btn-success">--}}
{{--                        <i class="fa fa-plus" aria-hidden="true"></i>--}}
{{--                        Cadastrar--}}
{{--                    </a>--}}
                    <a href="{{route('restrito.menus.index')}}" class="btn btn-sm btn-default">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                        Voltar
                    </a>
                    {!! Form::button('<i class="far fa-save"></i> &nbsp; Salvar', array('type' => 'submit', 'class' => 'btn btn-sm btn-primary')) !!}
                </div>
        <!-- /.card-footer -->
        {!! Form::close() !!}
        </div>
        <!-- /.card -->

        @stop

        @section('css')
            <link rel="stylesheet" href="/css/admin_custom.css">
        @stop

        @section('js')
{{--            <script> console.log('Hi!'); </script>--}}
@stop
