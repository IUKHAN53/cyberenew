<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('users')->delete();

        \DB::table('users')->insert(array (
            0 =>
            array (
                'id' => 1,
                'role_id' => 1,
                'name' => 'Wave Admin',
                'email' => 'admin@admin.com',
                'username' => 'admin',
                'avatar' => 'users/default.png',
                'password' => bcrypt('12345678'),
                'remember_token' => '4oXDVo48Lm1pc4j7NkWI9cMO4hv5OIEJFMrqjSCKQsIwWMGRFYDvNpdioBfo',
                'settings' => NULL,
                'created_at' => '2017-11-21 16:07:22',
                'updated_at' => '2018-09-22 23:34:02',
                'stripe_id' => NULL,
                'card_brand' => NULL,
                'card_last_four' => NULL,
                'trial_ends_at' => NULL,
                'verification_code' => NULL,
                'verified' => 1,
                'total_tokens' => 25,
                'available_tokens' => 25,
                'used_tokens' => 0,
            ),
        ));


    }
}
