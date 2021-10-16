@if(!@empty($regionCommerces))
<section class="recent-order section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-header-left">
                    <h3 class="text-light-black header-title title">Comercios cerca tuyo <span class="fs-14"><a
                                href="{{ route('listing.index') }}">Ver todos los comercios</a></span></h3>
                </div>
            </div>
            @foreach($regionCommerces as $regionCommerce)
            <div class="col-lg-3 col-md-6 col-sm-6" style="margin-bottom: 2%;">
                <div class="product-box mb-md-20">
                    <div class="product-img">
                        <a href="">
                            @if (!$regionCommerce->logo)
                            <img alt="{{ $regionCommerce->name }}" class="img-fluid full-width"
                                src="{{asset('styleWeb/assets/images/img-logo-grande.png')}}" style="width: 70%;margin-left: 10%;">
                            @else
                            <img alt="{{ $regionCommerce->name }}" class="img-fluid full-width"
                                src="{{asset('users/images/'.$regionCommerce->user->id.'/comercio/358x250-'.$regionCommerce->logo)}}">
                            @endif
                        </a>
                    </div>
                    <div class="product-caption">
                        <h6 class="product-title"><a href="" class="text-light-black ">
                                {{ $regionCommerce->name }}</a></h6>
                        <p class="text-light-white">
                            @if($regionCommerce->region)
                            {{ $regionCommerce->region->name }} -
                            @endif
                            @if($regionCommerce->province->id == '2')
                            CABA
                            @else
                            {{ $regionCommerce->province->name }}
                            @endif
                        </p>
                        <div class="product-btn">
                            <a href="{{route('name.commerce',$regionCommerce->slug)}}"
                                class="btn-first white-btn full-width text-light-green fw-600">Ir al Comercio</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif