<div class="col-xl-3 col-lg-3">
    <div class="advertisement-slider swiper-container h-auto mb-xl-20 mb-md-40">
        <div class="swiper-wrapper">
            @foreach ($lastNews as $lastNew)
            <div class="swiper-slide">
                <div class="testimonial-wrapper">
                    <div class="testimonial-box">
                        <div class="testimonial-img p-relative">
                            <a href="{{ route('post.blog', $lastNew->slug) }}">
                                <img src="{{ asset('blog/images/384x255-' .$lastNew->photo) }}"
                                    class="img-fluid full-width" alt="{{ $lastNew->title }}">
                            </a>
                        </div>
                        <div class="testimonial-caption padding-15">
                            <h5 class="fw-600"><a href="restaurant.html" class="text-light-black">{{ Str::limit($lastNew->title, 35) }}</a></h5>
                            <p class="text-light-black">{!! Str::limit($lastNew->body, 100) !!}</p>
                            <a href="{{ route('post.blog', $lastNew->slug) }}" class="btn-second btn-submit">Leer Nota Completa</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- Add Arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</div>