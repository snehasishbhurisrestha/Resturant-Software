<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
        ]);

        $user = User::firstOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'name' => 'Super Admin',
                'password' => bcrypt('12345678')
            ]
        );

        $user->assignRole('Super Admin');

        Restaurant::create([
            'name' => 'Restaurant',
            'phone' => 9999999999,
            'email' => 'restaurant@gmail.com'
        ]);

        $this->call([
            RestaurantDemoSeeder::class,
        ]);

    }
}
