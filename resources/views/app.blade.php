<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    {!! _asset_css_all() !!}
    @stack('css-files')
    @stack('styles')
    {!! _asset_ie() !!}
</head>

<body>

<div id="app">@yield('main')</div>

@stack('script-files')
@stack('scripts')
@yield('scripts')
</body>
</html>
