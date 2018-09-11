<html>
	<head>
		<title>Hi. Join Your room mates</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="styles/register.css" />
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Lato">
		<link rel="stylesheet" href="https://maxcdn.icons8.com/fonts/line-awesome/css/line-awesome-font-awesome.min.css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css" />
		<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css" />
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
	</head>
	
	<style>
	/* Smartphones (portrait and landscape) ----------- */
	@media only screen and (min-device-width : 320px) and (max-device-width : 480px) {
		.nav-wrapper{
			background-color:black;
			color:white;
			font-family:lato;
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
	<body>
		<div id="top_content">
			  <div class="navbar-fixed">
				<nav>
					<div class="nav-wrapper">
						<a href="#!" class="brand-logo">Join your room mates</a>
						<ul class="right hide-on-med-and-down">
							<li><a href="#">Sass</a></li>
							<li><a href="#">Components</a></li>
						</ul>
					</div>
				</nav>
			</div>
		</div>
		
		<div id="center_top" class="z-depth-3">
			<div id="register_heading">
				<h5>Register here</h5>
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
		 <form action="reg_db.php" method="post" >
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
	<input type="number" name="rm_mobile" required="true" id="rm_mobile" maxlength="10" placeholder="Mobile Number" pattern="[0-9]{10}" />
  </div>
  <a href="login.php">Already Registered?</a>
  <button class="btn waves-effect waves-light" id="submit_btn" type="submit" name="join">Join
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
			It takes 10-15 mins to get your password as the password SMS system is yet to come
			</p>
		</div>
		
		
	</body>
</html>

















