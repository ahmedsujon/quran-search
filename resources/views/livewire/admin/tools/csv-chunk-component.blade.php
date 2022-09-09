<div>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">CSV Chunk</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                        <li class="breadcrumb-item active">CSV Chunk</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Chunk Csv</h4>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('admin.chunkCSVPost') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="password" class="form-label">Data /File</label>
                                <input type="number" id="data_per_file" name="data_per_file" class="form-control">

                                @error('data_per_file')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="password" class="form-label">Profile Image</label>
                                <input type="file" id="excelfile" name="excelfile" class="form-control">

                                @error('excelfile')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        window.addEventListener('closeModal', event => {
            $('#myModal').modal('hide');
        });
        
        window.addEventListener('adminDeleted', event => {
            Swal.fire({
                title: "Deleted!",
                text: "Your file has been deleted.",
                icon: "success",
                confirmButtonClass: "btn btn-primary w-xs mt-2",
                buttonsStyling: !1,
            });
        });
    </script>
@endpush
