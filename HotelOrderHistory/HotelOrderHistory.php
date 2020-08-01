<?php
	require "../Config/config.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Order Histroy</title>
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
		echo "<div id='main'>";
			$hid=$_COOKIE['hid'];
			$sum=0;
			$sql="select * from ords where status='Delivered' and hid='".$hid."'";
			$query_sql=mysqli_query($dbhandle,$sql);
			if(mysqli_num_rows($query_sql)>0){
				echo "<div id='heading'>";
					echo "<h1>ORDER HISTROY</h1>";
					echo"<hr>";
				echo "</div>";
				while($row=mysqli_fetch_assoc($query_sql)){
					$oid=$row['oid'];
					$n="Order";
					$tablename=$n.$oid;
					echo "<div class='main-content'>";
						echo "<button class='button'>".$oid."</button>";
						echo "<div class='dropdown'>";
							$sql1="select ".$tablename.".quantity,".$tablename.".sub_tot,items.iname from ".$tablename." inner join items where ".$tablename.".iid=items.iid ";
							$query_sql1=mysqli_query($dbhandle,$sql1);
							if(mysqli_num_rows($query_sql1)>0){
								while($row1=mysqli_fetch_assoc($query_sql1)){
									$sum+=$row1['sub_tot'];
									echo "<div class='items'>";
										echo "<p class='iname'>".$row1['iname']."</p>";
										echo "<p class='quantity'>".$row1['quantity']."</p>";
										echo "<p class='quantity'>&#8377;".$row1['sub_tot']."</p>";
									echo "</div>";
								}
									echo "<div class='items'>";
										echo "<p class='iname'>Total : ".$sum."</p>";
									echo "</div>";
							}
						echo "</div>";
					echo "</div>";
				}
				echo "</div>";
			}
		
		else{
			echo "<div id='heading'>";
					echo "<h1>NO ORDERS TO SHOW</h1>";
					echo"<hr>";
				echo "</div>";
		}
	?>
</body>
</html>