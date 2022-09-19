<?php

namespace Tests\Feature;

use Tests\TestCase;

class TransactionTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @test
     * @return void
     */
    function test_create_transaction()
    {
        $response = $this->post(route('transactions.store'), [
            'nombre' => 'Jon',
            'apellidos' => 'Snow',
            'numeroTarjeta' => '5513 5509 9409 2123',
            'cvt' => '271',
            'cp' => '48219',
            'mesExpiracion' => '08',
            'anyoExpiracion' => '22',
            'monto' => '1599',
            'idSucursal' => '560d73f2a001c6d40dd805ab9ccafdeabf37cec3',
            'idUsuario' => 'a2bce1f48cf7d11fae7d662d8bf7513355adf96f',
            'idServicio' => '3',
            'email' => 'pruebita@test.com',
            'telefono' => '1234567890',
            'celular' => '1234567890',
            'calleyNumero' => 'Calle 123',
            'colonia' => 'Colonia 123',
            'municipio' => 'Municipio 123',
            'estado' => 'Estado',
            'pais' => 'Pais',
            'idPedido' => 'TEST_TX'
        ])->assertStatus(200);

        //imprimir en consol
    }
}
