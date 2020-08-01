<?php
	session_start();
	require "../Config/config.php";
	if(isset($_POST['Submit'])){
		$hid=$_POST['hid'];
		$cookien="hid";
		setcookie($cookien,$hid,time() + (86400 * 30), "/");
		//echo "<h1 style='color:white'><center>".$hid.$_COOKIE['hid']."</center></h1>";	
	}
	//echo "<h1 style='color:white'>".$_GET["hid"]."</h1>";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Order now</title>
	<link rel="stylesheet" type="text/css" href="CSS/Style.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Mono&display=swap" rel="stylesheet"> 
</head>
<!-- style="background-image: url(Images/Background2.jpg); background-repeat:repeat;"-->
<body>
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
	</div>
		<br><br>
	<?php
		$hid=$_COOKIE['hid'];
		echo "<div id='hdetails'>";
			echo "<br>";
			echo "<div id='hotelimg'>";
			echo "</div>";	
			echo "<div id='hotelname'>";
				$sqlhname="select * from hotel where hid='".$hid."'";
				$queryhname=mysqli_query($dbhandle,$sqlhname);
				$rhname=mysqli_fetch_assoc($queryhname);
				echo "<h1>".$rhname['hname']."</h1>";	
				echo "<h3>".$rhname['address']."</h3>";
				echo "<h3> Rating </h3>";
			echo "</div>";	
			
		echo "</div>";
		echo "<h1 style='color:white'><center>MENU</center></h1>";
		echo "<form action='OrderNow.php' method='POST'>";
			echo "<input class='dropbtn1' type='Submit' name='back' value='Order from another hotel also'>";
		echo "</form>";
		echo "<hr><br>";
		echo "<div id='right'>";

		echo "</div>";




		echo "<div id='left'>";
			echo "<div id='top'>";
				echo "<div id='type2'>";	
					echo "<div id='type21'>";
						echo "<h1 style='color:white'><center>BAG</center></h1>";
					echo "</div>";
				echo '</div>';
			echo '</div>';
			$cid=$_COOKIE['cid'];
			$con="select * from ords where cid='".$cid."' and dat='".date("Y-m-d")."' a";
			$query=mysqli_query($dbhandle,$con);
			if(mysqli_num_rows($query)<=0){
				echo "<h1 style='color:white'>Nothing To Show</h1>";
				echo "<img src='Images/EmptyBag.jpeg' style='width:80%; height:200px;'>";
			}
			else{
							//echo "<div class='bottom'>";
				while($row_con=mysqli_fetch_assoc($query)){
					$oid=$row_con['oid'];
					$hid1=$row_con['hid'];
					echo $hid1."<br>";
					/*
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
								echo "</div>";									
							}

							
						}
							
					}*/
					
				}
				echo "<div class='PlaceOrder'>";
					echo "<a href='../ProceedToCheckOut/ProceedToCheckOut.php'><button>Proceed To Check Out &#8594;</button></a>";
				echo "</div>";
			}
		echo "</div>";
			/*else{
				echo "<div id='bottom'>";
				while($r=mysqli_fetch_assoc($query)){
					echo "<div class='ord'>";
						/*echo "<b style='color:blue'>".$r['hname']."</b><br>";
						echo $r['iname']." Quantity: ".$r['quantity']."<br>";
						echo "&#8377;".$r['total']."<br>";
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
					echo "</div>";	
					
				}
					echo "<div id='total'>";
						$sum="select sum(total) from orders where cid='".$cid."' and  status='Placing'";
						$query_sum=mysqli_query($dbhandle,$sum);
						$r1=mysqli_fetch_assoc($query_sum);
						/*echo "<p>Subtotal: ".$r1['sum(total)']."</p>";
						echo "<a href='Google.com'><button>Continue</button></a>";*/
						/*echo "<div class='subtot'>";
							echo "Subtotal";
						echo "</div>";
						echo "<div class='subtot'>";
							echo "&#8377;".$r1['sum(total)']."";
						echo "</div>";
						echo "<div class='PlaceOrder'>";
							echo "<a href='../ProceedToCheckOut/ProceedToCheckOut.php'><button>Proceed To Check Out &#8594;</button></a>";
						echo "</div>";	
					echo "</div>";
				echo "</div>";
			}*/
		//echo "</div>";
	?>
</body>
</html>