@extends('admin.layouts.app')

@section('title', "Detalhes da Aula Curso {$lesson->name}")

@section('content')
<h1 class="w-full text-3xl text-black pb-6">
    Detalhes do Aula {{ $lesson->name }}

</h1>
<a href="{{ route('lessons.index', $module->id) }}">
    <span class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
        <span aria-hidden class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
        <span class="relative">Voltar</span>
    </span>
</a>
<div class="flex flex-wrap">
    <div class="w-full my-6 pr-0 lg:pr-2">
        <div class="leading-loose">
            <form class="p-10 bg-white rounded shadow-xl" action="{{ route('lessons.destroy', [ $module->id, $lesson->id]) }}" method="POST">
                <ul>
                    <li><strong>Nome:</strong> {{ $lesson->name }}</li>
                    <li><strong>URL:</strong> {{ $lesson->url }}</li>
                    <li><strong>Video:</strong> {{ $lesson->video }}</li>
                    <li><strong>Descrição:</strong> {{ $lesson->description }}</li>


                </ul>
                @method('DELETE')
                @csrf
                <div class="mt-6">
                    <button class="px-4 py-1 text-white font-light tracking-wider bg-red-900 rounded" type="submit">
                        Deletar A Aula {{ $lesson->name }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
