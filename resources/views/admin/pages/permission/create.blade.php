@extends('adminlte::page')

@section('title', 'Cadastrar Novo Perfil')

@section('content_header')
    <h1>Cadastrar nova permissao</h1>
@stop

@section('content')
    <div class="card">
        <div class="card body">
            <form action="{{ route('permissions.store') }}" class="form" method="POST">
                @include('admin.pages.permission._partials.form')
            </form>
        </div>            
    </div>    
@endsection
