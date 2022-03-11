<?php

namespace App\Http\Livewire\Bitmoji;

use Livewire\Component;

class BitmojiCreate extends Component
{
    public function render()
    {
        return view('livewire.bitmoji.bitmoji-create')->layout('layouts.app');
    }
}
