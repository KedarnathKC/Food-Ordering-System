<?php
	require "../Config/config.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Proceed To CheckOut</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto+Mono&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" type="text/css" href="CSS/Style.css">

</head>
<!--  style="background-image: url(Images/Background2.jpg); background-repeat:repeat;" -->
<body style="background-image: url(Images/Background2.jpg); background-repeat:repeat;">
	<div id="head">
		<div id="icon">
		</div>
		<div class="Link">
			<button class="dropbtn"> My Account</button>
			<div class="dropdown-content">
		    	<a href="/IWP/OrderHistory/OrderHistory.php">Order Histroy</a>
		    	<a href="/IWP/HomePage/HomePage.php">Logout</a>
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
		$hotel="select ords.oid,hotel.hname,ords.hid from ords inner join hotel where hotel.hid=ords.hid and cid='".$cid."' and dat='".date("Y-m-d")."' and status='Placing'";
		$queryhotel=mysqli_query($dbhandle,$hotel);
		$sum=0;
		if($queryhotel){
			echo "<div id='maincheck'>";
				echo "<div id='ItemsOrdered'>";
					echo "<h2><center>Items Ordered</center></h2>";
				echo "</div>";
			while($r=mysqli_fetch_assoc($queryhotel)){
				/*$con="select * from ords where cid='".$cid."' and dat='".date("Y-m-d")."' and hid='".$r['hid']."' ";
				$query=mysqli_query($dbhandle,$con);*/
					
				$hid=$r['hid'];
				$hname=$r['hname'];
				$oid=$r['oid'];
				$name="Order";
				$tablename=$name.$oid;
				/*echo $tablename;
				echo $hid."<br>";
				echo $hname."<br>";
				echo $oid."<br>";*/
				echo "<div class='hotel_name'>";
					echo "<div class='name'>";
						echo "<h4 style='color:white'> From ".$r['hname']."</h4>";
					echo "</div>";
					$oidtabledataretrive="select ".$tablename.".quantity,".$tablename.".sub_tot,items.iname from ".$tablename." inner join items where ".$tablename.".iid=items.iid";
					$query_oidtabledataretrive=mysqli_query($dbhandle,$oidtabledataretrive);
					if(mysqli_num_rows($query_oidtabledataretrive)>0){
						while($row_tabledate=mysqli_fetch_assoc($query_oidtabledataretrive)){
							$iname=$row_tabledate['iname'];
							$quantity=$row_tabledate['quantity'];
							$sub_tot=$row_tabledate['sub_tot'];
							echo "<div class='items'>";
								echo "<div class='item_name'>";
									echo "<p style='color:blue;font-weight:bold'>".$iname."</p>";
								echo "</div>";
								echo "<div class='item_quantity'>";
									echo "<p style='color:blue;font-weight:bold'>".$quantity."</p>";
								echo "</div>";
								echo "<div class='item_total'>";
									echo "<p style='color:blue;font-weight:bold'>&#8377;".$sub_tot."</p>";
								echo "</div>";
							echo "</div>";
						}
					$sumsql="select sum(".$tablename.".sub_tot) as sum from ".$tablename."";
					$query_sum=mysqli_query($dbhandle,$sumsql);
					$rsum=mysqli_fetch_assoc($query_sum);
					$sum+=$rsum['sum'];
					}
				echo "</div>";
			}
				echo "<div id='total'>";
					echo "<h2><center>To Pay &nbsp;&nbsp; &#8377;".$sum."</center></h2>";
				echo "</div>";
				echo "<div id='subbtn'>";
					echo "<form method='POST' action='ProceedToCheckOut1.php'>";
						echo "<input type='Submit' name='Bill' value='Confirm Order &#8594;'>";
					echo "</form>";
				echo "</div>";
			echo "</div>";
		}
		
	?>
</body>
</html>