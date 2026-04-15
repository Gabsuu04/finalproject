@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h4 mb-0">Programs</h1>
        @if(in_array(auth()->user()->account_type, ['admin', 'staff'], true))
            <a class="btn btn-primary btn-sm" href="{{ route('programs.create') }}">Add Program</a>
        @endif
    </div>

    <div class="card">
        <div class="table-responsive">
            <table class="table table-striped mb-0">
                <thead>
                <tr>
                    <th>Code</th>
                    <th>Title</th>
                    <th class="text-end">Years</th>
                    @if(in_array(auth()->user()->account_type, ['admin', 'staff'], true))
                        <th class="text-end">Action</th>
                    @endif
                </tr>
                </thead>
                <tbody>
                @forelse($programs as $program)
                    <tr>
                        <td>{{ $program->code }}</td>
                        <td>{{ $program->title }}</td>
                        <td class="text-end">{{ $program->years }}</td>
                        @if(in_array(auth()->user()->account_type, ['admin', 'staff'], true))
                            <td class="text-end">
                                <a class="btn btn-outline-secondary btn-sm" href="{{ route('programs.edit', $program) }}">Edit</a>
                            </td>
                        @endif
                    </tr>
                @empty
                    <tr>
                        <td colspan="{{ in_array(auth()->user()->account_type, ['admin', 'staff'], true) ? 4 : 3 }}" class="text-center text-muted py-4">No programs found.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
