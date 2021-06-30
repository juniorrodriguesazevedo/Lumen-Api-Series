<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    protected $appends = ['links'];

    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }

    public function getLinksAttribute($links): array
    {
        return [
            'episodes' => "/api/series/{$this->id}/episodes"
        ];
    }
}