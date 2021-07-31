<section class="ex-collection section-padding">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="section-header-left">
					<h3 class="text-light-black header-title title">Últimos Comercios Registrados</h3>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="ex-collection-box mb-xl-20">
					@if (!$ratingVote->logo)
					<img alt="{{ $ratingVote->name }}" class="img-fluid full-width"
						src="{{asset('styleWeb/assets/images/img-logo-grande.png')}}">
					@else
					<img alt="{{ $ratingVote->name }}" class="img-fluid full-width"
						src="{{asset('users/images/'.$ratingVote->user->id.'/comercio/358x250-'.$ratingVote->logo)}}">
					@endif
					<div class="category-type overlay padding-15">
						<a class="category-btn" href="{{route('name.commerce',$ratingVote->slug)}}">ir al comercio más
							votado</a>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="ex-collection-box mb-xl-20">
					@if (!$ratingVisit->logo)
					<img alt="{{ $ratingVisit->name }}" class="img-fluid full-width"
						src="{{asset('styleWeb/assets/images/img-logo-grande.png')}}">
					@else
					<img alt="{{ $ratingVisit->name }}" class="img-fluid full-width"
						src="{{asset('users/images/'.$ratingVisit->user->id.'/comercio/358x250-'.$ratingVisit->logo)}}">
					@endif
					<div class="category-type overlay padding-15">
						<a class="category-btn" href="{{route('name.commerce',$ratingVisit->slug)}}">ir al comercio más
							visitado</a>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-3 col-md-4">
				<div class="large-product-box p-relative pb-0">
					<img alt="image" class="img-fluid full-width"
						src="{{ asset('styleWeb/assets/images/publicidad.png') }}">
					<div class="category-type overlay padding-15">
						<a
							class="btn-first white-btn text-light-black fw-600 full-width" href="{{ route('register') }}">Registrate</a>
					</div>
				</div>
			</div>
			<div class="col-lg-9 col-md-8">
				<div class="row">
					@foreach($commercesLastRegister as $lastCommerce)
					<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
						<div class="product-box mb-xl-20">
							<div class="product-img">
								@if (!$lastCommerce->logo)
								<img src="{{ asset('styleWeb/assets/images/img-logo-grande.png') }}"
									class="img-responsive" alt="{{ $lastCommerce->name }}">
								@else
								<img alt="{{ $lastCommerce->name }}" class="img-fluid full-width"
									src="{{ asset('users/images/' . $lastCommerce->user->id . '/comercio/260x260-' . $lastCommerce->logo) }}">
								@endif
							</div>
							<div class="product-caption">
								<div class="title-box">
									<h6 class="product-title"><a class="text-light-black"
											href="{{ route('name.commerce', $lastCommerce->slug) }}">{{ $lastCommerce->name }}</a>
									</h6>
								</div>
								<p class="text-light-white">
									@if($lastCommerce->region)
									{{ $lastCommerce->region->name }} -
									@endif
									@if($lastCommerce->province->id == '2')
									CABA
									@else
									{{ $lastCommerce->province->name }}
									@endif
								</p>
								<div class="product-details">
									<div class="rating">
										<span class="text-light-white text-right">
											<img alt="tag" src="{{ asset('styleWeb/assets/img/svg/013-heart-1.svg') }}">
											{{ $lastCommerce->votes_positive }}</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</section>