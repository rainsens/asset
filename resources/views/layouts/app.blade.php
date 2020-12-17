<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    {!! _asset_css_all() !!}
    {!! _asset_ie() !!}
    @stack('styles')
</head>

<body>

<div id="app">@yield('content')</div>

{!! _asset_js_all() !!}
@stack('scripts')
</body>
</html>