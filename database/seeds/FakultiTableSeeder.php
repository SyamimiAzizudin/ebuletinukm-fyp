<?php

use Illuminate\Database\Seeder;
use App\Committee;

class FakultiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'Fakulti Farmasi',
            'Fakulti Pergigian',
            'Fakulti Perubatan',
            'Fakulti Pendidikan',
            'Fakulti Sains Kesihatan',
            'Fakulti Undang-Undang',
            'Fakulti Pengajian Islam',
            'Fakulti Teknologi dan Sains Maklumat', 
            'Fakulti Sains Sosial dan Kemanusiaan', 
            'Fakulti Ekonomi dan Pengurusan', 
            'Fakulti Sains dan Teknologi', 
            'Fakulti Kejuruteraan dan Alam Bina', 
            'UKM-GSB Pusat Pengajian Siswazah Perniagaan',
            ];

        foreach ($data as $datum) {
            Fakulti::create([
                'name' => $datum
            ]);
        }
    }
}