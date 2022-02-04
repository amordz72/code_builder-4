<?php

namespace App\Http\Livewire\Code\Bank;

use Livewire\Component;

class Create extends Component
{
    public function render()
    {
            //Create Render method
            return view('livewire.code.bank.create', ['title' => 'Create Bank'])
           ->extends('layouts.app');
    }
}
