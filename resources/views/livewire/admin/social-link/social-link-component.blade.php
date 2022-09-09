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
    <form wire:submit.prevent='storeData'>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-4">
                            <div class="flex-grow-1">
                                <h5 class="card-title mb-0">Social Platform Link</h5>
                            </div>
                            <div class="flex-shrink-0">
                                <a href="javascript:void(0);" class="badge bg-light text-primary fs-12"><i
                                        class="ri-add-fill align-bottom me-1"></i> Add</a>
                            </div>
                        </div>
                        <div class="mb-3 d-flex">
                            <div class="avatar-xs d-block flex-shrink-0 me-3">
                                <span
                                    class="btn btn-outline-primary btn-icon rounded-circle waves-effect waves-light shadow-none">
                                    <i class="ri-facebook-circle-fill"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" wire:model='facebook' placeholder="Facebook"
                                value="{{ $facebook }}">
                        </div>
                        <div class="mb-3 d-flex">
                            <div class="avatar-xs d-block flex-shrink-0 me-3">
                                <span
                                    class="btn btn-outline-primary btn-icon rounded-circle waves-effect waves-light shadow-none">
                                    <i class="ri-youtube-fill"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" wire:model='youtube' placeholder="YouTube" value="{{ $youtube }}">
                        </div>
                        <div class="mb-3 d-flex">
                            <div class="avatar-xs d-block flex-shrink-0 me-3">
                                <span
                                    class="btn btn-outline-primary btn-icon rounded-circle waves-effect waves-light shadow-none">
                                    <i class="ri-twitter-fill"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" wire:model='twitter' placeholder="Twitter" value="{{ $twitter }}">
                        </div>
                        <div class="mb-3 d-flex">
                            <div class="avatar-xs d-block flex-shrink-0 me-3">
                                <span
                                    class="btn btn-outline-primary btn-icon rounded-circle waves-effect waves-light shadow-none">
                                    <i class="ri-linkedin-fill"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" wire:model='linkedin' placeholder="Linkedin"
                                value="{{ $linkedin }}">
                        </div>
                        <div class="mb-3 d-flex">
                            <div class="avatar-xs d-block flex-shrink-0 me-3">
                                <span
                                    class="btn btn-outline-primary btn-icon rounded-circle waves-effect waves-light shadow-none">
                                    <i class="ri-whatsapp-fill"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" wire:model='whatsapp' placeholder="WhatsApp"
                                value="{{ $whatsapp }}">
                        </div>
                        <div class="mb-3 d-flex">
                            <div class="avatar-xs d-block flex-shrink-0 me-3">
                                <span
                                    class="btn btn-outline-primary btn-icon rounded-circle waves-effect waves-light shadow-none">
                                    <i class="ri-pinterest-fill"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" wire:model='pinterest' placeholder="Pinterest"
                                value="{{ $pinterest }}">
                        </div>
                        <div class="mb-3 d-flex">
                            <div class="avatar-xs d-block flex-shrink-0 me-3">
                                <span
                                    class="btn btn-outline-primary btn-icon rounded-circle waves-effect waves-light shadow-none">
                                    <i class="ri-instagram-fill"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" wire:model='instagram' placeholder="Instagram"
                                value="{{ $instagram }}">
                        </div>
                    </div>
                </div>
                <!--end card-->
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-4">
                            <div class="flex-grow-1">
                                <h5 class="card-title mb-0">Social Platform Link</h5>
                            </div>
                            <div class="flex-shrink-0">
                                <a href="javascript:void(0);" class="badge bg-light text-primary fs-12"><i
                                        class="ri-add-fill align-bottom me-1"></i> Add</a>
                            </div>
                        </div>
                        <div class="mb-3 d-flex">
                            <div class="avatar-xs d-block flex-shrink-0 me-3">
                                <span
                                    class="btn btn-outline-primary btn-icon rounded-circle waves-effect waves-light shadow-none">
                                    <i class="ri-snapchat-fill"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" wire:model='snapchat' placeholder="Snapchat"
                                value="{{ $snapchat }}">
                        </div>
                        <div class="mb-3 d-flex">
                            <div class="avatar-xs d-block flex-shrink-0 me-3">
                                <span
                                    class="btn btn-outline-primary btn-icon rounded-circle waves-effect waves-light shadow-none">
                                    <i class="ri-wechat-fill"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" wire:model='wechat' placeholder="WeChat" value="{{ $wechat }}">
                        </div>
                        <div class="mb-3 d-flex">
                            <div class="avatar-xs d-block flex-shrink-0 me-3">
                                <span
                                    class="btn btn-outline-primary btn-icon rounded-circle waves-effect waves-light shadow-none">
                                    <i class="ri-telegram-fill"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" wire:model='telegram' placeholder="Telegram"
                                value="{{ $telegram }}">
                        </div>
                        <div class="mb-3 d-flex">
                            <div class="avatar-xs d-block flex-shrink-0 me-3">
                                <span
                                    class="btn btn-outline-primary btn-icon rounded-circle waves-effect waves-light shadow-none">
                                    <i class="ri-reddit-fill"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" wire:model='reddit' placeholder="Reddit" value="{{ $reddit }}">
                        </div>
                        <div class="mb-3 d-flex">
                            <div class="avatar-xs d-block flex-shrink-0 me-3">
                                <span
                                    class="btn btn-outline-primary btn-icon rounded-circle waves-effect waves-light shadow-none">
                                    <i class="ri-skype-fill"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" wire:model='skype' placeholder="Skype" value="{{ $skype }}">
                        </div>
                        <div class="mb-3 d-flex">
                            <div class="avatar-xs d-block flex-shrink-0 me-3">
                                <span
                                    class="btn btn-outline-primary btn-icon rounded-circle waves-effect waves-light shadow-none">
                                    <i class="ri-github-fill"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" wire:model='github' placeholder="Github" value="{{ $github }}">
                        </div>
                        <div class="mb-3 d-flex">
                            <div class="avatar-xs d-block flex-shrink-0 me-3">
                                <span
                                    class="btn btn-outline-primary btn-icon rounded-circle waves-effect waves-light shadow-none">
                                    <i class="ri-camera-lens-line"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" wire:model='website' placeholder="Website" value="{{ $website }}">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Chnages</button>
                </div>
            </div>
        </div>
    </form>
    <div>