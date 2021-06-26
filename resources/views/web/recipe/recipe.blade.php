@extends('layouts.main')

@section('content')
<section class="final-order section-padding bg-light-theme">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-9">
                <div class="main-box padding-20">
                    <div class="row mb-xl-20">
                        <div class="col-md-6">
                            <div class="section-header-left">
                                <h3 class="text-light-black header-title fw-700">{{ $recipe->name }}</h3>
                            </div>
                            <h6 class="text-light-black fw-700 fs-14"><i
                                class="fa fa-heart"></i> <i>{{ $recipe->likes }} Me Gusta</i></a></h6>
                                <a href="{{ route('recipe.like', $recipe) }}" class="btn-first green-btn text-custom-white full-width fw-500">Te gusto la Receta</a>
                            <h6 class="text-light-black fw-700 mb-2">Ingredientes</h6>
                            <p class="text-light-green fw-600">{!! $recipe->ingredients !!}</p>
                            <p class="text-light-black fw-600 mb-1">Pasos</p>
                            <p class="text-light-green fw-600">{!! $recipe->steps !!}</p>
                        </div>
                        <div class="col-md-6">
                                @if (!$recipe->photos)
                                <img src="{{ asset('styleWeb/assets/images/img-logo-grande.png') }}"
                                    class="img-fluid full-width" alt="{{ $recipe->name }}">
                                @else
                                <img src="{{ asset('users/images/' . $recipe->user_id . '/receta/718x415-' . $recipe->photos) }}"
                                    class="img-fluid full-width" alt="{{ $recipe->name }}">
                                @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                @include('web.recipe._asideRecipe')
            </div>
        </div>
    </div>
</section>
@endsection