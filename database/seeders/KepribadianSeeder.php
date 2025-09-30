<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KepribadianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            $soals = [
                'Saya suka bekerja sama dengan orang lain.',
                'Saya mudah merasa cemas atau khawatir.',
                'Saya terbuka terhadap pengalaman baru.',
                'Saya teliti dan terorganisir.',
                'Saya mudah bergaul dan ramah.'
            ];

            foreach ($soals as $idx => $pertanyaan) {
                $soal = 
                    DB::table('kepribadian_soals')->insertGetId([
                        'tipe' => 'bigfive',
                        'pertanyaan' => $pertanyaan,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);

                $jawabans = [
                    ['Sangat Tidak Setuju', 1],
                    ['Tidak Setuju', 2],
                    ['Setuju', 3],
                    ['Sangat Setuju', 4],
                ];
                foreach ($jawabans as [$text, $bobot]) {
                    DB::table('kepribadian_jawaban')->insert([
                        'soal_id' => $soal,
                        'jawaban_text' => $text,
                        'bobot' => $bobot,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }
    }
