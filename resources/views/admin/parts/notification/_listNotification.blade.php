@extends('layouts.admin')

@section('style')
    <link href="{{ asset('styleAdmin/plugins/datatables/media/css/dataTables.bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('styleAdmin/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css') }}"
        rel="stylesheet">
@endsection

@section('content')
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Usuarios Registrados</h3>
        </div>
        <div class="panel-body">
            <table id="demo-dt-basic" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Notificación</th>
                        <th>Creado</th>
                        <th>Grupo</th>
                        <th>Estado</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($notifications as $notification)
                        <tr>
                            <td>{{ $notification->notification }}</td>
                            <td>{{ \Carbon\Carbon::parse($notification->created_at)->format('d/m/Y') }}</td>
                            <td>{{ $notification->show }}</td>
                            <td>{{ $notification->status }}</td>
                            <td>
                                @if ($notification->status == 'INACTIVE')
                                    <a href="{{ route('admin.notificationOn', $notification) }}"
                                        class="btn btn-primary btn-icon btn-circle icon-lg fa fa-bell"></a>
                                @else
                                    <a href="{{ route('admin.notificationOff', $notification) }}"
                                        class="btn btn-warning btn-icon btn-circle icon-lg fa fa-bell-slash"></a>
                                @endif
                                <a href="{{ route('admin.notificationDelete', $notification) }}"
                                    class="btn btn-warning btn-icon btn-circle icon-lg fa fa-trash"></a>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <form method="post" action="{{ route('admin.notificationCreate') }}" class="panel-body form-horizontal">
        @csrf
        <div class="panel panel-dark">
            <div class="panel-heading">
                <h3 class="panel-title">Crear Notificación</h3>
            </div>
            <div class="panel-body">
                <textarea id="demo-textarea-input" name="notification" rows="9" class="form-control"
                    placeholder="Notificación.."></textarea>
            </div>
                <select name="show">
                    <option value="ALL">ALL</option>
                    <option value="OWNER">OWNER</option>
                    <option value="CLIENT">CLIENT</option>
                </select>
        </div>
        <button class="btn btn-block btn-primary">
            Crear Notificación
        </button>
    </form>
@endsection

@section('script')
    <script src="{{ asset('styleAdmin/plugins/datatables/media/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('styleAdmin/plugins/datatables/media/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('styleAdmin/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js') }}">
    </script>
    <script src="{{ asset('styleAdmin/js/demo/tables-datatables.js') }}"></script>
@endsection
