@extends('layouts.main')

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
                                <form method="post" action="{{ route('profile.update', $user) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <h5 class="text-light-black header-title">Datos Personales</h5>

                                    <div class="card-body no-padding">
                                        @if (!$user->picture)
                                        <img src="{{ asset('styleWeb/assets/images/img-logo-grande.png') }}"
                                            class="img-fluid " style="width: 40%">
                                        @else
                                        <img src="{{ asset('users/images/' . $user->id . '/perfil/512x512-' . $user->picture) }}"
                                            class="img-fluid " style="width: 40%">
                                        @endif

                                        <div class="form-group">
                                            <input type="file" class="btn-second btn-submit" name="photo">
                                        </div>

                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label class="text-light-white fw-700">Nombre</label>
                                                    <input type="text" name="name"
                                                        class="form-control form-control-submit"
                                                        value="{{ old('name', $user->name) }}">

                                                </div>
                                            </div>

                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label class="text-light-white fw-700">Apellido</label>
                                                    <input type="text" name="lastname"
                                                        class="form-control form-control-submit"
                                                        value="{{ old('lastname', $user->lastname) }}">

                                                </div>
                                            </div>

                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label class="text-light-white fw-700">EMail</label>
                                                    <input type="text" name="email"
                                                        class="form-control form-control-submit"
                                                        value="{{ old('email', $user->email) }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-body no-padding">
                                            <h5 class="text-light-black header-title">Cambio de contraseña</h5>
                                            <div class="row">
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label class="text-light-white fw-700">Nueva
                                                            Contraseña</label>
                                                        <input type="password" name="password"
                                                            class="form-control form-control-submit">

                                                    </div>
                                                </div>

                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label class="text-light-white fw-700">Repetir
                                                            Contraseña</label>
                                                        <input type="password" name="repeat_password"
                                                            class="form-control form-control-submit">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit"
                                            class="btn-first green-btn text-custom-white full-width fw-500">Actualizar
                                            Perfil</button>
                                    </div>
                                </form>
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