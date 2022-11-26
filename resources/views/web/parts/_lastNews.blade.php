<section class="section-padding">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="section-header-left">
                    <h3 class="text-light-black header-title title">Últimas Noticias</h3>
                </div>
            </div>
            <div class="col-12">
                <div class="kosher-delivery-slider swiper-container">
                    <div class="swiper-wrapper">
                        @foreach($lastNews as $lastNew)
                        <div class="swiper-slide">
                            <div class="product-box-3">
                                <div class="product-img">
                                    <a href="{{ route('post.blog', $lastNew->slug) }}">
                                        <img src="{{ asset('blog/images/384x255-' .$lastNew->photo) }}"
                                            class="img-fluid full-width" alt="{{ $lastNew->title }}">
                                    </a>
                                </div>
                                <div class="post-content padding-20">
                                    <h5><a href="{{ route('post.blog', $lastNew->slug) }}"
                                            class="text-light-black">{{ Str::limit($lastNew->title, 35) }}</a></h5>
                                    {{--  <p>{!! Str::limit($lastNew->body, 100) !!}</p>  --}}
                                    <div class="blog-link-wrap"> <a href="{{ route('post.blog', $lastNew->slug) }}"
                                            class="btn-first white-btn">Leer Más</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </div>
</section>