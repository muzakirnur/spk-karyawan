<?php

namespace Database\Seeders;

use App\Models\Criteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Criteria::create([
            'nama' => 'Tes Tulis',
            'kode_kriteria' => 'C1',
            'bobot' => "5",
        ]);
        Criteria::create([
            'nama' => 'Tes Wawancara',
            'kode_kriteria' => 'C2',
            'bobot' => "5",
        ]);
        Criteria::create([
            'nama' => 'Pengalaman Kerja',
            'kode_kriteria' => 'C3',
            'bobot' => "5",
        ]);
        Criteria::create([
            'nama' => 'Nilai IPK',
            'kode_kriteria' => 'C4',
            'bobot' => "4",
        ]);
        Criteria::create([
            'nama' => 'Jarak Rumah',
            'kode_kriteria' => 'C5',
            'bobot' => "3",
        ]);
    }
}
