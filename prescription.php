<?php
session_start();
include_once('connect_db.php');
if(isset($_SESSION['username'])){
$id=$_SESSION['pharmacist_id'];
$user=$_SESSION['username'];
}else{
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."index.php");
exit();
}
if(isset($_POST['submit'])){
$did=$_POST['drug_id'];
$dname=$_POST['drug_name'];
$set=$_POST['strength'];
$dose=$_POST['dose'];
$qua=$_POST['quantity'];



$sql=mysql_query("INSERT INTO prescription(drug_id,drug_name,strength,dose,quantity)
VALUES('$did','$dname','$set','$dose','$qua')");
if($sql>0) {header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/prescription.php");
}else{
$message1="<font color=red>Registration Failed, Try again</font>";
}
	}
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $user;?> - Pharmacy Management System</title>
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
			<li><a href="pharmacist.php">Dashboard</a></li>
			<li><a href="prescription.php">Prescription</a></li>
			<li><a href="stock_pharmacist.php">Stock</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>	
</div>
		</div>
<div id="main">
<div id="tabbed_box" class="tabbed_box">  
    <h4>Manage Prescription</h4> 
<hr/>	
    <div class="tabbed_area">  
      
        <ul class="tabs">  
            <li><a href="javascript:tabSwitch('tab_1', 'content_1');" id="tab_1" class="active">View Prescription</a></li>  
            <li><a href="javascript:tabSwitch('tab_2', 'content_2');" id="tab_2">Add Prescription Details</a></li>  
             
        </ul>  
          
        <div id="content_1" class="content">  
		 <?php echo $message;
			  echo $message1;
			  ?>
      
		<?php
		/* 
		View
        Displays all data from 'Stock' table
		*/

        // connect to the database
        include_once('connect_db.php');

        // get results from database
		
        $result = mysql_query("SELECT * FROM prescription") 
                or die(mysql_error());
		// display data in table
        echo "<table border='1' cellpadding='3'>";
         echo "<tr><th>ID</th><th>drug_id</th><th>drug_name</th><th>strength</th><th>dose</th><th>quantity</th><th>Delete</th></tr>";

        // loop through results of database query, displaying them in the table
        while($row = mysql_fetch_array( $result )) {
                
                // echo out the contents of each row into a table
                echo "<tr>";
                 echo '<td>' . $row['prescription_id'] . '</td>';               
                echo '<td>' . $row['drug_id'] . '</td>';
				echo '<td>' . $row['drug_name'] . '</td>';
				echo '<td>' . $row['strength'] . '</td>';
				echo '<td>' . $row['dose'] . '</td>';
				echo '<td>' . $row['quantity'] . '</td>';
				?>
				<td><a href="delete_prescription.php?prescription_id=<?php echo $row['prescription_id']?>"><img src="images/delete-icon.jpg" width="24" height="24" border="0" /></a></td>
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
			<form name="myform" onsubmit="return validateForm(this);" action="prescription.php" method="post" >
			<table width="420" height="106" border="0" >	
				<tr><td align="center"><input name="drug_id" type="text" style="width:170px" placeholder="Drug ID" required="required" id="drug_id" /></td></tr>
				<tr><td align="center"><input name="drug_name" type="text" style="width:170px" placeholder="Drug Name" required="required" id="drug_name" /></td></tr>
				<tr><td align="center"><input name="strength" type="text" style="width:170px" placeholder="Strength" required="required" id="strength"/></td></tr>
				<tr><td align="center"><input name="dose" type="text" style="width:170px" placeholder="Dose" required="required" id="dose" /></td></tr>
				
				
				<tr><td align="center"><input name="quantity" type="text" style="width:170px" placeholder="Quantity" required="required" id="quantity" /></td></tr>  
				
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
