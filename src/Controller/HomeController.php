<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use FOS\ElasticaBundle\Finder\TransformedFinder;
use Elastica\Util;

class HomeController extends AbstractController
{

    public function __construct(
        private readonly TransformedFinder $companyFinder
    ) {
    }

    #[Route('/', name: 'app_home')]
    public function index(): Response
    {

        // $search = Util::escapeTerm("Hahn");

        $result = $this->companyFinder->findHybrid("");

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
