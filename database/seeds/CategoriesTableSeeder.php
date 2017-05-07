<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        	'FTSM',
        	'FUU'
        ];

        foreach ($data as $datum) {
        	Category::create([
        		'name' => $datum
        	]);
        }
    }
}
