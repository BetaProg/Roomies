<?php
session_start();
include 'dbconfig.php';
?>
<?php
 $rm_id = $_SESSION['rm_id'];
?>

<?php 
	
	$src1= $_POST['dim_value'];  
	
	echo $src1; 
	echo $rm_id;

	$dim_sql = "update rm_reg set dim_mode='$src1' where rm_id='$rm_id'";
	$result_dim_sql = mysql_query($dim_sql);
	
?>