<?php
session_start();
if(!isset($_SESSION["login"]))
	header("location:login.php");
	include 'dbconfig.php';
?>
<?php
 $rm_id = $_SESSION['rm_id'];
?>
<html>
<link rel="stylesheet" href="styles/resp.css" />
<body onload="checkit()">

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<!--<head>
		<title>Hi. Join Your room mates</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!link rel="stylesheet" href="styles/register.css" />
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Lato">
		<link rel="stylesheet" href="https://maxcdn.icons8.com/fonts/line-awesome/css/line-awesome-font-awesome.min.css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css" />
		<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css" />
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
	</head> -->
	<?php
		include 'navbar.php';
		include 'purchase.php';
	?>
	<div id="errorit">
		<!--<p>Sorry Dude</p> -->
		<p>Currently we support mobile only<br>We're under development</p>
		<img src="images/rotate.png" width="100%"height="70%" />
	</div>
	<style>
		
		#center_content ul {
			margin:10% 0% 0% 0%;
		}
		
		.material-icons {
			color:black;
			font-size:30px;
		}
		.tabs .indicator{
			background-color:black;
		}
		#test1, #test2, #test3 {
			margin-top:5%;
		}
		#purchase_main {
			height:50%;
			width:90%;
			!background-color:lightgrey;
			background-color:#F4F4F4;
			display:block;
			margin-left:auto;
			margin-right:auto;
		}
		#purchasse_form {
			width:90%;
			display:block;
			margin:auto;
		}
		.caret {
			display:none;
		}
		#items option{
			width:80%;
		}
		#purchase_amount {
			border: 1px solid grey;
			width: 50%;
			display:block;
			font-size:25px;
			text-align:center;
		}
		.fa-inr {
			float:left;
			font-size:40px;
			margin-left:15%;
			margin-right:0px;
		}
		.input-field option {
			font-family:century Gothic;
		}
		#comments {
			font-family:century Gothic;
		}
		#comments label {
			font-family:lato;
		}
		#submit_btn {
			background-color:black;
			color:white;
			display:block;
			margin:auto;
		}
		#submit_btn i {
			color:white;
		}
	</style>
	<?php 
		$name_sql = "select rm_name from rm_reg where rm_id='$rm_id'";
		$result_name = mysql_query($name_sql);
	while($row_name = mysql_fetch_array($result_name)){
		$person_name = $row_name['rm_name'];
		}
	?>
	
	<div id="center_content">
	<center>
		<h5>Hi <b><?php echo $person_name; ?></b> !</h5>
	</center>
	
	<div class="row">
    <div class="col s12 z-depth-3">
      <ul class="tabs">
        <li class="tab col s3"><a class="active" href="#test1">
		<i class="material-icons" >account_balance_wallet</i>
		</a></li>
        <li class="tab col s3"><a href="#test2">
		<i class="material-icons">account_circle</i>
		</a></li>
        <li class="tab col s3"><a href="#test3">
		<i class="material-icons">date_range</i>
		</a></li>
      </ul>
    </div>
    <div id="test1" class="col s12">
	<center>
	<center><h5 style='padding-top:0px;color:#D44433';>Add Purchase</h5></center>
	<hr style="border-color:black;">
	<h6>Please don't include :</h6>
	<?php
		$dim_fetch_sql = "select * from rm_reg where dim_mode='true'";
		$result_dim_fetch = mysql_query($dim_fetch_sql);
		while($row_dim = mysql_fetch_array($result_dim_fetch)){
			$dim_names = $row_dim['rm_name'];
			echo "<a>$dim_names | </a>";
		}
	?>
	</center><br>
		<div id="purchase_main" class="z-depth-3">
			<div id="purchasse_form">
			  <Script>
				$(document).ready(function() {
				$('select').material_select();
				});
            </Script>
			<form action="purchase.php" method="post" validate>
					<select class="icons" name="purchase_cat_name" required="true"  id="items" style="font-family:century Gothic;text-align:center;">
						<option disabled selected value style="font-family:lato;text-align:center;">Select the Category</option>
						<option value="Food" data-icon="images/spaguetti.svg" class="left circle">Food</option>
    					<option value="Detergent" data-icon="images/washing-machine.svg" class="left circle">Detergent</option>
						<option value="Water" data-icon="images/water-bottle.svg" class="left circle">Water</option>
						<option value="Maid" data-icon="images/maid2.svg" class="left circle">Maid</option>
						<option value="Electricity" data-icon="images/idea.svg" class="left circle">Electricity</option>
						<option value="Internet" data-icon="images/wifi.svg" class="left circle">Internet</option>
						<option value="Room" data-icon="images/star.svg" class="left circle">Miscellaneous</option>
					</select>
					<div class="input-field col s12">
						<select id="all_participants" required="true" name="purchase_people" multiple>
							<option value="" disabled selected>Participants List</option>
							<option data-icon="images/guru.jpg" class="right circle" value="Guru">Guru</option>
							<option data-icon="images/hemanth.jpg" class="right circle" value="Hemanth">Hemanth</option>
							<option data-icon="images/sg3.jpg" class="right circle" value="Srinivas">Srinivas</option>
							<option data-icon="images/venkat.jpg" id="venkat2" class="right circle" value="Venkat">Venkat</option>
							<option data-icon="images/psy.jpg" class="right circle" value="Vikram">Vikram</option>
							
						</select>
						<label>Select Participants Involved</label>
	
	
						<script>
						$(document).ready(function () {
    $('select').material_select();
    $('select').change(function(){
        window.newValuesArr = [],
            select = $(this),
            ul = select.prev();
        ul.children('li').toArray().forEach(function (li, i) {
            if ($(li).hasClass('active')) {
                newValuesArr.push(select.children('option').toArray()[i].value);
            }
        });
        select.val(newValuesArr);

        //console.log($(this).val());
		console.log(newValuesArr.length);
		document.getElementById('people_array').value = newValuesArr;
		window.total_involved = newValuesArr.length;
		//console.log(total_involved);
		console.log(newValuesArr);
		localStorage.setItem('total_involved', total_involved);
    });
});
					</script>
					</div>
					<script>
						//var variable1 = 4;
						function getLocalit(){
						window.total_people = localStorage.getItem('total_involved');
console.log(total_people);
						}
						
						//var total_people = window.total_people;
						//window.total_people2 = true;
