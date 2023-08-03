@extends('adminlte::page')

@section('title', 'permissoes')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('permissions.index') }}" class="active"> permissoes</a></li>
    </ol>
    {{-- BOTAO ADICIONAR    --}}
    <h1>permissoes <a href="{{ route('permissions.create') }}" class="btn btn-dark">ADD</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('permissions.search') }}" method="POST" class="form form-inline">
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
                    @foreach ($permissions as $permission)
                        <tr>
                            <td>
                                {{$permission->name}}
                            </td>
                            <td style="width=10px;"> 
                                {{-- BOTAO VER DETALHES DO permission  --}}
                                {{-- <a href="{{ route('details.permission.index', $permission->url) }}" class="btn btn-primary"><i class="">Detalhes</i></a>     --}}
                                {{-- BOTAO EDITAR    --}}
                                <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-dark"><i class="fas fa-edit"></i></a> 
                                {{-- BOTAO VIZUALIZAR    --}}
                                <a href="{{ route('permissions.show', $permission->id) }}" class="btn btn-warning"><i class="fas fa-eye"></i></a> 
                            </td>
                        </tr>                       
                    @endforeach
                </tbody>
            </table>    
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $permissions->appends($filters)->links("pagination::bootstrap-4") !!}                
            @else
                {!! $permissions->links() !!}    
            @endif
            
        </div>
    </div>
@stop
