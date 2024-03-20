<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("roles")->insert([
            "role_name" => "Admin",
            "role_slug" => "admin",
        ]);
 
        DB::table("roles")->insert([
            "role_name" => "State",
            "role_slug" => "state",
        ]);
 
        DB::table("roles")->insert([
            "role_name" => "Range",
            "role_slug" => "range",
        ]);
        DB::table("roles")->insert([
            "role_name" => "Unit",
            "role_slug" => "unit",
        ]);
    }
}
