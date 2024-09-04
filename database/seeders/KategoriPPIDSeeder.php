<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Conner\Tagging\Model\Tag;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class KategoriPPIDSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tagging_tags')->truncate();
        $data = [
            ['name' => 'Profil OPD'],
            ['name' => 'Profil PPID'],
            ['name' => 'Profil Pimpinan'],
            ['name' => 'Kegiatan dan Kinerja'],
            ['name' => 'Transparansi Keuangan'],
            ['name' => 'Kinerja PPID'],
            ['name' => 'Penanganan Pengaduan'],
            ['name' => 'Pengadaan Barang dan Jasa'],
            ['name' => 'Regulasi'],
            ['name' => 'Prosedur Gawat Darurat'],
        ];
        // Fungsi untuk mengubah nilai menjadi sentence case
        function toSentenceCase($string)
        {
            return ucwords(strtolower($string));
        }

        // Mengubah setiap nilai dalam array menjadi sentence case dan menambahkan slug
        foreach ($data as &$item) {
            $item['name'] = toSentenceCase($item['name']);
            $item['slug'] = Str::slug($item['name']);
        }
        Tag::insert($data);
    }
}
