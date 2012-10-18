<?php
session_start();

if(isset($_GET['action'])){
    if($_GET['action'] == 'logout'){
        header('Location: index.php');
        unset($_SESSION['login']);
    }
    elseif($_GET['action' == 'student']){
        
    }
}
elseif(!isset($_SESSION['login'])){
    if(isset($_GET['error'])){
    if($_GET['error'] == '1') include_once('/include/loginForm.php');
    else include_once('/include/registerForm.php');
    }
    else include_once('/include/loginForm.php');
}

else{
    if(isset($_SESSION['userlevel'])){
    //include_once('/template/header.php');
    if($_SESSION['userlevel'] == 1) include_once('/include/admin/Admin.php');
    else include_once('/include/student/stud.php');
    //include_once('/template/footer.php');
    }
}


?>