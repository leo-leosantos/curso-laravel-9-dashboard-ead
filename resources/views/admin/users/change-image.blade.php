@extends('admin.layouts.app')
@section('title', 'Editar Foto Usuário')
@section('content')

    <h1 class="w-full text-3xl text-black pb-6">Alerar foto do Usuário {{ $user->name }}</h1>

    <div class="flex flex-wrap">
        <div class="w-full  my-6 pr-0 lg:pr-2">
            <p class="text-xl pb-6 flex items-center">
                <i class="fas fa-list mr-3"></i> Formulário de Imagem
            </p>
            <div class="leading-loose">
                <form action="{{ route('users.update.image', $user->id) }}" class="p-10 bg-white rounded shadow-xl" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    @include('admin.includes.alerts')

                    <div class="">
                        <label class="block text-sm text-gray-600" for="image">Foto Perfil</label>
                        <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="file" name="image" type="file">
                    </div>
                    <div class="mt-6">
                        <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded"
                            type="submit">Atualizar foto</button>
                    </div>

                </form>
            </div>
        </div>
    </div>


@endsection
