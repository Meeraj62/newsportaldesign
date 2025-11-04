<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@newsportal.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'bio' => 'Chief Administrator of News Portal',
        ]);

        User::create([
            'name' => 'John Doe',
            'email' => 'author@newsportal.com',
            'password' => Hash::make('password'),
            'role' => 'author',
            'bio' => 'Senior News Reporter with 10 years of experience',
        ]);

        User::create([
            'name' => 'Jane Smith',
            'email' => 'editor@newsportal.com',
            'password' => Hash::make('password'),
            'role' => 'editor',
            'bio' => 'Editor specializing in political and business news',
        ]);

        $this->call([
            CategorySeeder::class,
            TagSeeder::class,
            ArticleSeeder::class,
        ]);
    }
}
