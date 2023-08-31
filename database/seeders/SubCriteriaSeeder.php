<?php

namespace Database\Seeders;

use App\Models\SubCriteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubCriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* Subkriteria untuk Tes Teori */
        SubCriteria::create([
            'criteria_id' => 1,
            'nama' => "0-20",
            'nilai' => 20,
        ]);
        SubCriteria::create([
            'criteria_id' => 1,
            'nama' => "21-40",
            'nilai' => 40,
        ]);
        SubCriteria::create([
            'criteria_id' => 1,
            'nama' => "41-60",
            'nilai' => 60,
        ]);
        SubCriteria::create([
            'criteria_id' => 1,
            'nama' => "61-80",
            'nilai' => 80,
        ]);
        SubCriteria::create([
            'criteria_id' => 1,
            'nama' => "81-100",
            'nilai' => 100,
        ]);

        /* Subkriteria untuk Wawancara */
        SubCriteria::create([
            'criteria_id' => 2,
            'nama' => "0-20",
            'nilai' => 20,
        ]);
        SubCriteria::create([
            'criteria_id' => 2,
            'nama' => "21-40",
            'nilai' => 40,
        ]);
        SubCriteria::create([
            'criteria_id' => 2,
            'nama' => "41-60",
            'nilai' => 60,
        ]);
        SubCriteria::create([
            'criteria_id' => 2,
            'nama' => "61-80",
            'nilai' => 80,
        ]);
        SubCriteria::create([
            'criteria_id' => 2,
            'nama' => "81-100",
            'nilai' => 100,
        ]);

        /* Subkriteria untuk Pengalaman Kerja */
        SubCriteria::create([
            'criteria_id' => 3,
            'nama' => "1 Tahun",
            'nilai' => 33.3,
        ]);
        SubCriteria::create([
            'criteria_id' => 3,
            'nama' => "2 Tahun",
            'nilai' => 66.6,
        ]);
        SubCriteria::create([
            'criteria_id' => 3,
            'nama' => "3 Tahun",
            'nilai' => 99.9,
        ]);

        /* Subkriteria untuk Nilai IPK */
        SubCriteria::create([
            'criteria_id' => 4,
            'nama' => "0-1.0",
            'nilai' => 20,
        ]);
        SubCriteria::create([
            'criteria_id' => 4,
            'nama' => "1.1-2.0",
            'nilai' => 40,
        ]);
        SubCriteria::create([
            'criteria_id' => 4,
            'nama' => "2.1-3.0",
            'nilai' => 60,
        ]);
        SubCriteria::create([
            'criteria_id' => 4,
            'nama' => "3.1-3.5",
            'nilai' => 80,
        ]);
        SubCriteria::create([
            'criteria_id' => 4,
            'nama' => "3.6-4.0",
            'nilai' => 100,
        ]);

        /* Subkriteria untuk Jarak Rumah*/
        SubCriteria::create([
            'criteria_id' => 5,
            'nama' => "0-5 Km",
            'nilai' => 20,
        ]);
        SubCriteria::create([
            'criteria_id' => 5,
            'nama' => "6-10 Km",
            'nilai' => 40,
        ]);
        SubCriteria::create([
            'criteria_id' => 5,
            'nama' => "11-15 Km",
            'nilai' => 60,
        ]);
        SubCriteria::create([
            'criteria_id' => 5,
            'nama' => "15-20 Km",
            'nilai' => 80,
        ]);
        SubCriteria::create([
            'criteria_id' => 5,
            'nama' => "21-25 Km",
            'nilai' => 100,
        ]);
    }
}
