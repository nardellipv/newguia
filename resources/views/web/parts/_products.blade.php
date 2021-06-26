<section class="browse-cat section-padding">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="section-header-left">
                    <h3 class="text-light-black header-title title">Productos Sin TACC<span class="fs-14"></h3>
                </div>
            </div>
            <div class="col-12">
                <div class="food-near-me swiper-container">
                    <div class="swiper-wrapper">
                        @foreach ($products as $product)                            
                        <div class="swiper-slide">
                            <a href="{{ route('name.commerce', $product->commerce->slug) }}" class="categories">
                                <div class="icon icon2 text-custom-white bg-light-green ">
                                    <img src="{{ asset('users/images/' . $product->commerce->user->id . '/producto/512x512-'. $product->photo) }}" 
                                    class="rounded-circle" alt="categories">
                                </div> <span class="text-light-black cat-name">{{ $product->name }}</span>
                            </a>
                        </div>                        
                        @endforeach
                    </div>
                    <!-- Add Arrows -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </div>
</section>