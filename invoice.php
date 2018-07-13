<?php
session_start();
include_once('connect_db.php');
if(isset($_SESSION['username'])){
$id=$_SESSION['manager_id'];
$user=$_SESSION['username'];
}else{
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."index.php");
exit();
}
if(isset($_POST['submit'])){
$cname=$_POST['customer_name'];
$drug_id=$_POST['drug_id'];
$drug_name=$_POST['drug_name'];
$quantity=$_POST['quantity'];

$cost=$_POST['cost'];
$total=null;

$sql=mysql_query("INSERT INTO invoice(customer_name,drug_id,drug_name,quantity,cost,total)
VALUES('$cname','$drug_id','$drug_name','$quantity','$cost','$total')");
if($sql>0) {header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/invoice.php");
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
			<li><a href="view.php">View Users</a></li>
			<li><a href="view_prescription.php">View Prescription</a></li>
			<li><a href="invoice.php">Manage Invoices</a></li>
			<li><a href="stock.php">Manage Stock</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>	
</div>
		</div>
<div id="main">
<div id="tabbed_box" class="tabbed_box">  
    <h4>Manage Invoice</h4> 
<hr/>	
    <div class="tabbed_area">  
      
        <ul class="tabs">  
            <li><a href="javascript:tabSwitch('tab_1', 'content_1');" id="tab_1" class="active">View Invoice</a></li>  
            <li><a href="javascript:tabSwitch('tab_2', 'content_2');" id="tab_2">Add Invoice Details</a></li>  
             
        </ul>  
          
        <div id="content_1" class="content">  
		 <?php echo $message;
			  echo $message1;
			  ?>
      
		<?php
		/* 
		View
        Displays all data from 'Invoice' table
		*/

        // connect to the database
        include_once('connect_db.php');

        // get results from database
		
        $result = mysql_query("SELECT * FROM invoice") 
                or die(mysql_error());
		// display data in table
        echo "<table border='1' cellpadding='3'>";
         echo "<tr><th>invoice_no</th><th>drug_id</th><th>drug_name</th><th>quantity</th><th>cost</th><th>total</th><th>Delete</th></tr>";

        // loop through results of database query, displaying them in the table
        while($row = mysql_fetch_array( $result )) {
                
                // echo out the contents of each row into a table
                echo "<tr>";
                 echo '<td>' . $row['invoice_no'] . '</td>';               
                echo '<td>' . $row['drug_id'] . '</td>';
				echo '<td>' . $row['drug_name'] . '</td>';
				echo '<td>' . $row['quantity'] . '</td>';
				
				echo '<td>' . $row['cost'] . '</td>';
				echo '<td>' . $row['total'] . '</td>';?>
				<td><a href="delete_invoice.php?invoice_no=<?php echo $row['invoice_no']?>"><img src="images/delete-icon.jpg" width="24" height="24" border="0" /></a></td>
				<?php
		 } 
        // close table>
        echo "</table>";
?> 

<?php
$db_host="localhost";
$db_name="pms";
$db_user="root";
$db_pass="";
$con = mysql_connect("$db_host","$db_user","$db_pass") or die ("could not connect");
mysql_select_db('pms') or die(mysql_error());
$p0=mysql_query("call total_revenue(@out);");
$rs=mysql_query('SELECT @out');
	while ($arr=mysql_fetch_row($rs))
	{
		echo 'Total revenue collected=Rs. '.$arr[0];
	}
	mysql_close($dbh);
	?>




        </div>  
        <div id="content_2" class="content">  
         <!--Add Drug-->
		 <?php echo $message;
			  echo $message1;
			  ?>
			<form name="myform" onsubmit="return validateForm(this);" action="invoice.php" method="post" >
			<table width="420" height="106" border="0" >	
				<tr><td align="center"><input name="customer_name" type="text" style="width:170px" placeholder="Customer Name" required="required" id="customer_name" /></td></tr>
				<tr><td align="center"><input name="drug_id" type="text" style="width:170px" placeholder="Drug Id" required="required" id="drug_id"/></td></tr>
				<tr><td align="center"><input name="drug_name" type="text" style="width:170px" placeholder="Drug Name" required="required" id="drug_name" /></td></tr>
				
				
				<tr><td align="center"><input name="quantity" type="text" style="width:170px" placeholder="Quantity" required="required" id="quantity" /></td></tr>  
				<tr><td align="center"><input name="cost" type="text" style="width:170px" placeholder="Unit Cost" required="required" id="cost" /></td></tr>  
				<tr><td align="center"><input name="submit" type="submit" value="Submit" id="submit"/></td></tr>
            </table>
		</form>
        </div>  
              
    </div>  
  
</div>
 
</div>
<div id="footer" align="Center"> PMS was Developed By the team Andro Ciphers</div>
</div>
</body>
</html>
