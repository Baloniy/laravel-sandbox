@extends('layouts.app')

@section('title') Register @endsection

@section('content')
    <div class="w-100 m-auto" style="padding: 15px; max-width: 350px;">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('register') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone number</label>
                <input type="number" class="form-control" id="phone" name="phone" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a  href="{{ route('login') }}" class="btn btn-primary">Login</a>
        </form>
    </div>
@endsection
