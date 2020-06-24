@extends('publico.layout.page')
@section('title') Advogado @stop
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

{{--            @if (in_array($_SERVER['HTTP_USER_AGENT'], ["iPhone","iPad","Android","webOS","BlackBerry","iPod","Symbian","IsGeneric"]))--}}
{{--            @endif--}}
            <div class="col-md-12 text-center pb-2 pt-2" style="justify-content: center;display: flex;">
                <div class="alert alert-danger text-center " style=" width: 60%">
{{--                    {{dd($menu)}}--}}
                    <a href="{{route('publico.site.menus.secundarios',[request()->route()->parameters['url'],$menu->name])}}">
                        <h5 style="margin-bottom: 0">
                            <i class="icon fas fa-info"></i> {{$menu->description}}
                        </h5>
                    </a>
                </div>
            </div>
        @endforeach
    @endif
@stop
