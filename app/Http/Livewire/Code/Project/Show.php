<?php

namespace App\Http\Livewire\Code\Project;

use Livewire\Component;

class Show extends Component
{
    public function render()
    {
       //Show Render method
       return view('livewire.code.project.show', ['title' => 'Show Project'])
       ->extends('layouts.app');

    }
}
