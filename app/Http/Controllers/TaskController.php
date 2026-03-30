<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use App\Services\TaskService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\List_;
use PhpParser\Node\Scalar\String_;

class TaskController extends Controller
{

    private TaskService $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function index()
    {
        return $this->taskService->getAll();
    }


    public function store(StoreTaskRequest $request):JsonResponse
    {

        $this->taskService->create($request);
        return response()->json([
            'message' => 'Task created successfully',
        ]);
    }


    public function show(int $id)
    {
        return $this->taskService->getById($id);
    }


    public function update(UpdateTaskRequest $request, string $id):JsonResponse
    {
        $this->taskService->update($request, $id);
        return response()->json([
            'message' => 'Task updated successfully',
        ]);

    }


    public function destroy(int $id):JsonResponse
    {
        $this->taskService->delete($id);
        return response()->json([
            'message' => 'Task deleted successfully',
        ]);
    }
}
