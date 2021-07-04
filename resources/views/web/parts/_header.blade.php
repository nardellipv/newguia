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
                                <img src="{{ asset('styleWeb/assets/img/user-1.png') }}" class="rounded-circle"
                                    alt="userimg"> <span>Hola, {{ Auth::user()->name }}</span>
                            </a>
                            <div class="user-dropdown">
                                <ul>
                                    <li>
                                        <a href="order-details.html">
                                            <div class="icon"><i class="flaticon-rewind"></i>
                                            </div> <span class="details">Past Orders</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="order-details.html">
                                            <div class="icon"><i class="flaticon-takeaway"></i>
                                            </div> <span class="details">Upcoming Orders</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="icon"><i class="flaticon-breadbox"></i>
                                            </div> <span class="details">Saved</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="icon"><i class="flaticon-gift"></i>
                                            </div> <span class="details">Gift cards</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="icon"><i class="flaticon-refer"></i>
                                            </div> <span class="details">Refer a friend</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="icon"><i class="flaticon-diamond"></i>
                                            </div> <span class="details">Perks</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="icon"><i class="flaticon-user"></i>
                                            </div> <span class="details">Account</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="icon"><i class="flaticon-board-games-with-roles"></i>
                                            </div> <span class="details">Help</span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="user-footer"> <span class="text-light-black">Not Jhon?</span> <a
                                        href="#">Sign Out</a>
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
                    <div class="sorting-addressbox">
                        <a href="{{ route('login') }}"
                            class="add-pro bg-gradient-orange btn-second btn-submit full-width "
                            type="button">Ingresar</a>
                        <a href="{{ route('register') }}"
                            class="add-pro bg-gradient-red btn-second btn-submit full-width "
                            type="button">Registrarse</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
</div>