<?php

namespace App\Services;

use App\Repositories\TodoRepository;

class TodoService
{
    protected $repository;

    public function __construct(TodoRepository $todoRepository)
    {
        $this->repository = $todoRepository;
    }

    public function getTodos()
    {
        return $this->repository->getAll();
    }

    public function createNewTodo(array $data)
    {
        return $this->repository->createNew($data);
    }

    public function getTodo(string $identify)
    {
        return $this->repository->getTodo($identify);
    }

    public function updateTodo(string $identify, array $data)
    {
        return $this->repository->update($identify, $data);
    }

    public function deleteTodo(string $identify)
    {
        return $this->repository->delete($identify);
    }
}
