<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\Storage;

class PPID extends Model
{
    use Sluggable, \Conner\Tagging\Taggable, HasFactory;
    protected $guarded = [];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'judul'
            ]
        ];
    }

    public function getGambarAttribute()
    {
        return $this->attributes['gambar'] ? Storage::url('ppid/' . $this->attributes['gambar']) : null;
    }

    public function getIsiAttribute()
    {
        return str_replace('//storage', '/storage', $this->attributes['isi']);
    }

    public function scopeStatus($query, $value = 1)
    {
        return $query->where('status', $value);
    }
}
