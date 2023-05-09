<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Company;
use Symfony\Component\HttpFoundation\Request;
use App\Form\CompanyFormType;


class CompanyController extends AbstractController
{
    #[Route('/company', name: 'app_company')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {

        $company = new Company();
        $form = $this->createForm(CompanyFormType::class, $company);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager->persist($company);
            $entityManager->flush();

            $this->addFlash('success', 'Company successfully created!');

            return $this->redirectToRoute('app_company');
        }

        return $this->render('company/index.html.twig', [
            'companyForm' => $form->createView(),
        ]);
    }
}
