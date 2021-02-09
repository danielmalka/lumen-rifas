<?php

namespace App\Http\Controllers;

use App\Enums\StatusEnum;
use App\Models\Rifas;
use Illuminate\Http\Request;

class RifaController extends Controller
{
    public function index($id)
    {
        $rifa = Rifas::find($id);
        return view('rifa.index', [
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
        $data = array_map('trim', $data);
        unset($data['route']);
        $rifa = Rifas::create($data);
        return redirect()
            ->route('rifa.index', ['id' => $rifa->id]);
    }

    public function update(Request $request)
    {
        $data = $request->all();
        $data = array_map('trim', $data);
        $id = $data['id'];
        unset($data['route']);
        unset($data['id']);
        $rifa = Rifas::find($id);
        $rifa->update($data);
        return redirect()
            ->route('rifa.index', ['id' => $id]);
    }
}
