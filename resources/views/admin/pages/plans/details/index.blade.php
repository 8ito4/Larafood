@extends('adminlte::page')

@section('title', "Detalhes do plano {$plan->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item "><a href="{{ route('plans.index') }}"> Planos</a></li>
        <li class="breadcrumb-item "><a href="{{ route('plans.show', $plan->url) }}"> {{ $plan->name }}</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('details.plan.index', $plan->url) }}" class="active"> Detalhes</a></li>
    </ol>
    {{-- BOTAO ADICIONAR    --}}
    <h1>Detalhes do plano {{ $plan->name }} <a href="{{ route('details.plan.create', $plan->url) }}" class="btn btn-dark">ADD</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @include('admin.includes.alerts')    

            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width="150">Acoes</th>
                    </tr>
                </thead>  
                <tbody>
                    @foreach ($details as $detail)
                        <tr>
                            <td>
                                {{$detail->name}}
                            </td>
                            <td style="width=10px;">  
                                {{-- BOTAO EDITAR    --}}
                                <a href="{{ route('details.plan.edit', [$plan->url, $detail->id]) }}" class="btn btn-dark"><i class="fas fa-edit"></i></a>   
                                {{-- BOTAO VIZUALIZAR    --}}
                                <a href="{{ route('details.plan.show', [$plan->url, $detail->id]) }}" class="btn btn-warning"><i class="fas fa-eye"></i></a> 
                            </td>
                        </tr>                       
                    @endforeach
                </tbody>
            </table>    
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $details->appends($filters)->links("pagination::bootstrap-4") !!}                
            @else
                {!! $details->links() !!}    
            @endif
            
        </div>
    </div>
@stop
