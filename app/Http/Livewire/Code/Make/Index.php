<?php

namespace App\Http\Livewire\Code\Make;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        //Index Render method
        return view('livewire.code.make.index', ['title' => 'All Make'])
        ->extends('layouts.app');

    }
}
