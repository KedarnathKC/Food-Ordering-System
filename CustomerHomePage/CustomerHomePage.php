<?php
	session_start();
	require "../Config/config.php";	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Homepage</title>
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
	<?php
		echo "<h1 style='margin-top:50px;color:white;'><center>Welcome</center></h1><hr>";
	?>
	<div id="right">
		
	</div>
	
		<?php
	echo "<div id='left'>";
			echo "<div id='top'>";
				echo "<div id='type2'>";	
					echo "<div id='type21'>";
						echo "<h1 style='color:white'><center>Current Order</center></h1>";
					echo "</div>";
				echo '</div>';
			echo '</div>';
			$cid=$_COOKIE['cid'];
			$con="select * from ords where cid='".$cid."' and dat='".date("Y-m-d")."' and not status='Placing' and not status='Delivered'";
			$query=mysqli_query($dbhandle,$con);
			if(mysqli_num_rows($query)<=0){
				echo "<h1 style='color:white'>Nothing To Show</h1>";
				echo "<img src='Images/EmptyBag.jpeg' style='width:80%; height:200px;'>";
			}
			else{

							//echo "<div class='bottom'>";
				while($row_con=mysqli_fetch_assoc($query)){
					$status=$row_con['status'];
					$oid=$row_con['oid'];
					$hid1=$row_con['hid'];
					$hnameretrive="select * from hotel where hid='".$hid1."'";
					$query_hnameretrive=mysqli_query($dbhandle,$hnameretrive);
					if(mysqli_num_rows($query_hnameretrive)>0){
						$row_hname=mysqli_fetch_assoc($query_hnameretrive);
						$hname=$row_hname['hname'];
						$n="Order";
						$tablename=$n.$oid;
						$oidtabledataretrive="select ".$tablename.".quantity,".$tablename.".sub_tot,items.iname from ".$tablename." inner join items where ".$tablename.".iid=items.iid";
						$query_oidtabledataretrive=mysqli_query($dbhandle,$oidtabledataretrive);
						if(mysqli_num_rows($query_oidtabledataretrive)>0){
							echo "<div id='bottom'>";
								//echo "<div class='ord'>";
							while($row_tabledate=mysqli_fetch_assoc($query_oidtabledataretrive)){
								$iname=$row_tabledate['iname'];
								$quantity=$row_tabledate['quantity'];
								$sub_tot=$row_tabledate['sub_tot'];
								
								echo "<div class='ord'>";
									echo "<div class='hname'>";
										echo "<b style='color:blue'>".$hname."</b><br>";
									echo "</div>";
									echo "<div class='iname1'>";
										echo $iname."<br>";
									echo "</div>";
									echo "<div class='quantity'>";
										echo $quantity."<br>";
									echo "</div>";
									echo "<div class='total'>";
										echo "&#8377;".$sub_tot."<br>";
									echo "</div>";
									echo "<div class='quantity'>";
										echo $status."<br>";
									echo "</div>";
									
								echo "</div>";									
							}

							
						}
							
					}
					
				}
				
			}
		echo "</div>";
		?>
	
</body>
</html>