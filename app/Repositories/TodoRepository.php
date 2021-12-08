<?php

namespace App\Repositories;

use App\Models\Todo;

class TodoRepository
{
    protected $entity;

    public function __construct(Todo $todo)
    {
        $this->entity = $todo;
    }

    public function getAll()
    {
        return $this->entity->all();
    }

    public function getTodo(string $identify)
    {
        return $this->entity->findOrFail($identify);
    }

    public function createNew(array $data)
    {
        return $this->entity->create($data);
    }

    public function update(string $identify, array $data)
    {
        $todo = $this->getTodo($identify);

        return $todo->update($data);
    }

    public function delete(string $identify)
    {
        $todo = $this->getTodo($identify);

        return $todo->delete();
    }
}
