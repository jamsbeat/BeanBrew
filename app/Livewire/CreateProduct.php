<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\Attributes\On;
use App\Models\Product;
use Money\Money;

class CreateProduct extends Component
{
    public $product;
//    public $formtitle='Create Product';
    public $editform=false;

    public $name;
    public $description;
    public $price;

    protected $rules = [
        'name' => 'required|max:50',
        'description' => 'required|max:255',
        'price' => 'required|numeric|min:100|max:3000',
    ];

    public function render()
    {
        return view('livewire.create-product');
    }

    public function save(){
        $validated=$this->validate();
        Product::create($validated);
        $this->dispatch('refresh-products');
        session()->flash('status','product created');
        $this->dispatch('close-modal');
        $this->reset();
    }

    #[On('edit-mode')]
    public function edit($id){
        //dd($id);
        $this->editform=true;
        $this->product=Product::findOrfail($id);
        $this->name=$this->product->title;
        $this->description=$this->product->description;
        $this->price=$this->product->price;
    }

    public function update(){
        $validated=$this->validate();
        $p=Product::findOrFail($this->product->id);
        $p->update($validated);
        $this->dispatch('refresh-products');
        $this->dispatch('close-modal');
        session()->flash('status','Product updated succesfully');

    }



}
