<div class="container ">

    @section('title')
    Create Bank Code
    @endsection

    @section('style')
    <style>
        * {
            font-weight: bold;

        }


        input {

            font-size: 22px;
        }
        textarea
         {

padding: 5px  !important;

            font-size: 18px !important;
        }

        select option {
            font-size: 1.2rem;
        }

    </style>
    @endsection
    <div class="row">
        <div class="col-md-7">
            <div class="row">
                <input type="hidden" wire:model='hidden_id'>
            </div>


            @if ($is_new_lang)
            <div class="row mb-3">
                <label class="col-sm-3 form-label">Lang :</label>
                <div class="col-sm-7">
                    <input type="text" wire:model="name_lang" class="form-control fw-bold" placeholder="Lang Name">
                    @error('lang_name') <span class="error text-danger fw-bold">{{ $message }}</span> @enderror
                </div>
                <button wire:click='save_lang' class="btn btn-info col-2">{{ ($name_lang)==''?'Cancel':'Save' }}</button>

                @else

                <!-- Langs -->
                <div class="row mb-3">
                    <label class="col-sm-3 form-label">Lang :</label>
                    <div class="col-sm-7">
                        <select class="form-select" wire:model='lang_id'>
                            <option selected>Open this select menu</option>

                            @foreach ($langs as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach


                        </select>
                        @error('lang_id') <span class="error text-danger fw-bold">{{ $message }}</span> @enderror

                        <!-- name -->

                        {{-- @error('title') <span class="error text-danger fw-bold">{{ $message }}</span> @enderror --}}
                    </div>
                    <button wire:click='launchHqModal' class="btn btn-info col-2">New Lang</button>

                    @endif



                </div>




                <!-- name -->
                <div class="row mb-3">
                    <label class="col-sm-3 form-label">Title :</label>
                    <div class="col-sm-9">
                        <input type="text" wire:model="title" class="form-control fw-bold" placeholder="title">
                        @error('title') <span class="error text-danger fw-bold">{{ $message }}</span> @enderror
                    </div>
                </div>
                <!-- db -->
                <div class="row mb-3">
                    <label class="col-sm-3 form-label">Body :</label>
                    <div class="col-sm-9">
                        <div class="form-floating">
                            <textarea class="form-control fw-bold"
                            wire:model="body" style="height: 150px"></textarea>

                        </div>

                        @error('body') <span class="error text-danger fw-bold">{{ $message }}</span> @enderror
                    </div>
                </div>
                <!-- url -->
                <div class="row mb-3">
                    <label class="col-sm-3 form-label">Notes :</label>
                    <div class="col-sm-9">
                        <div class="form-floating">
                            <textarea class="form-control  fw-bold" wire:model="notes" style="height: 100px"></textarea>

                        </div>
                        @error('notes') <span class="error text-danger fw-bold">{{ $message }}</span> @enderror
                    </div>

                </div>

                <div class="btn-group ">
                    @if ($is_new )
                    <button type="button" class="btn btn-success col-3 me-1" wire:click='store'>Save</button>

                    @else
                    <button type="button" class="btn btn-warning col-3 me-1" wire:click='update'>Update</button>
                    <button type="button" class="btn btn-danger col-3 me-1" wire:click='destroy'>Delete</button>

                    @endif
                    <button type="button" class="btn btn-secondary col-3 me-1" wire:click='clear'>Clear</button>

                </div>
            </div>


            <div class="col-md-5">

                <table class="table text-center table-responsive">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Lang</th>
                            <th scope="col">Body</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($banks as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->lang->name }}</td>
                            <td style="
                            width: 320px;
                           max-width: 320px;
                                        overflow: hidden;
                                        white-space: wrap;
                        ">{{ $item->body }}</td>

                            <td>
                                <button class="btn btn-warning btn-sm" wire:click='edit({{  $item->id }})'>Edit</button>
                            </td>
                        </tr>
                        @endforeach




                    </tbody>
                </table>

                <div class="flex mt-2">
                    {{$banks->links()}}
                </div>
            </div>

        </div>



    </div>
