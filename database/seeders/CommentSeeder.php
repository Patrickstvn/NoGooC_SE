<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comment;
use App\Models\Note;
use App\Models\User;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::where('email', 'admin@Nogooc.com')->first();
        $note = Note::where('content', 'Hello NoGooc')->where('user_id', $admin->id)->first();

        if ($admin && $note) {
            Comment::create([
                'content' => 'This is an admin comment on their own note.',
                'note_id' => $note->id,
                'user_id' => $admin->id,
            ]);
        }
    }
}
