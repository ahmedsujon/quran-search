@section('title')
    Customer Dashboard
@endsection
<div>
    Customer Dashboard

    <a class="dropdown-item" href="{{ route('user.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
    <form id="logout-form" style="display: none;" method="POST" action="{{ route('user.logout') }}">
        @csrf
    </form>
</div>
