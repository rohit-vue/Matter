<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SettingsWorkflowTasks;

class SettingsWorkflowTasks extends Model
{
    use HasFactory;

    protected $table = 'settings_workflow_tasks';
    protected $primarykey = 'id';
    protected $fillable = ['task_name','department'];
    public $timestamps = false;
}
