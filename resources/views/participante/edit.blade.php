@extends('layouts.app')

@section('title', 'Rifa')

@section('nav')
    @include('partials.header')
@endsection

@section('navigation')
    <div class="bg-black shadow sm:shadow-none">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold leading-tight text-green-800">
                Rifa: {{ $rifa->nome }} <br />
                Número #{{ $valor->numero }} <br />
                Valor da Rifa: {{ $valor->valor_referente }}
            </h1>
        </div>
    </div>
@endsection

@section('content')
    <div class="mt-10 sm:mt-0 xl:p-4 lg:p-4 md:p-4 pt-64">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-12">
                <form action="{{ route('participante.insert') }}" method="POST">
                    <input type="hidden" name="rifa_id" value="{{ $rifa->id }}" />
                    <input type="hidden" name="rifa_valores_id" value="{{ $valor->numero }}" />
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="nome_completo" class="block text-sm font-medium text-gray-700">Nome Completo</label>
                                    <input type="text" name="nome_completo" id="nome_completo" maxlength="255" autocomplete="full-name" class="mt-1 focus:ring-green-500 focus:border-green-500 bg-gray-300 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="">
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                    <input type="email" name="email" id="email" maxlength="255" autocomplete="email" class="mt-1 focus:ring-green-500 focus:border-green-500 bg-gray-300 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="">
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
