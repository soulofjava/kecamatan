<?php

namespace App\Livewire;

use App\Models\PPID; // Pastikan untuk mengimpor model PPID
use Conner\Tagging\Model\Tag;
use Livewire\Component;
use Livewire\WithPagination;

class PPIDPage extends Component
{
    use WithPagination; // Add this trait to enable pagination

    public $artikel, $categori, $selectedCategory;
    public $perPage = 10; // Number of items per page

    public function mount()
    {
        // Mengambil kategori dari model Tag
        $this->categori = Tag::orderBy('name', 'ASC')->pluck('name', 'name')->map(function ($item) {
            return strtoupper($item);
        });

        $this->selectedCategory = null; // Initialize selected category

        $this->loadArticles(); // Load articles on mount
    }

    public function loadArticles()
    {
        // Make sure to reset pagination when loading articles
        $this->resetPage();

        if ($this->selectedCategory) {
            $this->artikel = PPID::withAnyTag([$this->selectedCategory])
                ->where('status', 1)
                ->paginate($this->perPage)
                ->map(function ($item) {
                    return (object) [
                        'judul' => $item->judul,
                        'slug' => $item->slug,
                        'gambar' => $item->gambar ?? 'https://via.placeholder.com/150',
                        'isi' => $item->isi,
                        'created_at' => $item->created_at,
                    ];
                });
        } else {
            $this->artikel = PPID::where('status', 1)
                ->paginate($this->perPage)
                ->map(function ($item) {
                    return (object) [
                        'judul' => $item->judul,
                        'slug' => $item->slug,
                        'gambar' => $item->gambar ?? 'https://via.placeholder.com/150',
                        'isi' => $item->isi,
                        'created_at' => $item->created_at,
                    ];
                });
        }
    }

    public function selectCategory($category)
    {
        $this->selectedCategory = $category;
        $this->loadArticles();
    }

    public function render()
    {
        return view('livewire.p-p-i-d-page', [
            'artikels' => $this->artikel, // Pass the paginated articles to the view
        ])
            ->layout('layouts.app');
    }
}
