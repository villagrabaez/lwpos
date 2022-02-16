@extends('adminlte::page')

@section('title', 'Categorías')

@section('content_header')
    <h1>Categorías</h1>
@stop

@section('content')
  {{--  --}}
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
  <script src=" {{ asset('js/d-tables.js') }} "></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function(){
      window.livewire.on('show-modal', msg => {
        $('#exampleModalCenter').modal('show')
      });

      window.livewire.on('category-added', msg => {
        $('#exampleModalCenter').modal('hide')
      });

      window.livewire.on('category-updated', msg => {
        $('#exampleModalCenter').modal('hide')
      });

      window.livewire.on('category-deleted', msg => {
        $('#exampleModalCenter').modal('hide')
      });
    });

    function Confirm(id) {
      Swal.fire({
        title: 'Confirmar',
        text: 'Esta seguro de eliminar este registro?',
        confirmButtonText: 'Eliminar',
        showCancelButton: true,
      }).then(function(result) {
        if(result.value) {
          window.livewire.emit('deleteRow', id)
          Swal.close()
        }
      })
    }
  </script>
@stop