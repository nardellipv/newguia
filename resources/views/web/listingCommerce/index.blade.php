@extends('layouts.main')

@section('content')
<div class="most-popular section-padding">
    <div class="container-fluid">
        <div class="row">
            @include('web.listingCommerce._aside')
            <div class="col-lg-9 browse-cat border-0">
                <div class="row">
                    <div class="col-12">
                        <div class="section-header-left">
                            <h3 class="text-light-black header-title title-2">Listado de comercios<small><a href="#"
                                        class="text-dark-white fw-600">{{ $countCommerce }} comercios</a></small></h3>
                        </div>
                    </div>
                    <div class="col-12">
                        @foreach($commercesListed as $commerce)
                        <div class="product-list-view">
                            <div class="product-list-info">
                                <div class="product-list-img">
                                    <a href="{{ route('name.commerce', $commerce->slug) }}">
                                        @if (!$commerce->logo)
                                        <img src="{{ asset('styleWeb/assets/images/img-logo-grande.png') }}"
                                            class="img-fluid" alt="{{ $commerce->name }}">
                                        @else
                                        <img src="{{ asset('users/images/' . $commerce->user->id . '/comercio/358x250-' . $commerce->logo) }}"
                                            class="img-fluid" alt="{{ $commerce->name }}">
                                        @endif
                                    </a>
                                </div>
                            </div>
                            <div class="product-right-col">
                                <div class="product-list-details">
                                    <div class="product-list-title">
                                        <div class="product-info">
                                            <h6><a href="{{ route('name.commerce', $commerce->slug) }}"
                                                    class="text-light-black fw-600">{{ Str::limit($commerce->name,50) }}</a>
                                            </h6>
                                            <p class="text-light-white fs-12">
                                                @if ($commerce->province->id == 2)
                                                CABA
                                                @else
                                                {{ $commerce->province->name }}
                                                @endif
                                                - {{ $commerce->region->name }} - {{ Str::limit($commerce->address,40) }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="product-detail-right-box">
                                        <div class="product-list-rating text-center">
                                            <div class="rating-text">
                                                <p class="text-light-white fs-12">{{ $commerce->votes_positive }} Votos
                                                    Positivos</p>
                                            </div>
                                            <div class="rating-text">
                                                <p class="text-light-white fs-12">{{ $commerce->visit }} Visitas</p>
                                            </div>
                                            <div class="rating-text">
                                                <p class="text-light-white fs-12">Miembro desde el
                                                    {{ \Carbon\Carbon::parse($commerce->created_at)->format('Y') }}</p>
                                            </div>
                                        </div>
                                        <div class="product-list-tags">
                                            @if($commerce->type != 'FREE')
                                            <span class="text-custom-white rectangle-tag bg-gradient-red">
                                                Recomendado
                                            </span>
                                            @endif
                                        </div>
                                        <div class="product-list-label">
                                            <a href="{{ route('name.commerce', $commerce->slug) }}">
                                                <span class="rectangle-tag bg-dark text-custom-white">Ir al
                                                    comercio</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-list-bottom">
                                    <div class="mob-tags-label">
                                        @if($commerce->type != 'FREE')
                                            <span class="text-custom-white rectangle-tag bg-gradient-red">
                                                Recomendado
                                            </span>
                                            @endif
                                        <a href="{{ route('name.commerce', $commerce->slug) }}">
                                            <span class="rectangle-tag bg-dark text-custom-white">Ir al
                                                comercio</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="custom-pagination">
                            <nav aria-label="Page navigation example">
                                {{ $commercesListed->render() }}
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection