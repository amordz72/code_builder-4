<?php

namespace App\Http\Livewire\Code\Make;

use Livewire\Component;

class Show extends Component
{
    public function render()
    {
            //Show Render method
            return view('livewire.code.make.show', ['title' => 'Show Make'])
           ->extends('layouts.app');
    }
}
