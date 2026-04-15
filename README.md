# School Management System (Laravel)

This is a Laravel rebuild of the “Exercise 2” School Management System.

## Features

- Login / Logout (session-based)
- Role-based access control (`admin`, `staff`, `teacher`, `student`)
- Subjects: list, add, edit
- Programs: list, add, edit
- Users (admin only): list, add, edit
- Change password (all logged-in users)

## Access Rules

| Feature | Admin | Staff | Teacher | Student |
|--------:|:-----:|:-----:|:-------:|:-------:|
| View programs | ✅ | ✅ | ✅ | ✅ |
| Add/Edit programs | ✅ | ✅ | ❌ | ❌ |
| View subjects | ✅ | ✅ | ✅ | ✅ |
| Add/Edit subjects | ✅ | ✅ | ❌ | ❌ |
| User management | ✅ | ❌ | ❌ | ❌ |
| Change own password | ✅ | ✅ | ✅ | ✅ |

## Database

Database name: `school`

Tables used (same design as Exercise 2):

- `user` (username is unique, password is hashed)
- `subject`
- `program`

The schema is included in [school.sql](school.sql).

## Setup (XAMPP / MySQL)

Prereqs:

- PHP 8.2+
- Composer
- MySQL (XAMPP)

### 1) Configure `.env`

This project is already set up to use:

- `DB_CONNECTION=mysql`
- `DB_DATABASE=school`
- `DB_USERNAME=root`

Adjust as needed.

### 2) Create the database + tables

Choose ONE option:

Option A (recommended if you already have the original DB): import the SQL

- Create DB `school`
- Import [school.sql](school.sql) in phpMyAdmin (or run it via MySQL CLI)

Option B (fresh DB): use migrations + seed

```bash
cd c:\xampp\htdocs\Finalproject_CS
php artisan migrate
php artisan db:seed
```

### 3) Run the app

Option A: XAMPP Apache

- Ensure Apache is running
- Visit: `http://localhost/Finalproject_CS/public`

Option B: Laravel dev server

```bash
cd c:\xampp\htdocs\Finalproject_CS
php artisan serve
```

Then open the printed URL.

## Default Admin

If you run `php artisan db:seed` (or if you imported the Exercise 2 SQL), you will have:

- Username: `gab`
- Password: `gab123`

## Routes / Screens

- Login: `/login`
- Home: `/home`
- Subjects: `/subjects`
- Programs: `/programs`
- Users (admin only): `/users`
- Change password: `/password`
