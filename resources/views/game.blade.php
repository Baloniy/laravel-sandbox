@extends('layouts.app')

@section('title') Game @endsection

@section('content')
    <div>
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
            </a>

            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li><a href="{{ route('game.history') }}" class="nav-link px-2 link-dark">History</a></li>
                <li><a href="{{ route('link.generate') }}" class="nav-link px-2 link-dark">Generate new link</a></li>
                <li><a href="{{ route('link.deactivate') }}" class="nav-link px-2 link-dark">Deactivate link</a></li>
            </ul>

            <div class="col-md-3 text-end">
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </header>
        <form method="post" action="{{ route('game.play') }}">
            @csrf
            <button type="submit" class="btn btn-primary">Im feeling lucky</button>
        </form>
        @isset($result)
            <div class="">
                Result: {{ $result }} <br />
                Number: {{ $number }} <br />
                Sum: {{ $sum }} <br />
            </div>
        @endif
    </div>
@endsection
