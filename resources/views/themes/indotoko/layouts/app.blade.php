<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    {{-- <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="css/main.css">
    <title>IndoToko: Official Site</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/themes/indotoko/main.css'])
</head>
<body>
    @include('themes.indotoko.shared.header')
    @include('themes.indotoko.shared.slider')
    @yield('content')
    @include('themes.indotoko.shared.footer')


    {{-- <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script> --}}
</body>
</html>
