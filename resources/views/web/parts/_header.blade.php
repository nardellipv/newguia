<div class="header">
    <header class="full-width">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mainNavCol">
                    <!-- logo -->
                    <div class="logo mainNavCol" style="margin-left: 30px">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('styleWeb/assets/images/logo.png') }}" class="img-fluid" alt="guia celiaca" >
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

                        {{--  <div class="catring parent-megamenu">
                            <a href="#"> <span>Pages <i class="fas fa-caret-down"></i></span>
                                <i class="fas fa-bars"></i>
                            </a>
                            <div class="megamenu">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-5">
                                                <div class="ex-collection-box h-100">
                                                    <a href="#">
                                                        <img src="{{ asset('styleWeb/assets/img/nav-1.jpg') }}" class="img-fluid full-width h-100" alt="image">
                                                    </a>
                                                    <div class="category-type overlay padding-15"> <a href="restaurant.html" class="category-btn">Top rated</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-8 col-md-7">
                                                <div class="row">
                                                    <div class="col-lg-3 col-sm-6">
                                                        <div class="menu-style">
                                                            <div class="menu-title">
                                                                <h6 class="cat-name"><a href="#" class="text-light-black">Home Pages</a></h6>
                                                            </div>
                                                            <ul>
                                                                <li class="active"><a href="index-2.html" class="text-light-white fw-500">Landing Page</a>
                                                                </li>
                                                                <li><a href="homepage-1.html" class="text-light-white fw-500">Home Page 1</a>
                                                                </li>
                                                                <li><a href="homepage-2.html" class="text-light-white fw-500">Home Page 2</a>
                                                                </li>
                                                                <li><a href="homepage-3.html" class="text-light-white fw-500">Home Page 3</a>
                                                                </li>
                                                                <li><a href="homepage-4.html" class="text-light-white fw-500">Home Page 4</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-sm-6">
                                                        <div class="menu-style">
                                                            <div class="menu-title">
                                                                <h6 class="cat-name"><a href="#" class="text-light-black">Inner Pages</a></h6>
                                                            </div>
                                                            <ul>
                                                                <li><a href="blog.html" class="text-light-white fw-500">Blog Grid View</a>
                                                                </li>
                                                                <li><a href="blog-style-2.html" class="text-light-white fw-500">Blog Grid View 2</a>
                                                                </li>
                                                                <li><a href="blog-details.html" class="text-light-white fw-500">Blog Details</a>
                                                                </li>
                                                                <li><a href="ex-deals.html" class="text-light-white fw-500">Ex Deals</a>
                                                                </li>
                                                                <li><a href="about.html" class="text-light-white fw-500">About Us</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-sm-6">
                                                        <div class="menu-style">
                                                            <div class="menu-title">
                                                                <h6 class="cat-name"><a href="#" class="text-light-black">Related Pages</a></h6>
                                                            </div>
                                                            <ul>
                                                                <li><a href="restaurant.html" class="text-light-white fw-500">Restaurant</a>
                                                                <li><a href="restaurant-style-1.html" class="text-light-white fw-500">Restaurant 1</a>
                                                                </li>
                                                                <li><a href="restaurant-style-2.html" class="text-light-white fw-500">Restaurant 2</a>
                                                                </li>
                                                                <li><a href="add-restaurant.html" class="text-light-white fw-500">Add Restaurant</a>
                                                                </li>
                                                                <li><a href="list-view.html" class="text-light-white fw-500">List View</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-sm-6">
                                                        <div class="menu-style">
                                                            <div class="menu-title">
                                                                <h6 class="cat-name"><a href="#" class="text-light-black">Additional Pages</a></h6>
                                                            </div>
                                                            <ul>
                                                                <li><a href="login.html" class="text-light-white fw-500">Login</a>
                                                                </li>
                                                                <li><a href="register.html" class="text-light-white fw-500">Sign-up</a>
                                                                </li>
                                                                <li><a href="checkout.html" class="text-light-white fw-500">Checkout</a>
                                                                </li>
                                                                <li><a href="order-details.html" class="text-light-white fw-500">Order Details</a>
                                                                </li>
                                                                <li><a href="geo-locator.html" class="text-light-white fw-500">Geo Locator</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>  --}}

                        
                        <!-- user account -->
                        @if (Auth::check())
                            <div class="user-details p-relative">
                                <a href="#" class="text-light-white fw-500">
                                    <img src="{{ asset('styleWeb/assets/img/user-1.png') }}" class="rounded-circle" alt="userimg"> <span>Hi, pablo</span>
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
                                    <div class="user-footer"> <span class="text-light-black">Not Jhon?</span> <a href="#">Sign Out</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                        
                        <a href="#" class="add-pro bg-gradient-orange btn-second btn-submit full-width cart-btn notification-btn" type="button">Ingresar</a>
                        <a href="#" class="add-pro bg-gradient-red btn-second btn-submit full-width cart-btn notification-btn" type="button">Registrarse</a>
                    </div>
                </div>
                <div class="col-sm-12 mobile-search">
                    <div class="sorting-addressbox"> 
                          <a href="#" class="add-pro bg-gradient-orange btn-second btn-submit full-width " type="button">Ingresar</a>
                          <a href="#" class="add-pro bg-gradient-red btn-second btn-submit full-width " type="button">Registrarse</a>
                    </div>  
                </div>
            </div>
        </div>
    </header>
</div>