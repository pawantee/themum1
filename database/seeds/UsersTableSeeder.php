<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Models\User::create([
            'name' => 'admin',
            'password' => bcrypt('12345'),
            'email' => 'admin@admin.com',
        ]);

        App\Models\User::create([
            'name' => 'user',
            'password' => bcrypt('12345'),
            'email' => 'user@user.com',
        ]);

         App\Models\Statused::create([
            'name' => 'ฉีดแล้ว',
        ]);

         App\Models\Statused::create([
            'name' => 'ยังไม่ฉีด',
        ]);
    }
}
