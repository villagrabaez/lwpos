<div class="card">
    <div class="card-header">
      <button class="btn btn-sm btn-success float-right" data-toggle="modal" data-target="#exampleModalCenter">Agregar nuevo</button>
      <h3 class="card-title">{{ $component_name }} | {{ $page_title }}</h3>
    </div>

    <div>
      <div wire:loading>
        <span class="text-warning">Espere por favor...</span>
      </div>
      <div wire:loading.remove>
    </div>

    <div class="card-body">
      <table id="d-tables" class="table table-striped table-hover table-bordered" style="width: 100%">
        <thead>
          <tr>
            <th style="width:4%;">ID</th>
            <th>Nombre</th>
            <th>Imagen</th>
            <th>Fecha creación</th>
            <th>Fecha modificación</th>
            <th style="width:12%;">Operaciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($categories as $category)
          <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>
              <span>
                <img src="{{ asset('storage/categories/'.$category->image) }}" alt="{{ $category->name }}" width="64px">
              </span>
            </td>
            <td>{{ $category->created_at->diffForHumans() }}</td>
            <td>{{ $category->updated_at->diffForHumans() }}</td>
            <td>
              <a class="btn btn-primary btn-sm" href="javascript:void(0)" wire:click="Edit({{ $category->id }})"><i class="far fa-edit"></i> Editar</a>

              @if( $category->products->count() == 0 )
                <a class="btn btn-danger btn-sm" href="javascript:void(0)" onclick="Confirm({{ $category->id }})"><i class="far fa-trash-alt"></i> Eliminar</a>
              @endif
            </td>
          </tr>
          @endforeach
          <tr>
            <th style="width:4%;">ID</th>
            <th>Nombre</th>
            <th>Imagen</th>
            <th>Fecha creación</th>
            <th>Fecha modificación</th>
            <th style="width:12%;">Operaciones</th>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

@include('livewire.category.form')