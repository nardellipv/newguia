@extends('layouts.main')

@section('content')
<section class="our-articles bg-light-theme section-padding pt-0">
    <div class="blog-page-banner"></div>
    <div class="container-fluid">
        <div class="row">
            @include('web.blog._asideLeft')
            <div class="col-lg-6 blog-inner clearfix">
                <div class="main-box padding-20 full-width">
                    <div class="post-wrapper mb-xl-20">
                        <img src="{{ asset('blog/images/787x255-' . $post->photo) }}" class="img-fluid full-width"
                            alt="{{ $post->title }}">
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="blog-meta mb-xl-20">
                                <h2 class="blog-title text-light-black">{{ $post->title }}</h2>
                                <h6 class="text-light-white fs-14"><i class="fa fa-clock-o"></i>
                                    {{ $post->created_at->format('d') }}
                                    {{ $post->created_at->format('M') }}</h6>
                                <h5 class="text-light-white fs-14"><i class="fa fa-eye red-clr"></i> {{ $post->view }}
                                    Vistas | <i class="fa fa-heart-o red-clr"></i> {{ $post->like }} Me Gusta</h5>
                                {{--  <span><i class="fa fa-comment-o red-clr"></i> {{ $countCommentBlog }}
                                Comentarios</span> --}}
                                <p>{!! $post->body !!}</p>
                            </div>

                            <a href="{{ route('postBlog.like', $post) }}" class="btn-second btn-submit">¿Te Gusto la
                                Nota?</a>

                            <ul class="social-media pt-2">
                                <li> <a href="https://facebook.com/sharer/sharer.php?u=https://guiaceliaca.com.ar/blog/{{ $post->slug }}"
                                        target="_blank"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li> <a
                                        href="https://twitter.com/intent/tweet/?text={{ $post->title }}.&amp;url=https://guiaceliaca.com.ar/blog/{{ $post->slug }}" target="_blank"><i
                                            class="fab fa-twitter"></i></a>
                                </li>
                                <li> <a
                                        href="https://web.whatsapp.com/send?text={{ $post->title }} https://guiaceliaca.com.ar/blog/{{ $post->slug }}" target="_blank"><i
                                            class="fab fa-whatsapp"></i></a>
                                </li>
                            </ul>

                            {{--  <div class="comment-box">
                                <div class="section-header-left">
                                    <h3 class="text-light-black header-title">Comments</h3>
                                </div>
                                <div class="review-box">
                                    <div class="review-user">
                                        <div class="review-user-img">
                                            <img src="assets/img/blog-details/40x40/user-1.png" class="rounded-circle"
                                                alt="#">
                                            <div class="reviewer-name">
                                                <p class="text-light-black fw-600">Sarra <small
                                                        class="text-light-white fw-500">New York, (NY)</small>
                                                </p> <i class="fas fa-trophy text-black"></i><span
                                                    class="text-light-black">Top Reviewer</span>
                                            </div>
                                        </div>
                                        <div class="review-date"> <span class="text-light-white">Sep 20, 2019</span>
                                        </div>
                                    </div>
                                    <div class="ratings"> <span class="text-yellow fs-16">
                                            <i class="fas fa-star"></i>
                                        </span>
                                        <span class="text-yellow fs-16">
                                            <i class="fas fa-star"></i>
                                        </span>
                                        <span class="text-yellow fs-16">
                                            <i class="fas fa-star"></i>
                                        </span>
                                        <span class="text-yellow fs-16">
                                            <i class="fas fa-star"></i>
                                        </span>
                                        <span class="text-yellow fs-16">
                                            <i class="fas fa-star"></i>
                                        </span>
                                        <span class="ml-2 text-light-white">2 days ago</span>
                                    </div>
                                    <p class="text-light-black">Delivery was fast and friendly. Food was not great
                                        especially the salad. Will not be ordering from again. Too many options to
                                        settle for this place.</p>
                                </div>
                                <div class="review-box comment-reply">
                                    <div class="review-user">
                                        <div class="review-user-img">
                                            <img src="assets/img/blog-details/40x40/user-2.png" class="rounded-circle"
                                                alt="#">
                                            <div class="reviewer-name">
                                                <p class="text-light-black fw-600">Sarra <small
                                                        class="text-light-white fw-500">New York, (NY)</small>
                                                </p> <i class="fas fa-trophy text-black"></i><span
                                                    class="text-light-black">Top Reviewer</span>
                                            </div>
                                        </div>
                                        <div class="review-date"> <span class="text-light-white">Sep 20, 2019</span>
                                        </div>
                                    </div>
                                    <div class="ratings"> <span class="text-yellow fs-16">
                                            <i class="fas fa-star"></i>
                                        </span>
                                        <span class="text-yellow fs-16">
                                            <i class="fas fa-star"></i>
                                        </span>
                                        <span class="text-yellow fs-16">
                                            <i class="fas fa-star"></i>
                                        </span>
                                        <span class="text-yellow fs-16">
                                            <i class="fas fa-star"></i>
                                        </span>
                                        <span class="text-yellow fs-16">
                                            <i class="fas fa-star"></i>
                                        </span>
                                        <span class="ml-2 text-light-white">2 days ago</span>
                                    </div>
                                    <p class="text-light-black">Delivery was fast and friendly. Food was not great
                                        especially the salad. Will not be ordering from again. Too many options to
                                        settle for this place.</p>
                                </div>
                                <div class="review-box">
                                    <div class="review-user">
                                        <div class="review-user-img">
                                            <img src="assets/img/blog-details/40x40/user-3.png" class="rounded-circle"
                                                alt="#">
                                            <div class="reviewer-name">
                                                <p class="text-light-black fw-600">Sarra <small
                                                        class="text-light-white fw-500">New York, (NY)</small>
                                                </p> <i class="fas fa-trophy text-black"></i><span
                                                    class="text-light-black">Top Reviewer</span>
                                            </div>
                                        </div>
                                        <div class="review-date"> <span class="text-light-white">Sep 20, 2019</span>
                                        </div>
                                    </div>
                                    <div class="ratings"> <span class="text-yellow fs-16">
                                            <i class="fas fa-star"></i>
                                        </span>
                                        <span class="text-yellow fs-16">
                                            <i class="fas fa-star"></i>
                                        </span>
                                        <span class="text-yellow fs-16">
                                            <i class="fas fa-star"></i>
                                        </span>
                                        <span class="text-yellow fs-16">
                                            <i class="fas fa-star"></i>
                                        </span>
                                        <span class="text-yellow fs-16">
                                            <i class="fas fa-star"></i>
                                        </span>
                                        <span class="ml-2 text-light-white">2 days ago</span>
                                    </div>
                                    <p class="text-light-black">Delivery was fast and friendly. Food was not great
                                        especially the salad. Will not be ordering from again. Too many options to
                                        settle for this place.</p>
                                </div>
                                <div class="review-box comment-reply">
                                    <div class="review-user">
                                        <div class="review-user-img">
                                            <img src="assets/img/blog-details/40x40/user-1.png" class="rounded-circle"
                                                alt="#">
                                            <div class="reviewer-name">
                                                <p class="text-light-black fw-600">Sarra <small
                                                        class="text-light-white fw-500">New York, (NY)</small>
                                                </p> <i class="fas fa-trophy text-black"></i><span
                                                    class="text-light-black">Top Reviewer</span>
                                            </div>
                                        </div>
                                        <div class="review-date"> <span class="text-light-white">Sep 20, 2019</span>
                                        </div>
                                    </div>
                                    <div class="ratings"> <span class="text-yellow fs-16">
                                            <i class="fas fa-star"></i>
                                        </span>
                                        <span class="text-yellow fs-16">
                                            <i class="fas fa-star"></i>
                                        </span>
                                        <span class="text-yellow fs-16">
                                            <i class="fas fa-star"></i>
                                        </span>
                                        <span class="text-yellow fs-16">
                                            <i class="fas fa-star"></i>
                                        </span>
                                        <span class="text-yellow fs-16">
                                            <i class="fas fa-star"></i>
                                        </span>
                                        <span class="ml-2 text-light-white">2 days ago <i
                                                class="fas fa-heart"></i></span>
                                    </div>
                                    <p class="text-light-black">Delivery was fast and friendly. Food was not great
                                        especially the salad. Will not be ordering from again. Too many options to
                                        settle for this place.</p>
                                </div>
                            </div>
                            <div class="comment-form">
                                <div class="section-header-left">
                                    <h3 class="text-light-black header-title">Leave a Reply</h3>
                                </div>
                                <form>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-light-black fw-600">Full Name</label>
                                                <input type="text" name="#" class="form-control form-control-submit"
                                                    placeholder="Full Name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-light-black fw-600">Email Address</label>
                                                <input type="email" name="#" class="form-control form-control-submit"
                                                    placeholder="Email Address">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="text-light-black fw-600">Your Comment</label>
                                                <textarea class="form-control form-control-submit" name="#" rows="6"
                                                    placeholder="Your Comment"></textarea>
                                            </div>
                                            <button type="submit" class="btn-second btn-submit full-width">Send</button>
                                        </div>
                                    </div>
                                </form>
                            </div>  --}}
                        </div>
                    </div>
                </div>
            </div>
            @include('web.blog._asideRight')
        </div>
    </div>
</section>
@endsection