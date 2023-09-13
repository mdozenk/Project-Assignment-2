<?php

namespace App\Services;

use App\Repositories\TaskRepository;

class TaskService
{
    protected $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function createTask(array $data)
    {
        return $this->taskRepository->create($data);
    }

    public function showTasks()
    {
        return $this->taskRepository->all();
    }

    public function updateTask($taskId, array $data)
    {
        return $this->taskRepository->update($taskId, $data);
    }

    public function deleteTask($taskId)
    {
        return $this->taskRepository->delete($taskId);
    }

    public function assignTask($taskId)
    {
        $task = $this->taskRepository->find($taskId);

        if (!$task) {
            return null;
        }

        $task->save();

        return $task;
    }

    public function unassignTask($taskId)
    {
        $task = $this->taskRepository->find($taskId);

        if (!$task) {
            return null;
        }
        $task->assigned = false;
        $task->save();

        return $task;
    }

    public function addSubtask($taskId, array $subtaskData)
    {
        $task = $this->taskRepository->find($taskId);

        if (!$task) {
            return null;
        }

        $task->subtasks[] = $subtaskData;
        $task->save();

        return $task;
    }

    public function deleteSubtask($taskId, $subtaskId)
    {
        $task = $this->taskRepository->find($taskId);

        if (!$task) {
            return null;
        }

        $task->subtasks = array_filter($task->subtasks, function ($subtask) use ($subtaskId) {
            return $subtask['id'] !== $subtaskId;
        });
        $task->save();

        return $task;
    }
}
