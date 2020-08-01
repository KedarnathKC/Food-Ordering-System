<?php
	require "../Config/config.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Update Order Status</title>
	<link rel="stylesheet" type="text/css" href="CSS/Style.css">
</head>
<body style="background-image: url(Images/Background2.jpg); background-repeat: repeat;">
	<div id="head">
		<div id="icon">
			<!--<img src="CSS/ICON1.png">-->
		</div>
		<div class="Link">
			<button class="dropbtn"> My Account</button>
			<div class="dropdown-content">
		    	<a href="/IWP/HotelOrderHistory/HotelOrderHistory.php">Order's Histroy</a>
		    	<a href="/IWP/HomePage/HomePage.php">Logout</a>
		    </div>
		</div>
		<div class="Link">
			<button class="dropbtn">Orders</button>
			<div class="dropdown-content">
		    	<a href="/IWP/CheckOrders/CheckOrders.php">Check Orders</a>
		    	<a href="/IWP/UpdateOrderStatus/UpdateOrderStatus.php">Update Order Status</a>
		    </div>
		</div>
		<div class="Link">
			<button class="dropbtn">Menu</button>
			<div class="dropdown-content">
		    	<a href="/IWP/CheckMenu/CheckMenu.php">Check Menu</a>
		    	<a href="/IWP/AddItem/AddItem.php">Add Item</a>
		    	<a href="/IWP/UpdatePrice/UpdatePrice.php">Update Price</a>
		    	<a href="/IWP/DeleteItem/DeleteItem.php">Delete Item</a>
		    </div>
		</div>
	</div>
	<?php

		//echo "<h1 style='color:white;'>".$_COOKIE["hid"]."</h1><br>";
		echo "<div id='main'>";
			$hid=$_COOKIE['hid'];
			$sql="select * from ords where not status='Placing' and not status='Delivered' and hid='".$hid."'";
			$query_sql=mysqli_query($dbhandle,$sql);
			if(mysqli_num_rows($query_sql)>0){
				echo "<div id='heading'>";
					echo "<h1>Orders</h1>";
					echo"<hr>";
				echo "</div>";
				while($row=mysqli_fetch_assoc($query_sql)){
					$oid=$row['oid'];
					$cid=$row['cid'];
					$status=$row['status'];
					/*echo "<div class='type'>";
						echo "<div class='type1'>";
							echo $oid;
						echo "</div>";
					echo "</div>";
					echo "<div class='typeS'>";
						echo "<div class='type1S'>";
							echo "Status: ".$status;
						echo "</div>";
					echo "</div>";*/
					echo "<div class='orders'>";
						echo "<form method='POST' action='UpdateOrderStatus.php'>";
							echo "<p class='label'>Order ID:</p>";
							echo "<input class='oid' type='text' value='".$oid."' name='oid' readonly>";
							echo "<p  class='label'>Current Status:</p>";
							echo "<p class='quantity'>".$status."</p>";
							echo "<p class='label'>Update Status To:</p>";
							echo "<select class='select' name='Status'>";
								echo "<option class='option' value='Preparing'>Preparing</option>";
								echo "<option class='option' value='Ready To Dispatch'>Ready To Dispatch</option>";
								echo "<option class='option' value='Dispatched'>Dispatched</option>";
								echo "<option  class='option' value='Delivered'>Delivered</option>";
							echo "</select><br>";
							echo "<input type='Submit' name='Update' value='Update'>";
						echo "</form>";
					echo "</div>";
				}
			}
			else{
				echo "<div id='heading'>";
					echo "<h1>NO ORDERS TO SHOW</h1>";
					echo"<hr>";
				echo "</div>";
			}
		echo "</div>";
		if(isset($_POST['Update'])){
			$oidu=$_POST['oid'];
			$status=$_POST['Status'];
			$sqlu="update ords set status='".$status."' where oid='".$oid."'";
			$query_sqlu=mysqli_query($dbhandle,$sqlu);
			if($query_sqlu){
				echo "<script>alert('Updated Succesfully');</script>";
				header('location:UpdateOrderStatus.php');
			}
			else{
				echo "<script>alert('Couldn'\t Update');</script>";	
			}
		}	
	?>

</body>
</html>