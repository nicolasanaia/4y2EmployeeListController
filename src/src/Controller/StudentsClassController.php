<?php

namespace App\Controller;

use App\Entity\StudentsClass;
use App\Form\StudentsClassType;
use App\Repository\StudentsClassRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/students/class')]
class StudentsClassController extends AbstractController
{
    #[Route('/', name: 'students_class_index', methods: ['GET'])]
    public function index(StudentsClassRepository $studentsClassRepository): Response
    {
        return $this->render('students_class/index.html.twig', [
            'students_classes' => $studentsClassRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'students_class_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $studentsClass = new StudentsClass();
        $form = $this->createForm(StudentsClassType::class, $studentsClass);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($studentsClass);
            $entityManager->flush();

            return $this->redirectToRoute('students_class_index');
        }

        return $this->render('students_class/new.html.twig', [
            'students_class' => $studentsClass,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'students_class_show', methods: ['GET'])]
    public function show(StudentsClass $studentsClass): Response
    {
        return $this->render('students_class/show.html.twig', [
            'students_class' => $studentsClass,
        ]);
    }

    #[Route('/{id}/edit', name: 'students_class_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, StudentsClass $studentsClass): Response
    {
        $form = $this->createForm(StudentsClassType::class, $studentsClass);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('students_class_index');
        }

        return $this->render('students_class/edit.html.twig', [
            'students_class' => $studentsClass,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'students_class_delete', methods: ['POST'])]
    public function delete(Request $request, StudentsClass $studentsClass): Response
    {
        if ($this->isCsrfTokenValid('delete'.$studentsClass->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($studentsClass);
            $entityManager->flush();
        }

        return $this->redirectToRoute('students_class_index');
    }
}
