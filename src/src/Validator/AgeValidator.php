<?php

namespace App\Validator;

use App\Entity\Employee;
use \App\Form\EmployeeType;
use http\Client\Request;

function ageValidator(Request $request): bool {

    $age = $request->get('age');
    $position = $request->get('position');
    if($age < 18 && position !== "Apprentice") {
        throw new Exception("The employee needs to be at least 18 years old!");
        return false;
    }
    return true;
}

