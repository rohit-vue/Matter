<?php

namespace App\Models\ProductDevelopment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'variation_id', 'activity_type', 'user_id', 'activity_date', 'details', 'task_due_date'
    ];

    public function variation()
    {
        return $this->belongsTo(Variation::class);
    }
}
