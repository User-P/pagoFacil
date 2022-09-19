<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransactionRequest;
use App\Models\Transaction;
use DataTables;
use Illuminate\Support\Facades\Http;

class TransactionController extends Controller
{

    public function index()
    {
        return Datatables::of(Transaction::all())
            ->addColumn('action', function ($transaction) {
                return '<a href="#" class="btn btn-xs btn-primary show" id="' . $transaction->id . '">Mostrar</a>
                        <a href="#" class="btn btn-xs btn-danger delete" id="' . $transaction->id . '">Eliminar</a>';
            })
            ->make(true);
    }

    public function create()
    {
        return view('transactions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTransactionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTransactionRequest $request)
    {

        $response = Http::asForm()->post('https://sandbox.pagofacil.tech/Wsrtransaccion/index/format/json', [
            'method' => 'transaccion',
            'data' => [
                'nombre' => $request->nombre,
                'apellidos' => $request->apellidos,
                'numeroTarjeta' => $request->numeroTarjeta,
                'cvt' => $request->cvt,
                'cp' => $request->cp,
                'mesExpiracion' => $request->mesExpiracion,
                'anyoExpiracion' => $request->anyoExpiracion,
                'monto' => $request->monto,
                'idSucursal' => '560d73f2a001c6d40dd805ab9ccafdeabf37cec3',
                'idUsuario' => 'a2bce1f48cf7d11fae7d662d8bf7513355adf96f',
                'idServicio' => '3',
                'email' => $request->email,
                'telefono' => $request->telefono,
                'celular' => $request->celular,
                'calleyNumero' => $request->calleyNumero,
                'colonia' => $request->colonia,
                'municipio' => $request->municipio,
                'estado' => $request->estado,
                'pais' => $request->pais,
                'idPedido' => $request->idPedido,
                'param1' => '',
                'param2' => '',
                'param3' => '',
                'param4' => '',
                'param5' => '',
                'httpUserAgent' => $request->user_agent,
                'ip' => $request->ip,
            ]
        ]);
        $transaction = new Transaction();
        $transaction->autorizado = $response['WebServices_Transacciones']['transaccion']['autorizado'];
        $transaction->transaccion = $response['WebServices_Transacciones']['transaccion']['transaccion'];
        $transaction->nombre = $response['WebServices_Transacciones']['transaccion']['dataVal']['nombre'];
        $transaction->apellidos = $response['WebServices_Transacciones']['transaccion']['dataVal']['apellidos'];
        $transaction->numeroTarjeta = substr($response['WebServices_Transacciones']['transaccion']['dataVal']['numeroTarjeta'], -4);
        $transaction->TipoTC = $response['WebServices_Transacciones']['transaccion']['TipoTC'];
        $transaction->monto = $response['WebServices_Transacciones']['transaccion']['dataVal']['monto'];
        $transaction->save();
        // return redirect()->route('transactions.index');
    }

    public function show($id)
    {
        $transaction = Transaction::findOrFail($id);
        return $transaction;
    }

    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();
    }
}
