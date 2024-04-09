<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'SuperUser',
            'email' => getenv('DB_USERNAME').'@app.com',
            'password' => getenv('DB_PASSWORD'),
            'current_team_id' => '1',
        ]);

        Page::factory()->create([
            'name' => 'homepage',
            'page_slug' => 'homepage',
            'author' => 'SuperUser',
            'text_contents' => json_encode('{"content":[{"type":"h-big","text":"Welcome to the homepage!"}]}'),
        ]);
    }
}
