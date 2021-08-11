@extends('layouts.main')

@section('content')
<div class="inner-wrapper">
    <div class="container-fluid no-padding">
        <div class="row no-gutters overflow-auto">
            <div class="col-md-6">
                <div class="main-banner">
                    <img src="{{ asset('styleWeb/assets/images/banner-1.jpg') }}" class="img-fluid full-width main-img"
                        alt="guia celiaca">
                    <img src="{{ asset('styleWeb/assets/images/burger.png') }}" class="footer-img" alt="guia celiaca">
                </div>
            </div>
            <div class="col-md-6">
                <div class="section-2 user-page main-padding">
                    <div class="login-sec">
                        <div class="login-box">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <h4 class="text-light-black fw-600">Ingresar a Guía Celíaca</h4>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="text-light-white fs-14">Email</label>

                                            <input id="email" type="email"
                                                class="form-control form-control-submit @error('email') is-invalid @enderror"
                                                name="email" value="{{ old('email') }}" required autocomplete="email"
                                                placeholder="Email" autofocus>

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="text-light-white fs-14">Contaseña</label>
                                            <input id="password" type="password"
                                                class="form-control form-control-submit @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="current-password"
                                                placeholder="Contraseña">

                                            <div data-name="#password"
                                                class="fa fa-fw fa-eye field-icon toggle-password"></div>

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group checkbox-reset">
                                            <label class="custom-checkbox mb-0">
                                                <input type="checkbox" name="#" name="remember" id="remember"
                                                    {{ old('remember') ? 'checked' : '' }}> <span
                                                    class="checkmark"></span> Mantenerme logueado</label>
                                            {{-- <a href="{{ url('password/reset') }}">Olvide mi Contraseña</a> --}}
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn-second btn-submit full-width">Ingresar</button>
                                        </div>                                        
                                        <div class="form-group text-center mb-0"> <a href="{{ route('register') }}">Crear una Cuenta</a>
                                        </div>
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