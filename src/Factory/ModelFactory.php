<?php

namespace App\Factory;

class ModelFactory implements ModelFactoryInterface
{
    private int $id;

    public function __construct(int $id = 0)
    {
        $this->id = $id;
    }

    public function create(string $name): \stdClass
    {
        $model = new \stdClass();
        $model->id = $this->id;
        $model->name = $name;

        return $model;
    }
}
