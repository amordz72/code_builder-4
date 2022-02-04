<?php

namespace App\Http\Livewire\Code\Project;

use Livewire\Component;

class Edit extends Component
{
    public function render()
    {
        //Edit Render method
        return view('livewire.code.project.edit', ['title' => 'Edit Project'])
        ->extends('layouts.app');

    }
}
