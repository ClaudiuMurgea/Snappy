<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use App\Models\Product;
use App\Models\ProductModifiers;
use App\Models\ProductModifierOptions;
use App\Models\Bitmoji;

class ProductIndex extends Component
{

    public $products;

    public function mount()
    {
        $this->products = Product::all();
    }

    public function render()
    {
        return view('livewire.product.product-index')->layout('layouts.app');
    }
}
