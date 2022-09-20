@extends('layouts.app')
@section('head')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('content')

<div class="container">
    <div class="row mt-5 ">
        {{-- mandar boton esquina superior derecha --}}
        <div class="col-12">
            <a href="{{ route('transactions.create') }}" class="btn btn-success float-right">Agregar Transcaccion</a>
        </div>
        <h2>TRANSACCIONES</h2>
        <table class="table transaction">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Autorizado</th>
                    <th>Transaccion</th>
                    <th>Nombre</th>
                    <th>Tipo TC</th>
                    <th>Monto</th>
                    <th></th>

                </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
                {{-- search for --}}
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <input type="text" class="form-control filter-input" placeholder="Tipo" data-column="4" />
                    </td>
                    <td>
                        <input type="text" class="form-control filter-input" placeholder="Monto" data-column="5" />
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>


    <div class="modal fade" id="transactionModal" tabindex="-1" role="dialog" aria-labelledby="transactionModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="transactionModalLabel">Informacion de la transaccion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Id:</strong> <span id="id"></span></p>
                            <p><strong>Autorizado:</strong> <span id="autorizado"></span></p>
                            <p><strong>Transaccion:</strong> <span id="transaccion"></span></p>
                            <p><strong>Nombre:</strong> <span id="nombre"></span></p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Tipo TC:</strong> <span id="tipo"></span></p>
                            <p><strong>Monto:</strong> <span id="monto"></span></p>
                            <p><strong>Fecha creacion:</strong> <span id="fecha"></span></p>
                            <p><strong>Numero:</strong> <span id="numero"></span></p>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    @endsection

    @section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

    <script type="text/javascript">
        $(function () {
        var table = $('.transaction').DataTable({
            processing: true,
            serverSide: true,
            language: {
                "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
            },
            ajax: "{{ route('transactions.index') }}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'autorizado',
                    name: 'autorizado'
                },
                {
                    data: 'transaccion',
                    name: 'transaccion'
                },
                {

                    data: null,
                    render: function (data, type, row) {
                        return data.nombre + ' ' + data.apellidos;
                    }
                },
                {
                    data: 'TipoTC',
                    name: 'TipoTC'
                },
                {
                    data: 'monto',
                    name: 'monto'
                },
                {
                    data: 'action',
                    name: 'delete',
                    orderable: false
                },
            ]
        });

        // Apply the search
        $('.filter-input').on('keyup click', function () {
            table.column($(this).data('column'))
                .search($(this).val())
                .draw();
        });

        // show modal
        $('body').on('click', '.show', function () {

            $.get("{{ route('transactions.index') }}" + '/' + this.id, function (data) {
                $('#transactionModal').modal('show');
                $('#id').text(data.id);
                $('#autorizado').text(data.autorizado);
                $('#transaccion').text(data.transaccion);
                $('#nombre').text(data.nombre + ' ' + data.apellidos);
                $('#tipo').text(data.TipoTC);
                $('#monto').text('$' + data.monto);
                $('#fecha').text( new Date(data.created_at).toLocaleDateString());
                $('#numero').text(data.numeroTarjeta);
            })
        });

        //boton cerrar modal
        $('#transactionModal').on('hidden.bs.modal', function () {
            $(this).find('form')[0].reset();
        });

    });
    </script>
    @endsection
