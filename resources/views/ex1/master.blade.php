<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Golden Bites | @yield('title')</title>
    @yield('links')
    <link rel="stylesheet" href="{{ asset('css/colors.css') }}">
</head>
<body>
    @include ('../header')
    @yield('content')
    @include ('../footer')
</body>
</html>