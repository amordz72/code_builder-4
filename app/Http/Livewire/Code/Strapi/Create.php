<?php

namespace App\Http\Livewire\Code\Strapi;

use App\Models\Col;
use App\Models\DataType;
use App\Models\Project;
use App\Models\Strapi;
use App\Models\Tbl;
use App\Models\Tbl_child;
use Livewire\Component;

class Create extends Component
{
    public $updateMode = false;

    public $is_new = true;
    public $hidden_id = 0;
    public $strapi = array();
    public $body = '';
    public $model_name = '';
    public $name_p = '';

    //prroject
    public $proj_id = 0;
    public $projs = array();
    public $proj_name = "";
    public $db = "";
    public $url = "";
    //table
    public $tbls = array();
    public $tbl_childs = array();
    public $tbl_id = 0;
    public $tbl_name = '';
    public $tbl_names = '';

    public $c_child = '';

    //columns
    public $cols = array();
    public $col_hiddenId = 0;
    public $c_name = '';
    public $c_type = '';
    public $c_sel = true;
    public $c_if = false;
    public $c_length = 11;
    public $c_index = '';
    public $c_default = '';
    public $c_default_v = '';
    public $c_parent = '';
    public $c_hidden = false;
    public $rel_type = '';
    public $c_childs = '';
    public $c_childs_arr = array();

    //dataType
    public $mostOnly = true;
    public $dataType = array();

    public function render()
    {

        $this->projs = Project::all();

        //   $this->tbls = Tbl::where('project_id', $this->proj_id)->get();
        $this->tbls = Tbl::where('project_id', $this->proj_id)->get();

        try {
            $this->tbl_name = Tbl::
                where('id', '=', $this->tbl_id)
            // ->where('project_id', '=', $this->proj_id )
                ->get()[0]->name;

        } catch (\Throwable $th) {
            //throw $th;
        }
        //

        //start-set model and plural
        if ($this->tbl_name == 'category') {
            $this->name_p = 'categories';
        } else {
            $this->name_p = $this->tbl_name . 's';
        }

        $this->model_name = ucfirst($this->tbl_name);
        //end-set model and plural

        $this->cols = Col::where('tbl_id', $this->tbl_id)->get();
        $strapis = Strapi::paginate(5);

        if ($this->mostOnly) {
            $this->dataType = DataType::where("most", "1")->get();
        } else {
            $this->dataType = DataType::orderBy('id', 'asc')->get();
        }

        $this->tbl_childs = Tbl_child::where('tbl_id', $this->tbl_id)->get();

        return view('livewire.code.strapi.create', ['title' => 'Strapi Form'])
            ->extends('layouts.bs');
    }

    protected $rules = [

        'name' => 'required|min:2|unique:strapis,name',

    ];
    protected $messages = [

        'name.required' => 'This Row Is Required',

    ];

    public function create()
    {

    }

    public function store()
    {
        $this->validate();

        Strapi::create([
            "name" => $this->name,

        ]);
        $this->clear();
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $this->col_hiddenId = $id;
        $this->is_new = false;

        $pr = Col::find($id);
        $this->c_name = $pr->name;
        $this->c_type = $pr->type;
        $this->c_sel = $pr->sel;
        $this->c_if = $pr->if;
        $this->c_length = $pr->length;
        $this->c_default = $pr->default;
        $this->c_default_v = $pr->default_v;
        $this->c_hidden = $pr->hidden;
        $this->c_parent = $pr->parent;
        $this->rel_type = $pr->rel_type;

    }

    public function updated()
    {
        // $pr = Strapi::find($this->hidden_id);
        //$this->clear();

    }

    public function update_col()
    {
        $pr = Col::find($this->col_hiddenId);

        $pr->name = $this->c_name;
        $pr->type = $this->c_type;
        $pr->sel = $this->c_sel;
        $pr->if = $this->c_if;
        $pr->length = $this->c_length;
        $pr->index = $this->c_index;
        $pr->parent = $this->c_parent;
        $pr->default = $this->c_default;
        $pr->default_v = $this->c_default_v;
        $pr->rel_type = $this->rel_type;
        $pr->tbl_id = $this->tbl_id;
        $pr->save();

        $this->emit('cols_updated'); // Close model to using to js

        $this->clear_col(); //
    }

    public function destroy()
    {
        // $pr = Strapi::find($this->hidden_id)->delete();
        // $this->clear();
    }
    public function destroy_col($id)
    {

        $pr = Col::find($id)->delete();
    }
    public function clear()
    {
        $this->is_new = true;
        $this->hidden_id = 0;

    }
    public function clear_col()
    {
        $this->is_new = true;
        $this->col_hiddenId = 0; //
        $this->c_name = '';
        $this->c_type = '';
        $this->c_sel = true;
        $this->c_if = false;
        $this->c_length = 11;
        $this->c_index = '';
        $this->c_default = '';
        $this->c_parent = '';
        $this->c_hidden = false;
        $this->rel_type = '';

    }

    //Project
    private function resetInputFields_Project()
    {
        $this->proj_name = '';

    }

