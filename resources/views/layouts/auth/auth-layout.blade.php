@php
$app = [
'name' => config('app.name'),
'lang' => str_replace('_','-', app()->getLocale())
]
@endphp
<!DOCTYPE html>
<html lang="{{ $app['lang'] }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$app['name']}} | @yield('title')</title>
    @vite('resources/sass/app.scss')
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                @yield('content')
            </main>
        </div>
        @include('layouts.auth._footer')
    </div>

    @vite('resources/js/app.js')
</body>

</html>