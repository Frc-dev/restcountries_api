<?php

declare(strict_types=1);

namespace App\Controller;

use App\Domain\ApiResponse;
use Symfony\Component\Messenger\MessageBusInterface;


class CountryController extends ApiController
{
    private MessageBusInterface $queryBus;
    private ApiResponse $apiResponse;

    public function __construct(
        MessageBusInterface $queryBus,
        ApiResponse $apiResponse
    )
    {
        parent::__construct();
        $this->queryBus = $queryBus;
        $this->apiResponse = $apiResponse;
    }
}