<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content="{{ config('asset.keywords') }}">
    <meta name="description" content="{{ config('asset.description') }}">
    <title>{{ config('asset.title') }}</title>
    {!! _asset_css_all() !!}
    {!! _asset_ie() !!}
    @stack('styles')
</head>
