<div class="modal-footer">
  {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click.prevent="resetUI()">Close</button>
  <button type="button" class="btn btn-primary">Save changes</button> --}}

  <button type="button" class="btn btn-secondary close-btn" wire:click.prevent="resetUI()" data-dismiss="modal">Cerrar</button>

  @if($selected_id < 1)
    <button type="button" class="btn btn-secondary close-modal" wire:click.prevent="Store()">Crear</button>
  @else
    <button type="button" class="btn btn-secondary close-modal" wire:click.prevent="Update()">Actualizar</button>
  @endif
</div>
</div>
</div>
</div>