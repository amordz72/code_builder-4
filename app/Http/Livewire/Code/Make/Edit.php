<?php

namespace App\Http\Livewire\Code\Make;

use Livewire\Component;

class Edit extends Component
{
    public function render()
    {
      //Edit Render method
      return view('livewire.code.make.edit', ['title' => 'Edit Make'])
      ->extends('layouts.app');
    }
}
