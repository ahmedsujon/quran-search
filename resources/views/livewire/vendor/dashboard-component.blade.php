@section('title')
    Vendor Dashboard
@endsection
<div>
    Vendor Dashboard

    <a class="dropdown-item" href="{{ route('vendor.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
    <form id="logout-form" style="display: none;" method="POST" action="{{ route('vendor.logout') }}">
        @csrf
    </form>
</div>
