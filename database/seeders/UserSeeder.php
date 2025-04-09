<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'middle_name' => null,
            'school' => 'N/A',
            'grade' => 'N/A',
            'email' => 'admin@admin.com',
            'password' => Hash::make('administrator'),
            'is_admin' => true, // Если добавлено в миграцию
        ]);
    }
}