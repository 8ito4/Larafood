@extends('adminlte::page')

@section('title', "Detalhes da permissao {$permission->name}")

@section('content_header')
    <h1>Detalhes do perfil <b>{{ $permission->name }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">   
            <ul>
                <li>
                    <strong>Nome:</strong> {{ $permission->name }}
                </li>
                <li>
                    <strong>Descricao:</strong> {{ $permission->description }}
                </li>
            </ul>   
            
            @include('admin.includes.alerts')    
            
            <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger ml-3">Deletar  {{ $permission->name }} <i class="fas fa-trash-alt"></i></button>
            </form>
        </div>
    </div> 
@endsection   
