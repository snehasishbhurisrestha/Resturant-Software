<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use Spatie\Permission\Models\Role;

class UserRoleSeeder extends Seeder
{
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | CREATE ROLES IF NOT EXISTS
        |--------------------------------------------------------------------------
        */
        $roles = [
            'Super Admin',
            'Order Taking',
            'Captain',
            'Biller',
        ];

        foreach ($roles as $role) {

            Role::firstOrCreate([
                'name' => $role,
                'guard_name' => 'web'
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | BILLER USERS
        |--------------------------------------------------------------------------
        */
        $billers = [
            [
                'name' => 'Sonu07',
                'mobile' => '9000000002',
                'status' => 'active',
            ],
            [
                'name' => 'SD Ahmad',
                'mobile' => '9000000003',
                'status' => 'active',
            ],
        ];

        foreach ($billers as $biller) {

            $user = User::firstOrCreate(
                [
                    'mobile' => $biller['mobile']
                ],
                [
                    'name' => $biller['name'],
                    'password' => Hash::make('123456'),
                    'restaurant_id' => 1,
                    'status' => $biller['status'],
                ]
            );

            if (!$user->hasRole('Biller')) {
                $user->assignRole('Biller');
            }
        }

        /*
        |--------------------------------------------------------------------------
        | CAPTAIN USERS
        |--------------------------------------------------------------------------
        */
        $captains = [
            [
                'name' => 'Resham',
                'mobile' => '8000000001',
                'status' => 'active',
            ],
            [
                'name' => 'Rahul',
                'mobile' => '8000000002',
                'status' => 'active',
            ],
            [
                'name' => 'Vikash',
                'mobile' => '8000000003',
                'status' => 'active',
            ],
            [
                'name' => 'Nishika',
                'mobile' => '8000000004',
                'status' => 'active',
            ],
            [
                'name' => 'Rounak',
                'mobile' => '8000000005',
                'status' => 'active',
            ],
            [
                'name' => 'Muskan',
                'mobile' => '8000000006',
                'status' => 'active',
            ],
            [
                'name' => 'Aman',
                'mobile' => '8000000007',
                'status' => 'active',
            ],
            [
                'name' => 'Kamal',
                'mobile' => '8000000008',
                'status' => 'active',
            ],

            // NEW CAPTAINS
            [
                'name' => 'Ahmad',
                'mobile' => '7000000001',
                'status' => 'active',
            ],
            [
                'name' => 'pintu',
                'mobile' => '7000000002',
                'status' => 'active',
            ],
            [
                'name' => 'priya',
                'mobile' => '7000000003',
                'status' => 'active',
            ],
            [
                'name' => 'nirmal',
                'mobile' => '7000000004',
                'status' => 'active',
            ],
            [
                'name' => 'shanta',
                'mobile' => '7000000005',
                'status' => 'active',
            ],
            [
                'name' => 'subhas',
                'mobile' => '7000000006',
                'status' => 'active',
            ],
        ];

        foreach ($captains as $captain) {

            $user = User::firstOrCreate(
                [
                    'mobile' => $captain['mobile']
                ],
                [
                    'name' => $captain['name'],
                    'password' => Hash::make('123456'),
                    'restaurant_id' => 1,
                    'status' => $captain['status'],
                ]
            );

            if (!$user->hasRole('Captain')) {
                $user->assignRole('Captain');
            }
        }
    }
}