<?php
	session_start();
	require '..\Config\config.php';

	if(isset($_POST['HSubmit'])){
		$HName = $_POST['HName'];
		$addr = $_POST['addr'];
		$pno1 = $_POST['pno1'];
		$pno2 = $_POST['pno2'];
		$HUsername = $_POST['HUsername'];
		$HPassword = sha1($_POST['HPassword']);
		$HCPassword = sha1($_POST['HCPassword']);	
		if($HPassword==$HCPassword){
			$query="select * from hotel WHERE h_username='$HUsername'";
			$query_run = mysqli_query($dbhandle,$query);
			if(@mysqli_num_rows($query_run)){
				// there is already a user with the same username
				echo '<script type="text/javascript"> alert("User already exists ... try another username")  </script>';
			}
			else{
				$insert_query = "insert into hotel  ( hname, address, pno1, pno2, husername, hpassword) values ('$HName', '$addr',$pno1,$pno2,'$HUsername','$HPassword')";
				$executed = mysqli_query($dbhandle, $insert_query);
				if (!$executed)
					die("unable to insert values");
				else{
					echo '<script type="text/javascript"> alert("Registered Successfully...Please Log In ");
					window.location.href="../HotelLogIn/HotelLogIn.html" </script>';	
				}
			}
		}		
		else{
			echo '<script type="text/javascript"> alert("Password and Confirm password does not match")</script>';
			echo '<script type="text/javascript">window.location.href="HotelReg.html"</script>';
			

		}
	}
?>



