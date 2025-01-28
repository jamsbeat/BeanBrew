<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\Product;

class ManageProducts extends Component
{
    public $products;

    public function mount()
    {
        $this->products = Product::all();
    }

    #[On('refresh-products')]
    public function refreshProducts(){
        $this->products=Product::all();
    }

    public function render()
    {
        return view('admin.manage-products')->layout('layouts.admin');
    }

    public function remove($id)
    {
        Product::find($id)->delete();
        $this->mount();
    }
}
