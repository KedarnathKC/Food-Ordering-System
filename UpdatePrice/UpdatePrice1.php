<?php
	session_start();
	require '..\Config\config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Update Price</title>
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
	<br><br><br>
<?php
	if(isset($_POST['ISubmit']))
	{
		$ans=$_POST['ISubmit'];
		
		$query="select Item_name ,Item_price ,Item_id from item where Item_id=$ans";
		$query_run = mysqli_query($dbhandle,$query);	
		if(mysqli_num_rows($query_run)<1)
		{
			echo 'No item in your menu to show please return to update menu page and add items';
		}	
		else{
			$row=mysqli_fetch_assoc($query_run);	
			echo "<form class='form' method='post' action='UpdatePrice1.php'>
				Item Name:<input name='iname' type='text' value='".$row["Item_name"]."' readonly>
				Current price:<input name='price' type='text' value='".$row["Item_price"]."' readonly>
				Item ID:<input name='iid' type='text' value='".$row["Item_id"]."' readonly>
				Updated Price:<input type='Number' name='updated_price' required>
				<input type='Submit' name='USubmit' value='Submit'  class='loginbtn''>
				</form>";
		}	
	}
	if(isset($_POST['USubmit'])){
		$price=$_POST['updated_price'];
		$iname=$_POST['iname'];
		$ans=$_POST['iid'];
		$query="update item set Item_price=$price where Item_id=$ans";
		$query_run=mysqli_query($dbhandle,$query);
		if($query_run=1)
		{
			echo '<script type="text/javascript"> alert("Updated succesfully") </script>';
			echo "<script type='text/javascript'>window.location.href='UpdatePrice.php'</script>";
				
		}
		else
		{
			echo '<script type="text/javascript"> alert("Could not update") </script>';
				
		}
		echo "<script type='text/javascript'>window.location.href='UpdatePrice.php'</script>";
	}
?>
</body>
</html>