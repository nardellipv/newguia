@extends('layouts.main')

@section('content')
<section class="trending section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-header-left">
                    <h3 class="text-light-black header-title">Recetas sin TACC</h3>
                    <p class="text-light-black">Las mejores recetas subidas por la comunidad</p>
                </div>
            </div>
            @foreach($recipes as $recipe)
            <div class="col-lg-4 col-md-6">
                <div class="product-box mb-xl-20">
                    <div class="product-box-2">
                        <div class="product-img">
                            <a href="{{ route('recipes', $recipe->slug) }}">
                                @if (!$recipe->photos)
                                <img src="{{ asset('styleWeb/assets/images/img-logo-grande.png') }}" class="img-fluid"
                                    alt="{{ $recipe->name }}">
                                @else
                                <img src="{{ asset('users/images/'. $recipe->user_id . '/receta/260x180-' . $recipe->photos ) }}"
                                    class="img-fluid" alt="{{ $recipe->name }}">
                                @endif
                            </a>
                        </div>
                        <div class="product-caption">
                            <div class="title-box">
                                <h6 class="product-title"><a href="{{ route('recipes', $recipe->slug) }}"
                                        class="text-light-black">{{ $recipe->name }}</a></h6>
                            </div>
                            <p class="text-light-white">{{ $recipe->category->name }}</p>
                            <div class="discount"> <span class="text-success fs-12"> {{ $recipe->likes }} Me Gusta</span>
                            </div>
                        </div>
                    </div>
                    <div class="product-footer-2">
                        <div class="discount"> <span class="text-success fs-12"></span>
                        </div>
                        <div class="discount-coupon"> <a href="{{ route('recipes', $recipe->slug) }}"><span class="text-light-white fs-12">Ver
                            Receta</span></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection