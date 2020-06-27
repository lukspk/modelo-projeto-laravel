@extends('adminlte::page')

@section('title', 'Menus Secundários')

@section('content_header')
    <h1>Menus Secundários</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header " style="margin-top: auto;
margin-bottom: auto;">
            <h3 class="card-title ">Listagem De Submenus</h3>
            <div class="card-tools">
                <a href="{{route('restrito.menus.submenus.create',request()->route()->parameters['menu'])}}" class="btn btn-sm btn-primary">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                    Cadastrar
                </a>
            </div>
        </div>

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
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Descrição</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Data Criação</th>
                    </tr>
                </thead>
                <tbody>
                @if (isset($menus))
                    @foreach($menus as $menu)
                        <tr role="row" class="odd">
                            <td tabindex="0" >
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Ações
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="{{route('restrito.menus.edit',$menu->id)}}"> <span class="glyphicon glyphicon-pencil"></span>
                                            Editar</a>
                                        <a class="dropdown-item" href="#">Segundo Menu</a>
                                        <a class="dropdown-item" onclick="gerenciarRedirecionamento({{$menu->id}})">Gerenciar Redirecionamento</a>
                                    </div>
                                </div>
                            </td>
                            <td>{{$menu->description}}</td>
                            <td>{{$menu->created_at->format('d/m/Y')}}</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-5">
                        <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">{{$menus->links()}}</div>
                    </div>
                    <div class="col-sm-12 col-md-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate"></div>
                   </div>
                </div>


        </div>
    </div>

        <div class="modal" tabindex="-1" role="dialog" id="myModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Redirecionamento</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            {{Form::label('email','Email',null)}}
                            {{Form::text('email',null, ['class' => 'form-control'])}}
                        </div>

                        <div class="form-group">
                            {{Form::label('telefone','Telefone',null)}}
                            {{Form::text('telefone',null, ['class' => 'form-control', 'onkeydown' => "mascara( this )", 'onkeyup'=> "mascara( this )"])}}
                        </div>

                        <div class="form-group">
                            {{Form::label('tag_head_google','Pixel HEAD Google ADS',null)}}
                            {{Form::text('tag_head_google',null, ['class' => 'form-control'])}}
                        </div>

                        <div class="form-group">
                            {{Form::label('tag_pixel_google','Pixel BODY Google ADS',null)}}
                            {{Form::text('tag_pixel_google',null, ['class' => 'form-control'])}}
                        </div>

                        {{Form::hidden('menu_id',null, ['class' => 'form-control'])}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="sendData()">Salvar</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        function gerenciarRedirecionamento(id) {
            document.querySelector("[name='menu_id']").value = id;
            $('#myModal').modal('show')
            axios.post('{{route('restrito.menus.submenus.get.dados.redirecionamento')}}', {
                id : id
            })
                .then(({data}) => {
                    if (data.status == true) {
                        document.querySelector("[name='email']").value = data.email;
                        document.querySelector("[name='telefone']").value = data.telefone;
                    }
                })
                .catch(error => {
                    console.log(error)
                })
        }

        function sendData() {

            axios.post('{{route('restrito.menus.submenus.set.dados.redirecionamento')}}', {
                email: document.querySelector("[name='email']").value,
                telefone : document.querySelector("[name='telefone']").value,
                menu_id : document.querySelector("[name='menu_id']").value
            }).then((response) => {
                $('#myModal').modal('hide');
                document.querySelector("[name='email']").value = null;
                document.querySelector("[name='telefone']").value = null;
                document.querySelector("[name='menu_id']").value = null;
            })
        }
    </script>
            <script>
                stop = '';
                function mascara( campo ) {
                    campo.value = campo.value.replace( /[^\d]/g, '' )
                        .replace( /^(\d\d)(\d)/, '($1) $2' )
                        .replace( /(\d{5})(\d)/, '$1-$2' );
                    if ( campo.value.length > 15 ) campo.value = stop;
                    else stop = campo.value;
                }
            </script>
@stop
