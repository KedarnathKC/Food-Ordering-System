<?php
	session_start();
	require "../Config/config.php";	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Order Histroy</title>
	<link rel="stylesheet" type="text/css" href="CSS/Style.css">
</head>
<body style="background-image: url(Images/Background2.jpg); background-repeat:repeat;">
	<div id="head">
		<div id="icon">
			<!--<img src="CSS/ICON1.png">-->
		</div>
		<div class="Link">
			<button class="dropbtn"> My Account</button>
			<div class="dropdown-content">
		    	<a href="/IWP/HomePage/HomePage.php">Logout</a>
		    </div>
		</div>
		<div class="Link">
			<button class="dropbtn">Order</button>
			<div class="dropdown-content">
		    	<a href="/IWP/OrderNow/OrderNow.php">Order Now</a>
		    	<a href="/IWP/OrderHistroy/OrderHistroy.php">Order Histroy</a>
		    </div>
		</div>
	</div>
	<h1 style="color: white;text-align: center;margin-top: 40px;">Order Histroy</h1><hr>
	<?php
		$cid=$_COOKIE['cid'];
		echo "<div id='main'>";
			$bill="select * from bill where cid='".$cid."'";
			$query_bill=mysqli_query($dbhandle,$bill);
			if(mysqli_num_rows($query_bill)>0){
				while($row=mysqli_fetch_assoc($query_bill)){
					$bid=$row['bid'];
					$date=$row['dat'];
					$time=$row['tim'];
					$n="Bill";
					$tablename=$n.$bid;
					$sum=0;
					echo "<div class='type'>";
						echo "<div class='type1'>";
							echo "BILL ID : ".$bid;
						echo "</div>";
					echo "</div>";
					echo "<div class='date1'>";
						echo "<div class='date'>";
							echo "DATE : ".$date."  |   TIME : ".$time;
						echo "</div>";
					echo "</div>";
					$sql="select * from ".$tablename."";
					$query_sql=mysqli_query($dbhandle,$sql);
					if(mysqli_num_rows($query_sql)>0){
						while ($row1=mysqli_fetch_assoc($query_sql)){
							$oid=$row1['oid'];
							$subtot=$row1['sub_tot'];
							$sum+=$subtot;
							$n1="Order";
							$tablename1=$n1.$oid;
							$oidtable="select ords.hid,ords.status,hotel.hname from ords inner join hotel where oid='".$oid."' and ords.hid=hotel.hid";
							$query_oidtable=mysqli_query($dbhandle,$oidtable);
							if(mysqli_num_rows($query_oidtable)>0){
								$row2=mysqli_fetch_assoc($query_oidtable);
								$hname=$row2['hname'];
								$hid=$row2['hid'];
								$status=$row2['status'];
								echo "<div class='hname'>";
									echo "<center><p>FROM ".strtoupper($hname)."</p></center>";
								echo "</div>";
								echo "<div class='itemsfill'>";
									$sql2="select items.iname, ".$tablename1.".quantity, ".$tablename1.".sub_tot from ".$tablename1." inner join items where ".$tablename1.".iid=items.iid";
									$query_sql2=mysqli_query($dbhandle,$sql2);
									if(mysqli_num_rows($query_sql2)>0){
										while($row3=mysqli_fetch_assoc($query_sql2)){
											$iname=$row3['iname'];
											$quantity=$row3['quantity'];
											$sub_tot=$row3['sub_tot'];
											echo "<div class='items'>";
												echo "<p class='iname'>".$iname."</p>";
												echo "<p class='quantity'>".$quantity."</p>";
												echo "<p class='quantity'>&#8377;".$sub_tot."</p>";
												echo "<p class='iname'>".$status."</p>";
											echo "</div>";
										}
									}
								echo "</div>";
							}
		
						}

						echo "<div class='total'>";
							echo "<center><p>TOTAL : &#8377; ".$sum."</p></center>";
						echo "</div>";	
					}
				}
			}
		echo "</div>";
	?>
</body>
</html>