@extends('admin.layouts.app')
@section('title', "Editar Modulo do curso {$course->name  }")
@section('content')

<h1 class="w-full text-3xl text-black pb-6">Editar o Módulo <strong> {{ $module->name}}</strong> </h1>

<div class="flex flex-wrap">
    <div class="w-full  my-6 pr-0 lg:pr-2">
        <p class="text-xl pb-6 flex items-center">
            <i class="fas fa-list mr-3"></i> Formulário de Edição Módulo
        </p>
        <div class="leading-loose">
            <form method="post" action="{{ route('modules.update', [ $course->id, $module->id]) }}" class="p-10 bg-white rounded shadow-xl" enctype="multipart/form-data" >
                    @csrf
                    @method('PUT')
                    @include('admin.courses.modules._partials.form')
            </form>
        </div>
    </div>
</div>


@endsection
