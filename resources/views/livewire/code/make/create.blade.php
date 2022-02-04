<div class="container">
    @section('title')
    Make
    @endsection
    {{-- <h1 class="text-center">{{$title}}</h1> --}}

    <div class="row">

        <!-- col-4 -->
        <div class="col-md-4">

            <div class="mb-2">
                <!-- use_all -->
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" wire:model='use_a' wire:change='set_cookie("use_a","{{($use_a)==1 ? '0':'1'  }}")'>
                    <label class="form-check-label" for="inlineCheckbox1">All</label>


                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" wire:model='use_i' wire:change='set_cookie("use_i","{{($use_i)=='1' ? '0':'1'  }}")'>
                    <label class="form-check-label" for="inlineCheckbox1">Index</label>


                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" wire:model='use_c' wire:change='set_cookie("use_c","{{($use_c)=='1' ? '0':'1'  }}")'>
                    <label class="form-check-label" for="inlineCheckbox2">Create</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" wire:model='use_e' wire:change='set_cookie("use_e","{{($use_e)=='1' ? '0':'1'  }}")'>
                    <label class="form-check-label" for="inlineCheckbox2">Edit</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" wire:model='use_s' wire:change='set_cookie("use_s","{{($use_s)=='1' ? '0':'1'  }}")'>
                    <label class="form-check-label" for="inlineCheckbox2">Show</label>
                </div>


                <!-- code :select -->
                <div class="row mb-3">

                    <label class="form-label col-sm-3 fw-bold">Code</label>

                    <div class="col-sm-9 fw-bold">
                        <select class="form-select" wire:model='step' wire:change='make_livewire_component' wire:text='$step_text'>
                            <option selected class="fw-bold">Select Menu</option>
                            <option value="7">Create Project</option>
                            <option value="1">Create Component</option>
                            <option value="2">Route</option>
                            <option value="3">Extends Code</option>
                            <option value="4">Links</option>
                            <option value="5">Model</option>
                            <option value="6">Page Title On Blade</option>

                        </select>
                    </div>
                </div>

                <!-- name -->
                <div class="row mb-3">
                    <div class="col-sm-6">
                        <input type="text" wire:model="name" class="form-control fw-bold" placeholder="Name" wire:change='set_cookie("name","{{ $name}}")'>
                        @error('name') <span class="error text-danger fw-bold">{{ $message }}</span> @enderror
                    </div>
                    <!-- dir -->
                    <div class="col-sm-6">
                        <input type="text" wire:model="dir" class="form-control fw-bold" placeholder="Dir" wire:change='set_cookie("dir","{{ $dir}}")'>
                        {{-- @error('dir') <span class="error text-danger fw-bold">{{ $message }}</span> @enderror --}}
                    </div>
                </div>


                <button type="button" class="btn btn-primary" wire:click='get_str'>Get Str</button>
                <button type="button" class="btn btn-primary" wire:click='clear()'>Clear</button>
                <button type="button" class="btn btn-primary" onclick='copy()'>Copy</button>
<button type="button" class="btn btn-primary" wire:click='save_file()'>Save File</button>

            </div>

        </div>




        <!-- col-8 -->
        <div class="col-md-8">

            <h3 class="text-center"><span> Code</span> </h3>

            <div class="form-floating">
<textarea class="form-control fw-bold m-2 fs-5"
 placeholder="Code here" wire:model='body' style="height: 300px" id="myInput"></textarea>

            </div>

        </div>

    </div>



    <script>
        function copy() {
            var copyText = document.getElementById('myInput')
            copyText.select();
            document.execCommand('copy')

            console.log('Copied Text')
        }

    </script>




</div>
