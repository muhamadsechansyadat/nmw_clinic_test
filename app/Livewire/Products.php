<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class Products extends Component
{
    public $products, $name, $price, $stock, $product_id;
    public $updateMode = false;

    public function render()
    {
        $this->products = Product::orderBy('created_at', 'asc')->get();
        return view('livewire.products');
    }

    public function resetInputFields(){
        $this->name = '';
        $this->price = '';
        $this->stock = '';
    }

    public function store(){
        $validated = $this->validate([
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
        ]);

        $data = Product::create($validated);

        session()->flash('success', 'Product created successfully');

        $this->resetInputFields();
    }

    public function edit($id){
        $data = Product::findOrFail($id);
        $this->product_id = $id;
        $this->name = $data->name;
        $this->price = $data->price;
        $this->stock = $data->stock;

        $this->updateMode = true;
    }

    public function cancel(){
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update(){
        $validated = $this->validate([
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
        ]);

        $data = Product::find($this->product_id);
        $data->update([
            'name' => $this->name,
            'price' => $this->price,
            'stock' => $this->stock
        ]);

        $this->updateMode = false;
        session()->flash('success', 'Product updated successfully');
        $this->resetInputFields();
    }

    public function delete($id){
        Product::where('id', $id)->delete();
        session()->flash('success', 'Product deleted successfully');
    }
}
