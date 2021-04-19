<?php

namespace App\Controller;

use App\Entity\Employee;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        $nicolas = new Employee("Nicolas Anaia", "Intern", 22);
        $rafael = new Employee("Rafael Sakamoto", "Intern", 33);
        $artur = new Employee("Artur Sampaio", "Intern", 22);
        $anni = new Employee("Anielly Lemos", "Intern", 22);
        $joao = new Employee("João Paulo", "Intern", 26);

        $employee = [$nicolas, $rafael, $artur, $anni, $joao];

        return $this->render('home/index.html.twig', [
            "employee" => $employee
        ]);
    }
}
