@extends('layouts.app')

@section('title', 'Rifa')

@section('nav')
    @include('partials.header')
@endsection

@section('content')
    <div class="bg-gray-50 sm:mt-0 xl:p-4 lg:p-4 md:p-4 pt-20">
        <div class="max-w-full mx-auto lg:flex lg:items-center lg:justify-between">
            <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                <span class="block text-green-800">#{{ $rifa->id }} {{ $rifa->nome }}</span>
            </h2>
        </div>
        <div class="max-w-full mx-auto lg:flex lg:items-center lg:justify-between">
            <p class="md:text-2xl font-extrabold tracking-tight text-gray-900">
                <span class="block text-black">{{ $rifa->descricao }}</span>
            </p>
        </div>
        <div class="grid md:grid-cols-2 sm:grid-cols-1 mx-auto">
            <div class="flex items-center justify-center text-white">
                @if(!empty($rifa->imagem_url))
                    <img src="{{ $rifa->imagem_url }}" width="100%" />
                @endif
                @if(!empty($rifa->video_url))
                {{dd($rifa->video_url)}}
                    <video width="100%" controls>
                        <source src="{{ $rifa->video_url }}" type="video/mp4">
                    </video>
                @endif
            </div>
            <div class="flex items-center justify-center">
                <div class="grid lg:grid-cols-10 md:grid-cols-5 sm:grid-cols-2 mx-auto gap-3 pl-3">
                    @if(!empty($rifa->valores))
                    @foreach($rifa->valores as $valores)
                        @php
                            $state = $valores->participante->count() ? 'gray' : 'green';
                        @endphp
                        <div class="h-12 flex items-center justify-center text-white text-2xl font-extrabold">
                            <a @if($state == 'gray') href="#" @else href="{{ route('participante.create', ['rifaId' => $valores->rifa_id, 'valorId' => $valores->numero]) }}" @endif class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-{{ $state }}-600 hover:bg-{{ $state }}-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-{{ $state }}-500">
                                {{ $valores->numero }}
                            </a>
                        </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
