<?php
// Cornelius Documentation
// Votes class 
class Votes{


private $id;
private $studentId;
private $candidate;
private $category;
private $votes;
private $date;


public function getId()
{
    return $this->id;
}

public function setId($id)
{
    $this->id = $id;
}



public function getStudentId()
{
    return $this->studentId;
}


public function setStudentId($studentId)
{
    $this->studentId = $studentId;
}


public function setCandidate($candidate){
    $this->candidate = $candidate;
}

public function getCandidate(){
    return $this->candidate;
}

public function setCategory($category){
    $this->category = $category;
}

public function getCategory(){
    return $this->category;
}

public function setVotes($votes){
    $this->votes = $votes;
}

public function getVotes(){
    return $this->votes;
}

public function setDate($date){
    $this->date = $date;
}

public function getDate(){
    return $this->date;
}

}





?>