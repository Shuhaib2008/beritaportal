<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    // Kolom yang boleh diisi secara massal
    protected $fillable = [
        'name',
        'slug',
        'icon',
    ];

    /**
     * Mutator untuk mengatur name dan otomatis membuat slug.
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        
        // Hanya buat slug jika value tidak kosong
        $this->attributes['slug'] = $value ? Str::slug($value) : null;
    }

    /**
     * Relasi: Satu kategori punya banyak berita.
     */
    public function news(): HasMany
    {
        return $this->hasMany(ArcticleNews::class);
    }
}
