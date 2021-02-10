<?php

namespace App\Http\Controllers;

use App\Models\Rifas;
use App\Models\Valores;
use Illuminate\Http\Request;

class ValoresController extends Controller
{
    public function index($rifaId)
    {
        $rifa = Rifas::find($rifaId);
        $valores = $rifa->valores->pluck('valor_referente','numero');
        return view('valores.edit', [
            'rifa' => $rifa,
            'valores' => $valores->toArray()
        ]);
    }

    public function insert(Request $request)
    {
        $data = $request->all();
        unset($data['route']);
        foreach($data['valor_referente'] as $numero => $valor) {
            $novoValor = Valores::updateOrCreate(
                ['rifa_id' =>  $data['rifa_id'], 'numero' => $numero],
                ['valor_referente' => $valor]
            );
        }
        return redirect()
            ->route('rifa.index', ['id' => $data['rifa_id']]);
    }
}
