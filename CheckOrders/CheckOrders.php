<?php
	require "../Config/config.php";

?>
<!DOCTYPE html>
<html>
<head>
	<title>Order Status</title>
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
			$sql="select * from ords where hid='".$hid."' and not status='Placing' and not status='Delivered'";
			$query_sql=mysqli_query($dbhandle,$sql);
			if(mysqli_num_rows($query_sql)>0){
				echo "<div id='heading'>";
					echo "<h1>Orders</h1>";
					echo "<hr>";
				echo "</div>";
				while($row=mysqli_fetch_assoc($query_sql)){
					$oid=$row['oid'];
					$cid=$row['cid'];
					$status=$row['status'];
					echo "<div class='type'>";
						echo "<div class='type1'>";
							echo $oid;
						echo "</div>";
					echo "</div>";
					echo "<div class='typeS'>";
						echo "<div class='type1S'>";
							echo "Status: ".$status;
						echo "</div>";
					echo "</div>";
					$name="Order";
					$tablename=$name.$oid;
					echo "<div class='main-order'>";
						$oidtable="select ".$tablename.".quantity,".$tablename.".sub_tot,items.iname from ".$tablename." inner join items where ".$tablename.".iid=items.iid ";
						$query_oidtable=mysqli_query($dbhandle,$oidtable);
						if(mysqli_num_rows($query_oidtable)>0){
							while($row1=mysqli_fetch_assoc($query_oidtable)){
								//echo $row1['iname']."->".$row1['quantity']."->".$row1['sub_tot']."<br>";
								echo "<div class='items'>";
									echo "<p class='iname'>".$row1['iname']."</p>";
									echo "<p class='quantity'>".$row1['quantity']."</p>";
									echo "<p class='quantity'>&#8377;".$row1['sub_tot']."</p>";
								echo "</div>";

							}
						}
						else{
							echo mysqli_error($dbhandle);
						}
					echo "</div>";

				}
				echo "</div>";
			}
			
		else{
			echo "<div id='heading'>";
				echo "<h1>NO ORDERS TO SHOW</h1><hr>";
			echo "</div>";
		}

	?>
</body>
</html>