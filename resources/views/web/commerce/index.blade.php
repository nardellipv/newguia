@extends('layouts.main')

@section('content')
<div class="page-banner p-relative smoothscroll" id="menu">
    <img src="{{ asset('styleWeb/assets/images/banner.jpg') }}" class="img-fluid full-width" alt="banner">
</div>
<!-- restaurent top -->
<!-- restaurent details -->
<section class="restaurent-details  u-line">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading padding-tb-10">
                    <h3 class="text-light-black title fw-700 no-margin">{{ $commerce->name }}</h3>
                    <p class="text-light-black sub-title no-margin">{{ $commerce->address }} -
                        @if($commerce->region)
                        {{ $commerce->region->name }} -
                        @endif
                        {{ $commerce->province->name }}
                    </p>
                </div>
                @if (!$commerce->logo)
                <div class="restaurent-logo" style="width: 20%">
                    <img src="{{ asset('styleWeb/assets/images/img-logo-grande.png') }}" class="img-fluid"
                        alt="{{ $commerce->name }}">
                </div>
                @else
                <div class="restaurent-logo">
                    <img src="{{ asset('users/images/' . $commerce->user->id . '/comercio/260x260-'. $commerce->logo) }}"
                        class="img-fluid" alt="{{ $commerce->name }}">
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<!-- restaurent details -->
<!-- restaurent tab -->
<div class="restaurent-tabs u-line">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="restaurent-menu scrollnav">
                    <ul class="nav nav-pills">
                        <li class="nav-item"> <a class="nav-link active text-light-white fw-700" data-toggle="pill"
                                href="#menu">Menu</a>
                        </li>
                        <li class="nav-item"> <a class="nav-link text-light-white fw-700" data-toggle="pill"
                                href="#about">Sobre {{ $commerce->name }}</a>
                        </li>
                        <li class="nav-item"> <a class="nav-link text-light-white fw-700" data-toggle="pill"
                                href="#review">Reviews</a>
                        </li>
                        {{-- <li class="nav-item"> <a class="nav-link text-light-white fw-700" data-toggle="pill"
                                href="#mapgallery">Mapa</a>
                        </li> --}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- restaurent tab -->
<!-- restaurent address -->
<div class="restaurent-address u-line">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="address-details">
                    <div class="address">
                        <div class="delivery-address"> <a href="order-details.html"
                                class="text-light-black">{{ $commerce->votes_positive }}<span class="fs-14">
                                    Votos Positivos</a>
                        </div>
                        <div class="change-address"> <a href="{{ route('positive', $commerce->slug) }}"
                                class="fw-500"><img src="{{ asset('styleWeb/assets/icons/like.png') }}"
                                    style="width: 30px"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- restaurent address -->
<!-- restaurent meals -->
<section class="section-padding restaurent-meals bg-light-theme">
    <div class="container-fluid">
        <div class="row">
            @include('web.commerce._asideLeft')
            <div class="col-xl-6 col-lg-6">
                <div class="row">
                    <div class="col-lg-12">

                        @include('alerts.error')

                        <div class="promocodeimg mb-xl-20 p-relative">
                            <img src="{{ asset('styleWeb/assets/images/banner.jpg') }}" class="img-fluid full-width"
                                alt="promocode">
                            <div class="promocode-text">
                                <div class="promocode-text-content">
                                    <h5 class="text-custom-white mb-2 fw-600">¡Blog Guía Celíaca!</h5>
                                    <p class="text-custom-white no-margin">Enterarte
                                        las últimas noticias en el mundo de la celiaquia.</p>
                                </div>
                                <div class="promocode-btn"> <a href="{{ route('list.blog') }}">Ir al Blog</a>
                                </div>
                            </div>
                            <div class="overlay overlay-bg"></div>
                        </div>
                    </div>
                    <div class="col-lg-12 restaurent-meal-head mb-md-40">

                        {{--  listado productos  --}}
                        <div class="card">
                            <div class="card-header">
                                <div class="section-header-left">
                                    <h3 class="text-light-black header-title">
                                        <a class="card-link text-light-black no-margin collapsed" data-toggle="collapse"
                                            href="#collapseOne">
                                            Listado de Productos
                                        </a>
                                    </h3>
                                </div>
                            </div>
                            <div id="collapseOne" class="collapse {{ $products != '[]' ? 'show' : '' }}">
                                <div class="card-body no-padding">
                                    <div class="row">
                                        @forelse($products as $product)
                                        <div class="col-lg-12">
                                            <div class="restaurent-product-list">
                                                <div class="restaurent-product-detail">
                                                    <div class="restaurent-product-left">
                                                        <div class="restaurent-product-title-box">
                                                            <div class="restaurent-product-box">
                                                                <div class="restaurent-product-title">
                                                                    <h6 class="mb-2">{{ $product->name }}</h6>
                                                                </div>
                                                            </div>
                                                            <div class="restaurent-product-rating">
                                                                {{--  <div class="ratings"> <span class="text-yellow"><i
                                                                            class="fas fa-star"></i></span>
                                                                    <span class="text-yellow"><i
                                                                            class="fas fa-star"></i></span>
                                                                    <span class="text-yellow"><i
                                                                            class="fas fa-star"></i></span>
                                                                    <span class="text-yellow"><i
                                                                            class="fas fa-star"></i></span>
                                                                    <span class="text-yellow"><i
                                                                            class="fas fa-star-half-alt"></i></span>
                                                                </div>
                                                                <div class="rating-text">
                                                                    <p class="text-light-white fs-12 title">3845 ratings
                                                                    </p>
                                                                </div>  --}}
                                                                @if ($product->commerce->phoneWsp)
                                                                <a href="https://web.whatsapp.com/send?phone=549{{ $product->commerce->phoneWsp }}&text=Hola%2C%20te%20escribo%20por%20tu%20producto%20{{ $product->name }}%20publicado%20en%20guiaceliaca.com.ar%20Link-%3E%20%20https://guiaceliaca.com.ar/{{ $commerce->slug }}"
                                                                    title="Preguntar por el producto" itemprop="url"
                                                                    target="_blank"><img
                                                                        src="{{ asset('styleWeb/assets/icons/whatsapp.png') }}"
                                                                        style="width: 50px"></a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="restaurent-product-caption-box">
                                                            <span
                                                                class="text-light-white">{{ $product->description }}</span>
                                                        </div>
                                                        <div class="restaurent-product-label"> <span
                                                                class="rectangle-tag bg-gradient-yellow text-custom-white">{{ $product->category->name }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="restaurent-product-img">
                                                        @if ($product->photo)
                                                        <img src="{{ asset('users/images/' . $product->commerce->user->id . '/producto/100x100-' . $product->photo) }}"
                                                            class="img-fluid" alt="{{ $product->name }}">
                                                        @else
                                                        <img src="{{ asset('styleWeb/assets/images/img-logo.png') }}"
                                                            class="img-fluid" alt="{{ $product->name }}">
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @empty
                                        <div class="col-lg-12">
                                            <div class="restaurent-product-list">
                                                <ul style="padding: 20px 10px 20px 50px;">
                                                    <div class="featured-restaurant-info">
                                                        <p class="text-dark-white fw-700">El local todavía no agrega
                                                            ningún
                                                            servicio</p>
                                                    </div>
                                                </ul>
                                            </div>
                                        </div>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{--  servicios  --}}
                        <div class="card">
                            <div class="card-header">
                                <div class="section-header-left">
                                    <h3 class="text-light-black header-title">
                                        <a class="card-link text-light-black no-margin collapsed" data-toggle="collapse"
                                            href="#collapseTwo">
                                            Servicios
                                        </a>
                                    </h3>
                                </div>
                            </div>
                            <div id="collapseTwo" class="collapse">
                                <div class="card-body no-padding">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="restaurent-product-list">
                                                <ul style="padding: 20px 10px 20px 50px;">
                                                    @forelse ($characteristics as $characteristic)
                                                    <li style="margin-bottom: 15px;"><img
                                                            src="{{ asset($characteristic->characteristic->photo) }}">
                                                        <span class="text-light-green"
                                                            style="margin-left: 25px;font-size: 15px;">{{ $characteristic->characteristic->name }}</span>
                                                    </li>
                                                    @empty
                                                    <div class="featured-restaurant-info">
                                                        <p class="text-dark-white fw-700">El local todavía no agrega
                                                            ningún
                                                            servicio</p>
                                                    </div>
                                                    @endforelse
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{--  medios de pagos  --}}
                        <div class="card">
                            <div class="card-header">
                                <div class="section-header-left">
                                    <h3 class="text-light-black header-title">
                                        <a class="card-link text-light-black no-margin collapsed" data-toggle="collapse"
                                            href="#collapseThree">
                                            Medios de Pago
                                        </a>
                                    </h3>
                                </div>
                            </div>
                            <div id="collapseThree" class="collapse">
                                <div class="card-body no-padding">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="restaurent-product-list">
                                                <ul style="padding: 20px 10px 20px 50px;">
                                                    @forelse ($payments as $payment)
                                                    <li style="margin-bottom: 15px;"><img
                                                            src="{{ asset($payment->payment->photo) }}">
                                                        <span class="text-light-green"
                                                            style="margin-left: 55px;font-size: 15px;">{{ $payment->payment->name }}</span>
                                                    </li>
                                                    @empty
                                                    <div class="featured-restaurant-info">
                                                        <p class="text-dark-white fw-700">El local todavía no agrega
                                                            ningún medio de pago</p>
                                                    </div>
                                                    @endforelse
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('web.commerce._asideRight')
        </div>
    </div>
