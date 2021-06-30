<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;

    protected $fillable = ['serie_id', 'season', 'number', 'watched'];
    protected $appends = ['links'];

    public function getWatchedAttribute($value): bool
    {
       return $value;
    }

    public function serie()
    {
        return $this->belongsTo(Serie::class);
    }

    public function getLinksAttribute(): array
    {
        return [
            'serie' => "/api/series/{$this->serie_id}"
        ];
    }
}