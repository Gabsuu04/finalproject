@extends('layouts.app')

@section('content')
    <style>
        .home-dashboard-wrap {
            max-width: 980px;
            margin: 0 auto;
        }

        .home-dashboard-card {
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            box-shadow: 0 10px 26px rgba(15, 23, 42, 0.06);
        }

        .home-dashboard-title {
            color: #0f172a;
            letter-spacing: 0.01em;
        }

        .home-dashboard-meta {
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            background: #f8fafc;
            padding: 0.9rem 1rem;
            color: #1f2937;
        }

        .home-dashboard-links .list-group-item {
            border-color: #e2e8f0;
            font-weight: 500;
            color: #0f172a;
            transition: background-color 0.15s ease, border-color 0.15s ease, transform 0.15s ease;
        }

        .home-dashboard-links .list-group-item:hover {
            background: #f8fafc;
            border-color: #cbd5e1;
            transform: translateX(2px);
        }
    </style>

    <div class="home-dashboard-wrap">
        <div class="card home-dashboard-card">
            <div class="card-body p-4 p-md-5">
                <h1 class="h3 mb-4 home-dashboard-title">Welcome</h1>

                <div class="home-dashboard-meta mb-4">
                    <div><strong>Username:</strong> {{ $user->username }}</div>
                    <div><strong>Account Type:</strong> {{ ucfirst($user->account_type) }}</div>
                </div>

                <div class="list-group home-dashboard-links">
                    <a class="list-group-item list-group-item-action py-3" href="{{ route('subjects.index') }}">Subject Management</a>
                    <a class="list-group-item list-group-item-action py-3" href="{{ route('programs.index') }}">Program Management</a>
                    @if($user->account_type === 'admin')
                        <a class="list-group-item list-group-item-action py-3" href="{{ route('users.index') }}">User Management</a>
                    @endif
                    <a class="list-group-item list-group-item-action py-3" href="{{ route('password.edit') }}">Change Password</a>
                </div>
            </div>
        </div>
    </div>
@endsection
