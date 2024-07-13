<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }} |  photographe </title>
    <meta name="description" content="Photographe professionnel">

    <link rel="icon" type="image/png" href="#">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <meta name="author" content="Team ESGI">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>


<body>
{{ $slot }}
@livewire('wire-elements-modal')
@livewireScriptConfig
</body>
</html>
