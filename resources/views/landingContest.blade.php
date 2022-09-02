@extends('layouts.contest')

@section('meta')
    <meta name="description" content="cars max" />
    <meta property="og:title" content="cars max" />
    <meta property="og:url" content="{{ route('contest') }}" />
    <meta property="og:site_name" content="cars max" />
    <link rel="canonical" href="{{ route('contest') }}" />
    <meta name="robots" content="noindex, nofollow">
    <title>Cars Max</title>
@stop

@section('content')
    <section class="row justify-content-center">
        <div class="col-md-10">
            <div class="card border-0 shadow-sm animated slideInLeft">
                <img src="{{ asset('img/dashboard-car.jpg') }}" class="card-img-top img-fluid rounded-2" alt="cars contest">
            </div>
            <div class="px-3 position-relative app-z-index-10 app-inside-position-1">
                <div class="card text-center border-0 shadow-sm ">
                    <div class="card-body">
                      <h2 class="card-title fw-bold">SPECIAL TITLE</h2>
                      <h5>
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Distinctio officia incidunt
                      </h3>

                      <hr class="my-4">

                      <p class="card-text">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Autem quis asperiores, consequuntur corporis rem provident tempora quaerat consequatur.
                      </p>

                      <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-outline-success rounded-pill btn-sm">
                        Go to the form
                      </button>
                    </div>
                </div>
            </div>
            <div class="px-3 position-relative app-z-index-3 app-inside-position-2">
                <div class="card text-center rounded-0 border-0 shadow-sm bg-dark rounded-bottom">
                    <div class="card-body mt-3 border-0 text-white ">
                      <section class="row">
                        <aside class="col-md-4 text-md-start text-sm-center">
                            <p class="mb-1 ">
                                Participants: <b>50</b>
                            </p>
                            <button class="btn btn-outline-light ml-0">
                                Download xml
                                <i class="fa-solid fa-download ms-1"></i>
                            </button>
                        </aside>
                        <aside class="col-md-4"></aside>
                        <aside class="col-md-4 mt-4 mt-md-0">
                            <div class="h-100 d-flex justify-content-center align-items-center">
                                <p class="mb-0">
                                    <span class="me-2">
                                        <i class="fa-solid fa-star text-warning"></i>
                                    </span>
                                    WINNIE
                                    <span class="ms-2">
                                        <i class="fa-solid fa-star text-warning"></i>
                                    </span>
                                </p>
                            </div>
                        </aside>
                      </section>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    {{__('Register in the form')}}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                    {{-- {{ route('register') }} --}}
                    <form method="POST" action="">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="last_name" class="col-md-4 col-form-label text-md-end">{{ __('last Name') }}</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="identification_number" class="col-md-4 col-form-label text-md-end">{{ __('Identification number') }}</label>

                            <div class="col-md-6">
                                <input id="identification_number" type="number" class="form-control @error('identification_number') is-invalid @enderror" name="identification_number" value="{{ old('identification_number') }}" required autocomplete="identification_number" autofocus>

                                @error('identification_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Phone') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">

                            <div class="col-md-4 col-form-label text-md-end">
                                <input type="checkbox" class="form-check-input text-md-end" value="{{ old('habeas_data') }}" id="habeas_data">

                            </div>

                            <div class="col-md-6">
                                <label class="form-check-label" for="habeas_data">
                                    Acepto los <a href="#!" class="link-primary">Términos</a> y <a href="#!" class="link-primary">Condiciones</a>
                                </label>
                            </div>

                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4 text-end">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Check in') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
