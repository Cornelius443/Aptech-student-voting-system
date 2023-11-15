<?php
// Cornelius documentation

// Student class

class Student{

    private $id;
    private $studentId;
    private $email;
    private $phone;
    private $date;


    public function getId()
    {
        return $this->id;
    }

    public function getStudentId()
    {
        return $this->studentId;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setStudentId($studentId)
    {
        $this->studentId = $studentId;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }
}







?>