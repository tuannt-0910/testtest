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
                'email' => 'academics-admin@gmail.com',
                'username' => 'admin',
                'firstname' => 'admin',
                'lastname' => 'admin',
                'role_id' => 1,
                'password' => bcrypt('123456'),
                'active' => 1
            ],
            [
                'email' => 'academics-hungnv@gmail.com',
                'username' => 'nguyenvanhung',
                'firstname' => 'Hung',
                'lastname' => 'Nguyen Van',
                'role_id' => 2,
                'address' => 'Ha Noi',
                'phone' => '0353567890',
                'birthday' => '1997-12-10',
                'password' => bcrypt('123456'),
                'active' => 1
            ],
            [
                'email' => 'academics-huongnt@gmail.com',
                'username' => 'nguyenthihuong',
                'firstname' => 'Huong',
                'lastname' => 'Nguyen Thi',
                'role_id' => 3,
                'address' => 'Nam Dinh',
                'phone' => '0340560234',
                'birthday' => '1997-06-10',
                'password' => bcrypt('123456'),
                'active' => 1
            ],
            [
                'email' => 'academics-quynhpt@gmail.com',
                'username' => 'phamthiquynh',
                'firstname' => 'Quynh',
                'lastname' => 'Pham Thi',
                'role_id' => 4,
                'address' => 'Ha Nam',
                'phone' => '0560360982',
                'birthday' => '1998-02-03',
                'password' => bcrypt('123456'),
                'active' => 1
            ],
            [
                'email' => 'academics-huyenttm@gmail.com',
                'username' => 'tathiminhhuyen',
                'firstname' => 'Huyen',
                'lastname' => 'Ta Thi Minh',
                'role_id' => 4,
                'address' => 'Lang Son',
                'phone' => '0980360162',
                'birthday' => '1998-03-03',
                'password' => bcrypt('123456'),
                'active' => 1
            ],
            [
                'email' => 'academics-manhnv@gmail.com',
                'username' => 'nguyenvanmanh',
                'firstname' => 'Manh',
                'lastname' => 'Nguyen Van',
                'role_id' => 4,
                'address' => 'Bac Ninh',
                'phone' => '0350690324',
                'birthday' => '1998-03-09',
                'password' => bcrypt('123456'),
                'active' => 1
            ],
            [
                'email' => 'academics-linhntp@gmail.com',
                'username' => 'nghiemthiphuonglinh',
                'firstname' => 'Phuong Linh',
                'lastname' => 'Nghiem Thi',
                'role_id' => 4,
                'address' => 'Bac Ninh',
                'phone' => '0870560692',
                'birthday' => '1998-09-11',
                'password' => bcrypt('123456'),
                'active' => 1
            ],
            [
                'email' => 'academics-chinth@gmail.com',
                'username' => 'nghiemthihachi',
                'firstname' => 'Ha Chi',
                'lastname' => 'Nghiem Thi',
                'role_id' => 4,
                'address' => 'Bac Ninh',
                'phone' => '0590340265',
                'birthday' => '1998-07-11',
                'password' => bcrypt('123456'),
                'active' => 1
            ],
        ];
        foreach ($data as $item) {
            User::create($item);
        }
    }
}
