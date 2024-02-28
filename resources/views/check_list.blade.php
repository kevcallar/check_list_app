@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="mb-4">
                <form method="GET" action="{{ route('checklist.index') }}">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="date">Fecha</label>
                            <input type="date" name="date" id="date" class="form-control" value="{{ request()->input('date', now()->format('Y-m-d')) }}">
                        </div>
                    
                        <div class="col-md-1 pt-4">
                            <button type="submit" class="btn btn-primary">Buscar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @if($listaItems->isEmpty())
                <div class="alert alert-info mb-4" role="alert">
                    No hay elementos en la lista de verificación.
                </div>
            @else
                <div class="mb-4">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($listaItems as $item)
                                <tr>
                                    <td>
                                        <label for="item_{{ $item->id }}" class="@if($item->state == 1) crossed-out @endif">
                                        <span>{{ $item->nombre }}</span>
                                    </label>
                                    </td>
                                    <td>
                                        <label for="item_{{ $item->id }}" class="@if($item->state == 1) crossed-out @endif">
                                            <span>{{ $item->descripcion ?: 'No hay descripción' }}</span>
                                        </label>
                                    </td>
                                
                                    <td>
                                        <input type="checkbox" class="form-check-input" id="item_{{ $item->id }}" data-item-id="{{ $item->id }}" data-item-state="{{ $item->state ? 1 : 0 }}" @if($item->state==1) checked @endif>
                                    </td>
                                    <td>
                                        <form action="{{ route('items.delete', $item->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                        </form>
                                        
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#ModalUpdate{{$item->id}}">Actualizar</button>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            @if(empty(request()->input('date')) || request()->input('date') == now()->format('Y-m-d'))
                <button class="btn btn-primary" data-toggle="modal" data-target="#ModalCreate">Añadir ítem</button>
            @endif
        </div>
    </div>
    @include('components.update_item')
    @include('components.add_item')
</div>

@endsection



