@extends('adminlte::page')

@section('title', "Detalhes do perfil {$profile->name}")

@section('content_header')
    <h1>Detalhes do perfil <b>{{ $profile->name }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">   
            <ul>
                <li>
                    <strong>Nome:</strong> {{ $profile->name }}
                </li>
                <li>
                    <strong>Descricao:</strong> {{ $profile->description }}
                </li>
            </ul>   
            
            @include('admin.includes.alerts')    
            
            <form action="{{ route('profiles.destroy', $profile->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger ml-3">Deletar  {{ $profile->name }} <i class="fas fa-trash-alt"></i></button>
            </form>
        </div>
    </div> 
@endsection   
