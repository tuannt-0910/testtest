<?php

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->truncate();
        $data = [
            [
                'name' => 'student',
                'slug' => 'student',
            ],
            [
                'name' => 'teacher',
                'slug' => 'teacher',
            ],
            [
                'name' => 'manager',
                'slug' => 'manager',
            ],
        ];
        foreach ($data as $item) {
            Role::create($item);
        }
    }
}
