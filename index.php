<?php
include_once 'connect_db.php';
if(isset($_POST['submit'])){
$username=$_POST['username'];
$password=$_POST['password'];
$position=$_POST['position'];
switch($position){
case 'Admin':
$result=mysql_query("SELECT admin_id, username FROM admin WHERE username='$username' AND password='$password'");
$row=mysql_fetch_array($result);
if($row>0){
session_start();
$_SESSION['admin_id']=$row[0];
$_SESSION['username']=$row[1];
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/admin.php");
}else{
$message="<font color=red>Invalid login Try Again</font>";
}
break;
case 'Pharmacist':
$result=mysql_query("SELECT pharmacist_id, first_name,last_name,staff_id,username FROM pharmacist WHERE username='$username' AND password='$password'");
$row=mysql_fetch_array($result);
if($row>0){
session_start();
$_SESSION['pharmacist_id']=$row[0];
$_SESSION['first_name']=$row[1];
$_SESSION['last_name']=$row[2];
$_SESSION['staff_id']=$row[3];
$_SESSION['username']=$row[4];
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/pharmacist.php");
}else{
$message="<font color=red>Invalid login Try Again</font>";
}
break;
case 'Cashier':
$result=mysql_query("SELECT cashier_id, first_name,last_name,staff_id,username FROM cashier WHERE username='$username' AND password='$password'");
$row=mysql_fetch_array($result);
if($row>0){
session_start();
$_SESSION['cashier_id']=$row[0];
$_SESSION['first_name']=$row[1];
$_SESSION['last_name']=$row[2];
$_SESSION['staff_id']=$row[3];
$_SESSION['username']=$row[4];
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/cashier.php");
}else{
$message="<font color=red>Invalid login Try Again</font>";
}
break;
case 'Manager':
$result=mysql_query("SELECT manager_id, first_name,last_name,staff_id,username FROM manager WHERE username='$username' AND password='$password'");
$row=mysql_fetch_array($result);
if($row>0){
session_start();
$_SESSION['manager_id']=$row[0];
$_SESSION['first_name']=$row[1];
$_SESSION['last_name']=$row[2];
$_SESSION['staff_id']=$row[3];
$_SESSION['username']=$row[4];
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/manager.php");
}else{
$message="<font color=red>Invalid login Try Again</font>";
}
break;
}}
echo <<<LOGIN
<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="home_page/css/modal1.css">
<link rel="stylesheet" type="text/css" href="home_page/css/home.css">
<link rel="stylesheet" type="text/css" href="home_page/css/modal.css">
<head>
<script type = "text/javascript" >
       function preventBack(){window.history.forward(1);}
        setTimeout("preventBack()", 10);
        window.onload=function(){null};
    </script>  
        <script src="home_page/js/jquery.min.js">
</script>
        
        <link rel="stylesheet" href="home_page/css/responsiveslides.css">
        <script src="home_page/js/responsiveslides.min.js"></script>
        <script>
                    $(function () {
                      $("#slider1").responsiveSlides({
                        width: 600,
                        speed: 600
                      });
                });
        </script>
       </head>

<title>Pharmacy Management System</title>
</head>
<body>
	<div id="header"><img class="i" src="home_page/images/plogo.jpg">
    <h1 class="head"><br>Pharmacy Management System</h1><h3><marquee>"It is easy to get a thousand prescriptions,but hard to get one single remedy"</h3></marquee>
                        </div>
	<div id="center">
    <div class="image-slider">
            <!-- Slideshow 1 -->
            <ul class="rslides" id="slider1">
                <li>
                    <img src="home_page/images/6.jpg" alt="">
                </li>
                <li>
                    <img src="home_page/images/7.jpg" alt="">
                </li>
                <li>
                    <img src="home_page/images/8.jpg" alt="">
                </li>
                <li><img src="home_page/images/9.jpg" alt=""></li>
                <li><img src="home_page/images/10.jpg" alt=""></li>
                
            </ul></div>
        </div>

<div id="vertical">

  <section class="container">
  
     <div class="login">
      <body background="images/main_logo.jpg">    
      <h1>Login here</h1>
	  $message
      <form method="post" action="index.php">
		 <p><input type="text" name="username" value="" placeholder="Username"></p>
        <p><input type="password" name="password" value="" placeholder="Password"></p>
		<p><select name="position">
		<option>--Select position--</option>
			<option>Admin</option>
			<option>Pharmacist</option>
			<option>Cashier</option>
			<option>Manager</option>
			</select></p>
        <p class="submit"><input type="submit" name="submit" value="Login"></p>
      </form>
    </div>
    </section>
</div>
<div id="btm">
            
                  <ul><p><a class="foot" href="about/about.html">ABOUT US</a></p></ul>
                  <div id="imga" ><img class="im" src="home_page/images/clogo.jpg" href="../home.php"></div>
				  
				  
<div id="down2">PMS was Developed By the team Andro Ciphers</div>
</div>
</div>
</body>
</html>
LOGIN;
?>
