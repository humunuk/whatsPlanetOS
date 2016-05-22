<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Mis on PlanetOS? Lihtne projekt EIK õppeaine raames.</title>

        <link href="{{URL::to('css/app.css')}}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{URL::to('css/leaflet.css')}}" type="text/css">
        <script src="{{URL::to('js/app.js')}}"></script>
        <script src="{{URL::to('js/leaflet.js')}}"></script>
    </head>
    <body>
    @section('nav')
        @include('elem.nav')
    @show

    @yield('content')

    @yield('scripts')
    </body>
</html>
