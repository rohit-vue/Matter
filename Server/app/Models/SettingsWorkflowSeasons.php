<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingsWorkflowSeasons extends Model
{
    use HasFactory;
    protected $table = 'settings_workflow_seasons';
    protected $primarykey = 'id';
    protected $fillable = ['season', 'description', 'sampling_stages'];

    protected $casts = [
        'sampling_stages' => 'json',
    ];
}
