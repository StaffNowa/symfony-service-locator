<?php

namespace App\Locator;

interface ServiceLocatorInterface
{
    public function get(string $id): ?object;
}
