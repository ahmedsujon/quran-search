<div>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Applications</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                        <li class="breadcrumb-item active">Applications</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-4">
                        <div class="flex-grow-1">
                            <h5 class="card-title mb-0">Footer Setting</h5>
                        </div>
                    </div>
                    <form wire:submit.prevent='updateHeader'>
                        <div class="mb-3 row">
                            <label for="example-number-input" class="col-sm-3 col-form-label">Footer Logo <br>
                                <small class="text-muted">(206x48)</small></label>
                            <div class="col-sm-9">
                                <input class="form-control" type="file" wire:model="footer_logo">
                                @error('footer_logo')
                                <span class="text-danger" style="font-size: 12.5px;">{{ $message }}</span>
                                <br>
                                @enderror
                                <div wire:loading="footer_logo" wire:target="footer_logo" wire:key="footer_logo"
                                    style="font-size: 12.5px;" class="mr-2"><i
                                        class="fa fa-spinner fa-spin mt-3 ml-2"></i> Uploading</div>
                                @if ($footer_logo)
                                <img src="{{ $footer_logo->temporaryUrl() }}" class="mt-2 mb-2" width="206" />
                                @elseif($uploadedfooter_logo != '')
                                <img src="{{ asset('uploads/logo') }}/{{ $uploadedfooter_logo }}" class="mt-2 mb-2"
                                    width="206" />
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row mt-4">
                            <div class="col-md-12" style="text-align: right;">
                                <button class="btn btn-primary" style="width: 100px;">{!!
                                    loadingStateWithText('updateHeader', 'Update') !!}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div>