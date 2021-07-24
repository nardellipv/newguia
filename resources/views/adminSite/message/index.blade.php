@extends('layouts.main')

@section('style')
<link href="{{ asset('styleWeb/assets/css/nice-select.css') }}" rel="stylesheet">
@endsection

@section('content')
<section class="register-restaurent-sec section-padding bg-light-theme">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-9">
                @include('alerts.error')
                <div class="main-box padding-20 mb-md-40">
                    <div id="add-restaurent-tab">
                        <div class="row">
                            @include('adminSite.parts._asideMenu')

                            <div class="col-xl-8 col-lg-7">

                                <div id="collapseOne" class="collapse show">
                                    <div class="row">
                                        @foreach($messages as $message)
                                        <div class="col-lg-12">
                                            <form method="post" action="{{ route('respondToClient') }}">
                                                @csrf
                                                <div class="restaurent-product-list">
                                                    <div class="restaurent-product-detail">
                                                        <div class="restaurent-product-left">
                                                            <div class="restaurent-product-title-box">
                                                                <div class="restaurent-product-box">
                                                                    <div class="restaurent-product-title">
                                                                        <h6>{{ $message->name}}</h6>
                                                                    </div>
                                                                    <div class="restaurent-product-label"> <span
                                                                            class="rectangle-tag bg-gradient-red text-custom-white">{{ $message->read == 'YES' ? "Respondido" : "No Respondido"}}</span>
                                                                    </div>
                                                                    <div class="restaurent-product-title">
                                                                        <h6 style="margin-left: 30%;">
                                                                            {{ \Carbon\Carbon::parse($message->created_at)->format('d/m/Y') }}
                                                                        </h6>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="restaurent-product-caption-box"> <span
                                                                    class="text-light-white">{{ $message->messageText }}</span>
                                                            </div>

                                                            <div class="form-group">
                                                                <textarea class="form-control form-control-submit"
                                                                    name="description" rows="2"
                                                                    placeholder="Mensaje"></textarea>
                                                            </div>
                                                            <input name="clientMail" value="{{ $message->email }}"
                                                                hidden readonly>
                                                            <input name="name" value="{{ $message->name }}" hidden
                                                                readonly>
                                                            <input name="id" value="{{ $message->id }}" hidden readonly>

                                                            <div class="form-group">
                                                                <button type="submit"
                                                                    class="btn-first green-btn text-custom-white full-width fw-500">Enviar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">

            </div>
        </div>
    </div>
</section>
@endsection