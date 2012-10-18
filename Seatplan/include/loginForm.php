<!DOCTYPE HTML>
<html>
<head>
<title>Simple Login Form</title>
<meta charset="UTF-8" />
<meta name="Designer" content="PremiumPixels.com">
<meta name="Author" content="$hekh@r d-Ziner, CSSJUNTION.com">
<link rel="stylesheet" type="text/css" href="css/reset.css">
<link rel="stylesheet" type="text/css" href="css/structure.css">
</head>

<body>
<form class="box login" action="classes/Student.php?action=login" method="post">
	<fieldset class="boxBody">

        <label for="username">Username</label>
        <input type="text" name="username" id="username" autofocus required/>
 
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="password" autofocus required/>

	</fieldset>
	<footer>
	  <label><a href="include/registerForm.php" class="rLink" tabindex="5"><font size ="3">Register Now!</font></a></label>
	  <input type="submit" class="btnLogin" value="Login" tabindex="4">
	</footer>
</form>
<footer id="main">
</footer>
</body>
</html>

