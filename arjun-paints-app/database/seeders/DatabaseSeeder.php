<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        User::query()->updateOrCreate(
            ['email' => 'admin@arjunpaaint.com'],
            [
                'name' => 'Arjun Paints Admin',
                'password' => Hash::make('password@123'),
                'is_admin' => true,
                'email_verified_at' => now(),
            ]
        );

        foreach (['Asian Paints', 'Berger', 'Shalimar'] as $name) {
            Brand::query()->updateOrCreate(
                ['slug' => Str::slug($name)],
                ['name' => $name, 'is_active' => true]
            );
        }
    }
}
