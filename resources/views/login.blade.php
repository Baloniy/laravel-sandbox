@extends('layouts.app')

@section('title') Login @endsection

@section('content')
    <div class="w-100 m-auto" style="padding: 15px; max-width: 350px;">
        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
@endsection
