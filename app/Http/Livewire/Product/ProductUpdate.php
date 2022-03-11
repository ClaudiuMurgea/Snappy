<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;

class ProductUpdate extends Component
{
    public function render()
    {
        return view('livewire.product.product-update')->layout('layouts.app');
    }
}