var app = angular.module('myapp', []);
						
app.controller('MainCtrl', ['$scope', '$window', function($scope, $window) {
	
	 $scope.function1 = function(msg) {
	         
	window.total_people2 = true;
	window.total_people2 = localStorage.getItem('total_involved');
	
  $scope.total_people2 = $window.total_people2;
  

	    };
	
	
}]);
						
					</script>
					
					<input type="hidden" id="people_array" name="people_array" />
					
					
					<div id="money_input" ng-app="myapp" ng-controller="MainCtrl">
					<i class="fa fa-inr"></i>
						<input type="number" ng-model="amount" min="0" required="true" data-ng-click="function1('AngularJS')" name="purchase_amount" id="purchase_amount"  />
						<label>Per Head amount is {{ (+amount) / total_people2 }}</label>
					</div>
					
					<!--<div id="comments" >
						<div class="row">
							<form class="col s12">
								<div class="row">
									<div class="input-field col s12">
										<textarea id="textarea1" name="purchase_comments" class="materialize-textarea"></textarea>
										<label for="textarea1">Any Comments?</label>
									</div>
								</div>
							</form>
						</div>
					</div>-->
					<div class="row">
					<div class="input-field col s12">
						<textarea name="purchase_comments" class="materialize-textarea"></textarea>
						<?php 
							//echo $rm_id;
						?>
						<label for="textarea1">Any Comments?</label>
					</div>
					</div>
					
					
					<button class="btn waves-effect waves-light" id="submit_btn" type="submit" name="save_purchase">Save
						<i class="material-icons right">save</i>
					</button>
					
					
			</form>
				<!--<form action="purchase.php" method="post">
					
					
					<button class="btn waves-effect waves-light" id="submit_btn" type="submit" name="save_purchase">Save2
						<i class="material-icons right">save</i>
					</button>
				</form>-->
			</div>
		</div>
	</div>
    <div id="test2" class="col s12">
		
		<?php
			include 'profile.php';
		?>
		<style>
		#profile_content {
		width:90%;
		height:50%;
		background-color:#fff;
		display:block;
		margin:auto;
		}
		#profile_content .row .s2 {
			margin-bottom:10px;	
			margin-top:10px;
		}
		#profile_content .row .s5 {
			margin-top:5px;
		}
		#profile_content .row .switch {
			margin-bottom:10px;	
			margin-top:10px;
		}
		</style>
		<center><h5 style='padding-top:0px;color:#D44433;'>My Account</h5></center>
		<hr style='border-color:black;'>
		<div id="profile_content">
		<?php 
			$dim_status_sql = "select dim_mode from rm_reg where rm_id=$rm_id";
			$result_dim_status = mysql_query($dim_status_sql);
			
			while($row = mysql_fetch_array($result_dim_status)){
			$dim_mode = $row['dim_mode'];
			}
		  ?>
		<script>
			function checkit() {
			var check_status = <?php echo $dim_mode; ?>;
			console.log(check_status);
				document.getElementById('dimcheck').checked = check_status;
			}
		</script>
			<form action="profile.php" method="post">
				<div class="row">
					<div class="col s5">
						<h6>DIM mode</h6>
					</div>
					<div class="col s2">
							<label>
							Off
							</label>
					</div>
					<script>var dim_status = <?php echo $dim_mode; ?></script>
					<div class="col s3">
						<div class="switch">
							<label><input id='dimcheck' onchange="getcheck();" type="checkbox"><span class="lever"></span></label>
						</div>
					</div>
					
					
					<script>
					function getcheck() {
						var checkbox = document.getElementById('dimcheck');
						console.log('checkbox value: ' + checkbox.checked);
  
/*  if(checkbox.checked == true){
	  console.log('Its ok');
  }
  else 
	  console.log('sorry bro');
} */
//$("#dimcheck").on( 'change', function () {
    $.ajax({
        type: 'post',
        url: 'dim.php',
        data: {
            dim_value: checkbox.checked,
            dim_user: 'Userit'
        },
        success: function( data ) {
            console.log( data );
        }
    });
//});



}

