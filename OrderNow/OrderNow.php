<?php
	require "../Config/config.php";
	if(isset($_POST["back"])){
		setcookie("hid", " ", time() - 3600);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Order now</title>
	<link rel="stylesheet" type="text/css" href="CSS/Style.css">
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
	</div><br><br>
	<?php
		$sql="select * from hotel";
		$result=mysqli_query($dbhandle,$sql);
		if(mysqli_num_rows($result)>0){
			while($row=mysqli_fetch_assoc($result)){
				echo "<form method='POST' action='OrderNow1.php' id='form1'>";
						echo "<div class='hotel1'>";
							echo "<img src='Images/hotel.jpeg'><br>";
							echo "<input type='text' readonly name='hid' value='".$row['hid']."'>";
							echo"<center><p>".$row["hname"]."</p></center>";
							echo "<input type='Submit' class='dropbtn' value='Choose' name='Submit'>";
						echo "</div>";
				echo "</form>";
			}	 
		}		
	?>
</body>
</html>