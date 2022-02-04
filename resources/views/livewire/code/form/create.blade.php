<div class="container-fluid ^bg-info  ">
    @section('title')
    Create Code
    @endsection
    <style>
        .ltr {
            direction: ltr;
        }

        #code_body {
            height: 300px;
            direction: ltr;
        }
    </style>

    <div class="container-fluid mt-3 ltr fw-bold">
        <div class="row  ">



            <div class=" gap-2 d-md-flex flex-column justify-content-md-start mb-1  col-md-6">
                <div class="row">
                    <!-- proj_name -->
                    <div class="col-sm-6">
                        <div class="mb-2 row">
                            <label for="tableName" class="col-sm-4  form-label">ProjName</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control fw-bold {{ $class_proj }}" wire:model='proj_name'
                                    wire:change='ch' id="proj_name">

                                <span class="text-danger fw-bold">{{session('proj_name_e') }}</span>
                            </div>

                        </div>
                    </div>
                    <!-- tbl_name -->
                    <div class="col-sm-6">
                        <div class="mb-2 row">
                            <label for="tableName" class="col-sm-4  form-label">TableName:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control {{ $class_cols }}" wire:model='tbl_name'>
                                <span class="text-danger fw-bold">{{session('tbl_name_e') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form row">
                    <div class="col-md-4">
                        <!-- column -->
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-12 col-form-label">Column:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control " wire:model='col_name'>
                                @error('col_name') <span class="error text-danger fw-bold">{{ $message }}</span>
                                @enderror

                            </div>

                        </div>
                    </div>


                    <!-- type -->
                    <div class="col-5">
                        <div class="row">
                            <label for="cbx_dataType" class="col-12 form-label"> Type :</label>
                            <div class="col-sm-10">
                                <select class="   form-select" wire:model='col_type'>
                                    <option value="">Select</option>
                                    @foreach ($dataType as $item)
                                    <option value="{{$item->name}}">{{$item->name }}</option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="col-sm-2">
                                <input type="checkbox" wire:model='min_data_type'>
                            </div>
                            @error('col_type') <span class="error text-danger fw-bold">{{ $message }}</span> @enderror

                        </div>
                    </div>
                    <!-- tbl_p_name -->
                    @if ($col_type=='foreignId')
                    <div class="col-sm-3">
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-12 col-form-label">Table Parent</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control " wire:model='tbl_p_name'>
                                @error('tbl_p_name') <span class="error text-danger fw-bold">{{ $message }}</span>
                                @enderror

                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Length -->
                    <div class="col-sm-3">
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-12 col-form-label">Length:</label>
                            <div class="col-sm-12">
                                <input type="number" class="form-control " wire:model='col_lenght'>
                                @error('col_lenght') <span class="error text-danger fw-bold">{{ $message }}</span>
                                @enderror

                            </div>
                        </div>
                    </div>
                    <!-- col_def -->
                    <div class="col-4">
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-12 col-form-label">Default:</label>
                            <div class="col-sm-12">
                                <select id="columnDefault" class="form-select" wire:model='col_def'>
                                    <option value="NONE"> None </option>
                                    <option value="USER_DEFINED"> As defined </option>
                                    <option> NULL </option>
                                    <option> CURRENT_TIMESTAMP </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- USER_DEFINED_val -->
                    @if ( $col_def=='USER_DEFINED')
                    <div class="col-4">
                        <label for="USER_DEFINED_val" class="form-label">Enter :</label>
                        <input type="text" class="form-control" wire:model='col_def_enter'>
                    </div>
                    @endif
                    <!--  -->
                    <div class="col-4">
                        <div class="form-group row"><label for="staticEmail"
                                class="col-sm-12 col-form-label">Index:</label>
                            <div class="col-sm-12">
                                <select id="Index" class="form-select" wire:model='col_index'>
                                    <option value="none">---</option>
                                    <!--v-if-->
                                    <option value="Unique"> UNIQUE </option>
                                    <option value="Fulltext">
                                        FULLTEXT
                                    </option>
                                    <option value="Spatial">
                                        SPATIAL
                                    </option>
                                </select>
                            </div>



                        </div>


                    </div>
                </div>
                <div class="my-2">
                    <input class="form-check-input" type="checkbox" wire:model='col_sel'>
                    <label class="form-check-label me-5" for="inlineCheckbox1">Sel</label>

                    <input class="form-check-input" type="checkbox" wire:model='col_if'>
                    <label class="form-check-label" for="inlineCheckbox2">If</label>

                </div>
                <div class="form-groub  ">
                    <div class="mb-2">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" wire:model='fw_bootstrap'>
                            <label class="form-check-label" for="inlineCheckbox1">Bootstrap</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" wire:model='fw_tailwin'>
                            <label class="form-check-label" for="inlineCheckbox2">Tailwin</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" wire:model='fw_livewire'>
                            <label class="form-check-label" for="inlineCheckbox1">Livewire</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" wire:model='fw_laravel'>

                            <label class="form-check-label" for="inlineCheckbox2">Controller</label>
                        </div>
                    </div>
                    <!---->
                    <button class="btn btn-primary me-md-1 text-dark
                     text-white fw-bold" wire:click='model_c'>Model Code</button>
                    <button class="btn btn-warning me-md-1 text-black
                    fw-bold" wire:click='crud_c'>Crud Code</button>
                    <button class="btn btn-info me-md-1 text-dark
                    border-rounded fw-bold" wire:click='migrate_c'>Migrate Code</button>

                    <button class="btn btn-outline-info me-md-1 text-dark
                    border-rounded fw-bold" wire:click='form_c'>Form Code</button>

                    <button class="btn btn-outline-info me-md-1 mt-1 text-dark
                    border-rounded fw-bold" wire:click='form_c'>New Project</button>

                </div>
            </div>
            <!-- step -->
            <div class="mb-3 col-md-6  ">
                <div class="my-1">

                    <select wire:model=step class="form-select-sm col-2 fw-bold">
                        <option value="">select mode</option>

                        @foreach ($mode_code as $item)
                        <option>{{ $item['name'] }}</option>
                        @endforeach

                    </select>


                    @if ($step=='cols')

                    <button class="btn btn-md btn-outline-info  fw-bold" wire:click='add'>{{ $mode }}
                    </button>



                    <button class="btn  btn-info fw-bold me-1" wire:click='restore_cols'>Restore Cols</button>




                    @else
                    <button class="btn  btn-info fw-bold" wire:click='restore' id="btn_restor">Restore</button>

                    @endif
                    <button class="btn  btn-success fw-bold" wire:click='save'>Save</button>



                    <button type="button" class="btn btn-danger" wire:click='get_str'>Get Str</button>

                    <button type="button" class="btn btn-warning" onclick='copy()'>Copy</button>
                    <button type="button" class="btn btn-secondary yext-white" wire:click='clear()'>Clear</button>
                    {{-- <button type="button" class="btn btn-primary" wire:click='save_file()'>Save File</button> --}}


                </div>
                <textarea class="form-control fw-bold" id="code_body" cols="12" wire:model='body'></textarea>
            </div>
            <!-- table -->
            <div class="mt-1 row">
                <table class="table table-dark table-hover table-sm table-responsive">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">column</th>
                            <th scope="col">type</th>
                            <th scope="col">Sel</th>
                            <th scope="col">If</th>
                            <th scope="col">Length</th>
                            <th scope="col">Default</th>
                            <th scope="col"> DEFINED Val</th>
                            <th scope="col">Index</th>
                            <th scope="col">Table Parent</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-light">

                        @foreach ($cols as $key=> $item)
                        <tr>

                            {{-- <td scop='row'>{{ $key+1}}</td> --}}
                            <td scop='row'>{{ $item['col_id']}}</td>
                            <td scop='row'>{{ $item['name'] }}</td>
                            <td scop='row'>{{ $item['type'] }}</td>
                            <td scop='row'>
                                <input class="form-check-input" type="checkbox" {{ ($item['sel'])==1?'checked':'' }}>

                            </td>
                            <td scop='row'>
                                <input class="form-check-input" type="checkbox" {{ ($item['if'])==1?'checked':'' }}>

                            </td>
                            <td scop='row'>{{ $item['lenght'] }}</td>
                            <td scop='row'>{{ $item['def'] }}</td>
                            <td scop='row'>{{ $item['def_enter'] }}</td>
                            <td scop='row'>{{ $item['index'] }}</td>
                            <td scop='row'>{{ $item['tbl_p_name'] }}</td>

                            <td scop='row'>

                                <button wire:click="edit({{$item['col_id']}})" class="btn btn-sm btn-info" {{
                                    ($mode)!='add' ?'disabled':'' }}>edit</button>

                                <button wire:click="del({{  $item['col_id']}})" class="btn btn-sm btn-info">Del</button>

                            </td>


                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <script>
        function copy() {
            var copyText = document.getElementById('code_body')
            copyText.select();
            document.execCommand('copy')
            console.log('Copied Text')
        }

       document.getElementById('proj_name').addEventListener('change', function  () {
 localStorage.setItem("proj_name", this.value);//

 /* document.getElementById('btn_restor').addEventListener('click', function  () {
    document.getElementById('proj_name').value= localStorage.getItem("proj_name");//

        });*/






    </script>
</div>
