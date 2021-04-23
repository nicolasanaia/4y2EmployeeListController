<?php

namespace App\Controller;

use App\Form\EmployeeType;
use App\Entity\Employee;
use Doctrine\ORM\EntityRepository;
use App\Repository\EmployeeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function App\Validator\ageValidator;
use Symfony\Component\Validator\Constraints as Assert;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */

    public function index(EmployeeRepository $employeeRepository): Response
    {
        $employee = $employeeRepository->findAll();
        $form = $this->createForm(EmployeeType::class);
        return $this->render('home/index.html.twig', [
            "employee" => $employee,
            "formEmployee" => $form->createView()
        ]);
    }

    /**
     * @Route("/addemployee", name="addEmployee")
     */

    public function addEmployee(Request $request, EmployeeRepository $employeeRepository) {
        $employee = $employeeRepository->findAll();

        $form = $this->createForm(EmployeeType::class);
        $form->handleRequest($request);
        $employee = $form->getData();

        if($form->isValid()){
        $employeeRepository->save($employee);
        $this->addFlash("message", "Employee added successfully");

        return $this->redirectToRoute("home");
        }
        else {
            $this->addFlash("message", "Please, insert the correct info");
            return $this->render('home/index.html.twig', [
                "employee" => $employee,
                "formEmployee" => $form->createView()
            ]);
        }
        }


    /**
     * @Route("/edit/{id}", name="edit")
     */

    public function edit(Employee $employee): Response
    {
        $form = $this->createForm(EmployeeType::class, $employee);
        return $this->render('home/form.html.twig', [
            "employee" => $employee,
            "formEmployee" => $form->createView()
        ]);
    }

    /**
     * @Route("/edit/save/{id}", name="edit_save")
     */
    public function saveEdition(Request $request, Employee $employee, EmployeeRepository $employeeRepository): Response
    {
        $form = $this->createForm(EmployeeType::class, $employee);
        $form->handleRequest($request);
        $employee = $form->getData();

        if($form->isValid()) {
            $employeeRepository->save($employee);
            $this->addFlash("message", "Employee added successfully");

            return $this->redirectToRoute("home");
        }
        else {
            $this->addFlash("message", "Please, insert the correct info");
            return $this->render('home/form.html.twig', [
                "employee" => $employee,
                "formEmployee" => $form->createView()
            ]);
        }
    }

    /**
     * @Route("/remove/{id}", name="remove")
     */
    public function remove(Employee $employee, EmployeeRepository $employeeRepository): Response
    {
        $employeeRepository->remove($employee);
        $this->addFlash("message", "Employee removed successfully");

        return $this->redirectToRoute("home");

    }
}
