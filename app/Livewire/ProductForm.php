<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class ProductForm extends Component
{
    public TaskForm  $form;

    public function save()
    {
        $this->validate();
        $this->form->createTask();
        $this->dispatch('e');
    }

    #[On('edit-product')]
    public function editTask($id)
    {
        $product = Product::findOrFail($id);
        $this->form->setProduct($product);
    }

    public function refresh()
    {
        $this->form->reset();
    }

    public function render()
    {
        return view('livewire.product-form');
    }
}
