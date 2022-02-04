<?php

namespace App\Http\Livewire\Code\Make;

use Livewire\Component;
use Storage;

class Create extends Component
{

    public $use_a = false;
    public $use_i = false;
    public $use_c = false;
    public $use_e = false;
    public $use_s = false;

    public $step = 0;

    public $step_text = '';
    public $name = '';
    public $dir = '';
    public $body = '';
    protected $rules = [

        'name' => 'required|min:2',
    ];
    protected $messages = [
        'name.required' => 'ادخل_الاسم_اولا',
    ];
    public function render()
    {

        //Create Render method
        return view('livewire.code.make.create', ['title' => 'Create Make'])
            ->extends('layouts.app');
    }
    public function set_cookie($cookie_name, $cookie_value)
    {

        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

    }
    public function set_ch($ch_name)
    {
        if (isset($_COOKIE[$ch_name])) {

            if ($_COOKIE[$ch_name] == '1') {
                $this->ch_name = 1;

            } else {
                $this->ch_name = 0;
            }

        } else {
            $this->set_cookie($ch_name, "0");

        }
    }
    public function mount()
    {

        if (isset($_COOKIE['use_i'])) {

            if ($_COOKIE['use_i'] == '1') {
                $this->use_i = 1;

            } else {
                $this->use_i = 0;
            }

        } else {
            $this->set_cookie("use_i", "0");

        }

        if (isset($_COOKIE['use_c'])) {

            if ($_COOKIE['use_c'] == '1') {
                $this->use_c = 1;

            } else {
                $this->use_c = 0;
            }

        } else {
            $this->set_cookie("use_c", "0");

        }
        if (isset($_COOKIE['use_e'])) {

            if ($_COOKIE['use_e'] == '1') {
                $this->use_e = 1;

            } else {
                $this->use_e = 0;
            }

        } else {
            $this->set_cookie("use_e", "0");

        }
        if (isset($_COOKIE['use_s'])) {

            if ($_COOKIE['use_s'] == '1') {
                $this->use_s = 1;

            } else {
                $this->use_s = 0;
            }

        } else {
            $this->set_cookie("use_s", "0");

        }
        if (isset($_COOKIE['use_a'])) {

            if ($_COOKIE['use_a'] == '1') {
                $this->use_a = 1;

            } else {
                $this->use_a = 0;
            }

        } else {
            $this->set_cookie("use_a", "0");

        }

        if (isset($_COOKIE['name'])) {
            $this->name = $_COOKIE['name'];

        }
        if (isset($_COOKIE['dir'])) {
            $this->dir = $_COOKIE['dir'];

        }
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function make_livewire_component()
    {

        $this->validate();
        $dir = '';
        $route_name = '';
        if ($this->dir != '') {
            $dir = $this->dir . '/';
            $route_name = $this->dir . "." . $this->name . ".";
        } else {
            $route_name = $this->name . ".";

        }

        if ($this->step == 1) {

            $this->step_text = 'Make Livewire Component';
            $this->body = "php artisan make:livewire " . $dir . $this->name . "/index\n";
            $this->body .= "php artisan make:livewire " . $dir . $this->name . "/create\n";
            $this->body .= "php artisan make:livewire " . $dir . $this->name . "/edit\n";
            $this->body .= "php artisan make:livewire " . $dir . $this->name . "/show";

        } else if ($this->step == 2) {
            $this->step_text = 'Route';
            $this->body = "Route::get('/" . $dir . $this->name . "/index', App\Http\Livewire\\" . ucfirst(str_replace('/', '\\', $dir)) . ucfirst($this->name) . "\Index::class)->name('" . $route_name . "index');\n";
            $this->body .= "Route::get('/" . $dir . $this->name . "/create', App\Http\Livewire\\"
            . ucfirst(str_replace('/', '\\', $dir)) . ucfirst($this->name) . "\Create::class)->name('" . $route_name . "create');\n";
            $this->body .= "Route::get('/" . $dir . $this->name . "/edit/{id?}', App\Http\Livewire\\" .
            ucfirst(str_replace('/', '\\', $dir)) . ucfirst($this->name) . "\Edit::class)->name('" . $route_name . "edit');\n";
            $this->body .= "Route::get('/" . $dir . $this->name . "/show/{id?}', App\Http\Livewire\\" .
            ucfirst(str_replace('/', '\\', $dir)) . ucfirst($this->name) . "\Show::class)->name('" . $route_name . "show');\n";

        } else if ($this->step == 3) {
            $this->step_text = 'Link';
            if ($this->use_c) {
                $this->c_render();
            } else {
                $this->body =
                '

                //Index Render method
                    return view(\'livewire.' . $route_name . 'index' . '\', [\'title\' => \'All ' . ucfirst($this->name) . '\'])
                ->extends(\'layouts.app\');

                    ';

                $this->body .= '
                                    //Create Render method
                                        return view(\'livewire.' . $route_name . 'create' . '\', [\'title\' => \'Create ' . ucfirst($this->name) . '\'])
                                    ->extends(\'layouts.app\');

                                      ';
                $this->body .= '
                                    //Edit Render method
                                        return view(\'livewire.' . $route_name . 'edit' . '\', [\'title\' => \'Edit ' . ucfirst($this->name) . '\'])
                                    ->extends(\'layouts.app\');



                                    //Show Render method
                                        return view(\'livewire.' . $route_name . 'show' . '\', [\'title\' => \'Show ' . ucfirst($this->name) . '\'])
                                    ->extends(\'layouts.app\');

                                                    ';

            }} else if ($this->step == 4) {
            $this->step_text = 'Link';
            $this->body = '

            {{--   Index Link--}}
            <li class="nav-item">
             <a class="nav-link" href="{{ route(\'' . $route_name . 'index' . '\') }}">{{ __(\'All ' . ucfirst($this->name) . '\') }}</a>
            </li>

            {{--  Create Link--}}
            <li class="nav-item">
             <a class="nav-link" href="{{ route(\'' . $route_name . 'create' . '\') }}">{{ __(\'Create ' . ucfirst($this->name) . '\') }}</a>
            </li>

            {{--  Edit Link--}}
            <li class="nav-item">
             <a class="nav-link" href="{{ route(\'' . $route_name . 'edit' . '\') }}">{{ __(\'Edit ' . ucfirst($this->name) . '\') }}</a>
            </li>


            {{--Show Link  --}}
            <li class="nav-item">
             <a class="nav-link" href="{{ route(\'' . $route_name . 'show' . '\') }}">{{ __(\'Show ' . ucfirst($this->name) . '\') }}</a>
            </li>


            {{--  All links--}}

            <!--start dropdown links ' . ucfirst($this->name) . ' -->
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                ' . ucfirst($this->name) . '
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="{{ route(\'' . $route_name . 'index\') }}">' . ucfirst($this->name) . ' All' . '</a></li>
                <li><a class="dropdown-item" href="{{ route(\'' . $route_name . 'create\') }}">' . ucfirst($this->name) . ' Create' . '</a></li>
                <li><a class="dropdown-item" href="{{ route(\'' . $route_name . 'edit\') }}">' . ucfirst($this->name) . ' Edit' . '</a></li>
                <li><a class="dropdown-item" href="{{ route(\'' . $route_name . 'show\') }}">' . ucfirst($this->name) . ' Show' . '</a></li>
                <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
                </li>
                <!--end dropdown links ' . ucfirst($this->name) . ' -->
            ';

        } else if ($this->step == 5) {
            $this->make_model();
        } else if ($this->step == 6) {
            $this->get_page_title();
        } else if ($this->step == 7) {
            $this->c_project();
        }

    }
    public function c_project()
    {
        $path = '';
        if ($this->dir != '') {
            $path = $this->dir . '/';
        }

        $this->body =
            "composer create-project laravel/laravel $this->name\n\nhttp://localhost/" . $path .
            "$this->name/public \n\n\n//Env DATABASE\n\nDB_DATABASE=$this->name \n\n\n

";

        $this->body .= "\n\n// import\n\nuse Illuminate\Support\Facades\Hash;\nuse Illuminate\Support\Str;\n\n// add data\n \App\Models\User::create([\n            \"name\" => 'name',\n            \"email\" => 'dzamor72@gmail.com',\n            'password' => Hash::make('12345678'),\n          ]);\n\n\n//DatabaseSeeder\n\n \$this->call([\n            mySeeder::class,\n        ]);";

        $this->body .= "config/app.php  &&  livewire.php\n\n\n   // 'asset_url' => env('ASSET_URL', null),\n   'asset_url' => env(\"APP_URL\"),\n'asset' => env(\"APP_URL\"),\n\n\n// app.plade\n\n    <title>{{ config('app.name', 'Laravel') }} | @yield('title','Site')</title>\n\n   <!-- Styles -->\n    <link href=\"{{ asset('css/app.css') }}\" rel=\"stylesheet\">\n\n\n<!-- Scripts -->\n    <script src=\"{{ asset('js/app.js') }}\" defer></script>";

        $this->body .= "

//laravel/ui

composer require laravel/ui\n\nphp artisan ui bootstrap\n\nphp artisan ui bootstrap --auth\n\nphp artisan ui vue --auth\n\nnpm install && npm run dev";

        $this->body .= "

//foreignId

\$table->foreignId('project_id')->constrained(\"projects\", \"id\")\n            ->onDelete('cascade');";
    }

    public function c_render()
    {

        $dir = '';
        $route_name = '';
        if ($this->dir != '') {
            $dir = $this->dir . '/';
            $route_name = $this->dir . "." . $this->name . ".";
        } else {
            $route_name = $this->name . ".";

        }

        $this->body = "<?php\n\nnamespace App\Http\Livewire\Code\\" . ucfirst($this->name) . ";\n\n
    use App\Models\\" . ucfirst($this->name) . ";\nuse Livewire\Component;\n\nclass Create extends Component\n{\n\n\n
        public \$is_new = true;\n public \$hidden_id = 0;\n public \$$this->name = array();\n\n

 public \$name = '';\n\n

        public function render()\n    {\n
                  \$" . $this->name . "s =  " . ucfirst($this->name) . "::paginate(5);\n



                     \n\n\n    }\n\n\n    protected \$rules = [\n\n
                          'name' => 'required|min:2|unique:" . $this->name . "s,name',\n
                            \n\n    ];\n    protected \$messages = [\n
                               'name.required' => 'This Row Is Required',\n\n
                               ];\n\n    public function create()\n    {\n\n    }\n\n
                                 public function store()\n    {\n        \$this->validate();\n
                                     " . ucfirst($this->name) . "::create([\n            \"name\" => \$this->name,\n           \n\n        ]);\n        \$this->clear();\n    }\n\n    public function show(\$id)\n    {\n\n    }\n\n    public function edit(\$id)\n    {\n        \$this->hidden_id = \$id;\n        \$pr =  " . ucfirst($this->name) . "::find(\$this->hidden_id);\n        \$this->name =  \$pr->name;\n    \n\n        \n\n    }\n\n    public function update()\n    {\n        \$pr =  " . ucfirst($this->name) . "::find(\$this->hidden_id);\n        \$this->clear();\n    }\n\n    public function destroy()\n    {\n        \$pr =  " . ucfirst($this->name) . "::find(\$this->hidden_id)->delete();\n        \$this->clear();\n    }\n    public function clear()\n    {\n        \$this->new = true;\n        \$this->hidden_id = 0;\n        \$this->name = '';\n       \n\n    }\n}\n";
    }

    public function make_model()
    {
        $this->step_text = 'Make Model';
        $this->body = "php artisan make:model " . ucfirst($this->name) . " -m \n\n";
        $this->body .= "php artisan make:model " . ucfirst($this->name) . " -mcr \n\n";
        $this->body .= "php artisan make:model " . ucfirst($this->name) . " -mcsr \n\n";
        $this->body .= "php artisan make:model " . ucfirst($this->name) . " -a \n\n";

    }
    public function get_page_title()
    {
        $this->step_text = "Page Title On Blade";
        $this->body = "@section('title')\n    All " . ucfirst($this->name) . "\n    @endsection";
        $this->body .= "\n\n@section('title')\n    Create" . ucfirst($this->name) . "\n    @endsection";
        $this->body .= "\n\n@section('title')\n    Edit" . ucfirst($this->name) . "\n    @endsection";
        $this->body .= "\n\n@section('title')\n    Show" . ucfirst($this->name) . "\n    @endsection";
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
    public function clear()
    {
        $this->body = "";
    }
    public function save_file()
    {
        /*  if ($this->step == 1) {
        $this->step_text = 'Make Livewire Component';
        } else if ($this->step == 2) {
        $this->step_text = 'Route';
        } else if ($this->step == 3) {
        $this->step_text = 'Render';
        } else if ($this->step == 4) {
        $this->step_text = 'Link';
        } else if ($this->step == 5) {
        $this->step_text = 'Make Model';
        }
         */
        Storage::put($this->name . "//" . $this->step . "_" . $this->step_text . '.txt', $this->body);

    }

}
