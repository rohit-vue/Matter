<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SettingsWorkflowTasks;
use App\Models\SettingsWorkflowSeasons;
use App\Models\SettingsWorkflowQualityControl;
use App\Models\SettingsWorkflowSamplingStages;

class SettingsWorkflowController extends Controller
{
    public function tasks(Request $request)
    {

        $request->validate([
            'task_name' => 'required|string|max:255',
            'department' => 'required|string|max:255',
        ]);

        $task = new SettingsWorkflowTasks();
        $task->task_name = $request->task_name;
        $task->department = $request->department;
        $task->save();

        return response()->json([
            'task' => $task,
            'message' => 'Task created successfully',
        ], 201);
    }

    public function show_tasks()
    {
        $data = SettingsWorkflowTasks::get();
        return response()->json([
            'data' => $data
        ]);
    }

    public function qualityControl(Request $request)
    {
        $request->validate([
            'type' => 'required|string|max:255',
            'check' => 'required',
            'description' => 'required|string|max:255',
            'status' => 'required|in:active,inactive',
        ]);
        $task = new SettingsWorkflowQualityControl();
        $task->type = $request->type;
        $task->check = $request->check;
        $task->description = $request->description;
        $task->status = $request->status;
        $task->save();

        return response()->json([
            'task' => $task,
            'message' => 'Success',
        ], 201);
    }

    public function show_qualityControl()
    {
        $data = SettingsWorkflowQualityControl::get();
        return response()->json([
            'data' => $data
        ]);
    }

    public function samplingstages(Request $request)
    {
        $request->validate([
            'stage_name' => 'required|string|max:255',
            'default' => 'required|string|max:255',
        ]);

        $task = new SettingsWorkflowSamplingStages();
        $task->stage_name = $request->stage_name;
        $task->default = $request->default;
        $task->save();

        return response()->json([
            'task' => $task,
            'message' => 'success',
        ], 201);
    }

    public function show_samplingstages()
    {
        $data = SettingsWorkflowSamplingStages::get();
        return response()->json([
            'data' => $data
        ]);
    }

    public function seasons(Request $request)
    {
        $request->validate([
            'season' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'sampling_stages' => 'required|text|max:255',
        ]);

        $task = new SettingsWorkflowSeasons();
        $task->season = $request->season;
        $task->description = $request->description;
        $task->sampling_stages = $request->sampling_stages;
        $task->save();

        return response()->json([
            'task' => $task,
            'message' => 'success',
        ], 201);
    }

    public function show_seasons()
    {
        $data = SettingsWorkflowSeasons::get();
        return response()->json([
            'data' => $data
        ]);
    }
}
