<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('asset::layouts._head')
<body>

<div id="app">
    {{--@component('adm::partials.skin')@endcomponent--}}
    <div id="main">
        {{--@component('adm::partials.header')@endcomponent
        @component('adm::partials.sidebar')@endcomponent--}}
        <section id="content_wrapper">
            {{--@component('adm::partials.topbarmenu')@endcomponent--}}
            {{--@component('adm::partials.breadcrumb', ['title' => $title ?? ''])@endcomponent--}}
            @yield('content')
            {{--@component('adm::partials.footer')@endcomponent--}}
        </section>
        {{--@component('adm::partials.rightsidebar')@endcomponent--}}
    </div>
</div>

@include('asset::layouts._foot')
</body>
</html>
