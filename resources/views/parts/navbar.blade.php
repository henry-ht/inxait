<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container">
        <a class="navbar-brand px-0 py-0" href="{{ route('contest') }}">
            {{-- <img class="img-fluid pr-3 aa-logo-img" src="img/logo.png" alt="logo"> --}}
            CARS MAX
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

        <div class="collapse navbar-collapse" id="navbarToggler">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contest') }}">
                        {{__('Home')}}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('termsAndConditions') }}">
                        {{__('Terms and Conditions')}}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('policies') }}">
                        {{__('Privacy Policy')}}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
