<?php

namespace App\Livewire;

use App\Models\PPID;
use Conner\Tagging\Model\Tag;
use Livewire\Component;
use Livewire\WithPagination;

class PPIDPage extends Component
{
    use WithPagination;

    public $selectedCategory;
    public $perPage = 2; // Number of items per page
    public $mencari = ''; 
    public $categori;

    public function mount()
    {
        // Fetch categories from the Tag model
        $this->categori = Tag::orderBy('name', 'ASC')->pluck('name')->map(function ($item) {
            return strtoupper($item);
        });

        $this->selectedCategory = null; // Initialize selected category
    }

    public function loadArticles()
    {
        $this->resetPage(); // Reset pagination when loading articles

        // Build the query
        $query = PPID::where('status', 1);

        if ($this->selectedCategory) {
            $query->withAnyTag([$this->selectedCategory]);
        }

        if ($this->mencari) {
            $query->where('judul', 'like', '%' . $this->mencari . '%');
        }

        // Paginate results
        return $query->paginate($this->perPage);
    }

    public function selectCategory($category)
    {
        $this->selectedCategory = $category;
        $this->mencari = '';
        $this->resetPage(); // Reset pagination when changing category
    }

    public function loadMore()
    {
        $this->perPage += 2; // Increment the number of items per page
    }

    public function render()
    {
        $artikels = $this->loadArticles(); // Get paginated articles

        return view('livewire.p-p-i-d-page', [
            'artikel' => $artikels, // Pass the paginated articles to the view
        ])
            ->layout('layouts.app');
    }
}