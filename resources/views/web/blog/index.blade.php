@extends('layouts.main')

@section('content')
<section class="our-articles bg-light-theme section-padding pt-0">
    <div class="blog-page-banner"></div>
    <div class="container-fluid">
        <div class="row">
            @include('web.blog._asideLeft')
            <div class="col-lg-6 blog-inner clearfix">
                <div class="main-box padding-20 full-width">
                    <div class="row">
                        @foreach($posts as $post)
                        <div class="col-xl-6 col-lg-12 col-sm-6">
                            <article class="blog-services-wrapper main-box mb-xl-20">
                                <div class="post-img">
                                    <a href="{{ url('blog', $post->slug) }}">
                                        <img src="{{ asset('blog/images/360x239-' .$post->photo) }}" class="img-fluid full-width"
                                            alt="{{ $post->title }}">
                                    </a>
                                </div>
                                <div class="post-meta">
                                    <div class="author-meta">
                                        <p class="no-margin text-light-white">{{ $post->created_at->format('d') }}
                                            {{ $post->created_at->format('M') }} | {{ $post->like }} Me Gusta</p>
                                    </div>
                                </div>
                                <div class="post-content padding-20">
                                    <h5><a href="{{ url('blog', $post->slug) }}" class="text-light-black">{{ Str::limit($post->title, 75) }}</a></h5>
                                    {{--  <p>{!! Str::limit($post->body,50) !!}</p>  --}}
                                    <div class="blog-link-wrap"> <a href="{{ url('blog', $post->slug) }}"
                                            class="btn-first white-btn">Leer Más</a>
                                    </div>
                                </div>
                            </article>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @include('web.blog._asideRight')
        </div>
    </div>
</section>
@endsection