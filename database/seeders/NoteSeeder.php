<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Note;

class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $admin = User::where('email', 'admin@Nogooc.com')->first();

        if ($admin) {
            Note::create([
                'user_id' => $admin->id,
                'title' => 'Welcome Note',
                'content' => 'Hello NoGooc',
            ]);

        }
    }
}
