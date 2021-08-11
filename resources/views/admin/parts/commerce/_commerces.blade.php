@extends('layouts.admin')

@section('style')
    <link href="{{ asset('styleAdmin/plugins/datatables/media/css/dataTables.bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('styleAdmin/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css') }}"
          rel="stylesheet">
@endsection

@section('content')

<div class="row">
    <div class="col-sm-6">

        <!--Registered User-->
        <div class="panel media pad-all">
            <div class="media-left">
                <span class="icon-wrap icon-wrap-sm icon-circle bg-success">
                <i class="fa fa-check fa-2x"></i>
                </span>
            </div>
            <div class="media-body">
                <p class="text-2x mar-no text-thin"><span>Más Visitados</span></p>
                <p class="text-muted mar-no">cantidad de visitas: <b>{{ $visit->visit }}</b></p>
                <p class="text-muted mar-no">comercio: <b>{{ $visit->name }}</b></p>
            </div>
        </div>

    </div>
    <div class="col-sm-6">

        <!--New Order-->
        <div class="panel media pad-all">
            <div class="media-left">
                <span class="icon-wrap icon-wrap-sm icon-circle bg-info">
                <i class="fa fa-thumbs-up fa-2x"></i>
                </span>
            </div>

            <div class="media-body">
                <p class="text-2x mar-no text-thin"><span>Más Likes</span></p>
                <p class="text-muted mar-no">cantidad de likes: <b>{{ $likes->votes_positive }}</b></p>
                <p class="text-muted mar-no">comercio: <b>{{ $likes->name }}</b></p>
            </div>
        </div>

    </div>    

</div>

<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Comercios Registrados</h3>
    </div>
    <div class="panel-body">
        <table id="demo-dt-basic" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Nombre y Apellido</th>
                <th>Email</th>
                <th class="min-tablet">Teléfono</th>
                <th class="min-tablet">Votos</th>
                <th class="min-tablet">Visitas</th>
                <th class="min-tablet">Tipo</th>
                <th>Acción</th>
            </tr>
            </thead>
            <tbody>
            @foreach($commerces as $commerce)
                <tr>
                    <td>{{ $commerce->name }}</td>
                    <td>{{ $commerce->user->name }} {{ $commerce->user->lastname }}</td>
                    <td>{{ $commerce->user->email }}</td>
                    <td>{{ $commerce->phone }}</td>
                    <td>{{ $commerce->votes_positive }}</td>
                    <td>{{ $commerce->visit }}</td>
                    <td>{{ $commerce->type }}</td>
                    <td>
                         <a href="{{ route('admin.commerceEdit', $commerce) }}" class="btn btn-default btn-icon btn-circle icon-lg fa fa-edit"></a>                         
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('script')
    <script async src="{{ asset('styleAdmin/plugins/datatables/media/js/jquery.dataTables.js') }}"></script>
    <script async src="{{ asset('styleAdmin/plugins/datatables/media/js/dataTables.bootstrap.js') }}"></script>
    <script async src="{{ asset('styleAdmin/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js') }}"></script>
    <script async src="{{ asset('styleAdmin/js/demo/tables-datatables.js') }}"></script>
@endsection