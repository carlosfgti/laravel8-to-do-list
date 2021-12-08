<?php

namespace App\Repositories;

class TodoRepository
{
    protected $entity;

    public function __construct(Todo $todo)
    {
        $this->entity = $todo;
    }
}
