@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1>Usuarios</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
      <a class="btn btn-sm btn-success float-right" href="#">Agregar nuevo</a>
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
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
  <script src=" {{ asset('js/d-tables.js') }} "></script>
@stop