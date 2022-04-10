<?php

namespace App\Controller;

use App\Repository\TeacherRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'app_admin')]
    public function displayTeacher(TeacherRepository $teacherRepository): Response
    {
        $teachers = $teacherRepository->findAll();
        return $this->render('admin/admin.html.twig', [
            'teachers' => $teachers,
        ]);
    }
}
