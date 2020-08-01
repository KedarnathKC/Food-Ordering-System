<?php
	session_start();
	require "../Config/config.php";
	if(isset($_POST['Submit'])){
		echo "trying to order<br>";
		$hid=$_COOKIE['hid'];
		echo $hid;
		$cid=$_COOKIE['cid'];
		$iid=$_POST["iid"];
		$quantity=(int)$_POST["quantity"];
		$oidcreatechk="select * from ords where cid='".$cid."' and hid='".$hid."' and dat='".date("Y-m-d ")."' and status='Placing'";
		$query_oidcreatechk=mysqli_query($dbhandle,$oidcreatechk);
		if(@mysqli_num_rows($query_oidcreatechk)>0){
			echo "oid already exists<br>";
			$oidretrive="select * from ords  where dat='".date("Y-m-d")."' and cid='".$cid."' and hid='".$hid."' ORDER BY oid desc  LIMIT 1";
			$query_oidretrive=mysqli_query($dbhandle,$oidretrive);
			if(mysqli_num_rows($query_oidretrive)>0){
				$row_oidretrive=mysqli_fetch_assoc($query_oidretrive);
				$oid=$row_oidretrive['oid'];
				echo $oid."<br>";
				$name="Order";
				$tablename=$name.$oid;
				$priceretrive="select * from provide where iid='".$iid."' and hid='".$hid."'";
				$query_priceretrive=mysqli_query($dbhandle,$priceretrive);
				if(mysqli_num_rows($query_priceretrive)>0){
					$row_priceretrive=mysqli_fetch_assoc($query_priceretrive);
					$price=(int)$row_priceretrive['price'];
					$check="select * from ".$tablename." where iid='".$iid."'";
					$query_check=mysqli_query($dbhandle,$check);
					if(mysqli_num_rows($query_check)>0){
						echo "Item Found<br>";
						$row_check=mysqli_fetch_assoc($query_check);
						$q=(int)$row_check['quantity'];
						echo "q".$q."<br>";
						$quantity=$quantity+$q;
						echo $quantity;
						$total=$quantity*$price;
						$oidtableupdate="update ".$tablename." set quantity='".$quantity."' , sub_tot='".$total."' where iid='".$iid."'";
						$query_oidtableupdate=mysqli_query($dbhandle,$oidtableupdate);
						if($query_oidtableupdate){
							echo "<script> alert('Item succesfully placed'); </script>";
							header('location:OrderNow1.php');
						}
						else{
							echo "<script> alert('Item couldn'\t be placed'); </script>";	
						}
					}
					else{
						echo "Item Not Found<br>";
						$total=$quantity*$price;
						$oidtableinsert="insert into ".$tablename." values('".$iid."','".$quantity."','".$total."')";
						$query_oidtableinsert=mysqli_query($dbhandle,$oidtableinsert);
						if($query_oidtableinsert){
							echo "<script> alert('Item succesfully placed'); </script>";
							header('location:OrderNow1.php');
						}
						else{
							echo "<script> alert('Item couldn'\t be placed'); </script>";	
							echo "Error: ".mysqli_error($dbhandle);
						}
					}		
				}
				else{
					echo "no such item in provide<br>";
					echo "Error: ".mysqli_error($dbhandle);
				}
			}
			else{
				echo "couldn'\t retrive oid<br>";
				echo "Error: ".mysqli_error($dbhandle);
			}			
		}
		else{
			echo "need to generate oid<br>";
			$date=date("Y-m-d");
			$oidcreate="insert into ords (cid,hid,status,dat) values('".$cid."','".$hid."','Placing','".$date."')";
			$query_oidcreate=mysqli_query($dbhandle,$oidcreate);
			if($query_oidcreate){
				echo "oid created<br>";
				$oidretrive="select * from ords where dat='".date("Y-m-d")."' and cid='".$cid."' ORDER BY oid desc  LIMIT 1 ";
				$query_oidretrive=mysqli_query($dbhandle,$oidretrive);
				if(mysqli_num_rows($query_oidretrive)>0){
					$row_oidretrive=mysqli_fetch_assoc($query_oidretrive);
					$oid=$row_oidretrive['oid'];
					echo $oid."<br>";
					$name="Order";
					$tablename=$name.$oid;
					$oidtablecreate="create table ".$tablename." (iid int(5),quantity int(2),sub_tot float(6,2))";
					$query_oidtablecreate=mysqli_query($dbhandle,$oidtablecreate);
					if($query_oidtablecreate){
						echo "new table created<br>";
						$priceretrive="select * from provide where iid='".$iid."' and hid='".$hid."'";
						$query_priceretrive=mysqli_query($dbhandle,$priceretrive);
						if(mysqli_num_rows($query_priceretrive)>0){
							$row_priceretrive=mysqli_fetch_assoc($query_priceretrive);
							$price=(int)$row_priceretrive['price'];
							$total=$quantity*$price;
							$oidtableinsert="insert into ".$tablename." values('".$iid."','".$quantity."','".$total."')";
							$query_oidtableinsert=mysqli_query($dbhandle,$oidtableinsert);
							if($query_oidtableinsert){
								echo "<script> alert('Item succesfully placed'); </script>";
								header('location:OrderNow1.php');
							}
							else{
								echo "<script> alert('Item couldn'\t be placed'); </script>";
								echo "Error: ".mysqli_error($dbhandle);	
							}
						}
						else{
							echo "couldn'\t retrive price<br>";
							echo "Error: ".mysqli_error($dbhandle);
						}
					}
					else{
						echo "couldn'\t create a new table";
						echo "Error: ".mysqli_error($dbhandle);
					}
				}
				else{
					echo "couldn'\t retrive oid<br>";
					echo "Error: ".mysqli_error($dbhandle);
				}
			}
			else{
				echo "couldn'\t create oid<br>";
				echo "Error: ".mysqli_error($dbhandle);
			}
		}	
	}
?>