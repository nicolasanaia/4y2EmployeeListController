<?php

namespace App\Controller;

use App\Entity\Employee;
use App\Repository\EmployeeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */

    public function index(EmployeeRepository $employeeRepository): Response
    {
        $employee = $employeeRepository -> findAll();

        return $this->render('home/index.html.twig', [
            "employee" => $employee
        ]);
    }

    /**
     * @Route("/addemployee", name="addEmployee")
     */

    public function addEmployee(Request $request, EmployeeRepository $employeeRepository){
        $name = $request->get('name');
        $position = $request->get('position');
        $age = $request->get('age');

        $employee = new Employee($name, $position, $age);
        $employeeRepository->save($employee);
        

        $this->addFlash("message", "Employee registered successfully");
        return $this->redirectToRoute("home");
    }

    /**
     * @Route("/edit/{id}", name="edit")
     */

    public function edit(Employee $employee): Response
    {
        return $this->render('home/form.html.twig', [
            "employee" => $employee
        ]);
    }

    /**
     * @Route("/edit/save/{id}", name="edit_save")
     */
    public function saveEdition(Request $request, Employee $employee, EmployeeRepository $employeeRepository): Response
    {
        $name = $request->get('name');
        $position = $request->get('position');
        $age = $request->get('age');

        $employee->setName($name);
        $employee->setPosition($position);
        $employee->setAge($age);

        $employeeRepository->save($employee);

        $this->addFlash("message", "Employee edited successfully");

        return $this->redirectToRoute("home");

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
