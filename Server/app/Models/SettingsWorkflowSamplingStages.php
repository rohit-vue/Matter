<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingsWorkflowSamplingStages extends Model
{
    use HasFactory;
    protected $table = 'settings_workflow_samplingstages';
    protected $primarykey = 'id';
    protected $fillable = ['stage_name', 'default'];
}
