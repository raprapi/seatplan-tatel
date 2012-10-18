






<!DOCTYPE html>
<html class="no-js">
<head>
<meta charset="utf-8" />
<title>jQuery Show Password Plugin</title>
<link href="../css/style.css" rel="stylesheet" media="screen,projection" />
<style>
.forms li {
  position: relative;
}
.show-password-link {
  display: block;
  position: absolute;
  z-index: 11;
}
.password-showing {
  position: absolute;
  z-index: 10;
}
</style>
</head>
    
<body>

  <form action="../classes/Student.php?action=signup" method="post">
    <!--<h1 style="color: #ffffff; font-size: x-large;">SignUp</h1>-->
    <ol class="forms">
      <li>
        <label for="username">Username</label>
        <input type="text" name="username" id="username" autofocus required/>
      </li>
      <li>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="password" autofocus required/> 
      </li>
      <li>
        <label for="fname">First Name</label>
        <input type="text" name="fname" autofocus required/>
      </li>
      <li>
        <label for="lname">Last Name</label>
        <input type="text" name="lname" autofocus required/>
      </li>
      <li>
        <label for="mi">MI</label>
        <input type="text" name="mi" autofocus required/>
      </li>
      <li>
        <label for="sex">Sex</label>
        <select name="sex" size="1" style="height: 43px; width: 205px;" autofocus required>
	  <option value=""></option>
	  <option value="Female">Female</option>
	  <option value="Male">Male</option>
	</select>
      </li>
      <li>
        <label for="seat">Seat #</label>
        <select name="seat" size="1" style="height: 43px; width: 205px;" autofocus required>
        <option value=""></option>
        <?php
            include_once('../classes/Student.php');
            $student = new Student;
            $data = $student->getAvail();
            for($x = 0; $x < $student->countAvail(); $x++){
                echo '<option value="'.$data[$x]['seat'].'">'.$data[$x]['seat'].'</option>';
            }
        ?>
        </select>
      </li>
      <li class="buttons">
        <button type="submit">Sign-Up</button>
      </li>
    </ol>
    <?php
    if(isset($_GET['error'])){
    echo '<p style="color: white">[Username already existing]</p>';
    }
    ?>
  </form>
  <form action="../index.php" method="post" style="background-color: transparent">
    <button style="top: 410px; left: 530px; position: absolute;" class="buttons" type="submit" align="left">log-in</button>
  </form>
<script src="scripts/jquery.js"></script>
<script src="scripts/jquery.showPassword.js"></script>
<script>
$(document).ready(function() {
  $(':password').showPassword({
    linkRightOffset: 5,
    linkTopOffset: 11
  });
});
</script>
</body>
</html>
