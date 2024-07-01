<?php

namespace App\Models\ProductDevelopment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'component_type', 'supplier_id'
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
