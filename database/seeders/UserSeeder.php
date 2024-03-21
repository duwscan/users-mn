<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::where('name', 'admin')->first();
        $editorRole = Role::where('name', 'editor')->first();
        $userRole = Role::where('name', 'user')->first();

        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('12062003'),
        ]);
        $admin->roles()->attach($adminRole);

        $editor = User::create([
            'name' => 'Editor User',
            'email' => 'editor@example.com',
            'password' => Hash::make('12062003'),
        ]);
        $editor->roles()->attach($editorRole);

        $user = User::create([
            'name' => 'Generic User',
            'email' => 'user@example.com',
            'password' => Hash::make('12062003'),
        ]);
        $user->roles()->attach($userRole);

        $myAdmin = User::create([
            'name' => 'My Admin',
            'email' => 'ducan4sure@gmail.com',
            'password' => Hash::make('12062003'),
        ]);
        $myAdmin->roles()->attach($adminRole);
    }
}
