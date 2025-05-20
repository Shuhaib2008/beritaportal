<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BannerAdvertisement extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'link',
        'is_active',
        'type',
        'thumbnail',
        // 'slug', // Tambahkan ini jika kamu memang punya kolom slug di database
    ];

    /**
     * Mutator untuk link (opsional, hapus jika tidak diperlukan).
     */
    public function setLinkAttribute($value)
    {
        $this->attributes['link'] = $value;

        // Jika kamu punya kolom slug dan ingin mengisinya secara otomatis:
        // $this->attributes['slug'] = Str::slug($value);
    }

    /**
     * Relasi ke model berita (pastikan nama model benar).
     */
    public function news(): HasMany
    {
        return $this->hasMany(ArcticleNews::class); // Ganti 'ArticleNews' dengan model sebenarnya jika berbeda
    }
}
