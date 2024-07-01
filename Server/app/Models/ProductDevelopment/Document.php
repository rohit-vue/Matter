<?php

namespace App\Models\ProductDevelopment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'related_to', 'entity_id', 'document_type', 'file_location'
    ];
}
