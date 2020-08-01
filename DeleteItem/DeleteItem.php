<?php
	session_start();
	require '..\Config\config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Delete Item</title>
	<link rel="stylesheet" type="text/css" href="CSS/Style.css">
</head>
<!-- style="background-image: url(Images/Background2.jpg); background-repeat: repeat;"-->
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
	if(isset($_POST["Submit"])){
		$hid=$_COOKIE['hid'];
		$id=$_POST["id"];
		$price=$_POST["price"];
		$sql="delete from provide  where iid='".$id."' and hid='".$hid."'";
		$result=mysqli_query($dbhandle,$sql);
		if($result){
			echo "<script>alert('Succesfully Deleted')</script>";
		}
		else{
			echo "<script>alert('Couldn\'t Delete')</script>";
		}
	}
?>		
	<br><br><br>
	<?php
		$hid=$_COOKIE['hid'];
		$sql="select * from provide where hid='".$hid."'";
    	$query=mysqli_query($dbhandle,$sql);
   		if(mysqli_num_rows($query)>0){
	      echo "<br><br><center><h1 style='color:white'>MENU</h1></center>";
	      echo "<hr><br>";
	    }
	    else{
	      echo "<br><br><center><h1 style='color:white'>NO ITEMS TO SHOW</h1></center>";
	      echo "<hr><br>";
	    }
		$sql1="select items.iid,items.iname, provide.price from items inner join provide where hid=$hid and items.iid=provide.iid and type='Breakfast'";
  		$result1=mysqli_query($dbhandle,$sql1);
		if(mysqli_num_rows($result1)>0){
			$f=false;
			echo "<div class='type'>";
				echo "<div class='type1'>";  
			    	echo "BREAKFAST";    
			    echo "</div>";
			echo "</div>";
			while($row1=mysqli_fetch_assoc($result1)){
			    echo "<form method='POST' action='DeleteItem.php'>";
				    echo "<div class='hotel'>";
				      	echo "<p>ID:</p><input type='text' name='id' value='".$row1["iid"]."' readonly><br>";
				      	echo "<p>Name:</p><input class='data' type='text' name='iname' value='".$row1["iname"]."' readonly><br>";
				      	echo "<p>Current Price: </p><input type='text' name='price' value='".$row1["price"]."'readonly>";
				      	echo "<br><br><input type='Submit' name='Submit' value='Delete'>";
				    echo "</div>";
				echo "</form>";
			}
  		}
		$sql2="select items.iid,items.iid,items.iname, provide.price from items inner join provide where hid=$hid and items.iid=provide.iid and type='Starter'";
  		$result2=mysqli_query($dbhandle,$sql2);
		if(mysqli_num_rows($result2)>0){
			$f=false;
			echo "<div class='type'>";
				echo "<div class='type1'>";  
			    	echo "STARTER";    
			    echo "</div>";
			echo "</div>";
			while($row2=mysqli_fetch_assoc($result2)){
			    echo "<form method='POST' action='DeleteItem.php'>";
				    echo "<div class='hotel'>";
				      	echo "<p>ID:</p><input type='text' name='id' value='".$row2["iid"]."' readonly><br>";
				      	echo "<p>Name:</p><input class='data' type='text' name='iname' value='".$row2["iname"]."' readonly><br>";
				      	echo "<p>Current Price: </p><input type='text' name='price' value='".$row2["price"]."'readonly>";
				      	echo "<br><br><input type='Submit' name='Submit' value='Delete'>";
				    echo "</div>";
				echo "</form>";
			}
  		}
  		$sql3="select items.iid,items.iname, provide.price from items inner join provide where hid=$hid and items.iid=provide.iid and type='Veg Main Course'";
  		$result3=mysqli_query($dbhandle,$sql3);
		if(mysqli_num_rows($result3)>0){
			$f=false;
			echo "<div class='type'>";
				echo "<div class='type1'>";  
			    	echo "VEG MAIN COURSE";    
			    echo "</div>";
			echo "</div>";
			while($row3=mysqli_fetch_assoc($result3)){
			    echo "<form method='POST' action='DeleteItem.php'>";
				    echo "<div class='hotel'>";
				      	echo "<p>ID:</p><input type='text' name='id' value='".$row3["iid"]."' readonly><br>";
				      	echo "<p>Name:</p><input class='data' type='text' name='iname' value='".$row3["iname"]."' readonly><br>";
				      	echo "<p>Current Price: </p><input type='text' name='price' value='".$row3["price"]."'readonly>";
				      	echo "<br><br><input type='Submit' name='Submit' value='Delete'>";
				    echo "</div>";
				echo "</form>";
			}
  		}
  		$sql4="select items.iid,items.iname, provide.price from items inner join provide where hid=$hid and items.iid=provide.iid and type='Non Veg Main Course'";
  		$result4=mysqli_query($dbhandle,$sql4);
		if(mysqli_num_rows($result4)>0){
			$f=false;
			echo "<div class='type'>";
				echo "<div class='type1'>";  
			    	echo "NON VEG MAIN COURSE";    
			    echo "</div>";
			echo "</div>";
			while($row4=mysqli_fetch_assoc($result4)){
			    echo "<form method='POST' action='DeleteItem.php'>";
				    echo "<div class='hotel'>";

				      	echo "<p>ID:</p><input type='text' name='id' value='".$row4["iid"]."' readonly><br>";
				      	echo "<p>Name:</p><input class='data' type='text' name='iname' value='".$row4["iname"]."' readonly><br>";
				      	echo "<p>Current Price: </p><input type='text' name='price' value='".$row4["price"]."'readonly>";
				      	echo "<br><br><input type='Submit' name='Submit' value='Delete'>";
				    echo "</div>";
				echo "</form>";
			}
  		}
  		$sql5="select items.iid,items.iname, provide.price from items inner join provide where hid=$hid and items.iid=provide.iid and type='Indian Breads'";
  		$result5=mysqli_query($dbhandle,$sql5);
		if(mysqli_num_rows($result5)>0){
			$f=false;
			echo "<div class='type'>";
				echo "<div class='type1'>";  
			    	echo "INDIAN BREADS";    
			    echo "</div>";
			echo "</div>";
			while($row5=mysqli_fetch_assoc($result5)){
			    echo "<form method='POST' action='DeleteItem.php'>";
				    echo "<div class='hotel'>";

				      	echo "<p>ID:</p><input type='text' name='id' value='".$row5["iid"]."' readonly><br>";
				      	echo "<p>Name:</p><input class='data' type='text' name='iname' value='".$row5["iname"]."' readonly><br>";
				      	echo "<p>Current Price: </p><input type='text' name='price' value='".$row5["price"]."'readonly>";
				      	echo "<br><br><input type='Submit' name='Submit' value='Delete'>";
				    echo "</div>";
				echo "</form>";
			}
  		}
  		$sql6="select items.iid,items.iname, provide.price from items inner join provide where hid=$hid and items.iid=provide.iid and type='Rice'";
  		$result6=mysqli_query($dbhandle,$sql6);
		if(mysqli_num_rows($result6)>0){
			$f=false;
			echo "<div class='type'>";
				echo "<div class='type1'>";  
			    	echo "RICE";    
			    echo "</div>";
			echo "</div>";
			while($row6=mysqli_fetch_assoc($result6)){
			    echo "<form method='POST' action='DeleteItem.php'>";
				    echo "<div class='hotel'>";

				      	echo "<p>ID:</p><input type='text' name='id' value='".$row6["iid"]."' readonly><br>";
				      	echo "<p>Name:</p><input class='data' type='text' name='iname' value='".$row6["iname"]."' readonly><br>";
				      	echo "<p>Current Price: </p><input type='text' name='price' value='".$row6["price"]."'readonly>";
				      	echo "<br><br><input type='Submit' name='Submit' value='Delete'>";
				    echo "</div>";
				echo "</form>";
			}
  		}
  		$sql7="select items.iid,items.iname, provide.price from items inner join provide where hid=$hid and items.iid=provide.iid and type='Biriyani'";
  		$result7=mysqli_query($dbhandle,$sql7);
		if(mysqli_num_rows($result7)>0){
			$f=false;
			echo "<div class='type'>";
				echo "<div class='type1'>";  
			    	echo "BIRIYANI";    
			    echo "</div>";
			echo "</div>";
			while($row7=mysqli_fetch_assoc($result7)){
			    echo "<form method='POST' action='DeleteItem.php'>";
				    echo "<div class='hotel'>";

				      	echo "<p>ID:</p><input type='text' name='id' value='".$row7["iid"]."' readonly><br>";
				      	echo "<p>Name:</p><input class='data' type='text' name='iname' value='".$row7["iname"]."' readonly><br>";
				      	echo "<p>Current Price: </p><input type='text' name='price' value='".$row7["price"]."'readonly>";
				      	echo "<br><br><input type='Submit' name='Submit' value='Delete'>";
				    echo "</div>";
				echo "</form>";
			}
  		}
	?>

</body>
</html>