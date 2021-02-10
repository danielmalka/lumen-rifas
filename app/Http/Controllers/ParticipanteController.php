<?php

namespace App\Http\Controllers;

use App\Enums\StatusEnum;
use App\Mail\ParticipanteRifa;
use App\Models\Participante;
use App\Models\Rifas;
use App\Models\Valores;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ParticipanteController extends Controller
{
    public function create(int $rifaId, int $valorId)
    {
        $rifa = Rifas::find($rifaId);
        $valor = Valores::where('numero', $valorId)
            ->where('rifa_id', $rifaId)
            ->first();
        return view('participante.edit', [
            'rifa' => $rifa,
            'valor' => $valor
        ]);
    }

    public function insert(Request $request)
    {
        $data = $request->all();
        $rifa = Rifas::find($data['rifa_id']);
        unset($data['rifa_id'], $data['route']);
        $data['status'] = StatusEnum::PENDENTE;
        $participante = Participante::create($data);
        Mail::to($participante->email)
            ->send(new ParticipanteRifa($rifa, $participante));
        return redirect()
            ->route('rifa.index', ['id' => $rifa->id]);
    }

    public function show(int $rifaId)
    {
        $rifa = Rifas::find($rifaId);
        $participantes = Participante::query()
            ->join('rifa_valores', 'rifa_valores.id', 'rifa_participantes.rifa_valores_id')
            ->where('rifa_participantes.status', '<>', StatusEnum::INATIVO)
            ->where('rifa_valores.rifa_id', $rifaId)
            ->orderBy('rifa_valores.numero', 'asc')
            ->select(
                'rifa_participantes.id',
                'rifa_participantes.nome_completo',
                'rifa_participantes.email',
                'rifa_participantes.status',
                'rifa_valores.valor_referente',
                'rifa_valores.numero'
            )
            ->get();
        return view('participante.show', [
            'rifa' => $rifa,
            'participantes' => $participantes
        ]);
    }

    public function status(int $participanteId, bool $estado)
    {
        $participante = Participante::find($participanteId);
        $participante->status = $estado ? StatusEnum::PAGO : StatusEnum::PENDENTE;
        $participante->save();
        $rifaId = $participante->valor->rifa_id;
        return redirect()->route('participante.show', ['rifaId' => $rifaId]);
    }

    public function delete(int $participanteId)
    {
        $participante = Participante::find($participanteId);
        $rifaId = $participante->valor->rifa_id;
        $participante->delete();
        return redirect()->route('participante.show', ['rifaId' => $rifaId]);
    }
}
