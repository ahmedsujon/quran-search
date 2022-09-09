@section('title')
    NzCoding - Seller Registration
@endsection
<div>
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card mt-5">
                <div class="card-header text-center">
                    <h5><strong>Seller Registration</strong></h5>
                </div>
                <div class="card-body">
                    @if (session()->has('success'))
                        <div class="alert alert-success text-center">{{ session('success') }}</div>
                    @endif
                    <form wire:submit.prevent='sellerRegistration'>
                        <div class="form-group">
                            <label for="exampleInputEmail1">First Name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" wire:model='first_name'>
                            @error('first_name')
                                <span class="text-danger" style="font-size: 13px;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">First Name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" wire:model='last_name'>
                            @error('last_name')
                                <span class="text-danger" style="font-size: 13px;">{{ $message }}</span>
                            @enderror
                        </div>
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
                        <div class="form-group mb-4">
                            <label for="exampleInputPassword1">Confirm Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" wire:model='password_confirmation'>
                            @error('password_confirmation')
                                <span class="text-danger" style="font-size: 13px;">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Sign up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
