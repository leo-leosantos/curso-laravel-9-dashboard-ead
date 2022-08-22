@extends('admin.layouts.app')
@section('title', "Aulas do modulo {$module->name}")

@section('content')
    <h1 class="text-3xl text-black pb-6">
        Aulas do <i> Modulo <strong> {{ $module->name }}</strong> </i>
        <a href="{{ route('lessons.create', $module->id) }}"
            class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
            <i class="fas fa-plus"></i>
        </a>

    </h1>

    <div class="w-full mt-12">
        @include('admin.includes.form-search', [
            'routeName' => 'lessons.index',
            'params' => $module->id,
        ])
        <div class="bg-white overflow-auto">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr>
                        <th
                            class="px-5 py-1 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Nome
                        </th>
                        <th
                            class="px-5 py-1 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Url
                        </th>
                        <th
                            class="px-5 py-1 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Video
                        </th>
                        <th
                            class="px-5 py-1 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Data de Criação
                        </th>
                        <th
                            class="px-5 py-1 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Ações
                        </th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($lessons as $lesson)
                        <tr>
                            <td class="px-5 py-2 border-b border-gray-200 bg-white text-sm">
                                <div class="flex items-center">

                                    <div class="ml-3">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{ $lesson->name }}
                                        </p>
                                    </div>
                                </div>
                            </td>

                            <td class="px-5 py-2 border-b border-gray-200 bg-white text-sm">
                                <div class="flex items-center">

                                    <div class="ml-3">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{ $lesson->url }}
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-2 border-b border-gray-200 bg-white text-sm">
                                <div class="flex items-center">

                                    <div class="ml-3">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{ $lesson->video }}
                                        </p>
                                    </div>
                                </div>
                            </td>

                            <td class="px-5 py-2 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{ $lesson->created_at }}
                                </p>
                            </td>
                            <td class="px-5 py-2 border-b border-gray-200 bg-white text-sm">
                                <a href="{{ route('lessons.show', [$module->id, $lesson->id]) }}">
                                    <span
                                        class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                        <span aria-hidden
                                            class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                        <span class="relative">Detalhes</span>
                                    </span>
                                </a>
                                <a href="{{ route('lessons.edit', [$module->id, $lesson->id]) }}">
                                    <span
                                        class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                        <span aria-hidden
                                            class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
                                        <span class="relative">Editar</span>
                                    </span>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="1000" class="py-3">Nenhum data encontrado.</td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

    </div>

@endsection
