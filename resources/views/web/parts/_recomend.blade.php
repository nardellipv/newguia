<section class="ex-collection section-padding bg-light-theme">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="ex-collection-box mb-xl-20">
                    @if (!$ratingVote->logo)
                        <img src="{{ asset('styleWeb/assets/images/img-logo-grande.png') }}"
                            class="img-fluid full-width" alt="{{ $ratingVote->name }}">
                    @else
                        <img src="{{ asset('users/images/' . $ratingVote->user->id . '/comercio/358x250-' . $ratingVote->logo) }}"
                            class="img-fluid full-width" alt="{{ $ratingVote->name }}">
                    @endif
                    <div class="category-type overlay padding-15"> <a href="{{ route('name.commerce', $ratingVote->slug) }}" 
                        class="category-btn">ir al comercio más votado</a>
                    </div>                    
                </div>
            </div>
            <div class="col-md-6">
                <div class="ex-collection-box mb-xl-20">
                    @if (!$ratingVisit->logo)
                    <img src="{{ asset('styleWeb/assets/images/img-logo-grande.png') }}"
                        class="img-fluid full-width" alt="{{ $ratingVisit->name }}">
                        @else
                        <img src="{{ asset('users/images/' . $ratingVisit->user->id . '/comercio/358x250-'. $ratingVisit->logo) }}"
                        class="img-fluid full-width" alt="{{ $ratingVisit->name }}">
                        @endif
                    <div class="category-type overlay padding-15"> <a href="{{ route('name.commerce', $ratingVisit->slug) }}" 
                        class="category-btn">ir al comercio más visitado</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>