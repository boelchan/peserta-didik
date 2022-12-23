<?php

namespace Database\Seeders;

use App\Models\JenjangPendidikan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenjangPendidikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JenjangPendidikan::insert([
            [
                'nama' => 'Ula'
            ],
            [
                'nama' => 'Wustho'
            ]
        ]);
    }
}
