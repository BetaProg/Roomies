<?php
	include 'dbconfig.php';
?>

<?php
	$all_users_sql = "select * from rm_reg";
	$result_all_users = mysql_query($all_users_sql);
	$count_all_users = mysql_num_rows($result_all_users);
	
	$persons_split_sql = "select * from rm_purchase where purchase_no=18";
	$result_persons_split = mysql_query($persons_split_sql);
	while($row_people = mysql_fetch_array($result_persons_split)){
		$purchase_amount = $row_people['purchase_amount'];
		$persons_involved = $row_people['purchase_people'];
		//echo $persons_involved;
		$each_person = explode(',',$persons_involved);
		//echo "<br>";
		$people = array();
		foreach ($each_person as $each) {
		//	echo $each.'<br>';
			
			array_push($people, $each);
			
		}
		//echo "This is array named people: ", print_r($people);
	}
	
	//echo "<br>";
	//echo $count_all_users;
	//echo "<br>";
	$count_srinivas = 0;
	$count_hemanth = 0;
	$count_vikram = 0;
	$involvement_array = array();
	while($row = mysql_fetch_array($result_all_users)){
				
			$rm_name_all = $row['rm_name'];
		//	echo $rm_name_all;
		//	echo "<br>";
		//	echo "<br>";
			
			if(in_array($rm_name_all, $people)) {
	//			echo "Person is there";
	//			echo "<br>";
				array_push($involvement_array, $purchase_amount/4);
			}
			else {
	//			echo "Person is not there";
	//		echo "<br>";
			array_push($involvement_array, 0);
			}
			
			
	//echo "The involvement status is : ";
	foreach ($involvement_array as $involved) {
	//	echo $involved.'<br>';
	}
	}
//echo count($involvement_array);
	
?>

<script>
	var count_allusers = '<?php print($count_all_users); ?>';
	//console.log(count_allusers);
	var i = 0;
	var more_array = [];
	var arr = window;
	for(i=0;i<5;i++) {
		arr["arr_"+i] = [40];
		/*console.log(arr["arr_"+i]);
		console.log("arr_"+i); */
		
	}
	//document.write('<br><br>');
	var finalarray = '<?php foreach ($involvement_array as $involved)
	{
		echo $involved.',';

	} 
	//more_array.push($involved);	
	?>';
	//console.log(more_array);
	//document.write(finalarray);
	//console.log(finalarray.length);
	
	//arr_0.push(30);
	/*arr_0.push(10);
	arr_0.push(11);
	arr_1.push(12);
	arr_1.push(13);
	arr_2.push(14);
	arr_2.push(15); */
	
	/*console.log(arr_0);
	console.log(arr_1);
	console.log(arr_2);
	document.write(arr_0); */
</script>
<?php 
		$finalarray = '<p><script>document.write(finalarray);</script></p>';
		echo $finalarray;
		//$f = $finalarray[1];
		//echo $finalarray[1];
	?>
	<script>
		console.log(finalarray);
	</script>