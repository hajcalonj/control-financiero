@extends('layouts.segurity')

@section('content')
    <!-- Section: Design Block -->
    <section class="text-center text-lg-start">

        <!-- Jumbotron -->
        <div class="container py-4">
            <div class="row g-0 align-items-center">


                <div class="col-lg-6 mb-5 mb-lg-0">
                    <img src="https://mdbootstrap.com/img/new/ecommerce/vertical/004.jpg" class="w-100 rounded-4 shadow-4"
                        alt="" />
                </div>
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="card cascading-left"
                        style=" background: hsla(0, 0%, 100%, 0.55); backdrop-filter: blur(30px);">
                        <div class="card-body p-5 shadow-5 text-center">
                            <h2 class="fw-bold mb-5">{{ __('Register') }}</h2>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <!-- 2 column grid layout with text inputs for the first and last names -->
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="text"
                                                class="form-control  @error('Nombre1') is-invalid @enderror"
                                                placeholder="Primer Nombre" name="Nombre1" id="Nombre1" autofocus required
                                                autocomplete="Nombre1" />
                                            @error('Nombre1')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="text" class="form-control" placeholder="Segundo Nombre"
                                                name="Nombre2" id="Nombre2" />
                                            {{-- <label class="form-label" for="form3Example2">Segundo Nombre</label> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="text" class="form-control" placeholder="Primer Aprellido"
                                                name="Apellido1" id="Apellido1" required />
                                            {{-- <label class="form-label" for="form3Example1">Primer Aprellido</label> --}}
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="text" class="form-control" placeholder="Segundo Aprellido"
                                                name="Apellido2" id="Apellido2" />
                                            {{-- <label class="form-label" for="form3Example2">Segundo Aprellido</label> --}}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-outline mb-4">

                                    <input type="text" class="form-control @error('NombreUsual') is-invalid @enderror"
                                        name="NombreUsual" id="NombreUsual" placeholder="Nombre Usual" required />

                                    @error('NombreUsual')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Email input -->
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="email">Correo Electronico</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" id="email" required />

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="password">Contraseña</label>

                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        name="password" id="password" required />
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="form-outline mb-4">
                                    <label class="form-label" for="password-confirm">Confirmar contraseña</label>

                                    <input type="password"
                                        class="form-control @error('password-confirm') is-invalid @enderror"
                                        name="password_confirmation" id="password-confirm" required />
                                    @error('password-confirm')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Submit button -->
                                <button type="submit" class="btn btn-primary btn-block m-1">
                                    Registrarse
                                </button>
                                <a class="btn btn-warning btn-block m-1" href="{{ route('login') }}">Iniciar Sesion</a>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Jumbotron -->
    </section>
    <!-- Section: Design Block -->
@endsection
