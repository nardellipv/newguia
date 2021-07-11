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
                <div class="main-box padding-20 mb-md-40">
                    <div id="add-restaurent-tab">
                        <div class="row">
                            @include('adminSite.parts._asideMenu')

                            <div class="col-xl-8 col-lg-7">
                                <div class="step-content">
                                    <div class="step-tab-panel active" id="steppanel1">
                                        <div class="general-sec">
                                            <form method="post" action="{{ route('commerce.addCommerceStep1') }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h5 class="text-light-black fw-700">Crear nuevo Comercio</h5>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <img src="{{ asset('styleWeb/assets/images/img-logo-grande.png') }}"
                                                                class="img-fluid " style="width: 40%">

                                                            <div class="form-group">
                                                                <input type="file" class="btn-second btn-submit"
                                                                    name="photo">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="text-light-black fw-700">Nombre del Comercio
                                                            </label>
                                                            <input type="text" name="name"
                                                                class="form-control form-control-submit"
                                                                value="{{ old('name') }}" required
                                                                placeholder="Nombre del Comercio">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="text-light-black fw-700">Teléfono</label>
                                                            <input type="number" name="phone" placeholder="Teléfono"
                                                                value="{{ old('phone') }}" required
                                                                class="form-control form-control-submit">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="text-light-black fw-700">Whatsapp</label>
                                                            <input type="number" name="phoneWsp"
                                                                placeholder="Whatsapp (sin 0 ni 15)"
                                                                value="{{ old('phoneWsp') }}"
                                                                class="form-control form-control-submit">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="text-light-black fw-700">Sobre el
                                                                Comercio</label>
                                                            <textarea type="text" name="about" required
                                                                placeholder="Escribir sobre tu comercio"
                                                                class="form-control form-control-submit">{{ old('about') }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="u-line mb-xl-20"></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h5 class="text-light-black fw-700">Servicios y Métodos de Pago
                                                        </h5>
                                                    </div>
                                                    <div class="col-6">
                                                        @foreach($characteristics as $characteristic)
                                                        <label class="custom-checkbox text-light-black">
                                                            <input type="checkbox" name="characteristic_id[]"
                                                                id=characteristic-{{ $characteristic->id }}
                                                                value="{{ $characteristic->id }}"> <span
                                                                class="checkmark"></span>{{ $characteristic->name }}</label>
                                                        @endforeach
                                                    </div>
                                                    <div class="col-6">
                                                        @foreach($payments as $payment)
                                                        <label class="custom-checkbox text-light-black">
                                                            <input type="checkbox" name="payment_id[]" id="payment-{{ $payment->id }}"
                                                            value="{{ $payment->id }}"> <span
                                                                class="checkmark"></span>{{ $payment->name }}</label>
                                                        @endforeach
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="u-line mb-xl-20"></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h5 class="text-light-black fw-700">Redes sociales</h5>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="text-light-black fw-700">Web</label>
                                                            <input type="text" class="form-control form-control-submit"
                                                                placeholder="Sitio Web">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="text-light-black fw-700">Facebook</label>
                                                            <input type="text" class="form-control form-control-submit"
                                                                placeholder="Usuario Facebook">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="text-light-black fw-700">Instagram</label>
                                                            <input type="text" class="form-control form-control-submit"
                                                                placeholder="Usuario Instagram">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="u-line mb-xl-20"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn-first green-btn text-custom-white full-width fw-500">Continuar</button>
                                                </div>
                                            </form>
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