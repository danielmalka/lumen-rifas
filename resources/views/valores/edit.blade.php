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
                Números: {{ $rifa->numeros }}
            </h1>
        </div>
    </div>
@endsection

@section('content')
    <div class="mt-10 sm:mt-0 sm:mt-0 xl:p-4 lg:p-4 md:p-4 pt-64">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-12">
                <form action="{{ route('valores.insert') }}" method="POST">
                    <input type="hidden" name="rifa_id" value="{{ $rifa->id }}" />
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="grid grid-cols-3 gap-1">
                            @for($i = 1; $i <= $rifa->numeros; $i++)
                            <div class="p-2 bg-white">
                                <label for="valor_referente[{{$i}}]" class="block text-sm font-medium text-gray-700">Valor para este Número #{{ $i }}</label>
                                <input type="text" name="valor_referente[{{$i}}]" id="valor_referente[{{$i}}]" maxlength="255" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="">
                            </div>
                            @endfor
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