</section>
<!-- restaurent meals -->
<!-- restaurent about -->
<section class="section-padding restaurent-about smoothscroll" id="about">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3 class="text-light-black fw-700 title">Sobre {{ $commerce->name }}</h3>
                <p class="text-light-white no-margin">{{ $commerce->about }}</p>
                <ul class="about-restaurent">
                    <li> <i class="fas fa-map-marker-alt"></i>
                        <span>
                            <a href="#" class="text-light-white">
                                {{ $commerce->address }} -
                                @if($commerce->region)
                                {{ $commerce->region->name }} -
                                @endif
                                {{ $commerce->province->name }}
                            </a>
                        </span>
                    </li>
                    <li> <i class="fas fa-phone-alt"></i>
                        <span><a href="tel:" class="text-light-white">{{ $commerce->phone }}</a></span>
                    </li>
                    @if ($commerce->phoneWsp)
                    <li> <i class="fab fa-whatsapp"></i>
                        <span><a class="brd-rd3"
                                href="https://web.whatsapp.com/send?phone=549{{ $commerce->phoneWsp }}&text=Hola%2C%20te%20contacto%20desde%20guiaceliaca.com.ar%20Link-%3E%20%20https://guiaceliaca.com.ar/{{ $commerce->slug }}"
                                target="_blank">{{ $commerce->phoneWsp }}</a></span>
                    </li>
                    @endif
                    @if($commerce->web)
                    <li>
                        <i class="fa fa-link"></i>
                        <span>{{ $commerce->web }}</span>
                    </li>
                    @endif
                </ul>
                <ul class="social-media pt-2">
                    @if($commerce->facebook)
                    <li> <a href="{{ $commerce->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    </li>
                    @endif
                    @if($commerce->instagram)
                    <li> <a href="" {{ $commerce->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a>
                    </li>
                    @endif
                </ul>
            </div>
            <div class="col-md-6">
                <div class="restaurent-schdule">
                    <div class="card">

                        <div class="comment-form">
                            <form method="post" action="{{ route('MessageClientToCommerce', $commerce) }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-light-black fw-600">Nombre</label>
                                            <input type="text" name="name" class="form-control form-control-submit"
                                                placeholder="Nombre" value="{{ old('name') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-light-black fw-600">Email</label>
                                            <input type="email" name="email" class="form-control form-control-submit"
                                                placeholder="Email" value="{{ old('email') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="text-light-black fw-600">Mensaje</label>
                                            <textarea class="form-control form-control-submit" name="messageText"
                                                rows="6" placeholder="Mensaje">{{ old('messageText') }}</textarea>
                                        </div>
                                        {!! htmlFormSnippet() !!}
                                        <button type="submit" class="btn-second btn-submit full-width">Enviar
                                            Mensaje</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        {{--  <div class="card-body">
                            <div class="schedule-box">
                                <div class="day text-light-black">Monday</div>
                                <div class="time text-light-black">Delivery: 7:00am - 10:59pm</div>
                            </div>
                            <div class="collapse" id="schdule">
                                <div class="schedule-box">
                                    <div class="day text-light-black">Tuesday</div>
                                    <div class="time text-light-black">Delivery: 7:00am - 10:00pm</div>
                                </div>
                                <div class="schedule-box">
                                    <div class="day text-light-black">Wednesday</div>
                                    <div class="time text-light-black">Delivery: 7:00am - 10:00pm</div>
                                </div>
                                <div class="schedule-box">
                                    <div class="day text-light-black">Thursday</div>
                                    <div class="time text-light-black">Delivery: 7:00am - 10:00pm</div>
                                </div>
                                <div class="schedule-box">
                                    <div class="day text-light-black">Friday</div>
                                    <div class="time text-light-black">Delivery: 7:00am - 10:00pm</div>
                                </div>
                                <div class="schedule-box">
                                    <div class="day text-light-black">Saturday</div>
                                    <div class="time text-light-black">Delivery: 7:00am - 10:00pm</div>
                                </div>
                                <div class="schedule-box">
                                    <div class="day text-light-black">Sunday</div>
                                    <div class="time text-light-black">Delivery: 7:00am - 10:00pm</div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer"> <a class="fw-500 collapsed" data-toggle="collapse" href="#schdule">See
                                the full schedule</a>
                        </div>  --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- restaurent about -->
<!-- map gallery -->
{{-- <div class="map-gallery-sec section-padding bg-light-theme smoothscroll" id="mapgallery">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="main-box">
                    <div class="row">
                        <div class="col-md-6 map-pr-0">
                            <iframe id="locmap"
                                src="https://www.google.com/maps/embed/v1/place?key=AIzaSyD7eUalpQrZ5TA9BrE5XgsudugZC7TIPYo
                                &q={{ $commerce->address .','. $commerce->location . $commerce->province->name}}">
</iframe>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="col-md-6 map-pl-0">
    <div class="gallery-box padding-10">
        <ul class="gallery-img">
            @forelse($products as $product)
            <li>
                @if ($product->photo)
                <img src="{{ asset('users/images/' . $product->commerce->user->id . '/producto/100x100-' . $product->photo) }}"
                    class="img-fluid full-width" alt="{{ $product->name }}')" />
                @else
                <img src="{{ asset('styleWeb/assets/images/img-logo.png') }}" class="img-fluid"
                    alt="{{ $product->name }}">
                @endif
            </li>
            @empty
            <ul style="padding: 20px 10px 20px 50px;">
                <div class="featured-restaurant-info">
                    <p class="text-dark-white fw-700">El local todavía no agrega
                        ninguna foto</p>
                </div>
            </ul>
            @endforelse
        </ul>
    </div>
</div> --}}
<!-- map gallery -->
<!-- restaurent reviews -->
<section class="section-padding restaurent-review smoothscroll" id="review">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-header-left">
                    <h3 class="text-light-black header-title title">Comentarios de otros usuarios</h3>
                </div>

                <div class="u-line"></div>
            </div>
            <div class="col-md-12">
                @forelse($comments as $comment)
                <div class="review-box">
                    <div class="review-user">
                        <div class="review-user-img">
                            <div class="reviewer-name">
                                <p class="text-light-black fw-600">{{ $comment->name }}</p>
                                <span class="ml-2 text-light-white">{{ $comment->created_at->diffforhumans() }}</span>
                            </div>
                        </div>
                        <div class="review-date"> <span
                                class="text-light-white">{{ $comment->created_at->format('d/m/Y') }}</span>
                        </div>
                    </div>
                    <p class="text-light-black">{{ $comment->message }}</p>
                </div>
                @empty
            </div>
            <div class="col-12">
                <div class="review-img">
                    <img src="{{ asset('styleWeb/assets/images/review-footer.png') }}" class="img-fluid" alt="#">
                    <div class="review-text">
                        <h2 class="text-light-white mb-2 fw-600">Este local todavía no tiene comentarios</h2>
                        <p class="text-light-white">Se el primero en dejar tu comentario para este Comercio.</p>
                    </div>
                </div>
            </div>
            @endforelse
        </div>
    </div>

    @if (!Auth::check())
    <div class="col-md-12">
        <div class="section-2 user-page main-padding">
            <div class="login-sec">
                <div class="login-box">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <p class="text-light-black">Necesitas estas logueado para ingresar un comentarios</p>
                                <div class="form-group">
                                    <label class="text-light-white fs-14">Email</label>
                                    <input id="email" type="email"
                                        class="form-control form-control-submit @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email"
                                        placeholder="Email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="text-light-white fs-14">Password</label>
                                    <input id="password" type="password"
                                        class="form-control form-control-submit @error('password') is-invalid @enderror"
                                        name="password" required autocomplete="current-password"
                                        placeholder="Contraseña">

                                    <div data-name="#password" class="fa fa-fw fa-eye field-icon toggle-password"></div>

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group checkbox-reset">
                                    <label class="custom-checkbox mb-0">
                                        <input type="checkbox" name="#" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}> <span class="checkmark"></span>
                                        Mantenerme logueado</label>
                                    {{-- <a href="{{ url('password/reset') }}">Olvide mi Contraseña</a> --}}
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn-second btn-submit full-width">
                                        Ingresar
                                    </button>
                                </div>
                                <div class="form-group text-center"> <span>¿No tienes cuenta?</span>
                                </div>
                                <div class="form-group text-center mb-0"> <a href="{{ route('register') }}">Crear una
                                        cuenta</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="col-md-12">
        <div class="section-2 main-padding">
            <div class="login-sec">
                <div class="login-box">
                    <form class="review-form" method="post"
                        action="{{ route('add.commentCommerce', $commerce->slug) }}">
                        @csrf
                        <div class="comment-form">
                            <form method="post" action="{{ route('MessageClientToCommerce', $commerce) }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea class="form-control form-control-submit" name="text-message"
                                                rows="6" placeholder="Mensaje">{{ old('messageText') }}</textarea>
                                        </div>
                                        {!! htmlFormSnippet() !!}
                                        <button type="submit" class="btn-second btn-submit full-width">Enviar
                                            Mensaje</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif
</section>
@endsection