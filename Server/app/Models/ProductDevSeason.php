<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDevSeason extends Model
{
    use HasFactory;

    protected $table = 'productdev_seasons';

    protected $fillable = [
        'status',
        'sku',
        'style_name',
        'color',
        'dev_stage',
        'category',
        'mfg',
        'mfg_stage',
        'ship_date',
        'updates_brand',
        'updates_mfg',
    ];
}
