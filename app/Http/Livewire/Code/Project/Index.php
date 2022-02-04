<?php

namespace App\Http\Livewire\Code\Project;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
       //Index Render method
       return view('livewire.code.project.index', ['title' => 'All Project'])
       ->extends('layouts.app');
    }
}
