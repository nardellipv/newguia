<div class="header">
    <header class="full-width">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mainNavCol">
                    <!-- logo -->
                    <div class="logo mainNavCol" style="margin-left: 30px">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('styleWeb/assets/images/logo.png') }}" class="img-fluid"
                                alt="guia celiaca">
                        </a>
                    </div>
                    <!-- logo -->
                    <div class="main-search mainNavCol">
                        {{--  <form class="main-search search-form full-width">
                            <div class="row">
                                <!-- location picker -->
                                <div class="col-lg-6 col-md-5">
                                    <a href="#" class="delivery-add p-relative"> <span class="icon"><i class="fas fa-map-marker-alt"></i></span>
                                        <span class="address">Brooklyn, NY</span>
                                    </a>
                                    <div class="location-picker">
                                        <input type="text" class="form-control" placeholder="Enter a new address">
                                    </div>
                                </div>
                                <!-- location picker -->
                                <!-- search -->
                                <div class="col-lg-6 col-md-7">
                                    <div class="search-box padding-10">
                                        <input type="text" class="form-control" placeholder="Pizza, Burger, Chinese">
                                    </div>
                                </div>
                                <!-- search -->
                            </div>
                        </form>  --}}
                    </div>
                    <div class="right-side fw-700 mainNavCol">
                        <div class="gem-points">
                            <a href="{{ route('listing.index') }}"> <i class="fas fa-shopping-basket"></i>
                                <span>Comercios</span>
                            </a>
                        </div>
                        <div class="gem-points">
                            <a href="{{ route('list.blog') }}"> <i class="fas fa-newspaper"></i>
                                <span>Noticias</span>
                            </a>
                        </div>
                        <div class="gem-points">
                            <a href="{{ route('list.recipes') }}"> <i class="fas fa-hamburger"></i>
                                <span>Recetas</span>
                            </a>
                        </div>
                        <div class="gem-points">
                            <a href="{{ route('contact') }}"> <i class="fas fa-envelope"></i>
                                <span>Contacto</span>
                            </a>
                        </div>

                        <!-- user account -->
                        @if (Auth::check())
                        <div class="user-details p-relative">
                            <a href="#" class="text-light-white fw-500">
                                <img src="{{ asset('styleWeb/assets/images/user.png') }}" class="rounded-circle"
                                    alt="userimg"> 
{{--  
                                    @if (!$user->picture)
                                    <img src="{{ asset('styleWeb/assets/images/img-logo.png') }}" class="rounded-circle"
                                    alt="userimg" style="width: 10%">
                                    @else
                                    <img src="{{ asset('users/images/' . $user->id . '/perfil/512x512-' . $user->picture) }}"
                                        class="rounded-circle" alt="usuario Guia Celiaca" style="width: 5%">
                                    @endif  --}}

                                    <span>Hola, {{ userConnect()->name }}</span>
                            </a>
                            <div class="user-dropdown">
                                <ul>
                                    <li>
                                        <a href="{{ route('profile') }}">
                                            <div class="icon"><i class="fas fa-user"></i>
                                            </div> <span class="details">Información General</span>
                                        </a>
                                    </li>
                                    {{--  @if (userCommerceActive())
                                    <li>
                                        <a href="{{ route('commerce.update', $commerce->slug) }}">
                                            <div class="icon"><i class="fas fa-chart-line"></i>
                                            </div> <span class="details">Perfil Comercial</span>
                                        </a>
                                    </li>                                    
                                    <li>
                                        <a href="#">
                                            <div class="icon"><i class="fas fa-envelope"></i>
                                            </div> <span class="details">Mensajes</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="icon"><i class="fas fa-shopping-cart"></i>
                                            </div> <span class="details">Productos</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="icon"><i class="fas fa-comment"></i>
                                            </div> <span class="details">Comentarios</span>
                                        </a>
                                    </li>
                                    @endif  --}}
                                    <li>
                                        <a href="{{ route('recipe.create') }}">
                                            <div class="icon"><i class="fas fa-hamburger"></i>
                                            </div> <span class="details">Recetas</span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="user-footer"> <span class="text-light-black">No eres
                                        {{ userConnect()->name }}?</span> <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Salir</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                        @else
                        <a href="{{ route('login') }}"
                            class="add-pro bg-gradient-orange btn-second btn-submit full-width cart-btn notification-btn"
                            type="button">Ingresar</a>
                        <a href="{{ route('register') }}"
                            class="add-pro bg-gradient-red btn-second btn-submit full-width cart-btn notification-btn"
                            type="button">Registrarse</a>
                        @endif
                    </div>
                </div>
                <div class="col-sm-12 mobile-search">
                    @if (!Auth::check())
                    <div class="sorting-addressbox">
                        <a href="{{ route('login') }}"
                            class="add-pro bg-gradient-orange btn-second btn-submit full-width "
                            type="button">Ingresar</a>
                        <a href="{{ route('register') }}"
                            class="add-pro bg-gradient-red btn-second btn-submit full-width "
                            type="button">Registrarse</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </header>
</div>