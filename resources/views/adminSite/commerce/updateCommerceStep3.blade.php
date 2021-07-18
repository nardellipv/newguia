@extends('layouts.main')

@section('style')
<link href="{{ asset('styleWeb/assets/css/nice-select.css') }}" rel="stylesheet">
@endsection

@section('content')
<section class="register-restaurent-sec section-padding bg-light-theme">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-9">
                @include('alerts.error')
                <div class="sidebar-tabs main-box padding-20 mb-md-40">
                    <div id="add-restaurent-tab" class="step-app">
                        <div class="row">
                            @include('adminSite.parts._asideMenu')
                            <div class="col-xl-8 col-lg-7">
                                <div class="step-content">
                                    <div class="step-tab-panel active" id="steppanel1">
                                        <div class="msg-wrapper text-center">
                                            <div class="wrapper-1 bg-black padding-20 mb-xl-20">
                                                <h1 class="text-light-green mb-2">Muchas Gracias</h1>

                                                <h3 class="text-custom-white">Tu comercio ya se esta mostrando.</h3>
                                                <p class="text-custom-white">Desde Guía Celíaca te agradecemos por
                                                    registrarte y formar parte de esta comunidad.</p>
                                            </div>
                                            <div class="form-group">
                                                <a href="{{ route('profile') }}" type="submit"
                                                    class="btn-first green-btn text-custom-white full-width fw-500">Volver</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">

            </div>
        </div>
    </div>
</section>
@endsection