@extends('publico.layout.page')
@section('container')
    <style type="text/css">
        a { color: inherit; text-decoration: none }
        a:hover
        {
            color:inherit;
            text-decoration:none;
            cursor:pointer;
        }
    </style>
{{--            <div class="col-md-12 text-center pb-2 pt-2">--}}
{{--                --}}{{--                <a href="{{route('publico.site.menus.secundarios',[request()->route()->parameters['url'],$menu->id])}}" class="btn btn-info">{{$menu->description}}</a>--}}
{{--                --}}{{--                <a href="https://wa.me/5592984415320" class="btn btn-info">{{$menu->description}}</a>--}}
{{--            </div>--}}
            <div class="col-md-12 text-center pb-2 pt-2" style="justify-content: center;display: flex;">
                <div class="alert alert-info text-left mt-2" style=" width: 60%">
                    {{Form::label('assunto', 'Assunto')}}
                    {{Form::text('assunto', null, ['class' => 'form-control'])}}
                    {{Form::label('mensagem', 'Mensagem',['class' => 'mt-3'])}}
                    {{Form::textArea('assunto', null, ['class' => 'form-control'])}}
                    <div class="col-md-12 text-right mt-3"> <input type="submit" class="btn btn-info"></div>
                </div>
            </div>


@stop
