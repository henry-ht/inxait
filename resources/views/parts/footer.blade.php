
    <footer class="bg-success container-fluid mt-auto">
        <section class="row justify-content-center">
            <div class="col-md-10">
                <p class="text-center text-white mb-0">
                    <a class="link-light btn " href="{{ route('policies') }}">
                        Privacy policy
                    </a>

                    <span class="my-2">
                        •
                    </span>

                    <a class="link-light btn" href="{{ route('termsAndConditions') }}">
                        Terms and Conditions
                    </a>

                    <span class="my-2">
                        •
                    </span>

                    <a class="link-light btn" href="{{ route('policies') }}">
                        Cookie policy
                    </a>
                </p>
            </div>
        </section>
    </footer>


    <script src="{{ asset('js/app.js') }}"></script>

    @yield('scripts')

    </body>
</html>
