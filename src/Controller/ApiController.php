<?php

declare(strict_types=1);

namespace App\Controller;


use App\Domain\ApiResponse;
use App\Domain\Bus\Command\Command;
use App\Domain\Bus\Query\Query;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Messenger\MessageBusInterface;

abstract class ApiController extends AbstractController
{

    public function __construct
    (
        MessageBusInterface $queryBus,
        ApiResponse $apiResponse
    )
    {
        $this->queryBus = $queryBus;
        $this->apiResponse = $apiResponse;
    }

    protected function ask(Query $query): void
    {
    }

    protected function dispatch(Command $command): void
    {
    }
}
