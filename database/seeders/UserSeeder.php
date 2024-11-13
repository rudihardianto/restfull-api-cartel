<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        collect([
            [
                'name'              => 'Ruquds',
                'email'             => 'ruquds@gmail.com',
                'password'          => Hash::make('password'),
                'email_verified_at' => now(),
            ],
            [
                'name'              => 'Babul',
                'email'             => 'babul@gmail.com',
                'password'          => Hash::make('password'),
                'email_verified_at' => now(),
            ],
            [
                'name'              => 'Widya',
                'email'             => 'widya@gmail.com',
                'password'          => Hash::make('password'),
                'email_verified_at' => now(),
            ],
        ])->each(function ($user) {
            User::create($user);
        });

        collect(['admin', 'moderator'])->each(function ($role) {
            Role::create(['name' => $role]);
        });

        // cara 1 (spesifik)
        // User::find(1)->roles()->attach(Role::where('name', 'admin')->first());
        // User::find(2)->roles()->attach(Role::where('name', 'moderator')->first());

        // cara 2 (harus tau id nya)
        // sync(): Replace semua relasi yang ada
        User::find(1)->roles()->sync([1]);
        User::find(2)->roles()->sync([2]);
    }
}
