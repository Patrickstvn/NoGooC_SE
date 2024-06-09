<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (!User::where('email', 'admin@Nogooc.com')->exists()) {
            User::factory()->unverified()->create([
                'name' => 'Admin Nogooc',
                'email' => 'admin@Nogooc.com',
                'password' => 'admin-Nogooc123',
                'is_admin' => true
            ]);
        }
        $this->call(note_seeder::class);
        $this->call(comment_seeder::class);
    }
}
