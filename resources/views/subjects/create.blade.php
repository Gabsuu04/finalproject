@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h4 mb-0">Add New Subject</h1>
        <a class="btn btn-secondary btn-sm" href="{{ route('subjects.index') }}">Back to list</a>
    </div>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('subjects.store') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label" for="code">Code</label>
                    <input class="form-control" type="text" id="code" name="code" value="{{ old('code') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="title">Title</label>
                    <input class="form-control" type="text" id="title" name="title" value="{{ old('title') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="unit">Unit</label>
                    <input class="form-control" type="number" id="unit" name="unit" min="1" value="{{ old('unit') }}" required>
                </div>

                <button class="btn btn-primary" type="submit">Create Subject</button>
                <a class="btn btn-secondary" href="{{ route('subjects.index') }}">Cancel</a>
            </form>
        </div>
    </div>
@endsection
