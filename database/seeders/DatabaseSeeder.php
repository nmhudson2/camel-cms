<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\User;
use App\Models\Page;
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
            'email' => getenv("SUPER_USER") . '@app.com',
            'password' => getenv("SUPER_PASS"),
            'current_team_id' => '1'
        ]);

        Page::factory()->create([
            'name' => 'homepage',
            'page_slug' => '/',
            'author' => 'SuperUser',
            'text_contents' => json_encode("{\"content\":[{\"type\":\"h-big\",\"text\":\"Welcome to the homepage!\"}]}")
        ]);
    }
}
