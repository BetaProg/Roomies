<?php
session_start();

	include 'dbconfig.php'; 
?>
<?php
 $user_id = $_SESSION['userid'];
 
 if(isset($_POST['login'])) {
	 $login_rm_sql = "select * from rm_reg where rm_name='".$rm_name."' and rm_pass='".$rm_pass."'";
	 $result = mysql_query($login_rm_sql);
	 $count = mysql_num_rows($result);
	 
	while($row = mysql_fetch_array($result)){
	$rm_id = $row['rm_id'];
	$rm_name = $_REQUEST["rm_name"];
if($count>0)
{
$_SESSION['login']='1';
$_SESSION['rm_id']=$rm_id;
header('location:index.php');
//echo "Valid password";
}
}
if($count==0) {
	$errorstatement =  "Invalid username or password";

 }
 }
?>
<?php 
	include 'navbar.php';
	echo "<script>console.log($count);</script>";
?>
<style>
	/* Smartphones (portrait and landscape) ----------- */
	@media only screen and (min-device-width : 320px) and (max-device-width : 480px) {
		.nav-wrapper{
			background-color:black;
			color:white;
		}
		.brand-logo {
			font-family:lato;
		}
		#register_heading {
			background-color:#f8fafb;
			font-family:lato;
			font-size:20px;
			text-align:center;
			height:10%;
			margin-top:5%;
		}
		#register_heading h5{
			padding-top:5%;
			margin-top:5%;
			
		}
		#register_form {
			width:80%;
			height:auto;
			display:block;
			margin-top:10%;
			text-align:center;
			padding-left:5%;
			padding-right:5%;
			margin-right:auto;
			margin-left:auto;
			border:2px solid lightgrey;
			border-radius:6px;
			
		}
		#user_name {
			margin-bottom:0px;
		}
		
		#submit_btn {
			margin:5%;
			background-color:black;
		}
		#join_text {
			text-align:center;
			margin: 15%;
		}
	}
	</style>
<div id="center_top" class="z-depth-3">
			<div id="register_heading">
				<h5>Login </h5>
			</div>
		</div>
		<div id="register_form">
				
		 <div class="input-field col s12 m6">
		 <script>
		 function hidelable() {
			var profile = document.getElementById('profile');
			if(profile.value !== 'dummy_profile'){
	  document.getElementById('select_label').style='display:none;'
			}
  }
  
		 </script>
		 <form action="login.php" method="post" >
    <select class="icons" name="rm_name" required onchange="hidelable();" id="profile">
      <option disabled selected value>Choose your profile</option>
      <option value="Guru" data-icon="images/guru.jpg" class="left circle">Guru</option>
      <option value="Hemanth" data-icon="images/hemanth.jpg" class="left circle">Hemanth</option>
      <option value="Srinivas" data-icon="images/sg3.jpg" class="left circle">Srinivas</option>
	  <option value="Venkat" data-icon="images/venkat.jpg" class="left circle">Venkat</option>
	  <option value="Vikram" data-icon="images/psy.jpg" class="left circle">Vikram</option>
    </select>
    <label id="select_label">Please choose your profile</label>
  </div>
  <div class="input-field col s12 m6">
	<input type="password" name="rm_pass" required="true" id="rm_pass" placeholder="Password"  />
	<br>
	<a href="">Password Help </a>
  </div>
  
  <button class="btn waves-effect waves-light" id="submit_btn" type="submit" name="login">Login
    <i class="material-icons right">send</i>
  </button>
  </form>
 
        
  <Script>
  
  
            $(document).ready(function() {
    $('select').material_select();
  });
            </Script>
				
				
		</div>
		
		<div id="join_text" >
			<p>
			Password Help feature will be added soon. Till then you can contact me(Srinivas) for any assistance.
			</p>
		</div>
		