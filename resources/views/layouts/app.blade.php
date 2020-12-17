<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('asset::layouts._head')
<body>

<div id="app">
    <div id="main">
        <section id="content_wrapper">
            @yield('content')
        </section>
    </div>
</div>

@include('asset::layouts._foot')
</body>
</html>
