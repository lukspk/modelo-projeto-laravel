@extends('adminlte::page')

@section('title', 'Listagem De Submenus')

@section('content_header')
    <h1>Menus Secundários</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header " style="margin-top: auto;
margin-bottom: auto;">
            <h3 class="card-title ">Cadastro De Menus</h3>
            <div class="card-tools">

            </div>

        </div>

        <div class="card-body">
            @if (isset($menu))
                {!! Form::model($menu,['route'=> ['restrito.menus.submenus.update',$menu->id],'class'=>'form','method'=>'put', 'enctype' => 'multipart/form-data', 'id' => 'fileForm']) !!}
            @else
                {!! Form::open(['route'=>['restrito.menus.submenus.store',request()->route()->parameters['menu']],'class'=>'form', 'enctype' => 'multipart/form-data', 'id' => 'fileForm']) !!}
            @endif
                <div class="form-group">
                    {!! Form::label('Título Menu',null,[]) !!}
                    {!! Form::text('description',null,['class'=>'form-control']) !!}
                </div>
            </div>
            <!-- /.card-body -->
                <div class="card-footer" align="right">

                    <a href="{{route('restrito.menus.submenus.index',request()->route()->parameters['menu'])}}" class="btn btn-sm btn-default">
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
@stop
