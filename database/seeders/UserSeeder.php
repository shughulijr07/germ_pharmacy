<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // default password is 12345678 => encrypted to $2y$10$lA.ERv9FqoGiKBxuv2x..OntwQ7cGSsD0CmdLscc289b6AKzfZeE6
        User::truncate();
        $data = [
               ['username' => 'manager', 'name' => 'Faraji Chap', 'password' => '$2y$10$lA.ERv9FqoGiKBxuv2x..OntwQ7cGSsD0CmdLscc289b6AKzfZeE6'],
        ];
        User::insert($data);
    }
}
