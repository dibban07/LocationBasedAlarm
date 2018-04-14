<?php
session_start();
include_once './blogic.php';
if(!isset($_SESSION['sid']))
  		header("location:index.php");
include_once './header.php';
if(isset($_REQUEST['submit']))
{
		$time = $_REQUEST['timename'];
		$date = date("Y/m/d");
		$qry = "insert into info(iid,rem,date,time,timecheck) values('$_SESSION[sid]','$_REQUEST[remnote]','$date','$_REQUEST[timename]','1')";
		echo $qry;
		$x = ExecuteNonQuery($qry);        
       	if($x>0)
       	{
           	$msg = "<font color='green'>Reminder Added!</font>";
           	echo $msg;
       	}
       	else
       	{
           	$msg = "<font color='green'>There is a problem adding reminder!</font>".mysql_error();
         	echo $msg;
        }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Time</title>
</head>
<body style="background-image: url(images/location.jpg); background-repeat: none;">
<br><br><br><br><br>
		<div class="row text-center">
        <div style="background-color: #ffb71e;">
          <center><h2> Add new Time based alarm</h2></center>
        </div>
    </div>
    <br><br><br><br>
<div class="container" style="background-color: #b3c1d6; border-radius: 10px;">
	<div class="container-fluid">

		<div class="row">
			<div class="col-md-4">
				<form>
					<br><br>
					<div class="form-group">Enter Time:<input class="form-control" type="time" name="timename"></div>
					<div class="form-group">Reminder Note: <input class="form-control" type="text" name="remnote" placeholder="Call Brother"></div><br>
					<div class="form-group"><input class="btn btn-warning btn-lg pull-right" type="submit" name="submit" value="Add Reminder"></div>
					<br><?php if(isset($_REQUEST['submit'])){echo $msg;} ?><br>
				</form>
			</div>
			<div class="col-md-8">
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

					            	
					            	echo "<tr><td>{$r[2]}</td><td>{$r[6]}</td><td><a href='delete.php?time=$r[6]'>Delete</a></td></tr>\n";
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
<br><br><br><br><br>	
</body>
<?php include_once './footer.php';?>
</html>