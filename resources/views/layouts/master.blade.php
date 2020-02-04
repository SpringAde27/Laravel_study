<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>라라벨 입문 - 템플릿 상속</title>
</head>
<body>
    <h1>템플릿 상속</h1>
    @yield('style')
    @yield('content')
    @yield('script')
</body>
</html>