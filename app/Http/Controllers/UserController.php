<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class UserController extends Controller
{
    private const ACCOUNT_TYPES = ['admin', 'staff', 'teacher', 'student'];

    public function index(): View
    {
        return view('users.index', [
            'users' => User::query()->orderBy('username')->get(),
        ]);
    }

    public function create(): View
    {
        return view('users.create', [
            'accountTypes' => self::ACCOUNT_TYPES,
        ]);
    }

    public function store(StoreUserRequest $request): RedirectResponse
    {
        $data = $request->validated();

        User::query()->create([
            'username' => $data['username'],
            'password' => $data['password'],
            'account_type' => $data['account_type'],
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function edit(User $user): View
    {
        return view('users.edit', [
            'user' => $user,
            'accountTypes' => self::ACCOUNT_TYPES,
        ]);
    }

    public function update(UpdateUserRequest $request, User $user): RedirectResponse
    {
        $data = $request->validated();

        $user->update([
            'username' => $data['username'],
            'account_type' => $data['account_type'],
        ]);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }
}
