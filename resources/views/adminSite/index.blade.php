@extends('layouts.main')

@section('content')
<section class="register-restaurent-sec section-padding bg-light-theme">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-9">
                <div class="main-box padding-20 mb-md-40">
                    <div id="add-restaurent-tab">
                        <div class="row">
                            @include('adminSite.parts._asideMenu')
                            <div class="col-xl-8 col-lg-7">
                                <div class="step-content">
                                    <div class="step-tab-panel" id="steppanel4">
                                        <div class="thankmsg-sec">
                                            <div class="msg-wrapper text-center">
                                                {{-- <div class="wrapper-1 bg-black padding-20 mb-xl-20">
                                                    <h1 class="text-light-green mb-2">Thank You</h1>

                                                    <h3 class="text-custom-white">We are looking forward for next order.
                                                    </h3>
                                                    <p class="text-custom-white">You have successfully created your
                                                        restaurent, to add more details, go to your email inbox for
                                                        login details</p>
                                                </div> --}}
                                                <div class="row text-left">
                                                    <div class="col-md-5">
                                                        <div class="product-box mb-xl-20">
                                                            <div class="product-img">
                                                                @if (!$user->picture)
                                                                <img src="{{ asset('styleWeb/assets/images/img-logo-grande.png') }}"
                                                                    class="img-fluid full-width" alt="product-img">
                                                                @else
                                                                <img src="{{ asset('users/images/' . $user->id . '/perfil/512x512-' . $user->picture) }}"
                                                                    class="img-fluid full-width" alt="product-img">
                                                                @endif
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <ul class="contact-details">
                                                            <li> <i class="fas fa-user text-light-black"></i>
                                                                <span>{{ $user->name }} {{ $user->lastname }}</span>
                                                            </li>
                                                            <li> <i class="fas fa-envelope text-light-black"></i>
                                                                <span>{{ $user->email }}</span>
                                                            </li>
                                                        </ul>
                                                        <ul class="contact-details">
                                                            @if (userCommerceActive())
                                                            <li>
                                                                <h5>Datos del Comercio</h5>
                                                            </li>
                                                            <li> <i class="fas fa-chart-line text-light-black"></i>
                                                                <span>Cuenta tipo: <b>Comercio</b></span>
                                                            </li>
                                                            <li> <i class="fas fa-users text-light-black"></i>
                                                                <span>Cantidad de visitas:
                                                                    <b>{{ $commerce->visit }}</b></span>
                                                            </li>
                                                            <li> <i class="fas fa-thumbs-up text-light-black"></i>
                                                                <span>Cantidad de votos:
                                                                    <b>{{ $commerce->votes_positive }}</b></span>
                                                            </li>                                                                
                                                            @endif
                                                        </ul>
                                                        @if (userConnect()->type == 'CLIENT')
                                                        <a href="{{ route('commerce.create') }}" type="submit"
                                                            class="btn-first paypal-btn text-custom-white full-width fw-500">Cambiar
                                                            Cuenta a Comercio</a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h5>Enterate primero</h5>
                                    @foreach ($posts as $post)
                                    <a href="{{ route('post.blog', $post->slug) }}">
                                        <div class="restaurent-product-list">
                                            <div class="restaurent-product-detail">
                                                <div class="restaurent-product-left">
                                                    <div class="restaurent-product-title-box">
                                                        <div class="restaurent-product-box">
                                                            <div class="restaurent-product-title">
                                                                <p class="text-light-black">
                                                                    {{ Str::limit($post->title, 30) }}</p>
                                                                <p class="text-light-black">{!! Str::limit($post->body,
                                                                    50) !!}</p>
                                                            </div>
                                                            <div class="restaurent-product-img">
                                                                <img
                                                                    src="{{ asset('blog/images/360x239-' . $post->photo) }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    @endforeach
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