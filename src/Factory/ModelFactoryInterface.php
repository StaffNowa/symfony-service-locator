<?php

namespace App\Factory;

interface ModelFactoryInterface
{
    /**
     * Creates model factory.
     */
    public function create(string $name): \stdClass;
}
