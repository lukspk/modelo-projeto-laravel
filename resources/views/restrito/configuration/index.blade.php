@extends('adminlte::page')

@section('title', 'Configuração')

@section('content_header')
    <h1>Configuração</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header " style="margin-top: auto;
margin-bottom: auto;">
            <h3 class="card-title ">Configurações</h3>
{{--            {{dd($configuracao)}}--}}
{{--            <div class="card-tools">--}}
{{--                <!-- Buttons, labels, and many other things can be placed here! -->--}}
{{--                <!-- Here is a label for example -->--}}
{{--                <span class="badge badge-primary">Label</span>--}}
{{--                <a href="{{route('menu.primario.create')}}" class="btn btn-sm btn-primary">--}}
{{--                    <i class="fa fa-plus" aria-hidden="true"></i>--}}
{{--                    Cadastrar--}}
{{--                </a>--}}
{{--                <input type="button" class="btn btn-default btn-sm" value="Cadastrar">--}}
{{--            </div>--}}

            </div>


            <!-- /.card-tools -->
        <!-- /.card-header -->
        <div class="card-body">
            <div class="table-responsive">
                @if (isset($configuracao))
                    {!! Form::model($configuracao,['route'=> ['restrito.configuracao.update',$configuracao->id],'class'=>'form','method'=>'put', 'enctype' => 'multipart/form-data', 'id' => 'fileForm']) !!}
                @endif
                    <div class="form-group">
                        <div class="col-md-12">{!! Form::label('Logo',null,[]) !!}</div>
                        <div class="col-md-12"><img src="{{$configuracao->logo_url}}" width="10%" style="margin-bottom: 20px;margin-top: 10px"></div>
                        <div class="col-md-12">{!! Form::file('logo',null,[]) !!}</div>
                    </div>
                <div class="form-group">

                    {!! Form::label('Link de Acesso',null,[]) !!}
                    {!! Form::text('url_acesso',null,['class'=>'form-control']) !!}
                    <small>Link de Acesso Atual: {{url($configuracao->url_acesso ?? '/')}}</small>
                </div>
            </div>
        </div>
            <!-- /.card-body -->
            <div class="card-footer" align="right">

{{--                <a href="{{route('menu.primario.index')}}" class="btn btn-sm btn-default">--}}
{{--                    <i class="fa fa-plus" aria-hidden="true"></i>--}}
{{--                    Voltar--}}
{{--                </a>--}}
                {{--                    <a href="{{route('menu.primario.create')}}" class="btn btn-sm btn-success">--}}
                {{--                        <i class="fa fa-plus" aria-hidden="true"></i>--}}
                {{--                        Cadastrar--}}
                {{--                    </a>--}}
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
