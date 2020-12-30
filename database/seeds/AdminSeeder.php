<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'email' => 'admin@admin.com',
                'password' => Hash::make('qqqqqqqq'),
                'ktp_id' => '0'
            ]
        ]);
    }
}
