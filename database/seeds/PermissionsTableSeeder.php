<?php

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->truncate();
        $data = [
            [
                'name' => 'View Admin',
                'slug' => 'view-admin',
            ],
            [
                'name' => 'View Users',
                'slug' => 'view-users',
            ],
            [
                'name' => 'Add User',
                'slug' => 'add-user',
            ],
            [
                'name' => 'Edit User',
                'slug' => 'edit-user',
            ],
            [
                'name' => 'Remove User',
                'slug' => 'remove-user',
            ],
            [
                'name' => 'Has Role Test User',
                'slug' => 'has-role-test-user',
            ],
            [
                'name' => 'Set Role Test User',
                'slug' => 'set-role-test-user',
            ],
            [
                'name' => 'View Categories',
                'slug' => 'view-categories',
            ],
            [
                'name' => 'Add Category',
                'slug' => 'add-category',
            ],
            [
                'name' => 'Edit Category',
                'slug' => 'edit-category',
            ],
            [
                'name' => 'Remove Category',
                'slug' => 'remove-category',
            ],
            [
                'name' => 'View Tests',
                'slug' => 'view-tests',
            ],
            [
                'name' => 'Add Test',
                'slug' => 'add-test',
            ],
            [
                'name' => 'Edit Test',
                'slug' => 'edit-test',
            ],
            [
                'name' => 'Choose Question in Test',
                'slug' => 'choose-question-test',
            ],
            [
                'name' => 'Remove Test',
                'slug' => 'remove-test',
            ],
            [
                'name' => 'View Questions',
                'slug' => 'view-questions',
            ],
            [
                'name' => 'Show Question',
                'slug' => 'show-question',
            ],
            [
                'name' => 'Add Question',
                'slug' => 'add-question',
            ],
            [
                'name' => 'Import Questions',
                'slug' => 'import-questions',
            ],
            [
                'name' => 'Edit Question',
                'slug' => 'edit-question',
            ],
            [
                'name' => 'Remove Question',
                'slug' => 'remove-question',
            ],
            [
                'name' => 'View Commands',
                'slug' => 'view-commands',
            ],
            [
                'name' => 'View List Commands',
                'slug' => 'view-list-commands',
            ],
            [
                'name' => 'Add Command',
                'slug' => 'add-command',
            ],
            [
                'name' => 'Remove Command',
                'slug' => 'remove-command',
            ],
            [
                'name' => 'Set Role',
                'slug' => 'set-role',
            ],
            [
                'name' => 'Test Test',
                'slug' => 'test-test',
            ],
        ];
        foreach ($data as $item) {
            Permission::create($item);
        }
    }
}
