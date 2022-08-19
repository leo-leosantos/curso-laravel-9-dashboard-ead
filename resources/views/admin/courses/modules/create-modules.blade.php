@extends('admin.layouts.app')
@section('title', "Cadastrar novo Modulo para o curso {$course->name  }")
@section('content')

<h1 class="w-full text-3xl text-black pb-6">Adicionar novo Módulo</h1>

<div class="flex flex-wrap">
    <div class="w-full  my-6 pr-0 lg:pr-2">
        <p class="text-xl pb-6 flex items-center">
            <i class="fas fa-list mr-3"></i> Formulário de Cadastro Módulo
        </p>
        <div class="leading-loose">
            <form method="post" action="{{ route('modules.store', $course->id) }}" class="p-10 bg-white rounded shadow-xl" enctype="multipart/form-data" >
                    @csrf
                    @include('admin.courses.modules._partials.form')
            </form>
        </div>
    </div>
</div>


@endsection
