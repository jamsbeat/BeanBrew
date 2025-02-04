<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\WithPagination;
use Livewire\Attributes\Url;
use Livewire\Component;

class StoreFront extends Component
{
    #[Url]
    public $search = '';

    public function getProductsProperty()
    {
        $query = $this->search;
        return Product::query()
            ->where('name', 'like', "%{$query}%")
            ->orWhere('price', 'like', "%{$query}%")
            ->get();
    }

    public function render()
    {
        return view('livewire.store-front', [
            'products' => $this->products,
        ]);
    }
}
