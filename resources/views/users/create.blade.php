@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h4 mb-0">Add New User</h1>
        <a class="btn btn-secondary btn-sm" href="{{ route('users.index') }}">Back to list</a>
    </div>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('users.store') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label" for="username">Username</label>
                    <input class="form-control" type="text" id="username" name="username" value="{{ old('username') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="password">Password</label>
                    <input class="form-control" type="password" id="password" name="password" required>
                    <div class="form-text">Minimum 6 characters.</div>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="password_confirmation">Confirm Password</label>
                    <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" required>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="account_type">Account Type</label>
                    <select class="form-select" id="account_type" name="account_type" required>
                        <option value="">Select Account Type</option>
                        @foreach($accountTypes as $type)
                            <option value="{{ $type }}" @selected(old('account_type') === $type)>{{ ucfirst($type) }}</option>
                        @endforeach
                    </select>
                </div>

                <button class="btn btn-primary" type="submit">Create User</button>
                <a class="btn btn-secondary" href="{{ route('users.index') }}">Cancel</a>
            </form>
        </div>
    </div>
@endsection
