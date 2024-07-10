<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }} |  photographe </title>
    <meta name="description" content="Photographe professionnel">

    <link rel="icon" type="image/png" href="#">

    <meta name="author" content="Team ESGI">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @livewireStyles
    {{ $assets }}
</head>
<body>
{{ $slot }}
@livewireScripts
</body>
</html>
