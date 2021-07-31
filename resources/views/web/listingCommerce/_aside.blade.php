<aside class="col-lg-3 mb-md-40">
    <div class="filter-sidebar mb-5">
        <h4 class="text-light-black fw-600 title-2">Filtro</h4>
        <div class="sidebar-tab">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="restaurents">

                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="delivery-restaurents">
                            <div class="filters">
                                <div class="card">
                                    <div class="card-header"> <a class="card-link text-light-black fw-700 fs-16"
                                            data-toggle="collapse" href="#deliverycollapseOne">
                                            Provincias
                                        </a>
                                    </div>
                                    <div id="deliverycollapseOne" class="collapse show">
                                        <div class="card-body">
                                            @foreach ($listingProvince as $province)
                                            <label class="custom-checkbox">
                                                <a
                                                    href="{{ route('listing.searchProvince', $province->province->slug) }}">
                                                    @if ($province->province->id == 2)
                                                    CABA
                                                    @else
                                                    {{ $province->province->name }}
                                                    @endif
                                                </a>
                                                {{--  <span class="text-light-white">({{ $province->commerce_count }})</span>
                                                --}}
                                            </label>
                                            @endforeach
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="advertisement-slider swiper-container p-relative h-auto mb-md-40">
        @forelse ($sponsors as $sponsor)
        <div class="swiper-wrapper">
            <div class="main-box padding-20">
                <div class="product-box mb-xl-20">
                    <div class="product-img">
                        @if (!$sponsor->logo)
                        <img src="{{ asset('styleWeb/assets/images/img-logo-grande.png') }}" class="img-responsive"
                            alt="{{ $sponsor->name }}">
                        @else
                        <img alt="{{ $sponsor->name }}" class="img-fluid full-width"
                            src="{{ asset('users/images/' . $sponsor->user->id . '/comercio/260x260-' . $sponsor->logo) }}">
                        @endif
                        <div class="overlay">
                            <div class="product-tags padding-10">
                                <div class="custom-tag">
                                    <span class="text-custom-white rectangle-tag bg-gradient-red">Recomendado</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-caption">
                        <div class="title-box">
                            <h6 class="product-title"><a class="text-light-black"
                                    href="{{ route('name.commerce', $sponsor->slug) }}">{{ $sponsor->name }}</a></h6>
                        </div>
                        <p class="text-light-white">{{ $sponsor->province->name }}</p>
                        <div class="product-details">
                            <div class="rating">
                                <span class="text-light-white text-right">
                                    <img alt="tag" src="{{ asset('styleWeb/assets/img/svg/013-heart-1.svg') }}">
                                    {{ $sponsor->votes_positive }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="swiper-wrapper">
            <script async
                src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7543412924958320"
                crossorigin="anonymous"></script>
            <!-- ListCommerce -->
            <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-7543412924958320"
                data-ad-slot="3664575668" data-ad-format="auto" data-full-width-responsive="true"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        </div>
        @endforelse
        <!-- Add Arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</aside>