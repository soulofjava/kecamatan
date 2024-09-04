<?php

namespace App\Livewire;

use Conner\Tagging\Model\Tag;
use Livewire\Component;

class PPIDPage extends Component
{
    public $artikel, $categori;

    public function mount()
    {
        $this->categori = Tag::orderBy('name', 'ASC')->pluck('name', 'name')->map(function ($item) {
            return strtoupper($item);
        });
        $this->artikel = [
            (object) [
                'judul' => 'Judul Artikel Dummy',
                'slug' => 'judul-artikel-dummy',
                'gambar' => 'https://via.placeholder.com/150',
                'isi' => 'Ini adalah isi artikel dummy yang berfungsi untuk menguji tampilan di Blade template. Konten ini bisa lebih panjang jika diperlukan untuk testing.',
                'created_at' => now(),
            ],
            // Tambah artikel dummy lain jika diperlukan
        ];
    }
    public function render()
    {
        return view('livewire.p-p-i-d-page')
            ->layout('layouts.app');
    }
}
