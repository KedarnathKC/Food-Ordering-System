<?php
	session_start();
	require '..\Config\config.php';
	if(isset($_POST["CLSubmit"])){
		$CLusername=$_POST['CLusername'];
		$CLpassword=sha1($_POST['CLpassword']);
		$query="select * from customer WHERE cusername='$CLusername' AND cpassword='$CLpassword'";
		$query_run = mysqli_query($dbhandle,$query);	 
		if(mysqli_num_rows($query_run)>0){
			$row=mysqli_fetch_assoc($query_run);
			$cookie_name = "cid";
			$cookie_value = $row["cid"];
			setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
			echo "<script type='text/javascript'>window.location.href='../CustomerHomePage/CustomerHomePage.php'</script>";
			//valid 
		}	
		else{
			//invalid
			echo '<script type="text/javascript"> alert("Invalid Credentials") </script>';	
			echo "<script type='text/javascript'>window.location.href='CustomerLogIn.php'</script>";
		}					
	}
?>

