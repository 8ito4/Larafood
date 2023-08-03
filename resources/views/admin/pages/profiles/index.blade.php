@extends('adminlte::page')

@section('title', 'Perfis')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('profiles.index') }}" class="active"> Perfis</a></li>
    </ol>
    {{-- BOTAO ADICIONAR    --}}
    <h1>Perfis <a href="{{ route('profiles.create') }}" class="btn btn-dark">ADD</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('profiles.search') }}" method="POST" class="form form-inline">
               @csrf
               <input type="text" name="filter" placeholder="Filtro" class="form-control" value="{{ $filters['filter'] ?? '' }}">
               <button type="submit" class="btn btn-dark"> <i class="fas fa-filter"></i> Filtrar </button>                   
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width="250">Acoes</th>
                    </tr>
                </thead>  
                <tbody>
                    @foreach ($profiles as $profile)
                        <tr>
                            <td>
                                {{$profile->name}}
                            </td>
                            <td style="width=10px;"> 
                                {{-- BOTAO VER DETALHES DO profile  --}}
                                {{-- <a href="{{ route('details.profile.index', $profile->url) }}" class="btn btn-primary"><i class="">Detalhes</i></a>     --}}
                                {{-- BOTAO EDITAR    --}}
                                <a href="{{ route('profiles.edit', $profile->id) }}" class="btn btn-dark"><i class="fas fa-edit"></i></a> 
                                {{-- BOTAO VIZUALIZAR    --}}
                                <a href="{{ route('profiles.show', $profile->id) }}" class="btn btn-warning"><i class="fas fa-eye"></i></a> 
                            </td>
                        </tr>                       
                    @endforeach
                </tbody>
            </table>    
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $profiles->appends($filters)->links("pagination::bootstrap-4") !!}                
            @else
                {!! $profiles->links() !!}    
            @endif
            
        </div>
    </div>
@stop
