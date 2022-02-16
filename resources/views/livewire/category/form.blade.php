@include('common.modalHead')

<div class="modal-body">
  <div class="form-group">
    <label for="name">Nombre</label>
    <input type="text" wire:model.lazy="name" class="form-control" id="name" placeholder="ej: Curso">

    @error('name')
      <span class="text-danger er">{{ $message }}</span>
    @enderror
  </div>

  <div class="form-group">
    <label for="image">Imagen</label><br>
    <input type="file" wire:model="image" name="image" id="image" accept="image/x-png, image/gif, image/jpeg"><br>
    @error('image')
      <small class="text-danger er">{{ $message }}</small>
    @enderror
  </div>
</div>

@include('common.modalFooter')