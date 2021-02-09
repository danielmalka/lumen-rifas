<?php

namespace App\Http\Controllers;

use App\Enums\StatusEnum;
use App\Models\Rifas;

class WebController extends Controller
{
    public function index()
    {
        $rifasAtivas = Rifas::where('status', StatusEnum::ATIVO)->get();
        return view('index', [
            'rifas' => $rifasAtivas->toArray()
        ]);
    }

    public function create()
    {
        return view('rifa.create');
    }
}
