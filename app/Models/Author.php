<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class Author extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'occupation',
        'avatar',
        'slug',
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;

        $slug = Str::slug($value);
        $originalSlug = $slug;
        $count = 1;

        // Loop untuk cek slug unik di tabel authors
        while (DB::table('authors')->where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        $this->attributes['slug'] = $slug;
    }

    public function news(): HasMany
    {
        return $this->hasMany(ArticleNews::class);
    }
}
