function ageValidation(){
    console.log("Hello world")
    const age = document.getElementById("employee_age").value;
    const position = document.getElementById("employee_position").value;

    if(age < 18 && position !== "Apprentice") {
        alert("The employee needs to be at least 18 years old.");
        return false;
    }
    else {
        return true;
    }
}