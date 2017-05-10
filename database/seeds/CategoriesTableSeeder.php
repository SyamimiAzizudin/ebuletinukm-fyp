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
            'Pra Siswazah',
            'Pasca Siswazah',
            // 'PHD',
        	'FTSM',
        	'FUU',
            // 'FKAB',
            // 'FST',
            // 'FEP',
            // 'FPI',
            'Sukan',
            // 'Hiburan',
            // 'Teater',
        ];

        foreach ($data as $datum) {
        	Category::create([
        		'name' => $datum
        	]);
        }
    }
}
