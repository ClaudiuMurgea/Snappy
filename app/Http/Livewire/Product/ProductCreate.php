<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;

class ProductCreate extends Component
{
    public function render()
    {
        return view('livewire.product.product-create')->layout('layouts.app');
    }
}
