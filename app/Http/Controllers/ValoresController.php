<?php

namespace App\Http\Controllers;

use App\Enums\StatusEnum;
use App\Models\Rifas;
use App\Models\Valores;
use Illuminate\Http\Request;

class ValoresController extends Controller
{
    public function index($rifaId)
    {
        $rifa = Rifas::find($rifaId);
        return view('valores.edit', [
            'rifa' => $rifa
        ]);
    }

    public function create()
    {
        $statuses = StatusEnum::getRifaStatus();
        return view('rifa.edit', [
            'status' => $statuses
        ]);
    }

    public function edit($id)
    {
        $rifa = Rifas::find($id);
        $statuses = StatusEnum::getRifaStatus();
        return view('rifa.edit', [
            'rifa' => $rifa,
            'status' => $statuses
        ]);
    }

    public function insert(Request $request)
    {
        $data = $request->all();
        unset($data['route']);
        foreach($data['valor_referente'] as $numero => $valor) {
            $novoValor = new Valores();
            $novoValor->rifa_id = $data['rifa_id'];
            $novoValor->numero = $numero;
            $novoValor->valor_referente = $valor;
            $novoValor->save();
        }
        return redirect()
            ->route('rifa.index', ['id' => $data['rifa_id']]);
    }

    public function update(Request $request)
    {
        $data = $request->all();
        $data = array_map('trim', $data);
        $id = $data['id'];
        unset($data['route'], $data['id']);
        $rifa = Rifas::find($id);
        $rifa->update($data);
        return redirect()
            ->route('rifa.index', ['id' => $id]);
    }
}