    public function store_project()
    {

        Project::create([
            'name' => $this->proj_name,
            'db' => $this->db,
            'url' => $this->url,
        ]);

        session()->flash('message', 'Project Created Successfully.');

        $this->resetInputFields_Project();

        $this->emit('Project_Store'); // Close model to using to jquery

    }
    public function store_col()
    {

        Col::create([
            'name' => $this->c_name,
            'type' => $this->c_type,
            'sel' => $this->c_sel,
            'if' => $this->c_if,
            'length' => $this->c_length,
            'index' => $this->c_index,
            'default' => $this->c_default,
            'hidden' => $this->c_hidden,
            'parent' => $this->c_parent,
            'rel_type' => $this->rel_type,
            'tbl_id' => $this->tbl_id,

        ]);

        session()->flash('message', 'Col Created Successfully.');

        $this->clear_col();

        $this->emit('Col_Store'); // Close model to using to jquery

    }
    public function Store_Tbl()
    {

        Tbl::create([
            'name' => $this->tbl_name,
            'project_id' => $this->proj_id,

        ]);

        session()->flash('message', 'Table Created Successfully.');

        $this->tbl_name = '';

        $this->emit('Tbl_Store'); // Close model to using to jquery

    }
    public function tbl_plu($name = '')
    {
        if ($name == '') {
            $tbl_plu = '';
            if ($this->tbl_name == 'category') {
                $tbl_plu = 'categories';
            } else {
                $tbl_plu = $this->tbl_name . "s";
            }
            return $tbl_plu;
        } else {
            $tbl_plu = '';
            if ($name == 'category') {
                $tbl_plu = 'categories';
            } else {
                $tbl_plu = $name . "s";
            }
            return $tbl_plu;
        }

    }
    public function code_model()
    {

        $cols = '';
        $parent = '';
        $childs = '';

        foreach ($this->cols as $key => $value) {
            $cols .= "'$value->name',\n";

            if ($value->type == 'foreignId' && $value->rel_type == 'hasOne') {
                $parent .= "
        public function $value->parent()
        {\n
        return \$this->hasOne(" . ucfirst($value->parent) . "::class, 'id','" . $value->name . "');\n
        }\n
            ";
            }
            if ($value->type == 'foreignId' && $value->rel_type == 'belongsToMany') {
                $parent .= "
                public function " . $this->tbl_plu($value->parent) . "()
                {\n
                  return \$this->belongsToMany(" . ucfirst($value->parent) .
                "::class, 'id','" . $value->name . "');\n
             }\n
                ";
            }

        }
        foreach ($this->tbl_childs as $key => $child) {

            $childs .= "
        public function " . $child->name . "s(): HasMany
        {\n
      return \$this->hasMany(" . ucfirst($child->name) . "::class,'" . $this->tbl_name . "_id', 'id');\n

      }\n
        ";
        }

        $this->body = "

            protected \$table = '" . $this->tbl_plu() . "';
            \n
            protected \$fillable = [
                " . $cols . "
                 ];

        $parent

        $childs

        \n";

    }
    public function store_child()
    {
        Tbl_child::create([
            "name" => $this->c_child,
            "tbl_id" => $this->tbl_id,
        ]);
    }
    public function destroy_child($id)
    {
        Tbl_child::find($id)->delete();
    }

    public function code_migration()
    {
        $tbl_plu = $this->tbl_plu();
        $uc_tbl_plurer = ucfirst($this->tbl_plu());
        $cols = '';
//  \$table->id();\n
        foreach ($this->cols as $key => $value) {
            if ($value->type == "foreignId") {
                $cols .= "\$table->" . $value->type . "('" .
                $value->name . "')->constrained(\"" . $this->tbl_plu($value->parent) . "\", \"id\")
                    ->onDelete('cascade');\n";
            } else {
                $cols .= "\$table->" . $value->type . "('" . $value->name . "');\n";

            }

        }
        $this->body = "
         $cols
 \$table->timestamps();\n
           ";

    }
    public function setNames()
    {

    }
    //تحويل_من كود_الى_نص
    public function get_str($str = '')
    {
        if ($str == '') {
            $str = $this->body;
        }

        $this->body = str_replace("\$", "\\$", $str);

        $this->body = str_replace('"', '\\"', $this->body);
        //$this->body = str_replace("\n", "\\n", $this->body);
        //   $this->body = str_replace("\\", "\\\\", $this->body);
        $this->body = "\$this->body= \"" . $this->body . "\";";

        //   $this->body = "  if (\$str == '') {\n \$str  =\$this->body ;\n\n        }";
    }
    //dashboard moder
    public function code_dashboard($strn = '')
    {
        if ($strn == '') {
            $strn = $this->body;
        }
/*
        $strn= str_replace("\$", "\\$", $strn);

        $strn= str_replace('"', '\\"',  $strn);
        //$this->body = str_replace("\n", "\\n", $this->body);

        foreach($strn as $line) {

        }*/
        $separator = "\r\n";
        $line = strtok($strn, $separator);
        $vn = strtok($strn, $separator);

        while ($line !== false) {
            # do something with $line
            $vn = strtok( $separator );

        }
    $this->body =  $vn;
     //   $this->body = "\$this->body= \"" . $strn . "\";";

    }
    function css() {
        $v='';
        foreach(preg_split("/((\r?\n)|(\r\n?))/", $this->body) as $line){

            if (strpos($line,'link href') !== false) {
             $v.=$line ."\n";
            }
            if (strpos($line,'link rel') !== false) {
             $v.=$line ."\n";
            }



        }
        $this->body=$v;
    }
    function js() {
        $v='';
        foreach(preg_split("/((\r?\n)|(\r\n?))/", $this->body) as $line){


            if (strpos($line,'script src') !== false) {
             $v.=$line ."\n";
            }



        }
        $this->body=$v;
    }
}
