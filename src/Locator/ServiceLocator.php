<?php

namespace App\Locator;

use App\Exception\ServiceLocatorException;
use App\Factory\ModelFactoryInterface;
use App\Util\CalculatorUtilInterface;
use Psr\Container\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\ServiceNotFoundException;
use Symfony\Contracts\Service\ServiceSubscriberInterface;

class ServiceLocator implements ServiceLocatorInterface, ServiceSubscriberInterface
{
    private ContainerInterface $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function get(string $id): ?object
    {
        if (!$this->container->has($id)) {
            throw new ServiceLocatorException(sprintf('The entry for the given "%s" identifier was not found.', $id));
        }

        try {
            return $this->container->get($id);
        } catch (ServiceNotFoundException $e) {
            throw new ServiceNotFoundException(sprintf('Failed to fetch the entry for the given "%s" identifier.', $id));
        }
    }

    public static function getSubscribedServices(): array
    {
        return [
            'App\Factory\ModelFactoryInterface' => ModelFactoryInterface::class,
            'App\Util\CalculatorUtilInterface' => CalculatorUtilInterface::class,
            'D4D' => ModelFactoryInterface::class,
        ];
    }
}
