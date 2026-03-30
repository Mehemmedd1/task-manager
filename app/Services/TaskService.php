<?php

namespace App\Services;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;

class TaskService
{
    public function getAll():Collection
    {
        return Task::all();
    }

    public function create(StoreTaskRequest $request):Task
    {
        return Task::create($request->validated());
    }

    public function getById(int $id):?Task
    {
        return Task::findOrFail($id);
    }

    public function update(UpdateTaskRequest $request, int $id):Task
    {
        $task = Task::findOrFail($id);
        $task->update($request->validated());
        return $task;
    }

    public function delete(int $id):void
    {
        Task::findOrFail($id)->delete();
    }


}
