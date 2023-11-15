<?php
// Cornelius documentation

// Generating unique student id for voting
include("voteDAO.php");

include("student.php");

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    // sanitizing inputs
      $email = htmlspecialchars($_POST["email"]);
      $phone = htmlspecialchars($_POST["phoneNo"]);
      $currentDate = date('Y-m-d H:i:s');      

    if($email == "" || $phone == ""){
        $error = 'Fill in the required details';
        header('Location: ../pages/generateid.php?error='.$error);
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){ // validating email
        $error = 'Invalid Email Try Again';
        header('Location: ../pages/generateid.php?error='.$error);
    }
    else{
        // check if email has already been taken by a student
        $voteDAO = new VoteDAO();
        $student = $voteDAO->getStudentByEmail($email);
        if($student != null){
            $error = 'A student with this email address already exists';
            header('Location: ../pages/generateid.php?error='.$error);
        }else{
            // create a new student and save it to database
            $newStudent = new Student();
            $newStudent->setEmail($email);
            $newStudent->setPhone($phone);
            $newStudent->setDate($currentDate);
            $vDAO = new VoteDAO();


            $createStudent = $vDAO->createStudent($newStudent);

            if($createStudent != null){
                $success = "ID generated successfully kindly save this ID. ".$createStudent;
                header('Location: ../pages/generateid.php?success='.$success);
            }else{
                $error = "Error in generating student Id please try again";
                header('Location: ../pages/generateid.php?error='.$error);
            }
            
        }
    }

}else{
    
       // if form was not submitted correctly
            $error = 'Unauthorized Access';
            header('Location: ../pages/generateid.php?error='.$error);
            return false;
    
}

?>