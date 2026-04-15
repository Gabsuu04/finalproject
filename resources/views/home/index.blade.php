@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <h1 class="h4 mb-3">Welcome</h1>

            <div class="mb-3">
                <div><strong>Username:</strong> {{ $user->username }}</div>
                <div><strong>Account Type:</strong> {{ ucfirst($user->account_type) }}</div>
            </div>

            <div class="list-group">
                <a class="list-group-item list-group-item-action" href="{{ route('subjects.index') }}">Subject Management</a>
                <a class="list-group-item list-group-item-action" href="{{ route('programs.index') }}">Program Management</a>
                @if($user->account_type === 'admin')
                    <a class="list-group-item list-group-item-action" href="{{ route('users.index') }}">User Management</a>
                @endif
                <a class="list-group-item list-group-item-action" href="{{ route('password.edit') }}">Change Password</a>
            </div>
        </div>
    </div>
@endsection
