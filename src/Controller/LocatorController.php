<?php

namespace App\Controller;

use App\Factory\ModelFactoryInterface;
use App\Locator\ServiceLocator;
use App\Util\CalculatorUtilInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/locators')]
class LocatorController extends AbstractController
{
    private ServiceLocator $serviceLocator;

    public function __construct(ServiceLocator $serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;
    }

    #[Route('/{type}')]
    public function getService(string $type): Response
    {
        switch ($type) {
            case 'salary':
                $service = $this->serviceLocator->get(CalculatorUtilInterface::class);
                $result = $service->sum(1, 2);
                break;
            case 'factory':
                $service = $this->serviceLocator->get(ModelFactoryInterface::class);
                $result = $service->create('D4D');
                break;
            case 'd4d':
                $service = $this->serviceLocator->get('D4D');
                $result = $service->create('D4D');
                break;
            default:
                throw new \Exception('Not implemented yet.');
        }

        return $this->json($result);
    }
}
