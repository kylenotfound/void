<?php

namespace Database\Seeders;

use App\Models\UserType;
use Illuminate\Database\Seeder;

class UserTypeSeeder extends Seeder {

    public function run(): void {
        UserType::create(['id_name' => 'basic', 'name' => 'Basic']);
        UserType::create(['id_name' => 'admin', 'name' => 'Admin']);
    }
}
