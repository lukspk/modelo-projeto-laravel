<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="/vendor/izitoast/dist/js/iziToast.js"></script>
    <link rel="stylesheet" type="text/css" href="/vendor/izitoast/dist/css/iziToast.css">
    <title>@yield('title')</title>

</head>
<body>
<div class="container ">

    <div class="row">
        <div class="col-md-12 text-center mt-3">
            @if (isset($configuration->logo_url))
                <img src="{{$configuration->logo_url}}" width="40%">
            @endif
        </div>

      @yield('container')
    </div>

</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
        @if(Session::has('message'))
    var type = "{{ Session::get('type', 'info') }}";
    switch(type){
        case 'info':
            iziToast.info({
                title: 'Aviso',
                message: '{{ Session::get('message') }}',
                position: 'topRight'
            });
            break;

        case 'warning':
            iziToast.warning({
                title: 'Atenção',
                message: '{{ Session::get('message') }}',
                position: 'topRight'
            });
            break;

        case 'success':
            iziToast.success({
                title: 'Sucesso',
                message: '{{ Session::get('message') }}',
                position: 'topRight'
            });
            {{--iziToast.success("{{ Session::get('message') }}");--}}
                break;

        case 'error':
            iziToast.error({
                title: 'Erro',
                message: '{{ Session::get('message') }}',
                position: 'topRight'
            });
            break;
    }
    @endif
</script>
</body>
</html>
