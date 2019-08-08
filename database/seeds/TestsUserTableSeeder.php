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
                'user_id' => 4,
                'test_id' => 1,
            ],
            [
                'user_id' => 4,
                'test_id' => 2,
            ],
            [
                'user_id' => 4,
                'test_id' => 3,
            ],
            [
                'user_id' => 4,
                'test_id' => 4,
            ],
            [
                'user_id' => 4,
                'test_id' => 5,
            ],
            [
                'user_id' => 4,
                'test_id' => 6,
            ],
            [
                'user_id' => 4,
                'test_id' => 7,
            ],

            [
                'user_id' => 5,
                'test_id' => 1,
            ],
            [
                'user_id' => 5,
                'test_id' => 2,
            ],
            [
                'user_id' => 6,
                'test_id' => 1,
            ],
            [
                'user_id' => 6,
                'test_id' => 2,
            ],

            [
                'user_id' => 7,
                'test_id' => 1,
            ],
            [
                'user_id' => 7,
                'test_id' => 2,
            ],
            [
                'user_id' => 8,
                'test_id' => 1,
            ],
        ];
        foreach ($data as $item) {
            TestUser::create($item);
        }
    }
}
