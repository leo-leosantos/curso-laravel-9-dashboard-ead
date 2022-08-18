@extends('admin.layouts.app')
@section('title', 'Editar Curso')
@section('content')

    <h1 class="w-full text-3xl text-black pb-6">Editar o Course {{ $course->name }}</h1>
    <div class="flex flex-wrap">
        <div class="w-full  my-6 pr-0 lg:pr-2">
            <p class="text-xl pb-6 flex items-center">
                <i class="fas fa-list mr-3"></i> Formulário de Cadastro
            </p>
            <div class="leading-loose">
                <form action="{{ route('courses.update', $course->id) }}" class="p-10 bg-white rounded shadow-xl" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @include('admin.courses._partials.form')
                </form>
            </div>
        </div>
    </div>
@endsection
