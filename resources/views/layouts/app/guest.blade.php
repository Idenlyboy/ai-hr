@include('layouts.head')

<body>
    <main id="app">
        @yield('content')
    </main>
    <script src="{{ mix('js/app.js') }}" async></script>
</body>

</html>