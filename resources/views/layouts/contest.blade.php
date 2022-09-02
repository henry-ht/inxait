
@include('parts/header')
<body class="antialiased d-flex flex-column min-vh-100">
        @include('parts.navbar')
        <main class="container pt-5">
            @yield('content')
        </main>

@include('parts/footer')
