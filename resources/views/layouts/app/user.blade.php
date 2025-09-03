@include('layouts.head')

<body>
    <main id="app">

        @include('layouts.header.layout')
        @include('layouts.side-navigation.layout')
        @show

        @yield('content')

        @include('layouts.footer.layout')
        @show
    </main>
    <script src="{{ mix('js/app.js') }}" async></script>
</body>

</html>