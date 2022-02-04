<?php

namespace App\Http\Livewire\Code\Form;

use App\Models\DataType;
use Livewire\Component;
use Storage;

class Create extends Component
{
/*

public $proj_id='';
public $proj_name='';
 */
    public $mode = 'add';
    public $mode_code = [
        [
            "id" => "1",
            "name" => "cols",
        ],
        [
            "id" => "2",
            "name" => "model",
        ]
        ,
        [
            "id" => "3",
            "name" => "project",
        ],

        [
            "id" => "4",
            "name" => "table",
        ],

    ];
    public $step = '';

    public $cols = [];

    public $dataType = [];
    public $min_data_type = true;

    public $class_cols = '';
    public $class_proj = '';
    public $hasMany = '';

    public $proj_name = '';
    public $tbl_name = '';
    public $tbl_p_name = '';
    public $code_save = '';

    public $dir = '';
    public $body = '';

    public $h_id = 0;
    public $col_id = 1;

    public $col_name = '';
    public $col_sel = true;
    public $col_if = false;
    public $col_type = '';
    public $col_lenght = '255';
    public $col_def = '';
    public $col_def_enter = '';
    public $col_index = 'none';

    public $fw_bootstrap = true;
    public $fw_laravel = false;
    public $fw_livewire = true;
    public $fw_tailwin = false;

    public function add()
    {
        $this->validate();
        if ($this->col_def != 'USER_DEFINED') {
            $this->col_def_enter = '';
        }

        if ($this->mode == 'add' && count($this->cols) > 0) {
            /*  if (count($this->cols) > 0) {}else {

            $ide = $this->h_id;
            }*/

            $ide = max($this->cols)['col_id'] + 1;

        } else {

            $ide = $this->h_id;

            if ($ide == 0) {
                $ide = 1;
            }
        }
        /*else {

        }*/

        $this->cols[] = [

            "col_id" => $ide,
            "name" => $this->col_name,
            "type" => $this->col_type,
            "sel" => $this->col_sel,
            "if" => $this->col_if,
            "sel" => $this->col_sel,

            "lenght" => $this->col_lenght,

            "def" => $this->col_def,
            "def_enter" => $this->col_def_enter,
            "index" => $this->col_index,
            "tbl_p_name" => $this->tbl_p_name,

        ];
        if ($this->mode == 'add') {
            $this->col_id++;
        }

        $this->clear();
        sort($this->cols);

        //   $this->body = json_encode($this->cols);
    }
    public function edit($id)
    {
        $this->h_id = $id;
        $this->mode = 'edit';
        foreach ($this->cols as $key => $value) {

            if ($this->cols[$key]["col_id"] == $id) {

                $this->col_name = $this->cols[$key]["name"];
                $this->col_type = $this->cols[$key]["type"];
                $this->col_if = $this->cols[$key]["if"];
                $this->col_def = $this->cols[$key]["def"];
                $this->col_lenght = $this->cols[$key]["lenght"];
                $this->col_type = $this->cols[$key]["type"];
                $this->col_sel = $this->cols[$key]["sel"];

                $this->col_def_enter = $this->cols[$key]["def_enter"];
                $this->col_index = $this->cols[$key]["index"];

                if ($this->cols[$key]["tbl_p_name"] != '') {
                    $this->tbl_p_name = $this->cols[$key]["tbl_p_name"];

                }

                unset($this->cols[$key]);
            }
        }

    }
    public function del($id)
    {
        foreach ($this->cols as $key => $value) {

            if ($this->cols[$key]["col_id"] == $id) {

                unset($this->cols[$key]);
                $this->clear();}
        }}
    protected $rules = [
        'col_name' => 'required|min:2',
        'col_type' => 'required',
        // 'col_lenght' => 'required',

    ];