</script>
					
					<div class="col s2">
						<label>On</label>
					</div>
				</div>
				
			</form>
			<hr style="border-color:lightgrey;">
			<div id="my_purchase">
			<?php include 'person_total.php'; ?>
				 <table class="striped">
        <thead>
          <tr>
			<th data-field="sno">S.No</th>
			<th data-field="date">Date</th>
            <th data-field="name">Item</th>
            <th data-field="price">Price</th>
          </tr>
		  </thead>
		  
		  
		  
		  
		  
		  <?php 
			$my_purchase_sql = "select * from rm_purchase where rm_id=$rm_id";
			$result_my_purchase = mysql_query($my_purchase_sql);
			$count_my_purchase = mysql_num_rows($result_my_purchase);
			$i = 1;
			while($row = mysql_fetch_array($result_my_purchase)){
			$rm_id = $row['rm_id'];
			$purchase_cat_name = $row['purchase_cat_name'];
			$purchase_amount = $row['purchase_amount'];
			$purchase_date = $row['purchase_time'];
			if($count_my_purchase>0)
				
			{
				
			echo "<tbody class='z-depth-3'><tr id='table_row'>";
            echo "<td>";
			echo $i;
			echo "</td>";
			echo "<td>";
			echo $purchase_date;
			echo "</td>";
			echo "<td>";
			echo $purchase_cat_name;
			echo "</td>";
            echo "<td>";
			echo $purchase_amount;
			echo "</td></tr>";
          
          
			echo "</tbody>";
			
			}
			else 
				echo 'No data exists';
			$i++;
			
			}
			
			
			
		  ?>
        

      </table>
			</div>
		</div>

		
	</div>
    <div id="test3" class="col s12">
	
	<center><h5 style='padding-top:0px;color:#D44433;'>All Purchases</h5></center>
	<hr style="border-color:black;">
		<?php
			include 'profile.php';
		?>
		<style>
		#all_purchase_content {
		width:100%;
		height:50%;
		background-color:#fff;
		display:block;
		!margin:auto;
		}
		#all_purchase_content .row .s2 {
			margin-bottom:10px;	
			margin-top:10px;
		}
		#all_purchase_content .row .s5 {
			margin-top:5px;
		}
		#all_purchase_content .row .switch {
			margin-bottom:10px;	
			margin-top:10px;
		}
		</style>
		<div id="all_purchase_content">
			
			<div id="all_purchase">
				 <table class="striped">
        <thead>
          <tr style='font-size:13px;width:20%;height:auto;'>
			<!-- <th data-field="sno">S.No</th> -->
            <th data-field="item">Paid By</th>
			<th data-field="user">People Involved</th>
			<th data-field="user">Item</th>
            <th data-field="price">Price <i class='fa fa-inr' style='font-size:20px;'></i></th>
          </tr>
		  </thead>
		  <?php
