<?php

namespace App\Models\ProductDevelopment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variation extends Model
{
    use HasFactory;

    protected $fillable = [
        'version_id', 'colorway', 'fabrication', 'other_variation_details'
    ];

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }
}
