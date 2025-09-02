@include('layouts.head')

<body>
    <main id="app">
        @section('header')
        @include('layouts.header.layout')
        @show

        @yield('content')

        @section('footer')
        @include('layouts.footer.layout')
        @show
    </main>
    <script src="{{ mix('js/app.js') }}" async></script>
</body>

</html>