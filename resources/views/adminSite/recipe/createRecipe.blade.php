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
                                <form method="post" action="{{ route('recipe.addCreate') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <h5 class="text-light-black header-title">Crear Receta</h5>

                                    <div class="card-body no-padding">

                                        <div class="form-group">
                                            <input type="file" class="btn-second btn-submit" name="photo">
                                        </div>

                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label class="text-light-white fw-700">Nombre</label>
                                                    <input type="text" name="name"
                                                        class="form-control form-control-submit"
                                                        value="{{ old('name') }}">

                                                </div>
                                            </div>

                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label class="text-light-black fw-700">Categoría
                                                    </label>
                                                    <select name="category_id"
                                                        class="form-control form-control-submit custom-select-2 full-width">
                                                        <option value="">Seleccione una categoría</option>
                                                        @foreach ($categories as $category)                                                            
                                                        <option value="{{ $category->id }}" data-name="">{{ $category->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <label class="text-light-black fw-700">Ingredientes </label>
                                            <textarea name="ingredients" id="body" rows="4"
                                                cols="4">{{ old('ingredients') }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-light-black fw-700">Pasos </label>
                                            <textarea name="steps" id="steps" rows="4"
                                                cols="4">{{ old('steps') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit"
                                            class="btn-first green-btn text-custom-white full-width fw-500">Agregar Receta</button>
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

@section('script')
<script src="https://cdn.ckeditor.com/4.5.6/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('body', {
            toolbar: [
                {name: 'basicstyles', items: ['Bold', 'Italic']},
                {
                    name: 'paragraph',
                    groups: ['list', 'indent', 'blocks', 'align', 'bidi'],
                    items: ['NumberedList', 'BulletedList']
                },
            ]
        });
        CKEDITOR.replace('steps', {
            toolbar: [
                {name: 'basicstyles', items: ['Bold', 'Italic']},
                {
                    name: 'paragraph',
                    groups: ['list', 'indent', 'blocks', 'align', 'bidi'],
                    items: ['NumberedList', 'BulletedList']
                },
            ]
        });
</script>
@endsection