<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('web.layout.head')
        @yield('css-files-to-add')
    </head>
    <body class="crm_body_bg">
        @include('web.layout.sidebar')
        <section class="main_content dashboard_part large_header_bg">
            @include('web.layout.header')
            <div class="main_content_iner ">
                <div class="container-fluid p-0">
                    @yield('main')
                </div>
            </div>
            @include('web.layout.footer')
        </section>
        @include('web.layout.scripts')
        @yield('js-files-to-add')
    </body>
</html>