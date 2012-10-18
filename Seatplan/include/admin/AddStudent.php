<?php
require_once('../../classes/Student.php');
$student = new Student;


if(!empty($_POST['lname'])AND !empty($_POST['fname'])
   AND !empty($_POST['mi'])
   AND !empty($_POST['gender'])){
        $student->addStudent($_POST['lname'],
                             $_POST['fname'],
                             $_POST['mi'],
                             $_POST['gender']);
}


header('location:../../index.php');

?>