@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1>Usuarios</h1>
@stop

@section('content')
<div class="card">
  <div class="card-header">
    <button class="btn btn-sm btn-success float-right" data-toggle="modal" data-target="#exampleModalCenter">Agregar nuevo</button>
    <h3 class="card-title">Listado de usuarios</h3>
  </div>
  <div class="card-body">
    <table id="d-tables" class="table table-striped table-hover table-bordered" style="width: 100%">
      <thead>
        <tr>
          <th style="width:4%;">ID</th>
          <th>Nombre</th>
          <th>Descripción</th>
          <th>Fecha creación</th>
          <th>Fecha modificación</th>
          <th style="width:12%;">Operaciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
        <tr>
          <td>{{ $user->id }}</td>
          <td>{{ $user->name }}</td>
          <td>{{ $user->description }}</td>
          <td>{{ $user->created_at->diffForHumans() }}</td>
          <td>{{ $user->updated_at->diffForHumans() }}</td>
          <td>
            <a class="btn btn-primary btn-sm" href="{{ route('usuarios.edit', $user) }}"><i class="far fa-edit"></i> Editar</a>

            <form class="confirmDelete" action="{{ route('usuarios.destroy', $user) }}" method="POST" style="display:inline-block;">
              @csrf
              @method('delete')
              <button type="submit" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i> Eliminar</button>
            </form>
          </td>
        </tr>
        @endforeach
        <tr>
          <th style="width:4%;">ID</th>
          <th>Nombre</th>
          <th>Descripción</th>
          <th>Fecha creación</th>
          <th>Fecha modificación</th>
          <th style="width:12%;">Operaciones</th>
        </tr>
      </tbody>
    </table>
  </div>
</div>

<!-- Modal -->
<div wire:ignore.self class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
          {{-- <b> {{ $componentName }} </b> | {{ $selected_id > 0 ? 'EDITAR' : 'CREAR' }} --}}
        </h5>
        <h6 class="text-center text-warning" wire:loading>
          Por favor espere.
        </h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click.prevent="resetUI()">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>

        {{-- <button type="button" class="btn btn-secondary close-btn" wire:click.prevent="resetUI()" data-dismiss="modal">Cerrar</button>

        @if($selected_id < 1)
          <button type="button" class="btn btn-secondary close-modal" wire:click.prevent="Store()">Crear</button>
        @else
        <button type="button" class="btn btn-secondary close-modal" wire:click.prevent="Update()">Actualizar</button>
        @endif --}}
      </div>
    </div>
  </div>
</div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
  <script src=" {{ asset('js/d-tables.js') }} "></script>
@stop