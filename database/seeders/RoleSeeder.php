<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::create([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('12345'),
            'role'=>'1',
        ]);
    }
}
