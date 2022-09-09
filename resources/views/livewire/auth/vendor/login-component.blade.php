@section('title')
    NzCoding - Seller Login
@endsection
<div>
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card mt-5">
                <div class="card-header">
                    <h5><strong>Seller login</strong></h5>
                </div>
                <div class="card-body">
                    @if (session()->has('error'))
                        <div class="alert alert-danger text-center">{{ session('error') }}</div>
                    @endif
                    @if (session()->has('success'))
                        <div class="alert alert-success text-center">{{ session('success') }}</div>
                    @endif
                    <form wire:submit.prevent='adminLogin'>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" wire:model='email'>
                            @error('email')
                                <span class="text-danger" style="font-size: 13px;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" wire:model='password'>
                            @error('password')
                                <span class="text-danger" style="font-size: 13px;">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
