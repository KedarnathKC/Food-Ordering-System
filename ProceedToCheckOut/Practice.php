<?php
	require "../Config/config.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Order now</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto+Mono&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" type="text/css" href="CSS/Style.css">

</head>
<body style="background-image: url(Images/Background2.jpg); background-repeat:repeat;">
	<div id="head">
		<div id="icon">
		</div>
		<div class="Link">
			<button class="dropbtn"> My Account</button>
			<div class="dropdown-content">
		    	<a href="/IWP/OrderHistory/OrderHistory.php">Order Histroy</a>
		    	<a href="/IWP/HomePage/HomePage.html">Logout</a>
		    </div>
		</div>
		<div class="Link">
			<button class="dropbtn">Order</button>
			<div class="dropdown-content">
		    	<a href="/IWP/OrderNow/OrderNow.php">Order Now</a>
		    	<a href="/IWP/CheckOrderStatus/CheckOrderStatus.php">Check Your Order</a>
		    </div>
		</div>	
	</div><br><br>
	<?php
		$cid=$_COOKIE['cid'];
		$hotel="select * from hotel";
		$queryhotel=mysqli_query($dbhandle,$hotel);
		if($queryhotel){
			echo "<div id='maincheck'>";
				echo "<div id='ItemsOrdered'>";
					echo "<h2><center>Items Ordered</center></h2>";
				echo "</div>";
			while($r=mysqli_fetch_assoc($queryhotel)){
				$sql="select orders.quantity,orders.total,items.iname from orders inner join items where orders.cid=".$cid." and orders.hid=".$r['hid']." and orders.status='Placing' and orders.iid=items.iid";
				$query=mysqli_query($dbhandle,$sql);
				if(mysqli_num_rows($query)>0){
					echo "<div class='hotel_name'>";
						echo "<div class='name'>";
							echo "<h4 style='color:white'> From ".$r['hname']."</h4>";
						echo "</div>";
					while($row=mysqli_fetch_assoc($query)){
						echo "<div class='items'>";
							echo "<div class='item_name'>";
								echo "<p style='color:blue;font-weight:bold'>".$row['iname']."</p>";
							echo "</div>";
							echo "<div class='item_quantity'>";
								echo "<p style='color:blue;font-weight:bold'>".$row['quantity']."</p>";
							echo "</div>";
							echo "<div class='item_total'>";
								echo "<p style='color:blue;font-weight:bold'>&#8377;".$row['total']."</p>";
							echo "</div>";
						echo "</div>";
					}
					echo "</div>";
				}
			}
				$sum="select sum(total) from orders where cid='".$cid."' and  status='Placing'";
				$query_sum=mysqli_query($dbhandle,$sum);
				$r1=mysqli_fetch_assoc($query_sum);
				echo "<div id='total'>";
					echo "<h2><center>To Pay &nbsp;&nbsp; &#8377;".$r1['sum(total)']."</center></h2>";
				echo "</div>";
				echo "<div id='subbtn'>";
					echo "<form method='POST' action='ProceedToCheckOut1.php'>";
						echo "<input type='Submit' name='Bill' value='Confirm Order &#8594;'>";
					echo "</form>";
				echo "</div>";
			echo "</div>";
		}
		/*$sql="select orders.quantity,orders.total,items.iname,hotel.hname from orders inner join items inner join hotel where orders.cid=".$cid." and orders.status='Placing' and orders.iid=items.iid and orders.hid=hotel.hid";
		$query=mysqli_query($dbhandle,$sql);
		if(mysqli_num_rows($query)>0){
			echo "<div id='bottom'>";
			while($row=mysqli_fetch_assoc($query)){
				echo "<div class='hname'>";
					echo "<b style='color:blue'>".$row['hname']."</b><br>";
				echo "</div>";	
			}
			echo "</div>";
			*/
	?>
</body>
</html>