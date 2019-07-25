<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\File;

class FileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('files')->truncate();
        $data = [
            [
                'name' => 'abc1.jpg',
                'base_folder' => 'abc.jpg',
                'type' => 'image',
                'purpose' => 'image',
                'extension' => 'jpg',
            ],
            [
                'name' => 'abc2.jpg',
                'base_folder' => 'abc.jpg',
                'type' => 'image',
                'purpose' => 'image',
                'extension' => 'jpg',
            ],
            [
                'name' => 'abc3.jpg',
                'base_folder' => 'abc.jpg',
                'type' => 'image',
                'purpose' => 'image',
                'extension' => 'jpg',
            ],
        ];
        foreach ($data as $item) {
            File::create($item);
        }
    }
}
