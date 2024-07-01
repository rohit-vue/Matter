<?php

namespace App\Models\ProductDevelopment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'style_number', 'style_name', 'category', 'mfg_id'
    ];

    public function versions()
    {
        return $this->hasMany(Version::class);
    }
}
