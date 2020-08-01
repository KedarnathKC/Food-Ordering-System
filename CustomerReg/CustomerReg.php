<?php
	session_start();
	require '..\Config\config.php';

	if(isset($_POST['CSubmit'])){
		$CName = $_POST['CName'];
		$addrl1 = $_POST['addrl1'];
		$addrl2 = $_POST['addrl2'];
		$addrl3 = $_POST['addrl3'];
		$city=$_POST["city"];
		$pincode=$_POST["pincode"];
		$state=$_POST["state"];
		$pno1 = $_POST['pno1'];
		$pno2 = $_POST['pno2'];
		$CUsername = $_POST['CUsername'];
		$CPassword = sha1($_POST['CPassword']);
		$CCPassword = sha1($_POST['CCPassword']);	
		$email=$_POST['email'];
		if($CPassword===$CCPassword){
			$query="select * from customer WHERE cusername='".$CUsername."'";
			$query_run = mysqli_query($dbhandle,$query);
			if(mysqli_num_rows($query_run)>0){
				// there is already a user with the same username
				echo '<script type="text/javascript"> alert("User already exists ... try another username")  </script>';
			}
			else{
				$insert_query = "insert into customer (cname, cusername,cpassword,pno1, pn02,cemailid,addrl1,addrl2,addrl3, city,pincode,state) values ('".$CName."','".$CUsername."','".$CPassword."','".$pno1."','".$pno2."','".$email."','".$addrl1."','".$addrl2."','".$addrl3."','".$city."','".$pincode."','".$state."')";
				$executed = mysqli_query($dbhandle, $insert_query);
				if (!$executed)
					die("unable to insert values");
				else{
					echo '<script type="text/javascript"> alert("Registered Successfully...Please Log In ");
					window.location.href="../CustomerLogIn/CustomerLogIn.html" </script>';	
				}
			}
		}		
		else{
			echo '<script type="text/javascript"> alert("Password and Confirm password does not match")</script>';
			echo '<script type="text/javascript">window.location.href="CustomerReg.html"</script>';
			

		}
	}
?>



