<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Company;
use Symfony\Component\HttpFoundation\Request;
use App\Form\CompanyFormType;
use FOS\ElasticaBundle\Finder\TransformedFinder;
use Elastica\Util;
use Elastica\Query\MatchQuery;


class CompanyController extends AbstractController
{
    #[Route('/company/add', name: 'app_company_add')]
    public function add(Request $request, EntityManagerInterface $entityManager): Response
    {

        $company = new Company();
        $form = $this->createForm(CompanyFormType::class, $company);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager->persist($company);
            $entityManager->flush();

            $this->addFlash('success', 'Business successfully created!');

            return $this->redirectToRoute('app_company_add');
        }

        return $this->render('company/add.html.twig', [
            'companyForm' => $form->createView(),
        ]);
    }

    #[Route('/company/show', name: 'app_company', )]
    public function show(Request $request, TransformedFinder $companyFinder): Response
    {

        $id = Util::escapeTerm($request->query->getInt('id', '1'));

        $fieldQuery = new MatchQuery();
        $fieldQuery->setFieldQuery('id', $id);
        $results = $companyFinder->find($fieldQuery);

        $company = $results[0];
        $company->categories = implode(" | ", $company->getCategory()->toArray(),);     
        
        return $this->render('company/show.html.twig', ['company' => $company, 'id' => $id]);
    }
}
