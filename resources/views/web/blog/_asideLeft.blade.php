<aside class="col-lg-3">
    <div class="sidebar2">
        <div class="side-bar section-padding pb-0 mb-md-40">
            <div class="main-box padding-20 side-blog mb-xl-20">
                <h4 class="text-light-black">Notas Populares</h4>
                @foreach($mostRead as $read)
                <article class="side-post pb-xl-20 mb-xl-20 u-line">
                    <div class="thumb-img">
                        <a href="{{ url('blog', $read->slug) }}">
                            <img src="{{ asset('blog/images/301x160-' .$read->photo) }}" alt="{{ $read->title }}">
                        </a>
                    </div>
                    <div class="content-wrap">
                        <div class="entry-meta-content">
                            <h5 class="entry-title">
                                <a href="{{ url('blog', $read->slug) }}" class="text-light-black">{{ $read->title }}</a>
                            </h5>
                            <div class="entry-tye"> <span class="text-light-green fw-600">
                                    {{ $read->created_at->format('d-M-Y') }}</span>
                            </div>
                        </div>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </div>
</aside>