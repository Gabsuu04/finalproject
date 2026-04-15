@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h4 mb-0">Change Password</h1>
        <a class="btn btn-secondary btn-sm" href="{{ route('home') }}">Back to home</a>
    </div>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label" for="current_password">Current Password</label>
                    <input class="form-control" type="password" id="current_password" name="current_password" required>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="new_password">New Password</label>
                    <input class="form-control" type="password" id="new_password" name="new_password" required>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="new_password_confirmation">Confirm New Password</label>
                    <input class="form-control" type="password" id="new_password_confirmation" name="new_password_confirmation" required>
                </div>

                <button class="btn btn-primary" type="submit">Save New Password</button>
                <a class="btn btn-secondary" href="{{ route('home') }}">Cancel</a>
            </form>
        </div>
    </div>
@endsection
