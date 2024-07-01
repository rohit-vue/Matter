<?php

namespace App\Models\ProductDevelopment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'supplier_type'
    ];

    public function components()
    {
        return $this->hasMany(Component::class);
    }
}
