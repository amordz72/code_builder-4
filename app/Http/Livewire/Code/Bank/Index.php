<?php

namespace App\Http\Livewire\Code\Bank;

use App\Models\Bank;
use App\Models\Lang;
use Livewire\Component;

class Index extends Component
{
    public $is_new = true;
    public $is_new_lang = false;
    public $hidden_id = 0;
    public $all_banks = array();
    public $langs = array();
    public $title = '';
    public $body = '';
    public $notes = '';
    public $lang_id = 0;
    public $name_lang = '';
    protected $rules = [

        'title' => 'required|min:2|unique:banks,title',
        'body' => 'required|min:2',
        'lang_id' => 'required|numeric|gt:0',

    ];
    protected $listeners = ['launchHqModal', 'save_lang'];

    public function launchHqModal()
    {
        $this->dispatchBrowserEvent('launch-hq-modal');

        $this->emit('launch-hq-modal');

        $this->is_new_lang = true;

    }

    public function render()
    {
        $this->langs = Lang::all();
        //Index Render method
        return view('livewire.code.bank.index', [
            'banks' => Bank::with('lang')->paginate(5),

            'title' => 'All Bank'])
            ->extends('layouts.app');

    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function save_lang()
    {
        if ($this->name_lang != '') {
            Lang::create([
                "name" => $this->name_lang,

            ]);
            $this->name_lang = '';
        }

        $this->is_new_lang = false;
    }

    // protected $messages = [
    //     'title.required' => 'This Row Is Required',

    //     'title.unique' => 'This Row Is Doplicated',
    // ];

    public function store()
    {
        $this->validate();
        Bank::create([
            "title" => $this->title,
            "body" => $this->body,
            "notes" => $this->notes,
            "lang_id" => $this->lang_id,

        ]);
        $this->clear();
    }
    public function model_lang()
    {
        $this->is_new_lang = true;
    }
    public function clear()
    {
        $this->is_new = true;
        $this->is_new_lang = false;
        $this->hidden_id = 0;
        $this->title = '';
        $this->body = '';
        $this->notes = '';
        $this->lang_id = 0;

    }
    public function edit($item)
    {

        $this->hidden_id = $item;
        $b = Bank::find($item);
        $this->lang_id = $b->lang_id;
        $this->title = $b->title;
        $this->body = $b->body;
        $this->notes = $b->notes;
        $this->is_new = false;
        $this->is_new_lang = false;

    }
    public function update()
    {

        $b = Bank::find($this->hidden_id);
        $b->lang_id = $this->lang_id;
        $b->title = $this->title;
        $b->body = $this->body;
        $b->notes = $this->notes;
        $b->save();
        $this->clear();

    }
    public function destroy()
    {

        Bank::find($this->hidden_id)->delete();

        $this->clear();

    }

}
