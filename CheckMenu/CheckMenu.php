<?php
	session_start();
	require "../Config/config.php"; 
  ?>
<!DOCTYPE html>
<html>
<head>
  <title>Check Menu</title>
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
          <a href="CheckMenu.php">Check Menu</a>
          <a href="/IWP/AddItem/AddItem.php">Add Item</a>
          <a href="/IWP/UpdatePrice/UpdatePrice.php">Update Price</a>
          <a href="/IWP/DeleteItem/DeleteItem.php">Delete Item</a>
          
        </div>
    </div>
  </div>
  <br><br>
  <?php
    $hid=$_COOKIE['hid'];
    $f=true;
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
    $sql1="select items.iname, provide.price from items inner join provide where hid=$hid and items.iid=provide.iid and type='Breakfast'";
    $result1=mysqli_query($dbhandle,$sql1);
    if(mysqli_num_rows($result1)>0){
      $f=false;
      echo "<div class='type'>";
        echo "<div class='type1'>";
          echo "BREAKFAST";
        echo "</div>";
      echo "</div>";
      while($row1=mysqli_fetch_assoc($result1)){
        echo "<div class='hotel'>";
        echo "<img src=Images/breakfast.jpeg>";
        echo "<p><center> ".$row1["iname"]."</center></p>";
        echo "<p><center>".$row1["price"]."</center></p>"; 
        echo "</div>";
      }
    }
    $sql2="select items.iname, provide.price from items inner join provide where hid=$hid and items.iid=provide.iid and type='Starter'";
    $result2=mysqli_query($dbhandle,$sql2);
    if(mysqli_num_rows($result2)>0){
      $f=false;
      echo "<div class='type'>";
        echo "<div class='type1'>";  
          echo "STARTER";    
        echo "</div>";
      echo "</div>";
      while($row2=mysqli_fetch_assoc($result2)){
        echo "<div class='hotel'>";
        echo "<img src=Images/starter.jpg><br>";  
        echo "<p><center> ".$row2["iname"]."</center></p>";
        echo "<p><center>".$row2["price"]."</center></p>"; 
        echo "</div>";
      }
    }
    $sql3="select items.iname, provide.price from items inner join provide where hid=$hid and items.iid=provide.iid and type='Veg Main Course'";
    $result3=mysqli_query($dbhandle,$sql3);
    if(mysqli_num_rows($result3)>0){
      $f=false;
      echo "<div class='type'>";
        echo "<div class='type1'>";
          echo "VEG MAIN COURSE";
        echo "</div>";
      echo "</div>";
      while($row3=mysqli_fetch_assoc($result3)){
        echo "<div class='hotel'>";
        echo "<img src=Images/vegmaincourse.jpeg><br>";  
        echo "<p><center> ".$row3["iname"]."</center></p>";
        echo "<p><center>".$row3["price"]."</center></p>"; 
        echo "</div>";
      }
    }
    $sql4="select items.iname, provide.price from items inner join provide where hid=$hid and items.iid=provide.iid and type='Non Veg Main Course'";
    $result4=mysqli_query($dbhandle,$sql4);
    if(mysqli_num_rows($result4)>0){
      $f=false;
      echo "<div class='type'>";
        echo "<div class='type1'>";
          echo "NON VEG MAIN COURSE";
        echo "</div>";
      echo "</div>";
      while($row4=mysqli_fetch_assoc($result4)){
        echo "<div class='hotel'>";
        echo "<img src=Images/nonvegmaincourse.jpeg><br>";  
        echo "<p><center> ".$row4["iname"]."</center></p>";
        echo "<p><center>".$row4["price"]."</center></p>"; 
        echo "</div>";
      }
    }
    $sql5="select items.iname, provide.price from items inner join provide where hid=$hid and items.iid=provide.iid and type='Indian Breads'";
    $result5=mysqli_query($dbhandle,$sql5);
    if(mysqli_num_rows($result5)>0){
      $f=false;
      echo "<div class='type'>";
        echo "<div class='type1'>";
          echo "INDIAN BREADS";
        echo "</div>";
      echo "</div>";
      while($row5=mysqli_fetch_assoc($result5)){
        echo "<div class='hotel'>";
        echo "<img src=Images/indianbreads.jpeg><br>";
        echo "<center> ".$row5["iname"]."/center></p>";
        echo "<p><center>".$row5["price"]."</center></p>"; 
        echo "</div>";
      }
    }
    $sql6="select items.iname, provide.price from items inner join provide where hid=$hid and items.iid=provide.iid and type='Rice'";
    $result6=mysqli_query($dbhandle,$sql6);
    if(mysqli_num_rows($result6)>0){
      $f=false;
      echo "<div class='type'>";
        echo "<div class='type1'>";
          echo "RICE";
        echo "</div>";
      echo "</div>";
      while($row6=mysqli_fetch_assoc($result6)){
        echo "<div class='hotel'>";
        echo "<img src=Images/rice.jpeg><br>";
        echo "<p><center> ".$row6["iname"]."</center></p>";
        echo "<p><center>".$row6["price"]."</center></p>"; 
        echo "</div>";
      }
    }
    $sql7="select items.iname, provide.price from items inner join provide where hid=$hid and items.iid=provide.iid and type='Biriyani'";
    $result7=mysqli_query($dbhandle,$sql7);
    if(mysqli_num_rows($result7)>0){
      $f=false;
      echo "<div class='type'>";
        echo "<div class='type1'>";
          echo "BIRIYANI";
        echo "</div>";
      echo "</div>";
      while($row7=mysqli_fetch_assoc($result7)){
        echo "<div class='hotel'>";
        echo "<img src=Images/biriyani.jpeg><br>";
        echo "<p><center> ".$row7["iname"]."</center></p>";
        echo "<p><center>".$row7["price"]."</center></p>"; 
        echo "</div>";
      }
    }
?>
</body>
</html>