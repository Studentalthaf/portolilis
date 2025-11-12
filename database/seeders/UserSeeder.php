<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Admin User
        User::updateOrCreate(
            ['email' => '23032010040@student.upnjatim.ac.id'],
            [
                'name' => 'Laily Charles Febriana',
                'email' => '23032010040@student.upnjatim.ac.id',
                'password' => Hash::make('laily123'),
                'email_verified_at' => now(),
            ]
        );

        $this->command->info('✅ Admin user created successfully!');
        $this->command->info('   Email: 23032010040@student.upnjatim.ac.id');
        $this->command->info('   Password: laily123');
    }
}

