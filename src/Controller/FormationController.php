<?php

namespace App\Controller;

use App\Entity\Formation;
use App\Form\FormationCreateType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FormationController extends AbstractController
{
    #[Route('/formation', name: 'app_formation')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $formation = new Formation();
        $formFormation = $this->createForm(FormationCreateType::class, $formation);
        $formFormation->handleRequest($request);

        if ($formFormation->isSubmitted() && $formFormation->isValid()){
            $formFormation->getData();

            $entityManager->persist($formation);
            $entityManager->flush();
        }


        return $this->render('formation/formation.html.twig', [
    'formFormation' => $formFormation->createView(),
    ]);
    }
}


