<div class="sidebar">
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
            publicidad google
        </div>
        @endforelse
        <!-- Add Arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</div>