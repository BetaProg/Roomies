<?php
session_start();
if(!isset($_SESSION["login"]))
	header("location:login.php");
	include 'dbconfig.php';
?>
<?php
 $rm_id = $_SESSION['rm_id'];
?>
<?php

$all_users_sql = "select * from rm_reg";
	$result_all_users = mysql_query($all_users_sql);
	$count_all_users = mysql_num_rows($result_all_users);
	




	if(isset($_POST['save_purchase'])) {
		$purchase_people = $_POST['people_array'];
		
		
		$persons_involved = $purchase_people;
		$each_person = explode(',',$persons_involved);
		//echo "<br>";
		$people = array();
		foreach ($each_person as $each) {
		//	echo $each.'<br>';
			
			array_push($people, $each);
			
		}
		
	        $purchase_amount = $_POST['purchase_amount'];
		$involvement_array = array();
	while($row = mysql_fetch_array($result_all_users)){
				
			$rm_name_all = $row['rm_name'];
			if(in_array($rm_name_all, $people)) {
				array_push($involvement_array, $purchase_amount/count($people));
			}
			else {
			array_push($involvement_array, 0);
			}

	}
		
		//$people_all = json_decode($_POST['newValuesArr']);
		
		$purchase_cat_name = $_POST['purchase_cat_name'];
              //$purchase_amount = $_POST['purchase_amount'];
		$purchase_comments = $_POST['purchase_comments'];
		$purchase_time = $_POST['purchase_time'];
		
		$arr = implode(",",$involvement_array);
	
	//$finalarray = '<script>document.write(finalarray)</script>';
	$rm_purchase_sql = "insert into rm_purchase(purchase_people, purchase_cat_name, purchase_amount, rm_id, purchase_comments, purchase_time, perhead_amount) values('$purchase_people', '$purchase_cat_name', '$purchase_amount', '$rm_id', '$purchase_comments', CURDATE(), '$arr')";
	$result_rm_purchase = mysql_query($rm_purchase_sql);
	
	if($result_rm_purchase) {
	
	header('location:index.php');
	echo 'It was a success';
	}
	else {
	echo "Insertion error for the item successfully";
	}
	
	
	}
	
	
?>

<?php 
		//$finalarray = '<p><script>document.write(finalarray)</script></p>';
		//$finalarray = '23';
		//echo $finalarray;
		//$f = $finalarray[1];
		
	?>
			