<?php
	require "../Config/config.php";
	if(isset($_POST['Bill'])){
		$cid=$_COOKIE['cid'];
		$tot_sum=0;
		$sql="select * from ords where cid='".$cid."' and dat='".date("Y-m-d")."'";
		$query=mysqli_query($dbhandle,$sql);
		if(mysqli_num_rows($query)>0){
			$i=0;
			$oids=array();
			$sums=array();
			while($row=mysqli_fetch_assoc($query)){
					//echo $row['oid']."<br>";

				$oid=$row['oid'];
				$oids[$i]=$oid;
				$name="Order";
				$tablename=$name.$oid;
				date_default_timezone_set("Asia/Calcutta");
				//echo "The time is " . date("H:i:s");
				$updateordstime="update ords set tim='".date("H:i:s")."' , status='Ordered' where oid='".$oid."'";
				$query_updateordstime=mysqli_query($dbhandle,$updateordstime);
				if($query_updateordstime){
					//echo "time set for ".$oid."<br>";
					$sumsql="select sum(".$tablename.".sub_tot) as sum from ".$tablename."";
					$query_sum=mysqli_query($dbhandle,$sumsql);
					$rsum=mysqli_fetch_assoc($query_sum);
					$sum=$rsum['sum'];
					$sums[$i++]=$sum;
					$tot_sum+=$sum;
					//echo $sum."<br>";
					
				}
			}
			print_r($oids);
			$createbill="insert into bill (cid,total,dat,tim) values ('".$cid."','".$tot_sum."','".date("Y-m-d")."','".date("H:i:s")."')";
			$query_createbill=mysqli_query($dbhandle,$createbill);
			if($query_createbill){
				echo "bill generated";
				$bidretrive="select * from bill where cid='".$cid."' and dat='".date("Y-m-d")."' Order by bid limit 1";
				$query_bidretrive=mysqli_query($dbhandle,$bidretrive);
				if(mysqli_num_rows($query_bidretrive)>0){
					$row1=mysqli_fetch_assoc($query_bidretrive);
					$bid=$row1['bid'];
					echo $bid;
					$name1="Bill";
					$billtablename=$name1.$bid;
					$createbill1="create table ".$billtablename." (oid int(5),sub_tot float(6,2))";
					$query_createbill1=mysqli_query($dbhandle,$createbill1);
					if($query_createbill1){
						echo 'created<br>';
						for($x = 0; $x < count($sums); $x++){
							$insertbill="insert into ".$billtablename." values ( '".$oids[$x]."','".$sums[$x]."')";
							$query_insert=mysqli_query($dbhandle,$insertbill);
							if($query_insert){
								echo "<script>alert('Order Placed')</script>";
								header('location:../CustomerHomePage/CustomerHomePage.php');
							}
							else{
								echo mysqli_error($dbhandle);
							}
						}
					}
					else{
						echo mysqli_error($dbhandle);
					}
				}
			}
			else{
				echo "NO BILL";
			}
		}
		
	}
	
?>
