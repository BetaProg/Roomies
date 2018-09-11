<?php
session_start();
if(!isset($_SESSION["login"]))
	header("location:login.php");
	include 'dbconfig.php';
?>
<?php
 $rm_id = $_SESSION['rm_id'];
 //echo $rm_id;
?>
<?php
$total = 0;
$spent = 0;
$spent_total = 0;
$person_spent_sql = "select * from rm_purchase where purchase_no>85";
$result_spent = mysql_query($person_spent_sql);
while($row_spent = mysql_fetch_array($result_spent)){
	$person_spent = $row_spent['perhead_amount'];
	$single_amount_1 = explode(",",$person_spent);
		$user_single_amount_1 = $single_amount_1[$rm_id-1];
		$total_1 += $user_single_amount_1;
}

$person_total_sql = "select * from rm_purchase where rm_id='$rm_id' and purchase_no>85";
	$result_person_total = mysql_query($person_total_sql);
	while($row_total = mysql_fetch_array($result_person_total)){
		$person_total = $row_total['perhead_amount'];
		$amount_spent = $row_total['purchase_amount'];
		//echo $person_total;
		//echo "<br>";
		$spent += $amount_spent;
		$single_amount = explode(",",$person_total);
		$user_single_amount = $single_amount[$rm_id-1];
		$total += $user_single_amount;
		//echo $total;
		//echo "<br><br>";
	}
	$balance = $total_1-$spent;
	$topay = abs($balance);
	echo "<center><p>Used :<b>$total_1</b> | ";
	echo "Spent : <b>$spent</b></p></center>";
	if($balance>0){
	echo "<center><p>You've to pay : <b>$balance</b></p></center>";
	}
	else 
		echo "<center><p>You'll get :<b>$topay</b></p></center>";
	?>
	