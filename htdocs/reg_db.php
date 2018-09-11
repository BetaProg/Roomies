<?php
	mysql_connect("localhost","root","root") or die("Connection Failure");
	mysql_select_db("rm_db") or die("DB not found");
	if(isset($_POST['join'])) {
		$rm_name = $_POST['rm_name'];
		//echo $rm_name;
	$check_rm_name_sql =  "select count(*) as 'Count1' from rm_reg group by rm_name having rm_name = '$rm_name'";
	$res = mysql_query($check_rm_name_sql);
	$row = mysql_fetch_assoc($res);
	//echo ($row['Count1']);
	if($row['Count1'] != 0) {
		echo "Sorry user registered already..!";
	}
	else {
		if($rm_name != 'dummy_profile'){
		
	$rm_reg_sql = "insert into rm_reg(rm_name, rm_mobile, rm_pass) values('$rm_name', '$rm_mobile', '2314')";
	$result_rm_reg = mysql_query($rm_reg_sql);
	
	if($result_rm_reg) {
		
	$_SESSION['login']='1';
	$_SESSION['rm_name']=$rm_name;
	$_SESSION['rm_id']=$rm_id;
	header('location:index.php');
	
	}
	else {
	echo "User Not Registered Successfully";
	}
	
	}
	}
	}
	
?>