<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProgramRequest;
use App\Http\Requests\UpdateProgramRequest;
use App\Models\Program;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProgramController extends Controller
{
    public function index(): View
    {
        return view('programs.index', [
            'programs' => Program::query()->orderBy('code')->get(),
        ]);
    }

    public function create(): View
    {
        return view('programs.create');
    }

    public function store(StoreProgramRequest $request): RedirectResponse
    {
        Program::query()->create($request->validated());

        return redirect()->route('programs.index')->with('success', 'Program created successfully.');
    }

    public function edit(Program $program): View
    {
        return view('programs.edit', [
            'program' => $program,
        ]);
    }

    public function update(UpdateProgramRequest $request, Program $program): RedirectResponse
    {
        $program->update($request->validated());

        return redirect()->route('programs.index')->with('success', 'Program updated successfully.');
    }
}
