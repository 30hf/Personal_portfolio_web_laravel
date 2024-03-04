<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Personal - Start Bootstrap Theme</title>
        @include('components.style')
    </head>
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
            @include('components.navbar')
            @yield('content')
            @include('components.footer')
            @include('components.script')
        </main>
    </body>
</html>
