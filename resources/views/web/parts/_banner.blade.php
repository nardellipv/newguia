<section class="banner-1 banner-2 p-relative ">
    <img src="{{ asset('styleWeb/assets/images/banner-4.jpg') }}" class="img-fluid full-width" alt="Banner">
    <div class="transform-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 align-self-center">
                    <div class="right-side-content">
                        <h1 class="text-custom-white fw-600">Bienvenidos a Guía Celíaca</h1>
                        <h3 class="text-custom-white fw-400">UN PUNTO DE ENCUENTRO PARA CELÍACOS</h3>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="content-wrapper bg-white padding-20">
                        <div class="content-box padding-tb-10 text-center">
                            <h3 class="text-light-black fw-700">Registrate Totalmente GRATIS!</h3>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input class="form-control form-control-submit @error('name') is-invalid @enderror"
                                            name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                            type="text" placeholder="Nombre">
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                         </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control form-control-submit @error('lastname') is-invalid @enderror" type="text"
                                                   name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname"
                                                   autofocus placeholder="Apellido">
                                            @error('lastname')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                         </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control form-control-submit @error('email') is-invalid @enderror" type="text"
                                                   name="email"
                                                   placeholder="Email" value="{{ old('email') }}" required autocomplete="email">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                         </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control form-control-submit @error('password') is-invalid @enderror"
                                                   type="password"
                                                   name="password"
                                                   placeholder="Password" required autocomplete="new-password">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                          </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control form-control-submit" type="password" name="password_confirmation"
                                                   required autocomplete="new-password" placeholder="Repetir password">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn-second btn-submit full-width">Registrarte</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="overlay overlay-bg"></div>
</section>