    public function render()
    {

        if ($this->min_data_type) {
            $this->dataType = DataType::where('most', $this->min_data_type)->get();
        } else {
            $this->dataType = DataType::all();
        }
        // ($fw_bootstrap)?$fw_tailwin=false:$fw_tailwin=true
        // if ($this->fw_bootstrap == false && $this->fw_tailwin = false) {
        //     $this->fw_tailwin = true;
        // }
        // if ($this->fw_bootstrap == false && $this->fw_tailwin = true) {
        //     $this->fw_bootstrap = true;
        // }
        // else if ($this->fw_bootstrap){
        //     $this->fw_tailwin=false;
        // }

        //Create Render method
        return view('livewire.code.form.create', ['title' => 'Create Form'])
            ->extends('layouts.app');
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
        $app_path = storage_path('app');
        //  $file_path = storage_path('app/file.txt');

        $str = "form_c/" . $this->proj_name . '/' . $this->tbl_name . '/' . $this->step . ".json";

        $str = $app_path . "/" . $str;

        if (file_exists($str)) {

            $this->class_cols = 'bg-info';

        } else {
            $this->class_cols = 'bg-danger';
        }

        if (file_exists($app_path . "//form_c//" . $this->proj_name . "//")) {
            $this->class_proj = 'bg-info';

        } else {
            $this->class_proj = 'bg-danger';

        }

    }
    public function ch()
    {

        //  dd($str);
    }
    public function clear()
    {
        $this->col_name = "";
        $this->col_type = "";
        $this->sel = true;
        $this->if = false;
        $this->col_lenght = "255";
        $this->col_type = "";
        $this->col_def = "";
        $this->col_def_enter = "";
        $this->col_index = "none";
        $this->tbl_p_name = "";
        $this->hasMany = "";
        $this->mode = 'add';

    }
    public function save()
    {


         if ($this->step == 'project') {
            $str = "form_c//last_project.json";
          Storage::put($str, json_decode($this->proj_name));

        }
        else if ($this->step == 'table') {
            $str = "form_c/" . $this->proj_name . "/tables.json";

          Storage::put($str, json_decode($this->tbl_name));

        }


        if ($this->proj_name === '') {
            session()->flash('proj_name_e', 'proj_name empty');
            return;
        }
 if ($this->tbl_name === '') {
            session()->flash('tbl_name_e', 'tbl_name empty');
            return;
        }

        $str = "form_c/" . $this->proj_name . '/' . $this->tbl_name . '/' . $this->step . ".json";
        if ($this->step == 'cols') {
            Storage::put($str, json_encode($this->cols));
        }  else {
            Storage::put($str, json_encode($this->body));
        }

    }
    public function restore_cols()
    {
        if ($this->proj_name === '') {
            session()->flash('proj_name_e', 'proj_name empty');
            return;
        }
        if ($this->tbl_name === '') {
            session()->flash('tbl_name_e', 'tbl_name empty');
            return;
        }
        $this->cols = array();
        //Storage::put($this->name . "//" . $this->step . "_" . $this->step_text . '.txt', $this->body);

        $str = "form_c/" . $this->proj_name . '/' . $this->tbl_name . '/' . $this->step . ".json";

        try {
            $s = Storage::disk('local')->get($str);

            if ($this->step != 'cols') {
                $this->body = json_decode($s, true);
            }

            $this->cols = json_decode($s, true);

        } catch (\Throwable $th) {
            //dd($th);
        }

    }
    public function restore()
    {

        if ($this->step == 'project') {
            $str = "form_c/last_project.json";
           $this->proj_name   =json_decode( Storage::disk('local')->get($str));
           // = Storage::put($str, json_encode());
            return;
        }

        if ($this->proj_name === '') {
            session()->flash('proj_name_e', 'proj_name empty');
            return;
        }
        if ($this->tbl_name === '') {
            session()->flash('tbl_name', 'tbl_name empty');
            return;
        }
        $this->cols = array();
        //Storage::put($this->name . "//" . $this->step . "_" . $this->step_text . '.txt', $this->body);

        $str = "form_c/" . $this->proj_name . '/' . $this->tbl_name . '/' . $this->step . ".json";

        $s = Storage::disk('local')->get($str);
        $this->body = json_decode($s, true);

        /* */
    }
    //تحويل_من كود_الى_نص
    public function get_str($str = '')
    {
        if ($str == '') {
            $str = $this->body;
        }

        $this->body = str_replace("\$", "\\$", $str);

        $this->body = str_replace('"', '\\"', $this->body);
        $this->body = str_replace("\n", "\\n", $this->body);
        //   $this->body = str_replace("\\", "\\\\", $this->body);
        $this->body = "\$this->body= \"" . $this->body . "\";";

        //   $this->body = "  if (\$str == '') {\n \$str  =\$this->body ;\n\n        }";
    }
    public function t()
    {

    }
    public function form_c()
    {
        if ($this->tbl_name === '') {
            session()->flash('tbl_name', 'tbl_name empty');
            return;
        }
        $this->code_save = 'form_create';

    }

    public function model_c()
    {
        if ($this->tbl_name === '') {
            session()->flash('tbl_name', 'tbl_name empty');
            return;
        }
        $this->code_save = 'model';
        $cols_model = '';

        $tbl_col_fk = '';
        $tbl_p_names = '';
        $uc_tbl_p_name = "";
        $uc_tbl_name = ucfirst($this->tbl_name);

        foreach ($this->cols as $key => $value) {
            if ($value['sel'] == true) {
                $cols_model .= "'" . $value['name'] . "',\n";

                if ($value['type'] == 'foreignId') {
                    $tbl_col_fk = $value['name'];
                    $uc_tbl_p_name = ucfirst($value['tbl_p_name']);
                }
                if ($value['tbl_p_name'] != '') {
                    $tbl_p_names .= "
          public function {$value['tbl_p_name']}() : HasOne\n    {\n
                 return \$this->hasOne({$uc_tbl_p_name}::class,'{$value['name']}, 'id'');
        }
//Copy This In Model : {$uc_tbl_p_name}
/*
لجلب كل البيانات
{$uc_tbl_name}s
الى
{$uc_tbl_p_name}
*/
     public function {$this->tbl_name}s(): HasMany
{
    return \$this->hasMany({$uc_tbl_name}::class, '{$this->tbl_name}_id', 'id');
}
\n\n

        \n   ";

                }

            }
        }

        $this->body = " <?php\n\nnamespace App\Models;\n\n
       use Illuminate\Database\Eloquent\Factories\HasFactory;\nuse Illuminate\Database\Eloquent\Model;\n\nclass Bank extends Model\n{\n    use HasFactory;\n

        protected \$table='{$this->tbl_name}s';
        protected \$fillable = [\n
        $cols_model
        ];\n\n

        {$tbl_p_names}\n

          \n}\n";
        //   $this->body = json_encode($this->body);
    }

}
