<!-- Bootstrap CDN -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<nav class="navbar navbar-static-top no-margin-bottom navbar-fixed-top affix-top" style="background-color: #359dff;">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php" style="color: black; font-size: 20px;"><b>Location Based Alarm</b></a>
    </div>
<?php    if(isset($_SESSION['sid'])){
    
    	echo "<ul class='nav navbar-nav navbar-right' style='font-size: 20px;'>
      		<li><a href='logout.php' style='color: black;'><span class='glyphicon glyphicon-chevron-left'></span>Logout</a></li>
    	</ul>
    	<ul class='nav navbar-nav navbar-right' style='font-size: 20px; color: black;'>
       		<li><a href='dashboard.php' style='color: black;'>Dashboard</a></li>
      		<li class='active'><a href='location.php?lat=20.35331&lng=85.8195' style='color: black;'>Location</a></li>
      		<li><a href='date.php' style='color: black;'>Date</a></li>
      		<li><a href='time.php' style='color: black;'>Time</a></li>
    	</ul>
    	</div></nav>";
    }
    else{

    	echo "<ul class='nav navbar-nav navbar-right' style='font-size: 20px;'>
    		<!--<li><a href='developers.php' style='color: black;'><span class='glyphicon glyphicon-user'></span> About Us</a></li>-->
      		<li><a href='signup.php' style='color: black;'><span class='glyphicon glyphicon-user'></span> Sign Up</a></li>
      		<li><a href='login.php' style='color: black;'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>
    	</ul>
  		</div>
		</nav>";
	}
?>