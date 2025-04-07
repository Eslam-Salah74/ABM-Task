<?php
namespace App\Repositories\Api\TaskManager;

use Illuminate\Http\Request;
use App\Trait\Api\ApiResponseTrait;
use Illuminate\Support\Facades\Auth;
use App\Models\TaskManager\TaskManager;


class TaskManagerRepository implements TaskManagerInterface{

    use ApiResponseTrait;


    public function index()
    {
        $user = Auth::user();

        $tasks = TaskManager::where('user_id', $user->id)->get();

        return $this->apiResponse($tasks, 200, 'Tasks retrieved successfully');
    }


    public function store($request)
    {

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'status' => 'required|in:pending,in-progress,completed',
        ]);


        if (!auth()->check()) {
            return $this->apiResponse(null, 401, 'Unauthorized');
        }

        $task = TaskManager::create([
            'title' => $validatedData['title'],
            'status' => $validatedData['status'],
            'user_id' => auth()->id(),
        ]);

        return $this->apiResponse($task, 201, 'Task created successfully');
    }


    public function update($request)
    {
        $task = TaskManager::find($request->id);

        if (!$task) {
            return $this->apiResponse(null, 404, 'Task not found');
        }


        if ($task->user_id !== auth()->id()) {
            return $this->apiResponse(null, 403, 'Unauthorized to update this task');
        }
        $validatedData = $request->validate([
            'title' => 'sometimes|string|max:255',
            'status' => 'sometimes|in:pending,in-progress,completed',
        ]);


        $task->update($validatedData);

        return $this->apiResponse($task, 200, 'Task updated successfully');
    }



    public function destroy($request)
    {
        $task = TaskManager::find($request->id);

        if (!$task) {
            return $this->apiResponse(null, 404, 'Task not found');
        }


        $task->delete();

        return $this->apiResponse(null, 200, 'Task deleted successfully');
    }
}
