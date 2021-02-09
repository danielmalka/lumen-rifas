@extends('layouts.app')

@section('title', 'Rifa')

@section('nav')
    @include('partials.header')
@endsection

@section('content')
    <div class="bg-gray-50 sm:mt-0 xl:p-4 lg:p-4 md:p-4 pt-20">
        @if(empty($rifas))
            <h3>Nenhuma rifa ativa no momento</h3>
        @else
            @foreach($rifas as $rifa)
                <div class="max-w-7xl mx-auto py-12 px-4 sm:px-2 lg:py-16 lg:px-8 lg:flex lg:items-center lg:justify-between">
                    <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                        <span class="block text-green-800">#{{ $rifa['id'] }} {{ $rifa['nome'] }}</span>
                    </h2>
                    <div class="mt-8 flex lg:mt-0 lg:flex-shrink-0">
                        <div class="inline-flex rounded-md shadow">
                            <a href="{{ route('rifa.index', ['id' => $rifa['id']]) }}" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-green-600 hover:bg-green-700">
                                Ver Rifa
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection
