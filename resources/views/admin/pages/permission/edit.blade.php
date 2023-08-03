@extends('adminlte::page')

@section('title', "Edita o perfil {$permission->name}")

@section('content_header')
    <h1>Edita o perissao {{ $permission->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card body">
            <form action="{{route('permissions.update', $permission->id )}}" class="form" method="POST">
                @method('PUT')

                @include('admin.pages.permission._partials.form')
            </form>
        </div>            
    </div>    
@endsection 