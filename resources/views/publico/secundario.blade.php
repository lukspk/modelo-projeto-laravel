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
    @if ($menus)
        @foreach ($menus as $menu)
            <div class="col-md-12 text-center pb-2 pt-2">
{{--                {{dd())}}--}}
{{--                <a href="{{route('publico.site.menus.secundarios',[request()->route()->parameters['url'],$menu->id])}}" class="btn btn-info">{{$menu->description}}</a>--}}
{{--                <a href="https://wa.me/5592984415320" class="btn btn-info">{{$menu->description}}</a>--}}
            </div>
            <div class="col-md-12 text-center pb-2 pt-2" style="justify-content: center;display: flex;">
                <div class="alert alert-danger text-center mt-2" style=" width: 60%">
{{--                    {{dd($_SERVER['HTTP_USER_AGENT'])}}--}}
{{--                    {{\Symfony\Component\Console\Helper\Helper::str_contains}}--}}
                        @if (\Illuminate\Support\Str::contains($_SERVER['HTTP_USER_AGENT'], ["iPhone","iPad","Android","webOS","BlackBerry","iPod","Symbian","IsGeneric"]))
                            <a href="https://wa.me/55{{str_replace(['(',')',' ','-'],'',$menu->redirecionamento->telefone)}}">
                        @else
                            <a href="{{route('publico.site.menus.secundarios.formulario.email',[request()->route()->parameters['url'],$menu->name])}}">
                        @endif
                        <h5 style="margin-bottom: 0">
                            <i class="icon fas fa-info"></i> {{$menu->description}}
                        </h5>
                    </a>
                </div>
            </div>

        @endforeach
    @endif
@stop
