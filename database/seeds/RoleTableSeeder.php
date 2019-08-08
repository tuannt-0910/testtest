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
                'name' => 'admin',
                'slug' => 'admin',
                'color' => 'label label-primary'
            ],
            [
                'name' => 'staff',
                'slug' => 'staff',
                'color' => 'label label-primary'
            ],
            [
                'name' => 'teacher',
                'slug' => 'teacher',
                'color' => 'label label-success'
            ],
            [
                'name' => 'student',
                'slug' => 'student',
                'color' => 'label label-default'
            ],
        ];
        foreach ($data as $item) {
            Role::create($item);
        }
    }
}
