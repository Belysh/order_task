<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Service;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Fast Linux 512',
            'cores_number' => 1,
            'memory_size' => 512,
            'disk_size' => 20,
            'created_at' => now(),
        ]);
        DB::table('products')->insert([
            'name' => 'Fast Linux 1024',
            'cores_number' => 2,
            'memory_size' => 1024,
            'disk_size' => 40,
            'created_at' => now(),
        ]);
        DB::table('products')->insert([
            'name' => 'Fast Linux 2048',
            'cores_number' => 4,
            'memory_size' => 2048,
            'disk_size' => 80,
            'created_at' => now(),
        ]);
        DB::table('products')->insert([
            'name' => 'Fast Linux 8192',
            'cores_number' => 6,
            'memory_size' => 8192,
            'disk_size' => 120,
            'created_at' => now(),
        ]);

        User::factory()
            ->count(5)
            ->create();
        Service::factory()
            ->count(100)
            ->create();
    }
}
