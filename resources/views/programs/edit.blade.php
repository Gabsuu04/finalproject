@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h4 mb-0">Edit Program</h1>
        <a class="btn btn-secondary btn-sm" href="{{ route('programs.index') }}">Back to list</a>
    </div>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('programs.update', $program) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label" for="code">Code</label>
                    <input class="form-control" type="text" id="code" name="code" value="{{ old('code', $program->code) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="title">Title</label>
                    <input class="form-control" type="text" id="title" name="title" value="{{ old('title', $program->title) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="years">Years</label>
                    <input class="form-control" type="number" id="years" name="years" min="1" max="6" value="{{ old('years', $program->years) }}" required>
                    <div class="form-text">Must be between 1 and 6.</div>
                </div>

                <button class="btn btn-primary" type="submit">Update Program</button>
                <a class="btn btn-secondary" href="{{ route('programs.index') }}">Cancel</a>
            </form>
        </div>
    </div>
@endsection
