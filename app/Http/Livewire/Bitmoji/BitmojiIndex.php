<?php

namespace App\Http\Livewire\Bitmoji;

use Livewire\Component;

class BitmojiIndex extends Component
{
    public function render()
    {
        return view('livewire.bitmoji.bitmoji-index')->layout('layouts.app');
    }
}
