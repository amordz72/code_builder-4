<!-- Button trigger modal -->
<button type="button" class="btn btn-sm
 btn-outline-info text-dark col-2"
 data-bs-toggle="modal"
    data-bs-target="#tableModal">
    New
</button>

<!-- Modal Project -->
<div class="modal fade" wire:ignore.self id="tableModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Table</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- name -->
            <div class="modal-body row">
                <label for="" class="form-label fw-bold  col-md-2">Name :</label>
                <div class="col-md-10">

                    <input type="text" class="form-control" wire:model='tbl_name'>
                </div>
            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" wire:click='Store_Tbl()'>Save changes</button>
            </div>
        </div>
    </div>
</div>
