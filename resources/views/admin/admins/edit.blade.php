@extends('admin.layouts.app')
@section('title', 'Editar  Usuário Administrador')
@section('content')

<h1 class="w-full text-3xl text-black pb-6">Editar o Usuário Administrador {{ $admin->name }}</h1>

<div class="flex flex-wrap">
    <div class="w-full  my-6 pr-0 lg:pr-2">
        <p class="text-xl pb-6 flex items-center">
            <i class="fas fa-list mr-3"></i> Formulário de Cadastro
        </p>
        <div class="leading-loose">
            <form action="{{ route('admins.update', $admin->id) }}" class="p-10 bg-white rounded shadow-xl" method="POST">
                    @method('PUT')
                    @include('admin.admins._partials.form')
            </form>
        </div>
    </div>
</div>


@endsection
