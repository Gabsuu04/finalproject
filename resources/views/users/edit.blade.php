@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h4 mb-0">Edit User</h1>
        <a class="btn btn-secondary btn-sm" href="{{ route('users.index') }}">Back to list</a>
    </div>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('users.update', $user) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label" for="username">Username</label>
                    <input class="form-control" type="text" id="username" name="username" value="{{ old('username', $user->username) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="account_type">Account Type</label>
                    <select class="form-select" id="account_type" name="account_type" required>
                        <option value="">Select Account Type</option>
                        @foreach($accountTypes as $type)
                            <option value="{{ $type }}" @selected(old('account_type', $user->account_type) === $type)>{{ ucfirst($type) }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="alert alert-info">
                    <strong>Note:</strong> To change this user's password, have the user use the Change Password feature.
                </div>

                <button class="btn btn-primary" type="submit">Update User</button>
                <a class="btn btn-secondary" href="{{ route('users.index') }}">Cancel</a>
            </form>
        </div>
    </div>
@endsection
