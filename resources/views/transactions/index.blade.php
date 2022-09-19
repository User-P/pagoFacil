@extends('layouts.app')
@section('head')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <h2>TRANSACCIONES</h2>
    <table class="table transsaction">
        <thead>
            <tr>
                <th>Id</th>
                <th>Autorizado</th>
                <th>Transaccion</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        </tbody>
        <tfoot>
            {{-- search for --}}
            <tr>
                <td>

                </td>
                <td>
                    <input type="text" class="form-control filter-input" placeholder="Autorizado" data-column="1" />
                </td>
                <td>
                    <input type="text" class="form-control filter-input" placeholder="Transaccion" data-column="2" />
                </td>
            </tr>
        </tfoot>
    </table>
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
        var table = $('.transsaction').DataTable({
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
                    data: 'nombre',
                    name: 'nombre'
                },
                {
                    data: 'apellidos',
                    name: 'apellidos'
                },
                {
                    data: 'action',
                    name: 'delete',
                    orderable: false,
                    searchable: false
                },
            ]
        });

        // Apply the search
        $('.filter-input').on('keyup click', function () {
            table.column($(this).data('column'))
                .search($(this).val())
                .draw();
        });


    });
</script>
@endsection
