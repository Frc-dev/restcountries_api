<?php

declare(strict_types=1);

namespace App\Controller;


use App\Application\GetCountriesApi\GetCountriesApiQuery;
use App\Application\ReadCountries\ReadCountriesQuery;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends ApiController
{
    private MessageBusInterface $queryBus;

    public function __construct(
        MessageBusInterface $queryBus,
    )
    {
        parent::__construct();
        $this->queryBus = $queryBus;
    }

    #[Route('/')]
    public function indexNoLocale(): Response
    {
        return $this->redirectToRoute('homepage', ['_locale' => 'en']);
    }

    #[Route('/{_locale<en|es>}/', name: 'homepage')]
    public function index(): Response
    {
        $countryList = $this->queryBus->dispatch(new GetCountriesApiQuery());
        //$countryList = $this->queryBus->dispatch(new ReadCountriesQuery());
        return $this->render('views/index.html.twig', ['countryList' => $countryList]);
    }
}