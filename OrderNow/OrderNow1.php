<?php
	session_start();
	require "../Config/config.php";
	if(isset($_POST['Submit'])){
		$hid=$_POST['hid'];
		$cookien="hid";
		setcookie($cookien,$hid,time() + (86400 * 30), "/");	
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Order now</title>
	<link rel="stylesheet" type="text/css" href="CSS/Style.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Mono&display=swap" rel="stylesheet"> 
</head>
<body style="background-image: url(Images/Background2.jpg); background-repeat:repeat;">
	<div id="head">
		<div id="icon">
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
		    	<a href="/IWP/OrderHistory/OrderHistory.php">Order Histroy</a>
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
				echo "<h3> ".$rhname['pno1']."|".$rhname['pno2']." </h3>";
				echo mysqli_error($dbhandle);
			echo "</div>";		
		echo "</div>";
		echo "<h1 style='color:white'><center>MENU</center></h1>";
		echo "<form action='OrderNow.php' method='POST'>";
			echo "<input class='dropbtn1' type='Submit' name='back' value='Order from another hotel also'>";
		echo "</form>";
		echo "<hr><br>";
		echo "<div id='right'>";
			$sql1="select items.iname,provide.price,items.iid from items inner join provide where items.iid=provide.iid and hid='".$hid."' and type='Breakfast'";
			$result1=mysqli_query($dbhandle,$sql1);
			if(mysqli_num_rows($result1)>0){
				echo "<div class='type'>";
					echo "<div class='type1'>";
						echo "BREAKFAST";
					echo "</div>";
				echo "</div>";
				while($row1=mysqli_fetch_assoc($result1)){
					echo "<form method='POST' action='OrderNow2.php'>";
						echo "<div class='hotel' align='center'>";
							echo "<img   src='Images/breakfast.jpeg'>";
							echo "<input type='text' name='iid' value='".$row1["iid"]."'readonly>";
							echo "<div class='iname'>";
								echo "<p><center>".$row1["iname"]."</center></p>";
							echo "</div><br>";
							echo "<div class='no'>";
								echo "<input type='Number' name='quantity' min='0' max='10' required>";
							echo "</div><br>";
							echo "<div class='price'>";
								echo "<p><center>&#8377;".$row1["price"]."</center></p>";
							echo "</div><br>";
							echo "<div class='no' >";
								echo "<input type='Submit' name='Submit' value='Add'>";
							echo "</div><br>";
						echo "</div>";
					echo "</form>";
				}
			}
			$sql2="select items.iname,provide.price,items.iid from items inner join provide where items.iid=provide.iid and hid='".$hid."' and type='Starter'";
			$result2=mysqli_query($dbhandle,$sql2);
			if(mysqli_num_rows($result2)>0){
				echo "<div class='type'>";
					echo "<div class='type1'>";
						echo "STARTER";
					echo "</div>";
				echo "</div>";
				while($row2=mysqli_fetch_assoc($result2)){
					echo "<form method='POST' action='OrderNow2.php'>";
						echo "<div class='hotel' align='center'>";
							echo "<img   src='Images/starter.jpg'>";
							echo "<input type='text' name='iid' value='".$row2["iid"]."'readonly>";
							echo "<div class='iname'>";
								echo "<p><center>".$row2["iname"]."</center></p>";
							echo "</div><br>";
							echo "<div class='no'>";
								echo "<input type='Number' name='quantity' min='0' max='10' required>";
							echo "</div><br>";
							echo "<div class='price'>";
								echo "<p><center>&#8377;".$row2["price"]."</center></p>";
							echo "</div><br>";
							echo "<div class='no'>";
								echo "<input type='Submit' name='Submit' value='Add'>";
							echo "</div><br>";
						echo "</div>";
					echo "</form>";
				}
			}
			$sql3="select items.iname,provide.price,items.iid from items inner join provide where items.iid=provide.iid and hid='".$hid."' and type='Veg Main Course'";
			$result3=mysqli_query($dbhandle,$sql3);
			if(mysqli_num_rows($result3)>0){
				echo "<div class='type'>";
					echo "<div class='type1'>";
						echo "VEG MAIN COURSE";
					echo "</div>";
				echo "</div>";
				while($row3=mysqli_fetch_assoc($result3)){
					echo "<form method='POST' action='OrderNow2.php'>";
						echo "<div class='hotel' align='center'>";
							echo "<img   src='Images/vegmaincourse.jpeg'>";
							echo "<input type='text' name='iid' value='".$row3["iid"]."'readonly>";
							echo "<div class='iname'>";
								echo "<p><center>".$row3["iname"]."</center></p>";
							echo "</div><br>";
							echo "<div class='no'>";
								echo "<input type='Number' name='quantity' min='0' max='10' required>";
							echo "</div><br>";
							echo "<div class='price'>";
								echo "<p><center>&#8377;".$row3["price"]."</center></p>";
							echo "</div><br>";
							echo "<div class='no' >";
								echo "<input type='Submit' name='Submit' value='Add'>";
							echo "</div><br>";
						echo "</div>";
					echo "</form>";
				}
			}
			$sql4="select items.iname,provide.price,items.iid from items inner join provide where items.iid=provide.iid and hid='".$hid."' and type='Non Veg Main Course'";
			$result4=mysqli_query($dbhandle,$sql4);
			if(mysqli_num_rows($result4)>0){
				echo "<div class='type'>";
					echo "<div class='type1'>";
						echo "NON VEG MAIN COURSE";
					echo "</div>";
				echo "</div>";
				while($row4=mysqli_fetch_assoc($result4)){
					echo "<form method='POST' action='OrderNow2.php'>";
						echo "<div class='hotel' align='center'>";
							echo "<img   src='Images/nonvegmaincourse.jpeg'>";
							echo "<input type='text' name='iid' value='".$row4["iid"]."'readonly>";
							echo "<div class='iname'>";
								echo "<p><center>".$row4["iname"]."</center></p>";
							echo "</div><br>";
							echo "<div class='no'>";
								echo "<input type='Number' name='quantity' min='0' max='10' required>";
							echo "</div><br>";
							echo "<div class='price'>";
								echo "<p><center>&#8377;".$row4["price"]."</center></p>";
							echo "</div><br>";
							echo "<div class='no' >";
								echo "<input type='Submit' name='Submit' value='Add'>";
							echo "</div><br>";
						echo "</div>";
					echo "</form>";
				}
			}
			$sql5="select items.iname,provide.price,items.iid from items inner join provide where items.iid=provide.iid and hid='".$hid."' and type='Indian Breads'";
			$result5=mysqli_query($dbhandle,$sql5);
			if(mysqli_num_rows($result5)>0){
				echo "<div class='type'>";
					echo "<div class='type1'>";
						echo "INDIAN BREADS";
					echo "</div>";
				echo "</div>";
				while($row5=mysqli_fetch_assoc($result5)){
					echo "<form method='POST' action='OrderNow2.php'>";
						echo "<div class='hotel' align='center'>";
							echo "<img   src='Images/indianbreads.jpeg'>";
							echo "<input type='text' name='iid' value='".$row5["iid"]."'readonly>";
							echo "<div class='iname'>";
								echo "<p><center>".$row5["iname"]."</center></p>";
							echo "</div><br>";
							echo "<div class='no'>";
								echo "<input type='Number' name='quantity' min='0' max='10' required>";
							echo "</div><br>";
							echo "<div class='price'>";
								echo "<p><center>&#8377;".$row5["price"]."</center></p>";
							echo "</div><br>";
							echo "<div class='no' >";
								echo "<input type='Submit' name='Submit' value='Add'>";
							echo "</div><br>";
						echo "</div>";
					echo "</form>";
				}
			}
			$sql6="select items.iname,provide.price,items.iid from items inner join provide where items.iid=provide.iid and hid='".$hid."' and type='Rice'";
			$result6=mysqli_query($dbhandle,$sql6);
			if(mysqli_num_rows($result6)>0){
				echo "<div class='type'>";
					echo "<div class='type1'>";
						echo "RICE";
					echo "</div>";
				echo "</div>";
				while($row6=mysqli_fetch_assoc($result6)){
					echo "<form method='POST' action='OrderNow2.php'>";
						echo "<div class='hotel' align='center'>";
							echo "<img  src='Images/rice.jpeg'>";
							echo "<input type='text' name='iid' value='".$row6["iid"]."'readonly>";
							echo "<div class='iname'>";
								echo "<p><center>".$row6["iname"]."</center></p>";
							echo "</div><br>";
							echo "<div class='no'>";
								echo "<input type='Number' name='quantity' min='0' max='10' required>";
							echo "</div><br>";
							echo "<div class='price'>";
								echo "<p><center>&#8377;".$row6["price"]."</center></p>";
							echo "</div><br>";
							echo "<div class='no' >";
								echo "<input type='Submit' name='Submit' value='Add'>";
							echo "</div><br>";
						echo "</div>";
					echo "</form>";
				}
			}
			$sql7="select items.iname,provide.price,items.iid from items inner join provide where items.iid=provide.iid and hid='".$hid."' and type='Biriyani'";
			$result7=mysqli_query($dbhandle,$sql7);
			if(mysqli_num_rows($result7)>0){
				echo "<div class='type'>";
					echo "<div class='type1'>";
						echo "BIRIYANI";
					echo "</div>";
				echo "</div>";
				while($row7=mysqli_fetch_assoc($result7)){
					echo "<form method='POST' action='OrderNow2.php'>";
						echo "<div  class='hotel' align='center'>";
							echo "<img  src='Images/biriyani.jpeg'>";
							echo "<input type='text' name='iid' value='".$row7["iid"]."'readonly>";
							echo "<div class='iname'>";
								echo "<p><center>".$row7["iname"]."</center></p>";
							echo "</div><br>";
							echo "<div class='no'>";
								echo "<input type='Number' name='quantity' min='0' max='10' required>";
							echo "</div><br>";
							echo "<div class='price'>";
								echo "<p><center>&#8377;".$row7["price"]."</center></p>";
							echo "</div><br>";
							echo "<div class='no' >";
								echo "<input type='Submit' name='Submit' value='Add'>";
							echo "</div><br>";
						echo "</div>";
					echo "</form>";
				}
			}
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
			$con="select * from ords where cid='".$cid."' and dat='".date("Y-m-d")."' and status='Placing'";
			$query=mysqli_query($dbhandle,$con);
			if(mysqli_num_rows($query)<=0){
				echo "<h1 style='color:white'>Nothing To Show</h1>";
				echo "<img src='Images/EmptyBag.jpeg' style='width:80%; height:200px;'>";
			}
			else{
				while($row_con=mysqli_fetch_assoc($query)){
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
					}
				}
				echo "<div class='PlaceOrder'>";
					echo "<a href='../ProceedToCheckOut/ProceedToCheckOut.php'><button>Proceed To Check Out &#8594;</button></a>";
				echo "</div>";
			}
		echo "</div>";
	?>
</body>
</html>