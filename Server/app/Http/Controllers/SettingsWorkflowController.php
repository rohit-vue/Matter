<?php

namespace App\Http\Controllers;
use App\Models\SettingsWorkflowTasks;
use App\Models\SettingsWorkflowQualityControl;
use Illuminate\Http\Request;

class SettingsWorkflowController extends Controller
{
    public function tasks(Request $request){
         
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

    public function show_tasks(){
        $data = SettingsWorkflowTasks::get();
        return response()->json([
            'data' => $data]);
    }

    public function qualityControl(Request $request){
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

        public function show_qualityControl(){
            $data = SettingsWorkflowQualityControl::get();
            return response()->json([
                'data' => $data
            ]);
        }
    }

