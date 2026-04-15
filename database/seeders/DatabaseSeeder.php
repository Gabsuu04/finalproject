<?php

namespace Database\Seeders;

use App\Models\Program;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::withoutEvents(function (): void {
            $admin = User::query()->updateOrCreate(
                ['username' => 'gab'],
                [
                    'password' => Hash::make('gab123'),
                    'account_type' => 'admin',
                    'created_on' => now(),
                    'created_by' => 1,
                ]
            );

            if (!$admin->created_by) {
                $admin->created_by = $admin->id;
                $admin->save();
            }
        });

        Subject::query()->updateOrCreate(['code' => 'CS101'], ['title' => 'Introduction to Programming', 'unit' => 3]);
        Subject::query()->updateOrCreate(['code' => 'MATH101'], ['title' => 'College Algebra', 'unit' => 3]);
        Subject::query()->updateOrCreate(['code' => 'ENG101'], ['title' => 'English Communication', 'unit' => 3]);

        Program::query()->updateOrCreate(['code' => 'BSCS'], ['title' => 'Bachelor of Science in Computer Science', 'years' => 4]);
        Program::query()->updateOrCreate(['code' => 'BSIT'], ['title' => 'Bachelor of Science in Information Technology', 'years' => 4]);
        Program::query()->updateOrCreate(['code' => 'BSA'], ['title' => 'Bachelor of Science in Accountancy', 'years' => 4]);
    }
}
