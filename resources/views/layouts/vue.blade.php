<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <script type="text/javascript" src={{ asset('js/xlsx-populate.js')}}></script>
        {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx-populate/1.21.0/xlsx-populate.min.js"></script> --}}
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Matías Estay</title>	
    </head>
    <body class="h-100 w-100">
        <div id='app' class="h-100 w-100">
            @yield('content')
        </div>
    </div>
    </body>
    <script src="{{ asset('js/app.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
</html>