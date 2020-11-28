<?php
session_start();
include_once('connect_db.php');
if(isset($_SESSION['username'])){
$id=$_SESSION['cashier_id'];
$user=$_SESSION['username'];
}else{
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."index.php");
exit();
}
if(isset($_POST['submit'])){
$invoice_no=$_POST['invoice_no'];
$cname=$_POST['customer_name'];
$ptype=$_POST['payment_type'];
$total=$_POST['total_ammount'];



$sql=mysql_query("INSERT INTO payment_details(invoice_no,customer_name,payment_type,total_ammount)
VALUES('$invoice_no','$cname','$ptype','$total')");
if($sql>0) {header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/payment.php");
}else{
$message1="<font color=red>Registration Failed, Try again</font>";
}
	}
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $user;?> -Pharmacy Management System</title>
<link rel="stylesheet" type="text/css" href="style/mystyle.css">
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" /> 
<link rel="stylesheet" href="style/table.css" type="text/css" media="screen" /> 
<script src="js/function.js" type="text/javascript"></script>
<style>#left-column {height: 477px;}
 #main {height: 477px;}</style>
</head>
<body>
<div id="content">
<div id="header">
<h1><a href="#"><img src="images/main_logo.jpg"></a> Pharmacy Management System</h1></div>
<div id="left_column">
<div id="button">
<ul>
			<li><a href="manager.php">Dashboard</a></li>
			<li><a href="view.php">Process Payments</a></li>
			
			<li><a href="logout.php">Logout</a></li>
		</ul>	
</div>
		</div>
<div id="main">
<div id="tabbed_box" class="tabbed_box">  
    <h4>Manage Payments</h4> 
<hr/>	
    <div class="tabbed_area">  
      
        <ul class="tabs">  
            <li><a href="javascript:tabSwitch('tab_1', 'content_1');" id="tab_1" class="active">View Payments</a></li>  
            <li><a href="javascript:tabSwitch('tab_2', 'content_2');" id="tab_2">Add New Payment Details</a></li>  
             
        </ul>  
          
        <div id="content_1" class="content">  
		 <?php echo $message;
			  echo $message1;
			  ?>
      
		<?php
		/* 
		View
        Displays all data from 'payment_details' table
		*/

        // connect to the database
        include_once('connect_db.php');

        // get results from database
		
        $result = mysql_query("SELECT * FROM payment_details") 
                or die(mysql_error());
		// display data in table
        echo "<table border='1' cellpadding='3'>";
         echo "<tr><th>payment_id</th><th>invoice_no</th><th>customer_name</th><th>payment_type</th><th>total_ammount</th><th>Delete</th></tr>";

        // loop through results of database query, displaying them in the table
        while($row = mysql_fetch_array( $result )) {
                
                // echo out the contents of each row into a table
                echo "<tr>";
                 echo '<td>' . $row['payment_id'] . '</td>';               
                echo '<td>' . $row['invoice_no'] . '</td>';
				echo '<td>' . $row['customer_name'] . '</td>';
				echo '<td>' . $row['payment_type'] . '</td>';
				echo '<td>' . $row['total_ammount'] . '</td>';?>
				
				<td><a href="delete_payment.php?payment_id=<?php echo $row['payment_id']?>"><img src="images/delete-icon.jpg" width="24" height="24" border="0" /></a></td>
				<?php
		 } 
        // close table>
        echo "</table>";
?> 
        </div>  
        <div id="content_2" class="content">  
         <!--Add Drug-->
		 <?php echo $message;
			  echo $message1;
			  ?>
			<form name="myform" onsubmit="return validateForm(this);" action="payment.php" method="post" >
			<table width="420" height="106" border="0" >	
				<tr><td align="center"><input name="invoice_no" type="text" style="width:170px" placeholder="Invoice No" required="required" id="invoice_no" /></td></tr>
				<tr><td align="center"><input name="customer_name" type="text" style="width:170px" placeholder="Customer Name" required="required" id="customer_name"/></td></tr>
				<tr><td align="center"><input name="payment_type" type="text" style="width:170px" placeholder="Payment Type" required="required" id="payment_type" /></td></tr>
				<tr><td align="center"><input name="total_ammount" type="text" style="width:170px" placeholder="Total" required="required" id="total_ammount" /></td></tr>  
				 
				<tr><td align="center"><input name="submit" type="submit" value="Submit" id="submit"/></td></tr>
            </table>
		</form>
        </div>  
              
    </div>  
  
</div>
 
</div>
<div id="footer" align="Center"> PMS was Developed By from the team Andro Ciphers</div>
</div>
</body>
</html>
