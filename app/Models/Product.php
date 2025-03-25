<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    protected $unguarded = [];
    use HasFactory, SoftDeletes;

    public function galleries()
    {
        return $this->hasMany(ProductGallery::class);
    }
}
