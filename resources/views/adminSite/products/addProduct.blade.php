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
                                            <form method="post" action="{{ route('product.storeNew') }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h5 class="text-light-black fw-700">Crear nuevo Producto</h5>
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
                                                            <label class="text-light-black fw-700">Nombre del Producto
                                                            </label>
                                                            <input type="text" name="name"
                                                                class="form-control form-control-submit"
                                                                value="{{ old('name') }}" required
                                                                placeholder="Nombre del Producto">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="text-light-black fw-700">Precio <small>Opcional</small></label>
                                                            <input type="number" name="price" placeholder="Precio del producto"
                                                                value="{{ old('price') }}" 
                                                                class="form-control form-control-submit">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="text-light-black fw-700">Categoría</label>
                                                            <select name="category_id" 
                                                                class="form-control form-control-submit custom-select-2 full-width">                                                                
                                                                <option value="">Seleccionar una Categoría</option>
                                                                
                                                                @foreach($categories as $cateogry)
                                                                    <option value="{{ $cateogry->id }}">{{ $cateogry->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="text-light-black fw-700">Descripción</label>
                                                            <textarea type="text" name="description" required
                                                                placeholder="Escribir sobre tu producto"
                                                                class="form-control form-control-submit">{{ old('description') }}</textarea>
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