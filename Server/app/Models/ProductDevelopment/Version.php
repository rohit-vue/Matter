<?php

namespace App\Models\ProductDevelopment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Version extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id', 'season_id', 'stage', 'mfg_stage', 'ship_date', 'components'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function season()
    {
        return $this->belongsTo(Season::class);
    }

    public function sampleReviews()
    {
        return $this->hasMany(SampleReview::class);
    }

    public function pointOfMeasures()
    {
        return $this->hasMany(PointOfMeasure::class);
    }
}
