<?php

namespace App\Models\ProductDevelopment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SampleReview extends Model
{
    use HasFactory;

    protected $fillable = [
        'version_id', 'pom', 'bom', 'design_comments', 'review_date', 'reviewed_by', 'status'
    ];

    public function version()
    {
        return $this->belongsTo(Version::class);
    }
}
