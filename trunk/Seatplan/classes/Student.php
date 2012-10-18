<?php
require_once('MySQLdatabase.php');
 
class Student extends MySQLdatabase{
     
    public function addStudent($fname,$lname,$mi,$gender){
        $this->connectDatabase();
         
        $sQuery = "INSERT INTO student(stud_lname,stud_fname,stud_mi,stud_gender)
                    VALUES ('$fname','$lname','$mi','$gender')";
         
        $result = mysql_query($sQuery); //EXECUTE SQL
    }
     
    public function getStudent(){
        $this->connectDatabase();
        $sQuery = "SELECT stud_id,stud_lname,stud_fname,stud_mi,stud_gender FROM Student ORDER BY stud_lname ASC";
        $result = mysql_query($sQuery);
        $ctr = 0;
         
        while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
            $student[$ctr++] = array('id'=>$row['stud_id'],
                                     'lname'=>$row['stud_lname'],
                                     'fname'=>$row['stud_fname'],
                                     'mi'=>$row['stud_mi'],
                                     'gender'=>$row['stud_gender']);
        }
        
        if(!isset($student)){
            $student = null;
        }
        
        return $student;
    }
    
    public function updateStudent($id,$fname,$lname,$mi,$gender){
        $this->connectDatabase();
        $sQuery = "UPDATE Student SET stud_lname = '$lname', stud_fname = '$fname', stud_mi = '$mi', stud_gender = '$gender'
                   WHERE stud_id = $id";
        $result = mysql_query($sQuery); //EXECUTE SQL
    }
    
    public function deleteStudent($id){
        $this->connectDatabase();
        $sQuery ="DELETE FROM Student WHERE stud_id = $id";
        mysql_query($sQuery);
    }
    
    public function deleteAllStudent($id){
        $this->connectDatabase();
        $sQuery ="DELETE FROM Student";
        mysql_query($sQuery);
    }
    
    public function checkUserAccount($username,$password){
        $this->connectDatabase();
        $sQuery = "SELECT * FROM account WHERE username='$username' and userpass=md5('$password');";
        $result = mysql_query($sQuery);
        $ctr = 0;
        $row = mysql_fetch_row($result);
        if(!isset($row)){
            $row = null;
        }
        
        return $row;
    }
    public function getSeatList(){
        $this->connectDatabase();
        $ctr = 0;
        $result = mysql_query("SELECT seat_id, stud_fname, stud_lname FROM student_subject, student WHERE student_subject.stud_id = student.stud_id ORDER BY seat_id ASC");
        while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
            $student[$ctr++] = array('seat'=>$row['seat_id'],
                                     'fname'=>$row['stud_fname'],
                                     'lname'=>$row['stud_lname']);
        }
        for($x = 0, $y = 0; $x < $this->getSize(); $x++){
        if(!empty($student[$y]['seat'])){
            if($student[$y]['seat'] == $x + 1){
                $studnew[$x] = array('seat'=>$student[$y]['seat'],
                                     'fname'=>$student[$y]['fname'],
                                     'lname'=>$student[$y]['lname']);
                $y++;
            }
            else {
                $studnew[$x] = array('seat'=>'0',
                                     'fname'=>'0',
                                     'lname'=>'0');
            }
            }
        else {
                $studnew[$x] = array('seat'=>'0',
                                     'fname'=>'0',
                                     'lname'=>'0');
            }
        }
        
        return $studnew;
    }
    public function getSize(){
        $this->connectDatabase();
        return mysql_num_rows(mysql_query("SELECT * FROM student_subject"));
    }
    public function getAvail(){
        $this->connectDatabase();
        $ctr = 0;
        $result = mysql_query("SELECT seat_id FROM student_subject WHERE stud_id = 0");
        while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
                $student[$ctr++] = array('seat'=>$row['seat_id']);
        }
            return $student;
    }
    public function countAvail(){
        $this->connectDatabase();
        return mysql_num_rows(mysql_query("SELECT seat_id FROM student_subject WHERE stud_id = 0"));
    }
    public function getSeat($id){
        $this->connectDatabase();
        $student = NULL;
        $result = mysql_query("SELECT seat_id FROM student_subject WHERE stud_id = '$id'");
        while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
                $student = $row['seat_id'];
        }
            return $student;
    }
    public function getName($notif){
        $this->connectDatabase();
        $find = mysql_query("SELECT stud_fname FROM account, student WHERE account.stud_id = student.stud_id
                            AND account.stud_id = '$notif'");
        while($row = mysql_fetch_array($find, MYSQL_ASSOC))
            $name = $row['stud_fname'];
        $find = mysql_query("SELECT stud_lname FROM account, student WHERE account.stud_id = student.stud_id
                            AND account.stud_id = '$notif'");
        while($row = mysql_fetch_array($find, MYSQL_ASSOC))
            $name .= ' '.$row['stud_lname'];
        return $name;
    }
}

if(isset($_GET['action'])){

if($_GET['action'] == 'login'){    
$student = new Student;
$uname = $_POST['username'];
$upass = $_POST['password'];
$studenAccount = $student->checkUserAccount($uname,$upass);

if(empty($studenAccount)){
    header('Location: ../index.php?error=1');
    echo "Invalid username or password";
}
else{
    session_start();
    $_SESSION['login'] = 1;
    $find = mysql_query("SELECT stud_id FROM account WHERE username = '$uname'");
    while($row = mysql_fetch_array($find, MYSQL_ASSOC)){
            $id = $row['stud_id'];
            $_SESSION['id'] = $id;
        }
    
    $find = mysql_query("SELECT stud_fname FROM account,student  WHERE account.stud_id = '$id'  AND student.stud_id = '$id'");
    while($row = mysql_fetch_array($find, MYSQL_ASSOC)){
            $_SESSION['fname'] = $row['stud_fname'];
        }
    $find = mysql_query("SELECT stud_lname FROM account,student  WHERE account.stud_id = '$id' AND student.stud_id = '$id'");
    while($row = mysql_fetch_array($find, MYSQL_ASSOC)){
            $_SESSION['lname'] = $row['stud_lname'];
        }
    $find = mysql_query("SELECT userlevel FROM account WHERE username = '$uname'");
    while($row = mysql_fetch_array($find, MYSQL_ASSOC)){
            $_SESSION['userlevel'] = $row['userlevel'];
        }
    $find = mysql_query("SELECT notif FROM account WHERE username = '$uname'");
    while($row = mysql_fetch_array($find, MYSQL_ASSOC)){
            $_SESSION['notif'] = $row['notif'];
        }
    echo $_SESSION['fname'].$_SESSION['lname'];
    header("Location: ../index.php");
}
}
if($_GET['action'] == 'signup'){    
$student = new Student;
$uname = $_POST['username'];
$upass = md5($_POST['password']);
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$mi = $_POST['mi'];
$sex = $_POST['sex'];
$seat = $_POST['seat'];
$student->connectDatabase();
    if(mysql_num_rows(mysql_query("SELECT * FROM account WHERE username = '$uname'")) != 0){
        header('Location: ../include/registerForm.php?error=2');
    }
    else{
        mysql_query("INSERT student SET stud_lname='$lname',stud_fname='$fname',stud_mi='$mi',stud_gender='$sex'");
        $row = mysql_fetch_array(mysql_query("SELECT * FROM student WHERE stud_lname='$lname'"), MYSQL_ASSOC);
        $id = $row['stud_id'];
        mysql_query("INSERT account SET username='$uname',userpass='$upass',userlevel=0,stud_id='$id'");
        mysql_query("UPDATE student_subject SET stud_id='$id' WHERE seat_id = '$seat'");
        header('Location: ../index.php');
    }
}
}
elseif(isset($_GET['seatEx'])){
    $student = new Student;
    $student->connectDatabase();
    session_start();
    $seat = $student->getSeat($_SESSION['id']);
    $seatEx = $_GET['seatEx'] + 1;
    $row = mysql_fetch_array(mysql_query("SELECT stud_id FROM student_subject WHERE seat_id = '$seat'"));
    $id = $row['stud_id'];
    mysql_query("UPDATE student_subject SET stud_id = '$id' WHERE seat_id = '$seatEx'");
    mysql_query("UPDATE student_subject SET stud_id = 0 WHERE seat_id = '$seat'");
    header('Location: ../include/student/stud.php?action=student');
    
}
elseif(isset($_GET['notif'])){
    $student = new Student;
    session_start();
    $id = $_SESSION['id'];
    $idEx = $_GET['notif'];
    $idSeat = $student->getSeat($id);
    $idExSeat = $student->getSeat($idEx);
    if(isset($_POST['accept'])){
        mysql_query("UPDATE student_subject SET stud_id = '$id' WHERE seat_id = '$idExSeat'");
        mysql_query("UPDATE student_subject SET stud_id = '$idEx' WHERE seat_id = '$idSeat'");
        mysql_query("UPDATE account SET notif='0' WHERE stud_id = '$id'");
    }
    else if(isset($_POST['decline'])){
        mysql_query("UPDATE account SET notif='0' WHERE stud_id = '$id'");
    }
    $_SESSION['notif'] = 0;
    header('Location: ../include/student/stud.php?action=student');
}
elseif(isset($_GET['request'])){
    $student = new Student;
    $student->connectDatabase();
    session_start();
    $id = $_SESSION['id'];
    $req = $_GET['request'] + 1;
    $find = mysql_query("SELECT stud_id FROM student_subject WHERE seat_id = '$req'");
    while($row = mysql_fetch_array($find, MYSQL_ASSOC)){
            $idReq = $row['stud_id'];
        }
    mysql_query("UPDATE account SET notif='$id' WHERE stud_id = '$idReq'");
    header('Location: ../include/student/stud.php?action=student');
}
?>