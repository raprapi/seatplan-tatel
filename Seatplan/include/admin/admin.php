<?php
//include_once('adminNav.php');
//
//if(!isset($_GET['action'])){
//    include_once('adminContent.php');    
//}
//
//elseif($_GET['action'] == "addrecord"){
//    include_once('addStudentForm.php');    
//}
//else{
//    
//}
if(!isset($_GET['action'])){
    require_once('classes/Student.php');
$student = new Student;
}
else session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Block 3D - free website template from templatemo.com</title>
<meta name="keywords" content="block 3d free template, colorful, website template, CSS, HTML" />
<meta name="description" content="Block 3D with a colorful header, free website template provided by templatemo.com" />
<link href="<?php if(!isset($_GET['action'])) echo 'css/templatemo_style.css'; else echo '../../css/templatemo_style.css';?>" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript">
function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}
</script>
</head>
<body>
<div id="templatemo_header_wrapper">
<!--  Free CSS Templates by TemplateMo.com  -->
	<div id="templatemo_header">
 
    	<div class="cleaner"></div>
    </div> <!-- end of header -->
</div> <!-- end of header wrapper --> 


    <div id="templatemo_content_outer_wrapper">
    <div id="templatemo_content_inner_wrapper">
    
    	<div id="tempatemo_content">
        
            <?php include_once('adminNav.php'); ?>
            <?php if(isset($_GET['action'])){
                if($_GET['action'] == 'student')include_once('adminViewRec.php');
                else if($_GET['action'] == 'admin') include_once('adminContent.php');
            }
            else include_once('adminContent.php');
            ?>
            <?php include_once('adminRight.php'); ?>
            
            
            <div class="cleaner"></div>
        
        </div><!-- end of content -->
    
    </div> <!-- end of inner content wrapper -->
    </div> <!-- end of outer content wrapper -->

<div id="templatemo_footer_wrapper">
    <div id="templatemo_footer">
    

<!--  Free Website Templates by www.TemplateMo.com  -->
<div align=center>This template  downloaded form <a href='http://all-free-download.com/free-website-templates/'>free website templates</a></div></body>
</html>