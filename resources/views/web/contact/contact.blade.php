@extends('layouts.main')

@section('content')
<section class="aboutus section-padding">
    <div class="container">
        @include('alerts.error')
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="history-title mb-md-40">
                    <h2 class="text-light-black">Nuestra pequeña <span class="text-light-green">Historia</span></h2>
                    <p class="text-light-white">En el 2017 le detectaron celiaquia a mi hija de, en ese momento, 5 años
                        de edad. No teníamos conocimiento sobre esta enfermedad, ni siquiera conocidos para preguntar
                        sobre esto,
                        no sabíamos que hacer.</p>
                    <p class="text-light-white">Como le explicábamos a una nena de 5 años que ya no podía comer nunca
                        mas lo que estaba acostumbrada a comer,
                        cuando iba a un cumpleaños o alguna amiga, teníamos que recorrer supermercados tratando de
                        comprar algo de alimento
                        que a un niño de 5 años le gustara, con el tiempo fue aceptandolo y acostumbrándose.
                    </p>
                    <p class="text-light-white">A raíz de este problema, de no poder encontrar lugares donde vendían
                        comida para celíacos, se nos ocurrió la idea de
                        hacer un sitio web donde los distintos locales y las personas que no tenían un comercio físico,
                        pudieran publicar lo
                        que hacían, por supuesto totalmente gratis. Primero lo hicimos para mi ciudad, pero me di cuenta
                        que no era un problema
                        solo de mi ciudad, sino de todo el país, por esa razón abrimos el sitio para toda la Argentina.
                    </p>
                    <p class="text-light-white">Desde ese momento un gran numero de personas se registraron en el sitio
                        y todavía siguen registrándose nuevas personas
                        con el mismo problema que tuve aquel 2017. Queremos que el sitio sea una gran comunidad para
                        todos los celíacos Argentinos.
                    </p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-sm-6 col-md-6">
                        <div class="histry-img mb-xs-20">
                            <img src="{{ asset('styleWeb/assets/images/img-4.jpg') }}" class="img-fluid full-width"
                                alt="comida sin tacc">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-md-6">
                        <div class="histry-img mb-xl-20">
                            <img src="{{ asset('styleWeb/assets/images/img-5.jpg') }}" class="img-fluid full-width"
                                alt="comida sin tacc">
                        </div>
                        <div class="histry-img">
                            <img src="{{ asset('styleWeb/assets/images/img-6.jpg') }}" class="img-fluid full-width"
                                alt="comida sin tacc">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-padding how-it-works bg-light-theme">
    <div class="container">
        <div class="section-header-style-2">
            <h3 class="text-light-black header-title">Envianos un mensaje</h3>
        </div>
        <div class="contact-info-sec text-center">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-lg-6">
                    <div class="contact-info-box">
                        <i class="fas fa-map-marker fa-2x"></i>
                        <h5 itemprop="headline">Dirección</h5>
                        <p itemprop="description">Las Heras, Mendoza, Argentina</p>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6">
                    <div class="contact-info-box">
                        <i class="fas fa-envelope fa-2x"></i>
                        <h5 itemprop="headline">EMAIL</h5>
                        <p itemprop="description">info@guiaceliaca.com.ar</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="u-line mb-xl-20"></div>
            </div>
        </div>

        <div class="row">
            <div class=" section-header-style-2">
                <div class="general-sec">
                    <form method="post" action="{{ route('MailContactToSite') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-light-black fw-700">Nombre <sup class="fs-16">*</sup>
                                    </label>
                                    <input type="text" name="name" class="form-control form-control-submit"
                                        placeholder="Nombre" value="{{ old('name') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-light-black fw-700">Email</label><sup class="fs-16">*</sup>
                                    <input type="email" name="email" class="form-control form-control-submit"
                                        placeholder="Email" value="{{ old('email') }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="text-light-black fw-700">Mensaje</label><sup class="fs-16">*</sup>
                                    <textarea type="text" name="messageText" class="form-control form-control-submit"
                                    >{{ old('messageText') }} </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            {{--  {!! htmlFormSnippet() !!}  --}}
                            <div class="form-group"></div>
                            <button type="submit" class="btn-second btn-submit btn-block">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection