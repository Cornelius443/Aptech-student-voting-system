<?php // cornelius documentation

// casting student vote
include("student.php");
include("casted_votes.php");
include("voteDAO.php");

if ($_SERVER["REQUEST_METHOD"] == "POST"){

   // Sanitize input data
    $studentId = htmlspecialchars($_POST["studentId"]);
    $candidate = htmlspecialchars($_POST["candidate"]);
    $category = htmlspecialchars($_POST["category"]);
    $vote = 1;
    $currentDate = date('Y-m-d H:i:s');

    $voteDao = new VoteDAO();
    if($studentId == "" || $candidate == "" || $category == ""){
        $error = 'Fill in your student ID, category and faculty of choice';
        header('Location: ../pages/Voting_form.php?error='.$error);
    }else{
        // check if student id exist in the database
        
       
         $student = $voteDao->getStudentById($studentId);
      
        if($student == null){
            $error = 'Invalid Student ID';
            header('Location: ../pages/Voting_form.php?error='.$error);
        }else{
             //check if candidate is already casted a vote for this category
             
            $alreadyCasted = $voteDao->getStudentVotingCategory($studentId, $category);
           
            if($alreadyCasted != null){
                $error = 'You have voted for this category';
                header('Location: ../pages/Voting_form.php?error='.$error);
            }else{
                
                // cast student vote
                $votes = new Votes();
               
                $votes->setStudentId($studentId);
                $votes->setCandidate($candidate);
                $votes->setCategory($category);
                $votes->setVotes($votes);
                $votes->setDate($currentDate);
                
                
                $castVote = $voteDao->castVote($votes);

               
                if($castVote == 'success'){
                    $success = "Your vote has been recorded successfully!";
                    header('Location: ../pages/Voting_form.php?success='.$success);
                }else{
                    $error = "Error in casting vote please try again";
                    header('Location: ../pages/Voting_form.php?error='.$error);
                }


            }
        }
        
    }

}
else{
    
        // Handle cases where voting wasn't casted properly
            $error = 'Unauthorized Access';
            header('Location: ../pages/Voting_form.php?error='.$error);
            return false;
    
}


?>