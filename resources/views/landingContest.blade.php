@extends('layouts.contest')

@section('meta')
    <meta name="description" content="cars max" />
    <meta property="og:title" content="cars max" />
    <meta property="og:url" content="{{ route('contest') }}" />
    <meta property="og:site_name" content="cars max" />
    <link rel="canonical" href="{{ route('contest') }}" />
    <meta name="robots" content="noindex, nofollow">
    <title>Cars Max</title>
    <script type="text/javascript" >
    window.onload = function(e){
        let department      = document.getElementById("department_id");
        let content_cities  = document.getElementById("content_cities");
        department.addEventListener('change', function() {
            let city    = document.getElementById("city_id");
            cities      = JSON.parse(this.options[this.selectedIndex].getAttribute('data-cities'));

            let options = city.getElementsByTagName('OPTION');
            countOptions = city.options.length;
            for (let i = 0; i < countOptions; i++) {
                if(options[1]){
                    city.removeChild(options[1]);
                }
            }
            if(cities.length){
                content_cities.classList.remove("d-none");

                cities.forEach(element => {
                    let option = document.createElement("option");
                    option.text = element.name;
                    option.value = element.id;
                    var select = document.getElementById("id-to-my-select-box");
                    city.appendChild(option);
                });
            }else{
                content_cities.classList.add("d-none");
            }

        });
    }
</script>
@stop

@if (old('_token') !== null || Session::has('success') || Session::has('error'))
    @section('scripts')
        <script type="text/javascript" >
            let myModal = new bootstrap.Modal(document.getElementById("modalContest"), {});
            document.onreadystatechange = function () {
                myModal.show();
                let department      = document.getElementById("department_id");
                let city            = document.getElementById("city_id");
                let citySelected    = {{old('city_id') ?? 0}}
                cities      = JSON.parse(department.options[department.selectedIndex].getAttribute('data-cities'));

                console.log('city: ', citySelected)
                if(cities.length){
                    content_cities.classList.remove("d-none");

                    cities.forEach(element => {
                        let option = document.createElement("option");
                        option.text = element.name;
                        option.value = element.id;
                        if(citySelected == element.id){
                            option.selected = true;
                        }
                        city.appendChild(option);
                    });
                }
            };
        </script>
    @stop
@endif

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

                      <button type="button" data-bs-toggle="modal" data-bs-target="#modalContest" class="btn btn-outline-success rounded-pill btn-sm">
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
                                Participants: <b> {{$contest_count}} / 5 </b>
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
    <div class="modal fade" id="modalContest" tabindex="-1" aria-labelledby="modalContest" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalContestTitle">
                    {{__('Register in the form')}}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                    @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{Session::get('success')}}
                        </div>
                    @endif

                    @if(Session::has('error'))
                        <div class="alert alert-danger">
                            {{Session::get('error')}}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('contest.store') }}" >
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="last_name" class="col-md-4 col-form-label text-md-end">{{ __('Last name') }}</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}"  autocomplete="last_name" autofocus>

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
                                <input id="identification_number" type="number" class="form-control @error('identification_number') is-invalid @enderror" name="identification_number" value="{{ old('identification_number') }}"  autocomplete="identification_number" autofocus>

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
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">

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
                                <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}"  autocomplete="phone" autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="department_id" class="col-md-4 col-form-label text-md-end">{{ __('Department') }}</label>

                            <div class="col-md-6">

                                <select class="form-select @error('department_id') is-invalid @enderror" name="department_id" id="department_id" >
                                    <option selected disabled>
                                        {{__('Select department')}}
                                    </option>
                                    @foreach ($department as $key => $value)
                                        <option value="{{$value->id}}"
                                            @if (old('department_id') == $value->id)
                                                selected
                                            @endif

                                            data-cities="{{$value->cities}}"
                                            >
                                            {{$value->name}}
                                        </option>
                                    @endforeach
                                  </select>

                                @error('department_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 d-none" id="content_cities" >
                            <label for="city_id" class="col-md-4 col-form-label text-md-end">{{ __('City') }}</label>

                            <div class="col-md-6">

                                <select class="form-select @error('city_id') is-invalid @enderror"  name="city_id" id="city_id" >
                                    <option selected disabled>
                                        {{__('Select city')}}
                                    </option>

                                  </select>

                                @error('city_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">

                            <div class="col-md-4 col-form-label">


                            </div>

                            <div class="col-md-6">

                                <label class="form-check-label" for="habeas_data">

                                    <input type="checkbox" class="form-check-input text-md-end @error('habeas_data') is-invalid @enderror" name="habeas_data" value="{{old('habeas_data', 1)}}"

                                @if (old('habeas_data') == 1)
                                    checked="checked"
                                @endif

                                id="habeas_data" >


                                    {{__('I accept the')}} <a href="#" class="link-primary"> {{__('Terms')}} </a> {{__('and')}} <a href="#!" class="link-primary">{{__('Conditions')}}</a>
                                    @error('habeas_data')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
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