$maid = <<<EOD
<img src='images/maid2' style='width:25px;'></i>
EOD;

$food = <<<EOD
<img src='images/spaguetti' style='width:25px;'></i>
EOD;


$detergent = <<<EOD
<img src='images/washing-machine' style='width:25px;'>
EOD;

$water = <<<EOD
<img src='images/water-bottle' style='width:25px;'>
EOD;

$electricity = <<<EOD
<img src='images/idea' style='width:25px;'>
EOD;

$internet = <<<EOD
<img src='images/wifi' style='width:25px;'>
EOD;

$star = <<<EOD
<img src='images/house' style='width:25px;'>
EOD;

$inr = <<<EOD
<i class='fa fa-inr' style='font-size:10px;'></i>
EOD;

?>
		  <?php 
		  
		   		
		  
			$all_purchase_sql = "select * from rm_purchase";
			$result_all_purchase = mysql_query($all_purchase_sql);
			$count_all_purchase = mysql_num_rows($result_all_purchase);
			$i = 1;
			
			
			while($row = mysql_fetch_array($result_all_purchase)){
				
			$rm_id_all = $row['rm_id'];
			$purchase_cat_name = $row['purchase_cat_name'];
			$purchase_amount = $row['purchase_amount'];
			$purchase_people = $row['purchase_people'];
			
			$all_names_sql = "select rm_name from rm_reg where rm_id='$rm_id_all'";
			$result_all_names = mysql_query($all_names_sql);
			while($row2 = mysql_fetch_array($result_all_names)) {
				$rm_all_name = $row2['rm_name'];
			}
			
			if($purchase_cat_name == 'Maid'){
				$purchase_cat_name = $maid;
			}
			else if($purchase_cat_name == 'Food'){
				$purchase_cat_name = $food;
			}
			else if($purchase_cat_name == 'Detergent'){
				$purchase_cat_name = $detergent;
			}
			else if($purchase_cat_name == 'Water'){
				$purchase_cat_name = $water;
			}
			else if($purchase_cat_name == 'Electricity'){
				$purchase_cat_name = $electricity;
			}
			else if($purchase_cat_name == 'Internet'){
				$purchase_cat_name = $internet;
			}
			else if($purchase_cat_name == 'Room'){
				$purchase_cat_name = $star;
			}
			
			
			if($count_my_purchase>0)
				
			{
				
			echo "<tbody class='z-depth-3'><tr id='table_row'>";
            /*echo "<td style='font-size:12px;'>";
			echo $i;
			echo "</td>"; */
			echo "<td style='font-size:13px;'>";
			echo substr($rm_all_name,0,3);
			echo "</td>";
			echo "<td style='font-size:10px;width:20%;height:auto;'>";
			echo $purchase_people;
			echo "</td>";
			echo "<td style='font-size:12px;'>";
			echo $purchase_cat_name;
			echo "</td>";
            echo "<td style='font-size:12px;'>";
			echo $purchase_amount;
			echo "</td></tr>";
          
          
			echo "</tbody>";
			
			}
			else 
				echo 'No data exists';
			$i++;
			
			}
			
			
			
		  ?>
        

      </table>
			</div>
		</div>
	
	</div>
  </div>
  </div>
  </body>      
</html>