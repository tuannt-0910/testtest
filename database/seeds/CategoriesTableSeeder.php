<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();
        $data = [
            [
                'name' => 'Test Toeic',
                'image_id' => 1,
            ],
            [
                'name' => 'Topic',
                'image_id' => 2,
            ],
            [
                'name' => 'Vocabulary',
                'image_id' => 3,
            ],
            [
                'name' => 'test 0-200',
                'parent_id' => 1,
                'content_guide' => 'test 0-200'
            ],
            [
                'name' => 'test 200-400',
                'parent_id' => 1,
                'content_guide' => 'test 200-400'
            ],
            [
                'name' => 'test 400-600',
                'parent_id' => 1,
                'content_guide' => 'test 400-600'
            ],
            [
                'name' => 'test 600-700',
                'parent_id' => 1,
                'content_guide' => 'test 600-700'
            ],
            [
                'name' => 'test 700-800',
                'parent_id' => 1,
                'content_guide' => 'test 700-800'
            ],
            [
                'name' => 'test 800-900',
                'parent_id' => 1,
                'content_guide' => 'test 800-900'
            ],
            [
                'name' => 'test *',
                'parent_id' => 1,
                'content_guide' => 'test *'
            ],
            [
                'name' => 'Animals',
                'parent_id' => 2,
                'content_guide' => 'test Animal'
            ],
            [
                'name' => 'Relationships',
                'parent_id' => 2,
                'content_guide' => 'Relationships'
            ],
            [
                'name' => 'Fashions',
                'parent_id' => 2,
                'content_guide' => 'Fashions'
            ],
            [
                'name' => 'Life',
                'parent_id' => 2,
                'content_guide' => 'Life'
            ],
            [
                'name' => 'Body',
                'parent_id' => 2,
                'content_guide' => 'Body'
            ],
            [
                'name' => 'Vehicle',
                'parent_id' => 2,
                'content_guide' => 'Vehicle'
            ],
            [
                'name' => 'Animals',
                'parent_id' => 3,
                'content_guide' => 'test Animal'
            ],
            [
                'name' => 'Relationships',
                'parent_id' => 3,
                'content_guide' => 'Relationships'
            ],
            [
                'name' => 'Fashions',
                'parent_id' => 3,
                'content_guide' => 'Fashions'
            ],
            [
                'name' => 'Life',
                'parent_id' => 3,
                'content_guide' => 'Life'
            ],
            [
                'name' => 'Body',
                'parent_id' => 3,
                'content_guide' => 'Body'
            ],
            [
                'name' => 'Vehicle',
                'parent_id' => 3,
                'content_guide' => 'Vehicle'
            ],
        ];
        foreach ($data as $item) {
            Category::create($item);
        }
    }
}
