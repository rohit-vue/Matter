<?php

namespace App\Models\ProductDevelopment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    use HasFactory;

    protected $fillable = [
        'season_name'
    ];

    public function versions()
    {
        return $this->hasMany(Version::class);
    }
}
