@extends('adminlte::page')

@section('title', 'Configuração')

@section('content_header')
    <h1>Configuração</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header " style="margin-top: auto;
margin-bottom: auto;">
            <h3 class="card-title ">Perfil</h3>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                @if (isset($user))
                    {!! Form::model($user,['route'=> ['restrito.usuarios.update',$user->id],'class'=>'form','method'=>'put']) !!}
                @endif

                <div class="form-group">
                    {!! Form::label('Nome',null,[]) !!}
                    {!! Form::text('name',null,['class'=>'form-control', 'required']) !!}
                    <small>Nome de exibição para usuário</small>
                </div>

                    <div class="form-group">
                        {!! Form::label('Senha',null,[]) !!}
                        <input type="password" name="password" class="form-control">
                    </div>
            </div>
        </div>
            <!-- /.card-body -->
            <div class="card-footer" align="right">

                {!! Form::button('<i class="glyphicon glyphicon-ok"> Salvar</i>', array('type' => 'submit', 'class' => 'btn btn-primary')) !!}
            </div>
            <!-- /.card-footer -->
            {!! Form::close() !!}
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
