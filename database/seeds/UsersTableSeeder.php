<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        $data = [
            [
                'email' => 'nguyenthingaa@gmail.com',
                'username' => 'nguyenthingaa',
                'firstname' => 'Nga A',
                'lastname' => 'Nguyen Thi',
                'role_id' => '1',
                'image_id' => '1',
                'address' => 'A',
                'phone' => '0123456789',
                'birthday' => '1997-12-10',
                'password' => bcrypt('123456'),
                'active' => 0
            ],
            [
                'email' => 'nguyenthingab@gmail.com',
                'username' => 'nguyenthingab',
                'firstname' => 'Nga B',
                'lastname' => 'Nguyen Thi',
                'role_id' => '2',
                'image_id' => '2',
                'address' => 'B',
                'phone' => '0123456789',
                'birthday' => '1997-12-10',
                'password' => bcrypt('123456'),
                'active' => 0
            ],
            [
                'email' => 'nguyenthingac@gmail.com',
                'username' => 'nguyenthingac',
                'firstname' => 'Nga C',
                'lastname' => 'Nguyen Thi',
                'role_id' => '3',
                'image_id' => '2',
                'address' => 'C',
                'phone' => '0123456789',
                'birthday' => '1997-12-10',
                'password' => bcrypt('123456'),
                'active' => 0
            ],
        ];
        foreach ($data as $item) {
            User::create($item);
        }
    }
}
