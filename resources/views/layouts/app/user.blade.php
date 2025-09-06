@include('layouts.head')

<body>
    <main id="app">
        @include('layouts.header.layout')
        @show

        <div class="container-flex-row">
            @include('layouts.side-navigation.layout')
            @yield('content')
        </div>


        @include('layouts.footer.layout')
        @show
    </main>
    <script src="{{ mix('js/app.js') }}" async></script>
</body>

</html>