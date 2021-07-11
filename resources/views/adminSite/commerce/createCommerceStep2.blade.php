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
                                        <div class="general-sec">
                                            <form method="post" action="{{ route('commerce.addCommerceStep2') }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="text-light-black fw-700">Provincia</label>
                                                            <select name="province_id" required
                                                                class="form-control form-control-submit custom-select-2 full-width"
                                                                onchange="window.location.href=this.options[this.selectedIndex].value;">
                                                                @if(request()->input(['provincia']))
                                                                <option value="{{ $provinceName->id }}">
                                                                    {{ $provinceName->name }}</option>
                                                                @else
                                                                <option value="">Seleccionar Provincia</option>
                                                                @endif
                                                                @foreach($provinces as $province)
                                                                <option
                                                                    value="{{ route('commerce.chooseProvince', ['provincia'=>$province->id]) }}">
                                                                    {{ $province->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="text-light-black fw-700">Ciudad</label>
                                                            <select name="region_id" required
                                                                class="form-control form-control-submit custom-select-2 full-width">
                                                                @if(!isset($provinceName))
                                                                <option value="">Seleccionar una ciudad</option>
                                                                @else
                                                                @foreach($regions as $region)
                                                                <option value="{{ $region->id }}">{{ $region->name }}
                                                                </option>
                                                                @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="text-light-black fw-700">Dirección <small>No
                                                                    obligatorio</small></label>
                                                            <input type="text" name="address"
                                                                class="form-control form-control-submit"
                                                                placeholder="Dirección">
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <button type="submit"
                                                        class="btn-first green-btn text-custom-white full-width fw-500">Continuar</button>
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