<?php
	session_start();
	require '..\Config\config.php';
	if(isset($_POST["HLSubmit"])){
		$HLusername=$_POST['HLusername'];
		$HLpassword=sha1($_POST['HLpassword']);
		$query="select * from hotel WHERE husername='$HLusername' AND hpassword='$HLpassword'";
		$query_run = mysqli_query($dbhandle,$query);	 
		if(mysqli_num_rows($query_run)>0){
			$row=mysqli_fetch_assoc($query_run);
			$cookie_name = "hid";
			$cookie_value = $row["hid"];
			setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");	
			echo "<script type='text/javascript'>window.location.href='../HotelHomePage/HotelHomePage.html'</script>";
			//valid 
		}	
		else{
			//invalid
			echo '<script type="text/javascript"> alert("Invalid Credentials") </script>';	
			echo "<script type='text/javascript'>window.location.href='HotelLogIn.html'</script>";
		}					
	}
?>

