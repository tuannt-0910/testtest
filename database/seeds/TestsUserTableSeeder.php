<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\TestUser;

class TestsUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('test_user')->truncate();
        $data = [
            [
                'user_id' => 3,
                'test_id' => 1,
            ],
            [
                'user_id' => 3,
                'test_id' => 2,
            ],
            [
                'user_id' => 3,
                'test_id' => 3,
            ],
            [
                'user_id' => 3,
                'test_id' => 4,
            ],
            [
                'user_id' => 3,
                'test_id' => 5,
            ],
            [
                'user_id' => 3,
                'test_id' => 6,
            ],
            [
                'user_id' => 3,
                'test_id' => 7,
            ],
            [
                'user_id' => 3,
                'test_id' => 8,
            ],
            [
                'user_id' => 3,
                'test_id' => 9,
            ],
            [
                'user_id' => 3,
                'test_id' => 10,
            ],
            [
                'user_id' => 3,
                'test_id' => 11,
            ],
            [
                'user_id' => 3,
                'test_id' => 12,
            ],
            [
                'user_id' => 3,
                'test_id' => 13,
            ],
        ];
        foreach ($data as $item) {
            TestUser::create($item);
        }
    }
}
