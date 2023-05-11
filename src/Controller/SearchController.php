<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use FOS\ElasticaBundle\Finder\TransformedFinder;
use Elastica\Util;
use Symfony\Component\HttpFoundation\Request;
use Knp\Component\Pager\PaginatorInterface;

class SearchController extends AbstractController
{

    public function __construct(
        private readonly TransformedFinder $companyFinder
    ) {
    }

    #[Route('/search', name: 'app_search')]
    public function search(Request $request, PaginatorInterface $paginator): Response
    {
        $q = Util::escapeTerm($request->query->get('q', ''));
        $page = Util::escapeTerm($request->query->getInt('page', 1));

        $results = $this->companyFinder->createPaginatorAdapter($q);

        $pagination = $paginator->paginate($results, $page, 10);

        $pagination_results = $pagination->getItems();

        foreach ($pagination_results as $company) {
            $company->categories = implode(" | ", $company->getCategory()->toArray(),);
        }
        
        return $this->render('search/index.html.twig', ['pagination' => $pagination, 'q' => $q]);
    }
}
