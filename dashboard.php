<?php  
session_start();
include_once './blogic.php';
include_once './header.php';
	if(!isset($_SESSION['sid']))
  		header("location:index.php");
 $msg2="";
if(isset($_POST['sbt1']))
{
    header("location:location.php?lat=20.3533&lng=85.8195");
}
else if(isset($_POST['sbt2']))
{
    header("location:date.php");
}
else if(isset($_POST['sbt3']))
{
    header("location:time.php");
}
?>



<html>
<head>
<title>LOCATION BASED ALARM</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body style="background-image: url(images/location.jpg); background-repeat: none;" class="thing">
<br><br><br><br><br>
<div class="container">
	<div class="container-fluid" style="background-color: #848996; border-radius: 15px;">
		<center >
		<h1 style="color: red;">Welcome <?php
			$qry1="select * from users where uid='$_SESSION[sid]'";
			$res = ExecuteQuery($qry1);
			if(mysql_affected_rows()>0){
				while($r = mysql_fetch_array($res)){
					$msg2=$r[0];
					echo $msg2;
				}
			}
		?></h1>
		<br><br>
		</center>
		<h3 style="float: center;color: white; text-align: center;">CLICK ON THE TYPE OF THE ALARM:</h3>
		<form method="post" style="float: center;">
			<br /><br /><br /><br />
			<center>
				<input type="submit" class="btn btn-primary btn-lg" name="sbt1"  value="LOCATION BASED ALARM" style="float: center; text-align: center;"/></br></br></br></br></br></br></br>
				<input type="submit" class="btn btn-success btn-lg" name="sbt2"  value="DATE BASED ALARM" style="float: center; text-align: center;"/></br></br></br></br></br></br></br>
				<input type="submit" class="btn btn-warning btn-lg" name="sbt3"  value="TIME BASED ALARM!!" style="float: center; text-align: center;"/></br></br></br></br></br></br></br>
			</center>
		</form>
	</div>
</div>

<div class="container">
	<div class="container-fluid">
			<br>
	</div>
	
</div>


<div class="container" style="background-color: #848996; border-radius: 15px;"> 
	<div class="container-fluid" style="background-color: #848996;">
	<div class="row">
		<div class="col-md-4">
			<div>
            <h2><b>Location based alarms</b></h2>
            <table class="table">
  <thead class="thead-inverse">
    <tr>
      <th>Name of Location</th>
      <th>Reminder Note</th>
    </tr>
  </thead>
  <tbody>
<?php 
	$qry = "select * from info where iid='$_SESSION[sid]' and date is null";
	$res = ExecuteQuery($qry);
		//echo $qry;
        if(mysql_affected_rows()>0){
            while($r = mysql_fetch_array($res)){

            	echo "<tr><td>{$r[1]}</td><td>{$r[2]}</td></tr>\n";
            }
        }
?>
</tbody>
</table>	
</div>
		</div>
		<div class="col-md-4">
			<div>
			<h2><b>Date based alarms</b></h2>
			<table class="table">
				<thead class="thead-inverse">
		   			<tr>
	     				<th>Reminder Note</th>
						<th>Date</th>
		    			</tr>
		  			</thead>
		  		<tbody>



<?php 
	$qry = "select * from info where iid='$_SESSION[sid]' and datecheck='1'";
	$res = ExecuteQuery($qry);
		//echo $qry;
        if(mysql_affected_rows()>0){
            while($r = mysql_fetch_array($res)){

            	echo "<tr><td>{$r[2]}</td><td>{$r[5]}</td></tr>\n";
            }
        }
?>
</tbody>
</table>
</div>
		</div>
		<div class="col-md-4">
			<div>
		<h2><b>Time based alarms</b></h2>
			<table class="table">
			<thead class="thead-inverse">
    			<tr>
	  				<th>Reminder Note</th>
					<th>Time</th>
				</tr>
			</thead>
		  <tbody>

<?php 
	$qry = "select * from info where iid='$_SESSION[sid]' and timecheck='1'";
	$res = ExecuteQuery($qry);
		//echo $qry;
        if(mysql_affected_rows()>0){
            while($r = mysql_fetch_array($res)){
           
            	echo "<tr><td>{$r[2]}</td><td>{$r[6]}</td></tr>\n";
            }
        }
?>
</tbody>
</table>
</div>
		</div>
	</div>
	</div>
</div>

<br><br><br>
</body>
<?php 	include_once './footer.php'; ?>
</html>


