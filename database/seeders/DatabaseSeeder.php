<?php

namespace Database\Seeders;

use Database\Seeders\PostSeeder;
use Database\Seeders\UserTypeSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    public function run(): void {
        $this->call(PostSeeder::class);
        $this->call(UserTypeSeeder::class);
    }
}
