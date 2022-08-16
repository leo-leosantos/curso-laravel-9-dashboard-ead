@extends('admin.layouts.app')

@section('title', "Detalhes do Usuário {$user->name}")

@section('content')
<h1 class="w-full text-3xl text-black pb-6">
    Detalhes do Usuário {{ $user->name }}

</h1>
<a href="{{ route('users.index') }}">
    <span class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
        <span aria-hidden class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
        <span class="relative">Voltar</span>
    </span>
</a>
<div class="flex flex-wrap">
    <div class="w-full my-6 pr-0 lg:pr-2">
        <div class="leading-loose">
            <form class="p-10 bg-white rounded shadow-xl" action="{{ route('users.destroy', $user->id) }}" method="POST">
                <ul>
                    <li>{{ $user->name }}</li>
                    <li>{{ $user->email }}</li>
                </ul>
                @method('DELETE')
                @csrf
                <div class="mt-6">
                    <button class="px-4 py-1 text-white font-light tracking-wider bg-red-900 rounded" type="submit">
                        Deletar o Usuário {{ $user->name }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
