@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('plans.index') }}" class=""> Planos</a></li>
    </ol>
    {{-- BOTAO ADICIONAR    --}}
    <h1>Planos <a href="{{ route('plans.create') }}" class="btn btn-dark">ADD</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('plans.search') }}" method="POST" class="form form-inline">
               @csrf
               <input type="text" name="filter" placeholder="Nome" class="form-control" value="{{ $filters['filter'] ?? '' }}">
               <button type="submit" class="btn btn-dark"> <i class="fas fa-filter"></i> Filtrar </button>
                    
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Preco</th>
                        <th width="250">Acoes</th>
                    </tr>
                </thead>  
                <tbody>
                    @foreach ($plans as $plan)
                        <tr>
                            <td>
                                {{$plan->name}}
                            </td>
                            <td>
                               R$ {{ number_format($plan->price, 2, ',', '.') }}
                            </td>
                            <td style="width=10px;"> 
                                {{-- BOTAO VER DETALHES DO PLANO  --}}
                                <a href="{{ route('details.plan.index', $plan->url) }}" class="btn btn-primary"><i class="">Detalhes</i></a>    
                                {{-- BOTAO EDITAR    --}}
                                <a href="{{ route('plans.edit', $plan->url) }}" class="btn btn-dark"><i class="fas fa-edit"></i></a> 

                                {{-- BOTAO VIZUALIZAR    --}}
                                <a href="{{ route('plans.show', $plan->url) }}" class="btn btn-warning"><i class="fas fa-eye"></i></a> 
                            </td>
                        </tr>                       
                    @endforeach
                </tbody>
            </table>    
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $plans->appends($filters)->links("pagination::bootstrap-4") !!}                
            @else
                {!! $plans->links() !!}    
            @endif
            
        </div>
    </div>
@stop
