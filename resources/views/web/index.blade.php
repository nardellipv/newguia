@extends('layouts.main')

@section('content')
@if (Auth::check())
    @include('web.parts._bannerClient')
@else
    @include('web.parts._banner')
@endif
    @include('web.parts._topRating')
    @include('web.parts._banner2')
    @include('web.parts._localCommerces')
    @include('web.parts._lastNews')
    @include('web.parts._products')
@endsection