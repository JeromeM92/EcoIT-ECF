<?php

namespace App\Controller;

use App\Entity\Student;
use App\Form\RegistrationStudentFormType;
use App\Security\AppLoginAuthenticator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;

class StudentFormationController extends AbstractController
{
    #[Route('/student/formation', name: 'app_student_formation')]
    public function registerStudent(Request $request, UserPasswordHasherInterface $userPasswordHasher, UserAuthenticatorInterface $userAuthenticator, AppLoginAuthenticator $authenticator, EntityManagerInterface $entityManager): Response
    {
        $student = new Student();
        $formStudent = $this->createForm(RegistrationStudentFormType::class, $student);
        $formStudent->handleRequest($request);

        if ($formStudent->isSubmitted() && $formStudent->isValid()) {
            $student->setPassword(
                $userPasswordHasher->hashPassword(
                    $student,
                    $formStudent->get('plainPassword')->getData()
                )
            );

            $entityManager->persist($student);
            $entityManager->flush();

            return $userAuthenticator->authenticateUser(
                $student,
                $authenticator,
                $request
            );

        }
        return $this->render('student_formation/StudentFormation.html.twig', [
            'registrationStudentForm' => $formStudent->createView(),
        ]);
    }
}
