<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>@yield('titulo', 'Titulo por defecto')</title>
</head>

<body>
    @yield('content')
</body>

{{--
../partial/footer.
--}}
@include('partials.footer')

</html>