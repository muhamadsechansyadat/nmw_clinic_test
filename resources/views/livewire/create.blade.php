<form>
    <div class="form-group">
        <label for="">Name</label>
        <input type="text" class="form-control" wire:model="name">
        @error('name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Price</label>
        <input type="number" class="form-control" wire:model="price">
        @error('price')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Stock</label>
        <input type="number" class="form-control" wire:model="stock">
        @error('stock')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <button class="btn btn-primary" wire:click.prevent="store()">Save</button>
</form>