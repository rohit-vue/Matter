<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingsWorkflowQualityControl extends Model
{
    use HasFactory;
    protected $table = 'settings_workflow_qualitycontrol';
    protected $primarykey = 'id';
    protected $fillable = ['type','check','description','status'];
}
