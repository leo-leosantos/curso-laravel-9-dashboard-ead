@extends('admin.layouts.app')
@section('title', "Cadastrar nova Aula  para o Módulo {$module->name  }")
@section('content')

<h1 class="w-full text-3xl text-black pb-6">Adicionar nova Aula para o  Módulo <strong>{{ $module->name }}</strong></h1>

<div class="flex flex-wrap">
    <div class="w-full  my-6 pr-0 lg:pr-2">
        <p class="text-xl pb-6 flex items-center">
            <i class="fas fa-list mr-3"></i> Formulário de Cadastro Aula
        </p>
        <div class="leading-loose">
            <form method="post" action="{{ route('lessons.store', $module->id) }}" class="p-10 bg-white rounded shadow-xl" enctype="multipart/form-data" >
                    @csrf
                    @include('admin.courses.modules.lessons._partials.form')
            </form>
        </div>
    </div>
</div>


@endsection
