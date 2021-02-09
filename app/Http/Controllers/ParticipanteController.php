<?php

namespace App\Http\Controllers;

use App\Enums\StatusEnum;
use App\Models\Participante;
use App\Models\Rifas;
use App\Models\Valores;
use Illuminate\Http\Request;

class ParticipanteController extends Controller
{
    public function create(int $rifaId, int $valorId)
    {
        $rifa = Rifas::find($rifaId);
        $valor = Valores::find($valorId);
        return view('participante.edit', [
            'rifa' => $rifa,
            'valor' => $valor
        ]);
    }

    public function insert(Request $request)
    {
        $data = $request->all();
        $rifaId = $data['rifa_id'];
        unset($data['rifa_id'], $data['route']);
        $data['status'] = StatusEnum::PENDENTE;
        Participante::create($data);
        return redirect()
            ->route('rifa.index', ['id' => $rifaId]);
    }
}
