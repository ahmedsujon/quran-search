<div>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Dropdown Searches</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                        <li class="breadcrumb-item active">Dropdown Searches</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">All Dropdown Values</h4>
                <div class="flex-shrink-0">
                    <a data-bs-toggle="modal" data-bs-target="#myModal" class="btn btn-sm btn-primary">Add New</a>
                </div>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-md-6 col-sm-12 mb-2 sort_cont">
                        <label class="font-weight-normal" style="">Show</label>
                        <select name="sortuserresults" class="sinput" id="" wire:model="sortingValue">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                        <label class="font-weight-normal" style="">entries</label>
                    </div>

                    <div class="col-md-6 col-sm-12 mb-2 search_cont">
                        <label class="font-weight-normal mr-2">Search:</label>
                        <input type="search" class="sinput" placeholder="Search" wire:model="searchTerm" />
                    </div>
                </div>
                <div class="table-responsive table-card">
                    <table class="table table-borderless table-centered align-middle">
                        <thead class="text-muted table-light">
                            <tr>
                                <th scope="col">Search Value</th>
                                <th scope="col">Slug</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($dropdowns->count() > 0)
                                @foreach ($dropdowns as $dropdown)
                                    <tr>
                                        <td>{{ $dropdown->name }}</td>
                                        <td>{{ $dropdown->slug }}</td>
                                        <td class="text-center">
                                            <a href="#" wire:click.prevent='deleteConfirmation({{ $dropdown->id }})' class="btn btn-icon btn-sm p-2 btn-outline-danger btn-rounded"><i class="mdi mdi-delete-forever fs-15"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5" style="text-align: center;">No data available!</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            {{ $dropdowns->links('pagination-links-table') }}
        </div>
    </div>

    {{-- Add Data --}}
    <div id="myModal" wire:ignore.self class="modal zoomIn" tabindex="-1" aria-labelledby="myModalLabel"
        aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">ADD DROPDOWN SEARCHES</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <form wire:submit.prevent="storeData">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="iconrightInput" class="form-label">Name</label>
                                <input type="text" wire:model="name" class="form-control form-control-icon" wire:keyup="generateslug">
                                @error('name')
                                    <span class="text-danger" style="font-size: 12.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="iconrightInput" class="form-label">Slug</label>
                                <input type="text" wire:model="slug" class="form-control form-control-icon">
                                @error('slug')
                                    <span class="text-danger" style="font-size: 12.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
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
