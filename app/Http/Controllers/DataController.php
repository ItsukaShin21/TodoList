<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tasks;
use App\Models\History;

class DataController extends Controller
{
    public function displayData() {
        $tasksData = Tasks::all();

        return view('todolistPage', [
            'tasksData' => $tasksData,
        ]);
    }

    public function addTask(Request $request) {
        $request->validate([
            'task_name' => 'required|string|max:255|unique:tasks,task_name',
            'task_type' => 'required|string|max:255'
        ], [
            'task_name.unique' => 'The task is already existing',
        ]);

        $task = new Tasks([
            'task_name' => $request->input('task_name'),
            'task_type' => $request->input('task_type'),
        ]);

        $task->save();
        $request->session()->flash('success', 'Task Successfully Added');
        return redirect()->back();
    }

    public function getTaskDetails(Request $request) {
        $taskId = $request->input('taskId');
        $task = Tasks::find($taskId);

        return response()->json($task);
    }

    public function updateTask(Request $request) {
        $request->validate([
            'task_id' => 'required|exists:tasks,id',
            'task_name' => 'required|string|max:255',
            'task_type' => 'required|string|max:255'
        ]);
    
        $task = Tasks::find($request->input('task_id'));
        $task->task_name = $request->input('task_name');
        $task->task_type = $request->input('task_type');
        $task->update();
        
        $request->session()->flash('success', 'Task Successfully Updated');
        return redirect()->back();
    }

    public function deleteTask(Request $request) {
        try {
            $request->validate([
                'task_id' => 'required|exists:tasks,id',
            ]);

            $task = Tasks::find($request->input('task_id'));
            $task->delete();

            $request->session()->flash('success', 'Task Successfully Deleted');
        } catch (ModelNotFoundException $exception) {
            // Task not found
            $request->session()->flash('error', 'Task not found');
        }

        return redirect()->back();
    }

    public function finishTask(Request $request) {
        try {
            $request->validate([
                'task_id' => 'required|exists:tasks,id',
            ]);

            $task = Tasks::find($request->input('task_id'));

            // Save the task details to history before deleting
            $this->moveToHistory($task);
            $task->delete();

            $request->session()->flash('success', 'Task finished');
        } catch (ModelNotFoundException $exception) {
            // Task not found
            $request->session()->flash('error', 'Task not found');
        }

        return redirect()->back();
    }

    private function moveToHistory(Tasks $task) {
        $history = new History([
            'task_name' => $task->task_name,
            'task_type' => $task->task_type,
            'finished_at' => now(),
        ]);

        $history->save();
    }
}
