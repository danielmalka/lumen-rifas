@extends('layouts.app')

@section('title', 'Rifa')

@section('nav')
    @include('partials.header')
@endsection

@section('navigation')
    <div class="bg-black shadow sm:shadow-none">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold leading-tight text-green-800">
                Criar Rifa
            </h1>
        </div>
    </div>
@endsection

@section('content')
    <div class="mt-10 sm:mt-0">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-12">
                @isset($rifa)
                    <form action="{{ route('rifa.update') }}" method="POST">
                    <input type="hidden" name="id" value="{{ $rifa->id }}" />
                @else
                    <form action="{{ route('rifa.insert') }}" method="POST">
                @endisset
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="nome" class="block text-sm font-medium text-gray-700">Nome</label>
                                    <input type="text" name="nome" id="nome" maxlength="255" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="@if(!empty($rifa)) {{ $rifa->nome }} @endif">
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="numeros" class="block text-sm font-medium text-gray-700">Quantidade de Números</label>
                                    <input type="number" name="numeros" id="numeros" max="255" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" @if(empty($rifa)) value="10" @else value="{{ $rifa->numeros }}" @endif>
                                </div>

                                <div class="col-span-6 sm:col-span-4">
                                    <label for="descricao" class="block text-sm font-medium text-gray-700">Descrição</label>
                                    <textarea id="descricao" name="descricao" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md">@if(!empty($rifa)) {{ $rifa->descricao }} @endif</textarea>
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                                    <select id="status" name="status" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        @foreach($status as $index => $value)
                                        <option value="{{ $index }}" @if(!empty($rifa) && $rifa->status == $index) selected @endif>{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-span-6">
                                    <label for="imagem_url" class="block text-sm font-medium text-gray-700">Imagem URL</label>
                                    <input type="text" name="imagem_url" id="imagem_url" maxlength="255" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="@if(!empty($rifa)) {{ $rifa->imagem_url }} @endif">
                                </div>

                                <div class="col-span-6">
                                    <label for="video_url" class="block text-sm font-medium text-gray-700">Vídeo URL</label>
                                    <input type="text" name="video_url" id="video_url" maxlength="255" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="@if(!empty($rifa)) {{ $rifa->video_url }} @endif">
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                Salvar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
