@extends('layouts.main')

@section('content')
<div class="inner-wrapper">
    <div class="container-fluid no-padding">
        <div class="row no-gutters overflow-auto">
            <div class="col-md-6">
                <div class="main-banner">
                    <img src="{{ asset('styleWeb/assets/images/banner-1.jpg') }}" class="img-fluid full-width main-img"
                        alt="banner">
                    <img src="{{ asset('styleWeb/assets/images/burger.png') }}" class="footer-img" alt="footer-img">
                </div>
            </div>
            <div class="col-md-6">
                <div class="section-2 user-page main-padding">
                    <div class="login-sec">
                        <div class="login-box">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <h4 class="text-light-black fw-600">Registrar una Cuenta</h4>
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-6">
                                        <div class="form-group">
                                            <label class="text-light-white fs-14">Nombre</label>
                                            <input
                                                class="form-control form-control-submit @error('name') is-invalid @enderror"
                                                name="name" value="{{ old('name') }}" required autocomplete="name"
                                                autofocus type="text" placeholder="Nombre">
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-6">
                                        <div class="form-group">
                                            <label class="text-light-white fs-14">Last name</label>
                                            <input
                                                class="form-control form-control-submit @error('lastname') is-invalid @enderror"
                                                type="text" name="lastname" value="{{ old('lastname') }}" required
                                                autocomplete="lastname" autofocus placeholder="Apellido">
                                            @error('lastname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="text-light-white fs-14">Email</label>
                                            <input
                                                class="form-control form-control-submit @error('email') is-invalid @enderror"
                                                type="text" name="email" placeholder="Email" value="{{ old('email') }}"
                                                required autocomplete="email">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="text-light-white fs-14">Contraseña</label>
                                            <input
                                                class="form-control form-control-submit @error('password') is-invalid @enderror"
                                                type="password" name="password" id="password" placeholder="Password"
                                                required autocomplete="new-password">

                                            <div data-name="#password"
                                                class="fa fa-fw fa-eye field-icon toggle-password"></div>

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="text-light-white fs-14">Repetir Contraseña</label>
                                            <input class="form-control form-control-submit" type="password"
                                                name="password_confirmation" required autocomplete="new-password"
                                                id="repet-password" placeholder="Repetir password">

                                            <div data-name="#repet-password"
                                                class="fa fa-fw fa-eye field-icon toggle-password"></div>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn-second btn-submit full-width">Crear
                                                Cuenta</button>
                                        </div>
                                        <div class="form-group text-center">
                                            <p class="text-light-black mb-0"><a href="{{ route('login') }}">Ya tengo
                                                    cuenta </a>
                                            </p>
                                        </div> <span class="text-light-black fs-12 terms">Creando una cuenta en Guía
                                            Celíaca, usted aceptas los <a href="{{ route('term') }}" target="_blank">
                                                términos y condiciones
                                            </a> and <a href="{{ route('policity') }}" target="_blank">
                                                Políticas de Privacidad.</a></span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection