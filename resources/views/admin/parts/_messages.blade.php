<div class="col-sm-12">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Mensajes a comercios</h3>
        </div>

        <div class="panel-body">
            <div class="pad-btm">
                <button id="demo-foo-collapse" class="btn btn-info">Colapsar todo</button>
                <button id="demo-foo-expand" class="btn btn-warning">Expander Todo</button>
            </div>
            <table id="demo-foo-col-exp" class="table toggle-arrow-small">
                <thead>
                    <tr>
                        <th>Nombre y Apellido</th>
                        <th>Email</th>
                        <th>Mensaje</th>
                        <th data-hide="all">Leído</th>
                        <th data-hide="all">Comercio</th>
                        <th data-hide="all">Fecha</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($messages as $message)
                    <tr>
                        <td>{{ $message->name }}</td>
                        <td>{{ $message->email }}</td>
                        <td>{{ $message->messageText }}</td>
                        <td>{{ $message->read }}</td>
                        <td>{{ $message->commerce->name }}</td>
                        <td>{{ $message->created_at->format('d/m/Y') }}</td>
                        <td>
                            <a href="{{ route('admin.deleteMessage', $message) }}"
                                class="btn btn-danger btn-icon btn-circle icon-lg fa fa-trash"></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>