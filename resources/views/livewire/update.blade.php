<form>
    <input type="hidden" name="" wire:model="product_id">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" wire:model="name">
        @error('name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" class="form-control" id="price" wire:model="price">
        @error('price')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="stock">Stock</label>
        <input type="number" class="form-control" id="stock" wire:model="stock">
        @error('stock')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <button class="btn btn-primary" wire:click.prevent="update()">Update</button>
    <button class="btn btn-danger" wire:click.prevent="cancel()">Cancel</button>
</form>