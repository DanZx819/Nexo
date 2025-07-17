<!DOCTYPE html>
<html lang="pt-BR" data-theme="light" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Nexo</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>


    {{-- Incluir header --}}
    @include('partials.header')


    <main>
        @yield('content')
    </main>

    {{-- Incluir footer --}}
    @include('partials.footer')

   

</body>
</html>
