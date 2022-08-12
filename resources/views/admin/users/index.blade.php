@extends('admin.layouts.app')
@section('title','Usuários')
@section('content')
<h1 class="w-full text-3xl text-black pb-6">Usuários</h1>

    @foreach ($users as $user )
            {{ dd($user) }}
    @endforeach
@endsection
