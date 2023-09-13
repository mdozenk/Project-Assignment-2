<?php

namespace App\Repositories;
use App\Models\Task;


class TaskRepository
{
    protected $model;

    public function __construct(Task $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $task = $this->find($id);

        if (!$task) {
            return null;
        }

        $task->update($data);

        return $task;
    }

    public function delete($id)
    {
        $task = $this->find($id);

        if (!$task) {
            return null;
        }

        $task->delete();

        return $task;
    }
}
