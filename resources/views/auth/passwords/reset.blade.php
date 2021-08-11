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
                            <form class="sign-form" method="POST" action="{{ route('password.update') }}">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">
                                <h4 class="text-light-black fw-600">Ingresar a Guía Celíaca</h4>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                                        <input id="email" type="email"
                                               class="brd-rd3 @error('email') is-invalid @enderror"
                                               name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                    </div>

                                    <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                                        <input id="password" type="password"
                                               class="brd-rd3 @error('password') is-invalid @enderror"
                                               name="password" required autocomplete="new-password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                                        <input id="password-confirm" type="password"
                                               class="brd-rd3"
                                               name="password_confirmation" required autocomplete="new-password">
                                    </div>

                                    <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                                        <button class="red-bg brd-rd3" type="submit">{{ __('Recuperar') }}</button>
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