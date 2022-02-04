<!-- Button trigger modal -->
@if ($tbl_id!='')
<button type="button" class="btn btn-info btn-sm text-dark fw-bold mt-3" data-bs-toggle="modal" wire:click='clear' data-bs-target="#colsModal">
    New Column
</button>
@endif


<!-- Modal Column -->
<div class="modal fade" wire:ignore.self id="colsModal" tabindex="-1" aria-labelledby="colsModal_lbl" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="colsModal_lbl"> @if ($is_new) New Column @else Edit Column @endif</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- name -->
            <div class="modal-body row">
                <label for="" class="form-label fw-bold  col-md-2">Name :</label>

                <!-- tps -->
                <div class="col-md-10">

                    <ul class="nav nav-tabs" id="myTabCols" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
                                Data
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Type</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="messages-tab" data-bs-toggle="tab" data-bs-target="#messages" type="button" role="tab" aria-controls="messages" aria-selected="false">Parent
                                Table</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="settings-tab" data-bs-toggle="tab" data-bs-target="#settings" type="button" role="tab" aria-controls="settings" aria-selected="false">Children</button>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <!-- s:row-name -->
                            <div class="row mt-3 mb-2">
                                <label for="" class="form-label col-3">Name :</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" wire:model='c_name'>
                                </div>
                            </div>
                            <!-- e:row-name -->
                            <!-- s:row-sel -->
                            <div class="row mt-3 mb-2">
                                <label for="" class="form-label col-3">Select :</label>
                                <div class="col-9">
                                    <input type="checkbox" class="form-check" wire:model='c_sel'>
                                </div>
                            </div>
                            <!-- e:row-sel -->
                            <!-- s:row-if -->
                            <div class="row mt-3 mb-2">
                                <label for="" class="form-label col-3">If :</label>
                                <div class="col-9">
                                    <input type="checkbox" class="form-check" wire:model='c_if'>
                                </div>
                            </div>
                            <!-- e:row-if -->
                            <!-- s:row-c_hidden -->
                            <div class="row mt-3 mb-2">
                                <label for="" class="form-label col-3">Hidden :</label>
                                <div class="col-9">
                                    <input type="checkbox" class="form-check" wire:model='c_hidden'>
                                </div>
                            </div>
                            <!-- e:row-c_hidden -->

                        </div>
                        <!-- tap type -->
                        <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <!-- s:row-type -->
                            <div class="row  mb-2">
                                <label for="" class="form-label col-2">Type :</label>
                                <div class="col-10">
                                    <select class="form-select form-select-lg my-2" aria-label=".form-select-lg example" wire:model='c_type'>
                                        <option selected>Open this select menu</option>

                                        @foreach ($dataType as $item)
                                        <option value="{{ $item->name }}">{{ $item->name }}</option>
                                        @endforeach


                                    </select>
                                </div>
                                <div class="form-check form-check-inline col-5">
                                    <input class="form-check-input" type="checkbox" value="true" wire:model='mostOnly'>

                                    <label class="form-check-label" for="inlineCheckbox1">
                                        {{ ($mostOnly) ?'Most Data Type':'All Data Type'}}
                                    </label>
                                </div>
                            </div>
                            <!-- s:row-type -->
                            <div class="row mt-3 mb-2">
                                <label for="" class="form-label col-3">Lenght :</label>
                                <div class="col-9">
                                    <input type="number" class="form-control" wire:model='c_length'>

                                </div>
                            </div>
                            <!-- e:row-len -->



                            {{-- <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="false"
                                    wire:model='mostOnly'>
                                <label class="form-check-label" for="inlineCheckbox2">Other</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="all"
                                    wire:model='mostOnly'>
                                <label class="form-check-label" for="inlineCheckbox2">All</label>
                            </div> --}}

                        </div>

                        <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">



                            <!-- Parent -->
                            <div class="row mt-5">
                                <label for="" class="form-label fw-bold col-md-3">Table :</label>
                                <div class="col-md-7">
                                    <select wire:model='c_parent' class="form-select">
                                        <option value="">select</option>
                                        @foreach ($tbls as $item)
                                        <option value="{{ $item ->name}}">{{ $item ->name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                                @if ($proj_id>0)

                                @include('livewire.code.strapi.table_create_model')
                                @endif

                            </div>
                            <!-- Rel Type -->
                            <div class="row mt-5">
                                <label for="" class="form-label fw-bold mt-3  col-md-3">Rel Type :</label>
                                <div class="col-md-7">
                                    <select class="form-select form-select-lg my-2" wire:model='rel_type'>

                                        <option selected value="">Open this select menu</option>
                                        <option value="hasOne">One To One(ex:(user)</option>
                                        <option value="hasMany">One To Many(ex:(posts))</option>
                                        <option value="belongsToMany">Many To Many(ex:(users/posts))</option>
                                        <option value="hasManyThrough">HasOne & HasMany Through()</option>
                                        <option value="morphedByMany">Polymorphic Relation()</option>



                                    </select>
                                    <span>{{ $rel_type }}</span>
                                </div>
                            </div>
                            <!-- index -->
                            <div class="row mt-5">
                                <label for="" class="form-label fw-bold mt-3  col-md-3">Index :</label>
                                <div class="col-md-7">
                                    <select class="form-select form-select-lg my-2" wire:model='c_index'>

                                        <option selected value="">Open this select menu</option>

                                        <option value="unique">Unique</option>



                                    </select>

                                </div>
                            </div>

                        </div>
                        <div class="tab-pane" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                            <!-- childs -->
                            <div class="row mt-5 mb-2">
                                <label for="" class="form-label fw-bold  col-md-3">Child :</label>
                                <div class="col-md-7">
                                    <select wire:model='c_child' class="form-select">
                                        <option value="">select</option>
                                        @foreach ($tbls as $item)
                                        <option value="{{ $item ->name}}">{{ $item ->name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                                @if ($proj_id>0)

                                @include('livewire.code.strapi.table_create_model')
                                @endif

                            </div>




                                    <div class="row">
                                        <button type="button"
                                        class="btn btn-info btn-md me-2 col-2"
wire:click='store_child()'
                                        >Add</button>


                                        <table class="table table-hover">

                                            <thead class=" table-dark">
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="">
                                                @foreach ($tbl_childs as $key=> $child)
                                                <tr>
                                                    <td scope="row">{{ $key+1 }}</td>

                                                    <td scope="row">{{ $child->name }}</td>
                                                    <td scope="row">
                                                        <input type="button"
                                                         class="btn btn-danger" value="Del"
                                                         wire:click='destroy_child({{ $child->id }})'>
                                                    </td>
                                                </tr>
                                                @endforeach

                                            </tbody>
                                        </table>



                            </div>


                        </div>
                    </div>

                </div>
            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                @if ($is_new)
                <button type="button" class="btn btn-primary" wire:click='store_col()'>Save </button>
                <button type="button" class="btn btn-secondary" wire:click='clear_col()'>Clear</button>
                @else
                <button type="button" class="btn btn-primary" wire:click='update_col()'>Update </button>
                @endif


            </div>
        </div>
    </div>
</div>
