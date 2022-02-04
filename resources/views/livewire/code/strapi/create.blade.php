<div class="container-fluid">

    <div class="row">

        <!-- c4 -->
        <div class="col-3">
            <div class="div  fw-bold text-blak ">
                <!-- projs -->
                <div class="row">
                    <label for="" class="form-label fw-bold  col-md-3">Projects :</label>
                    <div class="col-md-7">
                        <select wire:model='proj_id' class="form-select  mb-2 ">
                            <option value="">select</option>
                            @foreach ($projs as $item)
                            <option value="{{ $item ->id}}">{{ $item ->name}}</option>
                            @endforeach

                        </select>
                    </div>

                    @include('livewire.code.strapi.project_create_model')

                </div>
                <!-- tbls -->

                <div class="row">
                    <label for="" class="form-label fw-bold  col-md-3">Tables :</label>
                    <div class="col-md-7">
                        <select wire:model='tbl_id' class="form-select" id="cbx_tbl_id">
                            <option value="">select</option>
                            @foreach ($tbls as $item)
                            <option value="{{ $item ->id}}">{{ $item ->name}}</option>
                            @endforeach

                        </select>
                    </div>
                    @if ($proj_id>0)

                    @include('livewire.code.strapi.table_create_model')
                    @endif

                </div>

                <!-- tbl -->
                <div class="row mt-3">
                    <label for="" class="col-3">Table :</label>
                    <div class="col-9">
                        <input type="text" class="form-control" wire:model='tbl_name' id="txt_tbl_name">
                    </div>
                </div>
                <!-- name_p  -->
                <div class="row mt-3">
                    <label for="" class="col-3">Plural :</label>
                    <div class="col-9">
                        <input type="text" class="form-control" wire:model='name_p' id="txt_tbl_name">
                    </div>
                </div>
                <div>
                    @include('livewire.code.strapi.cols_create_model')


                    <div class="  mt-3">
                        <input type="button" class="btn btn-info btn-md me-1" value="Model" wire:click='code_model'>
                        <input type="button" class="btn btn-primary btn-md me-1" value="Migration" wire:click='code_migration'>
                        <input type="button" class="btn btn-danger btn-md me-1" value="Route">
                        <button type="button" class="btn btn-danger" wire:click='get_str'>Get Str</button><br>
                        <button type="button" class="btn btn-info mt-2" wire:click='css'>css</button>
                        <button type="button" class="btn btn-info mt-2" wire:click='js'>js</button>
                        <button type="button" class="btn btn-info mt-2" wire:click='replace'>replace</button>

                        {{-- <input type="button" class="btn btn-danger btn-md me-1" value="Route"
                            style="background: rgb(211, 79, 79)"> --}}

                    </div>
                </div>
            </div>


        </div>
        <!-- c8 -->
        <div class="col-9" style="background: #eee">
            @if (session()->has('message'))
            <div class="alert alert-success" style="margin-top:30px;">x
                {{ session('message') }}
            </div>
            @endif

            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home_home-tab" data-bs-toggle="tab" data-bs-target="#home_id" type="button" role="tab" aria-controls="home_id" aria-selected="true">Columns</button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="home_profile-tab" data-bs-toggle="tab" data-bs-target="#profile_id" type="button" role="tab" aria-controls="profile_id" aria-selected="false">Code

                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="home_messages-tab" data-bs-toggle="tab" data-bs-target="#messages_id" type="button" role="tab" aria-controls="messages_id" aria-selected="false">Messages</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="home_settings-tab" data-bs-toggle="tab" data-bs-target="#settings_id" type="button" role="tab" aria-controls="settings_id" aria-selected="false">Settings</button>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="home_id" role="tabpanel" aria-labelledby="home_home-tab">
                    <!-- table cols -->
                    <table class="table  table-hover table-bordered ">
                        <thead class=" table-dark ">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Type</th>
                                <th scope="col">Sel</th>
                                <th scope="col">If</th>
                                <th scope="col">Len</th>
                                <th scope="col">Index</th>
                                <th scope="col">Default</th>
                                <th scope="col">Value</th>
                                <th scope="col">Parent</th>
                                <th scope="col">RelType</th>
                                <th scope="col">Childs</th>


                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($cols as $key=> $col)

                            <tr>
                                <th scope="row">{{ $key+1 }}</th>

                                <td>{{ $col->name }}</td>
                                <td>{{ $col->type }}</td>
                                <td>{{ $col->sel }}</td>
                                <td>{{ $col->if }}</td>
                                <td>{{ $col->length }}</td>
                                <td>{{ $col->index }}</td>
                                <td>{{ $col->default }}</td>
                                <td>{{ $col->default_v }}</td>
                                <td>{{ $col->parent }}</td>
                                <td>{{ $col->rel_type }}</td>

                                <td>
                                    @if ($col->name=="id")
                                    @foreach ($tbl_childs as $ch)

                                    {{ $ch->name }} <span class="text-danger">//</span>

                                    @endforeach
                                    @endif

                                </td>




                                <td>
                                    <input type="button" value="Edit" class="btn btn-sm btn-warning fw-bold" wire:click="edit({{ $col->id }})" data-bs-toggle="modal" data-bs-target="#colsModal">

                                    <input type="button" value="Del" class="btn btn-sm btn-danger fw-bold" wire:click="destroy_col({{ $col->id }})">

                                </td>

                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

                <div class="tab-pane" id="profile_id" role="tabpanel" aria-labelledby="home_profile-tab">
                    <div class="form-floating">
                        <textarea class="form-control fw-bold text-dark " placeholder="Leave a comment here" id="floatingTextarea2" style="height: 450px;font-size:1.3rem" wire:model='body'></textarea>
                        {{-- <label for="floatingTextarea2">Code Here ...</label> --}}
                    </div>
                </div>

                <div class="tab-pane" id="messages_id" role="tabpanel" aria-labelledby="home_messages-tab">messages

                </div>
                <div class="tab-pane" id="settings_id" role="tabpanel" aria-labelledby="home_settings-tab">settings
                </div>
            </div>


        </div>



    </div>




    {{-- <script type="text/javascript">
        window.livewire.on('Project_Store', () => {
            $('#projectModal').modal('hide');
        });
        window.livewire.on('Tbl_Store', () => {
            $('#tableModal').modal('hide');
        });

        window.livewire.on('cols_stored', () => {
            var myModal = document.getElementById('myModal')
            myModal.hide()
        });


        var firstTabEl_u = document.querySelector('#myTabCols_u li:last-child a')
        var firstTab_u = new bootstrap.Tab(firstTabEl_u)

        firstTab_u.show()



        var firstTabEl = document.querySelector('#myTabCols li:last-child a')
        var firstTab = new bootstrap.Tab(firstTabEl)

        firstTab.show()



    </script> --}}



</div>
