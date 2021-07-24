@extends('layouts.admin')

@section('content')
    <section id="page-content">
        <div class="row">
            <div class="col-lg-9 col-lg-offset-2">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Editar comercio</h3>
                    </div>
                    <form method="post" action="{{ route('admin.commerceUpdate', $commerce) }}" class="panel-body form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <div class="panel-heading">
                            <h3 class="panel-title">Datos Comercio</h3>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" id="demo-text-input" class="form-control" placeholder="Nombre"
                                       name="name" value="{{ $commerce->name }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" id="demo-text-input" class="form-control" placeholder="Dirección"
                                       name="address" value="{{ $commerce->address }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                <input type="text" id="demo-text-input" class="form-control" placeholder="Teléfono"
                                       name="phone" value="{{ $commerce->phone }}">
                            </div>
                            <div class="col-md-6">
                                <input type="text" id="demo-text-input" class="form-control" placeholder="Whatsapp"
                                       name="phoneWsp" value="{{ $commerce->phoneWsp }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                    <textarea id="demo-textarea-input" name="about" class="form-control"
                                              placeholder="Sobre Nosotros">{{ $commerce->about }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4">
                                <input type="text" id="demo-text-input" class="form-control" placeholder="Positivos"
                                       name="votes_positive" value="{{ $commerce->votes_positive }}">
                            </div>                            
                            <div class="col-md-4">
                                <input type="text" id="demo-text-input" class="form-control" placeholder="Visitas"
                                       name="visit" value="{{ $commerce->visit }}">
                            </div>
                            <div class="col-md-4">
                                <select name="type">
                                        <option value="{{ $commerce->type }}">{{ $commerce->type }}</option>
                                        <option value="FREE">Free</option>
                                        <option value="BASIC">Basic</option>
                                        <option value="PREMIUM">Premium</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4">
                                <input type="text" id="demo-text-input" class="form-control" placeholder="Web"
                                       name="web" value="{{ $commerce->web }}">
                            </div>                            
                            <div class="col-md-4">
                                <input type="text" id="demo-text-input" class="form-control" placeholder="Facebook"
                                       name="facebook" value="{{ $commerce->facebook }}">
                            </div>
                            <div class="col-md-4">
                                <input type="text" id="demo-text-input" class="form-control" placeholder="Instagram"
                                       name="instagram" value="{{ $commerce->instagram }}">
                            </div>
                        </div>
                       {{-- <div class="form-group">
                            <label class="control-label col-md-4">Relación Usuario </label>
                            <div class="col-md-6">
                                <select name="user_id">
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->id }} -- {{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>--}}
                       {{-- <div class="form-group">
                            <label class="control-label col-md-4">Provincia </label>
                            <div class="col-md-6">
                                <select name="province_id">
                                    @foreach($provinces as $province)
                                        <option value="{{ $province->id }}">{{ $province->id }} -- {{ $province->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>--}}
                        <div class="fallback">
                            <input name="photo" type="file" />
                        </div>
                        <button type="submit" class="btn btn-block btn-warning">
                            Agregar usuario
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection