@extends('layouts.admin')

@section('content')
    <section id="page-content">
        <div class="row">
            <div class="col-lg-9 col-lg-offset-2">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Editar comercio</h3>
                    </div>
                    <form method="post" action="{{ route('admin.commerceUpdate', $commerce) }}"
                        class="panel-body form-horizontal" enctype="multipart/form-data">
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
                                <input type="text" id="demo-text-input" class="form-control" placeholder="Teléfono"
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
                                <select class="form-control selectpicker" name="type">
                                    <option value="{{ $commerce->type }}">{{ $commerce->type }}</option>
                                    <option disabled>--------------</option>
                                    <option value="FREE">FREE</option>
                                    <option value="BASIC">BASIC</option>
                                    <option value="PREMIUM">PREMIUM</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <input type="text" id="demo-text-input" class="form-control" placeholder="Votos Positivos"
                                    name="votes_positive" value="{{ $commerce->votes_positive }}">
                            </div>
                            <div class="col-md-4">
                                <input type="text" id="demo-text-input" class="form-control" placeholder="Visitas"
                                    name="visit" value="{{ $commerce->visit }}">
                            </div>
                        </div>
                        <div class="fallback">
                            <input name="photo" type="file" />
                        </div>
                        <button type="submit" class="btn btn-block btn-warning">
                            Modificar Comercio
                        </button>
                    </form>
                    <form method="post" action="{{ route('admin.userUpdate', $commerce->user->id) }}"
                        class="panel-body form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <div class="panel-heading">
                            <h3 class="panel-title">Datos Usuario</h3>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" id="demo-text-input" class="form-control" placeholder="Nombre"
                                    name="name" value="{{ $commerce->user->name }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" id="demo-text-input" class="form-control" placeholder="Apellido"
                                    name="lastname" value="{{ $commerce->user->lastname }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4">
                                <input type="text" id="demo-text-input" class="form-control" placeholder="Email"
                                    name="email" value="{{ $commerce->user->email }}">
                            </div>
                            <div class="col-md-4">
                                <select class="form-control selectpicker" name="type">
                                    <option value="{{ $commerce->user->type }}">{{ $commerce->user->type }}</option>
                                    <option disabled>--------------</option>
                                    <option value="ADMIN">ADMIN</option>
                                    <option value="OWNER">OWNER</option>
                                    <option value="CLIENT">CLIENT</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <input type="text" id="demo-text-input" class="form-control" placeholder="Estado"
                                    name="status" value="{{ $commerce->user->status }}">
                            </div>
                        </div>
                        <div class="fallback">
                            <input name="photo" type="file" />
                        </div>
                        <button type="submit" class="btn btn-block btn-warning">
                            Modificar Usuario
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

