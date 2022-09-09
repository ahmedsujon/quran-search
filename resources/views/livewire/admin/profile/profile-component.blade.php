<div>
    <div class="position-relative mx-n4 mt-n4">
        <div class="profile-wid-bg profile-setting-img">
            <img src="assets/images/profile-bg.jpg" class="profile-wid-img" alt="">
        </div>
        <div class="row">
            <div class="col-xxl-3">
                <div class="card mt-n5">
                    <div class="card-body p-4">
                        <div class="text-center">
                            <div class="profile-user position-relative d-inline-block mx-auto  mb-4">

                                @if (Auth::guard('admin')->user()->avatar)
                                <img src="{{ asset('uploads/profile') }}/{{ Auth::guard('admin')->user()->avatar }}"
                                    alt="user"
                                    class="rounded-circle avatar-xl img-thumbnail user-profile-image  shadow">
                                @else
                                <img src="{{ asset('assets/admin/images/users/avatar-1.jpg') }}"
                                    class="rounded-circle avatar-xl img-thumbnail user-profile-image  shadow"
                                    alt="user-profile-image">
                                @endif
                                <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                                    <input id="profile-img-file-input" type="file" class="profile-img-file-input">
                                </div>
                            </div>
                            <h5 class="fs-16 mb-1">{{ Auth::guard('admin')->user()->first_name }} {{ Auth::guard('admin')->user()->last_name }}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <!--end col-->
            <div class="col-xxl-9">
                <div class="card mt-xxl-n5">
                    <div class="card-header">
                        <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab">
                                    <i class="fas fa-home"></i> Personal Details
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body p-4">
                        <div class="tab-content">
                            <div class="tab-pane active" id="personalDetails" role="tabpanel">
                                <form wire:submit.prevent="updateProfile">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="firstnameInput" class="form-label">First Name</label>
                                                <input type="text" wire:model="first_name" class="form-control"
                                                    id="firstnameInput" placeholder="Enter your firstname">
                                                @error('first_name')
                                                <span class="text-danger" style="font-size: 12.5px;">{{ $message
                                                    }}</span>
                                                <br>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="lastnameInput" class="form-label">Last Name</label>
                                                <input type="text" wire:model="last_name" class="form-control"
                                                    id="lastnameInput" placeholder="Enter your lastname">
                                                @error('last_name')
                                                <span class="text-danger" style="font-size: 12.5px;">{{ $message
                                                    }}</span>
                                                <br>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="phonenumberInput" class="form-label">Phone Number</label>
                                                <input type="text" wire:model="phone" class="form-control"
                                                    id="phonenumberInput" placeholder="Enter your phone number">
                                                @error('phone')
                                                <span class="text-danger" style="font-size: 12.5px;">{{ $message
                                                    }}</span>
                                                <br>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="emailInput" class="form-label">Email Address</label>
                                                <input type="email" wire:model="email" class="form-control"
                                                    id="emailInput" placeholder="Enter your email">
                                                @error('email')
                                                <span class="text-danger" style="font-size: 12.5px;">{{ $message
                                                    }}</span>
                                                <br>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="emailInput" class="form-label">Password</label>
                                                <input type="password" wire:model="password" class="form-control"
                                                    id="password" placeholder="Enter password">
                                                @error('password')
                                                <span class="text-danger" style="font-size: 12.5px;">{{ $message
                                                    }}</span>
                                                <br>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="password" class="form-label">Confirm Password</label>
                                                <input type="password" wire:model="confirm_password"
                                                    class="form-control" id="password"
                                                    placeholder="Enter confirm password">
                                                @error('confirm_password')
                                                <span class="text-danger" style="font-size: 12.5px;">{{ $message
                                                    }}</span>
                                                <br>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="password" class="form-label">Profile Image</label>
                                                <input type="file" wire:model="avatar" class="form-control">
                                                @error('avatar')
                                                <span class="text-danger" style="font-size: 12.5px;">{{ $message
                                                    }}</span>
                                                <br>
                                                @enderror
                                                <div wire:loading="avatar" wire:target="avatar" wire:key="avatar"
                                                    style="font-size: 12.5px;" class="mr-2"><i
                                                        class="fa fa-spinner fa-spin mt-3 ml-2"></i> Uploading</div>

                                                @if ($avatar)
                                                <img src="{{ $avatar->temporaryUrl() }}"
                                                    class="mt-2 mb-2 rounded-circle" width="85" height="85" />
                                                @elseif($uploadedAvatar != '')
                                                <img src="{{ asset('uploads/profile') }}/{{ $uploadedAvatar }}"
                                                    class="mt-2 mb-2 rounded-circle" width="85" height="85" />
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="hstack gap-2 justify-content-end">
                                                <button type="submit" class="btn btn-primary">Updates</button>
                                                <button type="button" class="btn btn-soft-success">Cancel</button>
                                            </div>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
    </div>