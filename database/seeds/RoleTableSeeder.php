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
                'color' => 'label label-default'
            ],
            [
                'name' => 'teacher',
                'slug' => 'teacher',
                'color' => 'label label-success'
            ],
            [
                'name' => 'manager',
                'slug' => 'manager',
                'color' => 'label label-primary'
            ],
        ];
        foreach ($data as $item) {
            Role::create($item);
        }
    }
}
