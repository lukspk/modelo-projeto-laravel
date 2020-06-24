@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Menus</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header " style="margin-top: auto;
margin-bottom: auto;">
            <h3 class="card-title ">Listagem De Menus</h3>
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
            @if (isset($colaborador))
                {!! Form::model($colaborador,['route'=> ['colaborador.colaboradores.update',$colaborador->id],'class'=>'form','method'=>'put', 'enctype' => 'multipart/form-data', 'id' => 'fileForm']) !!}
            @else
                {!! Form::open(['route'=>'menu.primario.store','class'=>'form', 'enctype' => 'multipart/form-data', 'id' => 'fileForm']) !!}
            @endif
                <div class="form-group">
                    {!! Form::label('Título Menu',null,[]) !!}
                    {!! Form::text('description',null,['class'=>'form-control']) !!}
                </div>
            </div>
            <!-- /.card-body -->
                <div class="card-footer" align="right">

                    <a href="{{route('menu.primario.index')}}" class="btn btn-sm btn-default">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        Voltar
                    </a>
{{--                    <a href="{{route('menu.primario.create')}}" class="btn btn-sm btn-success">--}}
{{--                        <i class="fa fa-plus" aria-hidden="true"></i>--}}
{{--                        Cadastrar--}}
{{--                    </a>--}}
                    {!! Form::button('<i class="glyphicon glyphicon-ok"> Salvar</i>', array('type' => 'submit', 'class' => 'btn btn-primary')) !!}
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
