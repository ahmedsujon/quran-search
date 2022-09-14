@section('title')
Matrimonial - Login
@endsection
<div>
    <!-- auth page content -->
    <div class="auth-page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mt-sm-5 mb-4 text-white-50">
                        <div>
                            <a href="index.html" class="d-inline-block auth-logo">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card mt-4">
                        <div class="card-body p-4">
                            <div class="text-center mt-2">
                                <h5 class="text-primary">Welcome Back !</h5>
                                <p class="text-muted">Sign in to continue to Quran Search.</p>
                            </div>
                            <div class="p-2 mt-4">
                                @if (session()->has('error'))
                                <div class="alert alert-danger text-center">{{ session('error') }}</div>
                                @endif
                                @if (session()->has('success'))
                                <div class="alert alert-success text-center">{{ session('success') }}</div>
                                @endif
                                <form wire:submit.prevent='adminLogin'>
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Email</label>
                                        <input type="text" class="form-control" id="username"
                                            placeholder="Enter username" wire:model='email'>
                                        @error('email')
                                        <span class="text-danger" style="font-size: 13px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="password-input">Password</label>
                                        <div class="position-relative auth-pass-inputgroup mb-3">
                                            <input type="password" class="form-control pe-5"
                                                placeholder="Enter password" id="password-input" wire:model='password'>
                                            @error('password')
                                            <span class="text-danger" style="font-size: 13px;">{{ $message }}</span>
                                            @enderror
                                            <button
                                                class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted shadow-none"
                                                type="button" id="password-addon"><i
                                                    class="ri-eye-fill align-middle"></i></button>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <button class="btn btn-success w-100" type="submit">Sign In</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end auth page content -->
</div>