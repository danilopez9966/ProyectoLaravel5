<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Tag;
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
        //creacion de factory
        User::factory(10)->create();

        //creacion de seeder
        $this->call(TagSeeder::class);

        //creacion de factory
        Article::factory(50)->create();
    }
}
