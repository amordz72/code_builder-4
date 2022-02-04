<!-- Button trigger modal -->
<button type="button" class="btn btn-outline-info text-dark col-2" data-bs-toggle="modal"
    data-bs-target="#projectModal">
    New
</button>

<!-- Modal Project -->
<div class="modal fade" wire:ignore.self id="projectModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Project</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body row">
                <label for="" class="form-label fw-bold  col-2">Name :</label>
                <div class="col-10">

                    <input type="text" class="form-control" wire:model='proj_name'>
                </div>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
