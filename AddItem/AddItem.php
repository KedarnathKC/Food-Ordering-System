<?php
	session_start();
	require "../Config/config.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Item</title>
	<link rel="stylesheet" type="text/css" href="CSS/Style.css">
</head>
<body style="background-image: url(Images/Background2.jpg); background-repeat: repeat;">
	<div id="head">
		<div id="icon">
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
	<hr>	
	<br><br><br><br>
	
		<div id="main-wrap">
			<table style=" width:100%; color: white;">
				<form enctype="multipart/form-data" method="POST" action="AddItem.php">
					<tr>
						<th>Item Name</th>
						<td><input type="text" name="itemname" class="data" placeholder="Item Name" required></td>
					</tr>
					<tr>
						<th>Price</th>
						<td><input type="text"  name="itemprice" class="data"  placeholder="Price" required></td>
					</tr>
					<tr>
						<th>Item Type </th>
						<td><select name="itemtype" class="data" required>
							<option value="NULL"></option>
							<option value="Breakfast">Breakfast</option>
							<option value="Starter">Starter</option>
							<option value="Veg Main Course">Veg Main Course</option>
							<option value="Non Veg Main Course">Non Veg Main Course</option>
							<option value="Indian Breads">Indian Breads</option>
							<option value="Rice">Rice</option>
							<option value="Biriyani">Biriyani</option>
						</select></td>
					</tr>
					<tr>
						<td colspan="2"><input type="Submit" name="ISubmit" id="loginbtn" value="Submit" ></td>
					</tr>
				</form>
			</table>	
</body>
</html>
<?php
	if(isset($_POST["ISubmit"])){
		$hid=$_COOKIE['hid'];

		$iname=$_POST["itemname"];
		$iprice=$_POST["itemprice"];
		$itype=$_POST["itemtype"];
		$sql="select * from items where iname='".$iname."'";
		$result=mysqli_query($dbhandle,$sql);
		//Checking whether there is a similar item in items table if so retirve iid or else add .
		if(@mysqli_num_rows($result)>0){
			$row=mysqli_fetch_assoc($result);
			$iid=$row["iid"];
			$check="select * from provide where iid=$iid and hid=$hid";
			$cres=mysqli_query($dbhandle,$check);
			if(@mysqli_num_rows($cres)>0){
				echo "<script> alert('Item already exists in your menu'); </script>" ;
			}
			else{
				$insert="insert into provide values('".$hid."','".$iid."','".$iprice."','".$itype."')";
				$ires=mysqli_query($dbhandle,$insert);
				if($ires){
					echo "<script> alert('Item Added Succesfully'); </script>" ;
				}
				else{
					echo "<script> alert('Couldn\'t add the item.. sorry for the inconvinience.. '); 	</script>"	;
				}
			}
			
		}
		else{
			$insert="insert into items (iname) values('".$iname."')";
			$ires=mysqli_query($dbhandle,$insert);
			if($ires){
				$sql1="select * from items ORDER BY iid desc  LIMIT 1";
				$result1=mysqli_query($dbhandle,$sql1);
				if($result1){
					$row=mysqli_fetch_assoc($result1);
					$iid=$row["iid"];
					$insert1="insert into provide values('".$hid."','".$iid."','".$iprice."','".$itype."')";
					$ires1=mysqli_query($dbhandle,$insert1);
					if($ires1){
						echo "<script> alert('Item Added Succesfully'); </script>" ;
					}
					else{
						echo "<script> alert('Couldn\'t add the item.. sorry for the inconvinience.. '); </script>"	;
					}
				}
			}
		}
	}	
?>