@extends('layouts.app')

@section('title', 'Rifa')

@section('nav')
    @include('partials.header')
@endsection

@section('navigation')
    <div class="bg-black shadow sm:shadow-none">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold leading-tight text-green-800">
                Participantes | {{ $rifa->nome }}
            </h1>
        </div>
    </div>
@endsection

@section('content')
    <div class="mt-10 sm:mt-0 xl:p-4 lg:p-4 md:p-4 pt-64">
        <div class="flex items-center justify-center">
            <div class="container">
                <table class="rounded-t-lg m-5 w-5/6 mx-auto shadow-lg overflow-hidden border-separate border border-green-800">
                    <thead>
                    <tr class="bg-green-800 text-white">
                        <th class="border border-green-800">Número</th>
                        <th class="border border-green-800">Participante</th>
                        <th class="border border-green-800">Email</th>
                        <th class="border border-green-800">Valor</th>
                        <th class="border border-green-800">Status</th>
                        <th class="border border-green-800">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($participantes as $participante)
                        <tr>
                            <td class="text-center border border-green-800">#{{ $participante->numero }}</td>
                            <td class="text-center border border-green-800">{{ $participante->nome_completo }}</td>
                            <td class="text-center border border-green-800">{{ $participante->email }}</td>
                            <td class="text-center border border-green-800">{{ $participante->valor_referente }}</td>
                            <td class="text-center border border-green-800">{{ ucfirst($participante->status) }}</td>
                            <td class="text-center border border-green-800">
                                @if($participante->status == \App\Enums\StatusEnum::PENDENTE)
                                    <a href="{{ route('participante.status', ['participanteId' => $participante->id, 'estado' => 1]) }}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                        Pago
                                    </a>
                                @else
                                    <a href="{{ route('participante.status', ['participanteId' => $participante->id, 'estado' => 0]) }}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                                        Pendente
                                    </a>
                                @endif
                                <a href="{{ route('participante.delete', ['participanteId' => $participante->id]) }}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                    Deletar
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
