<?php

namespace App\Models\ProductDevelopment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PointOfMeasure extends Model
{
    use HasFactory;

    protected $fillable = [
        'version_id', 'description', 'value'
    ];

    public function version()
    {
        return $this->belongsTo(Version::class);
    }
}
