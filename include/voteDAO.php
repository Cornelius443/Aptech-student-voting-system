<?php
include("connection.php");
// Cornelius documentation

// VoteDAO class 
class VoteDAO{

// Data members    
private $INSERT_STUDENT = "INSERT INTO students(student_id, email, phone, date)VALUES(?,?,?,?)";    
private $CAST_VOTE = "INSERT INTO casted_votes(student_id, candidate, category, votes, date)VALUES(?,?,?,?,?)";
private $GET_STUDENT_BY_ID = "SELECT * FROM students WHERE student_id = ?";
private $CLEAR_TABLE = "TRUNCATE TABLE casted_votes";
private $GET_STUDENT_VOTE_CATEGORY = "SELECT * FROM casted_votes WHERE student_id = ? AND category = ?";
private $SELECT_COUNT = "SELECT COUNT(*) FROM students WHERE student_id = ?";
private $GET_STUDENT_BY_EMAIL = "SELECT * FROM students WHERE email = ?";



// Create student with a unique id 
function createStudent(Student $student){
    global $conn;
    do {

        // Generate a unique student ID
        $studentId = $this->generateStudentId();

        // Check if the student ID already exists in the database
        $stmtCount = $conn->prepare($this->SELECT_COUNT);
        $stmtCount->bind_param("s", $studentId);
        $stmtCount->execute();
        $stmtCount->bind_result($count);
        $stmtCount->fetch();
        $stmtCount->close();
        
    } while ($count > 0); // Keep generating until a unique student ID is found
    $student->setStudentId($studentId);
    $stmt = $conn->prepare($this->INSERT_STUDENT);
    $stmt->bind_param("ssss", $student->getStudentId(), $student->getEmail(), $student->getPhone(), $student->getDate());
    if($stmt->execute()){
        $sId = $student->getStudentId();
        return $sId;
        
    }else{
        $error = "error";
        return $error;
        
    }
}


// function to cast votes of each student
function castVote(Votes $vote){
    global $conn;
    $stmt = $conn->prepare($this->CAST_VOTE);
    $stmt->bind_param("sssis", $vote->getStudentId(), $vote->getCandidate(), $vote->getCategory(), $vote->getVotes(), $vote->getDate());
    if($stmt->execute()){
        $success = 'success';
        return $success;
        
    }else{
        $error = "error";
        return $error;
        
    }
}

// Getting students by their unique id
function getStudentById($studentId){
    global $conn;
    $stmt = $conn->prepare($this->GET_STUDENT_BY_ID);
    $stmt->bind_param("s", $studentId);
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
    
            $row = $result->fetch_assoc();
            return $this->extractStudentFromResultSet($row);
        }
    }
    return null;
}

// Getting students by email
function getStudentByEmail($email){
    global $conn;
    $stmt = $conn->prepare($this->GET_STUDENT_BY_EMAIL);
    $stmt->bind_param("s", $email);
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
    
            $row = $result->fetch_assoc();
            return $this->extractStudentFromResultSet($row);
        }
    }
    return null;

}

// Getting students voting category
function getStudentVotingCategory($studentId, $category){
    global $conn;

    $stmt = $conn->prepare($this->GET_STUDENT_VOTE_CATEGORY);
    $stmt->bind_param("ss",  $studentId, $category);

    if ($stmt->execute()) {
        
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {

            $row = $result->fetch_assoc();
            return $this->extractVotesFromResultSet($row);
        }
    }

    return null;
}

// extracting votes result set from database 
function extractVotesFromResultSet($row){
    $votes = new Votes();
    $votes->setId($row['id']);
    $votes->setStudentId($row['student_id']);
    $votes->setCandidate($row['candidate']);
    $votes->setCategory($row['category']);
    $votes->setVotes($row['votes']);
    $votes->setDate($row['date']);
    return $votes;
}

// clearing the result table function
function clearTable(){
    global $conn;
    $stmt = $conn->prepare($this->CLEAR_TABLE);
    if($stmt->execute()){
        
        header('Location: ../pages/liveResults.php');
        
    }else{
       echo '<script>alert("Error")</script>';
    }

}

// extracting student from result set
function extractStudentFromResultSet($row){
    $student = new Student();
    $student->setId($row['id']);
    $student->setStudentId($row['student_id']);
    $student->setEmail($row['email']);
    $student->setPhone($row['phone']);
    $student->setDate($row['date']);
    return $student;


}

// generate unique student id
function generateStudentId() {
    // Generate a unique student ID 
    return "STU" . uniqid();
}
}


?>