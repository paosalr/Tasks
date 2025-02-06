<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\StateType;
use Illuminate\Support\Facades\DB;
class TaskController extends Controller
{
    public function index()
    {
        return response()->json(Task::with('stateType')->get());
    }
    public function store(Request $request){
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'state_id' => 'required|exists:state_types,id',
        ]);

        try{
            DB::beginTransaction();

            $task=Task::create($validated);

            DB::commit();

            return response()->json($task, 201);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Error creando la tarea'], 500);
        }
    }
    public function update(Request $request, $id){
        $task = Task::findOrFail($id);
        $task->update($request->all());

        return response()->json($task);
    }
    public function destroy($id){
        $task = Task::findOrFail($id);
        $task->delete();

        return response()->json(['message' => 'Tarea eliminada']);
    }
    public function changeState($id, $state_id){
        $task = Task::findOrFail($id);
        $task->update(['state_id' => $state_id]);

        return response()->json($task);
    }
}
