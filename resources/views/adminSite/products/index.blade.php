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

                                <div id="collapseOne" class="collapse show">
                                    <a class="btn-second btn-submit btn-block" href="{{ route('product.addNew') }}"
                                        style="margin: 0% 0% 3% 0%;">
                                        Agregar un Nuevo Producto
                                    </a>
                                    <div class="row">
                                        @foreach($products as $product)
                                        <div class="col-lg-12">
                                            <div class="restaurent-product-list">
                                                <div class="restaurent-product-detail">
                                                    <div class="restaurent-product-left">
                                                        <div class="restaurent-product-title-box">
                                                            <div class="restaurent-product-box">
                                                                <div class="restaurent-product-title">
                                                                    <h6>{{ $product->name}}</h6>
                                                                </div>
                                                                <div class="restaurent-product-label"> <span
                                                                        class="rectangle-tag bg-gradient-red text-custom-white">{{ $product->category->name }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="restaurent-product-caption-box"> <span
                                                                class="text-light-white">{{ Str::limit($product->description,50) }}</span>
                                                        </div>

                                                        <div class="restaurent-tags-price">
                                                            <div class="restaurent-product-price">
                                                                <h6 class="text-success fw-600 no-margin">
                                                                    ${{ $product->price }}</h6>
                                                                <a href="{{ route('product.edit', $product) }}" class="fw-500 text-primary">Editar</a>
                                                                <a href="{{ route('product.delete', $product) }}" class="fw-500">Eliminar</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="restaurent-product-img">
                                                        @if (!$product->photo)
                                                        <img src="{{ asset('styleWeb/assets/images/img-logo-grande.png') }}"
                                                            class="img-fluid" alt="#">
                                                        @else
                                                        <img
                                                            src="{{ asset('users/images/' . Auth::user()->id . '/producto/100x100-' . $product->photo) }}">
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
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