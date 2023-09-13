<?php

namespace App\Http\Controllers;

use App\Services\TaskService;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    protected $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function createTask(Request $request)
    {
        $data = $request->all();
        return $this->taskService->createTask($data);
    }

    public function showTasks()
    {
        return $this->taskService->showTasks();
    }

    public function updateTask(Request $request, $taskId)
    {
        $data = $request->all();
        return $this->taskService->updateTask($taskId, $data);
    }

    public function deleteTask($taskId)
    {
        return $this->taskService->deleteTask($taskId);
    }

    public function assignTask($taskId)
    {
        return $this->taskService->assignTask($taskId);
    }

    public function unassignTask($taskId)
    {
        return $this->taskService->unassignTask($taskId);
    }

    public function addSubtask(Request $request, $taskId)
    {
        $subtaskData = $request->all();
        return $this->taskService->addSubtask($taskId, $subtaskData);
    }

    public function deleteSubtask($taskId, $subtaskId)
    {
        return $this->taskService->deleteSubtask($taskId, $subtaskId);
    }
}
