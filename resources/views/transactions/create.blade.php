@extends('layouts.app')

@section('content')

{{-- mostrar alertas de validacion --}}

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>

@endif

<div class="container ">
    <form action="{{ route('transactions.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="mb-3 col">
                <label for="data[nombre]" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Jon">
            </div>
            <div class="mb-3 col">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Snow">
            </div>
            <div class="mb-3 col">
                <label for="numeroTarjeta" class="form-label">Numero de tarjeta</label>
                <input type="text" class="form-control" id="numeroTarjeta" name="numeroTarjeta"
                    placeholder="4111111111111111">
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col">
                <label for="cvt" class="form-label">Cvt</label>
                <input type="text" class="form-control" id="cvt" name="cvt" placeholder="123">
            </div>
            <div class="mb-3 col">
                <label for="cp" class="form-label">Cp</label>
                <input type="text" class="form-control" id="cp" name="cp" placeholder="12345">
            </div>
            <div class="mb-3 col">
                <label for="mesExpiracion" class="form-label">Mes de expiracion</label>
                <input type="text" class="form-control" id="mesExpiracion" name="mesExpiracion" placeholder="12">
            </div>
            <div class="mb-3 col">
                <label for="anyoExpiracion" class="form-label">Año de expiracion</label>
                <input type="text" class="form-control" id="anyoExpiracion" name="anyoExpiracion" placeholder="2025">
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col">
                <label for="monto" class="form-label">Monto</label>
                <input type="text" class="form-control" id="monto" name="monto" placeholder="100">
            </div>
            <div class="mb-3 col">
                <label for="idServicio" class="form-label">Id de servicio</label>
                <input type="text" class="form-control" id="idServicio" name="idServicio" placeholder="1">
            </div>
            <div class="mb-3 col">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="prueba@test.com">
            </div>
            <div class="mb-3 col">
                <label for="telefono" class="form-label">Telefono</label>
                <input type="text" class="form-control" id="telefono" name="telefono" placeholder="">
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col">
                <label for="celular" class="form-label">Celular</label>
                <input type="text" class="form-control" id="celular" name="celular" placeholder="">
            </div>
            <div class="mb-3 col">
                <label for="calleyNumero" class="form-label">Calle y numero</label>
                <input type="text" class="form-control" id="calleyNumero" name="calleyNumero" placeholder="">
            </div>
            <div class="mb-3 col">
                <label for="colonia" class="form-label">Colonia</label>
                <input type="text" class="form-control" id="colonia" name="colonia" placeholder="">
            </div>
            <div class="mb-3 col">
                <label for="municipio" class="form-label">Municipio</label>
                <input type="text" class="form-control" id="municipio" name="municipio" placeholder="">
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col">
                <label for="estado" class="form-label">Estado</label>
                <input type="text" class="form-control" id="estado" name="estado" placeholder="">
            </div>
            <div class="mb-3 col">
                <label for="pais" class="form-label">Pais</label>
                <input type="text" class="form-control" id="pais" name="pais" placeholder="">
            </div>
            <div class="mb-3 col">
                <label for="idPedido" class="form-label">Id de pedido</label>
                <input type="text" class="form-control" id="idPedido" name="idPedido" placeholder="">
            </div>
            <div class="mb-3 col">
                <label for="param1" class="form-label">Param1</label>
                <input type="text" class="form-control" id="param1" name="param1" placeholder="">
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col">
                <label for="param2" class="form-label">Param2</label>
                <input type="text" class="form-control" id="param2" name="param2" placeholder="">
            </div>
            <div class="mb-3 col">
                <label for="param3" class="form-label">Param3</label>
                <input type="text" class="form-control" id="param3" name="param3" placeholder="">
            </div>
            <div class="mb-3 col">
                <label for="param4" class="form-label">Param4</label>
                <input type="text" class="form-control" id="param4" name="param4" placeholder="">
            </div>
            <div class="mb-3 col">
                <label for="param5" class="form-label">Param5</label>
                <input type="text" class="form-control" id="param5" name="param5" placeholder="">
            </div>
        </div>

        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </div>
    </form>
    @endsection
