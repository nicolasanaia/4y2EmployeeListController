<?php


namespace App\Service;


use App\Entity\Students;
use App\Entity\ViewHistory;
use App\Repository\StudentsRepository;

class LoggerService
{
    /**
     * @var StudentsRepository
     */
    private StudentsRepository $studentsRepository;

    public function __construct(StudentsRepository $studentsRepository )
    {
        $this->studentsRepository = $studentsRepository;
    }

    public function logView(Students $students){
        $students->addViewHistory(new ViewHistory());
        $this->studentsRepository->save($students);
    }
}