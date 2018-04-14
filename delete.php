
<!-- location -->
<?php
	session_start();
	include_once './blogic.php';
	if(isset($_REQUEST['locname'])){
		$qry="delete from info where locname='$_REQUEST[locname]'";
		ExecuteNonQuery($qry);
		header("location:location.php?lat=20.35331&lng=85.8195");
	}	
?>

<!-- date -->
<?php
	//session_start();
	include_once './blogic.php';
	if(isset($_REQUEST['date'])){
		$qry="delete from info where date='$_REQUEST[date]'";
		ExecuteNonQuery($qry);
		header("location:date.php");
	}	
?>


<!-- time -->
<?php
	//session_start();
	include_once './blogic.php';
	if(isset($_REQUEST['time'])){
		$qry="delete from info where time='$_REQUEST[time]'";
		ExecuteNonQuery($qry);
		header("location:time.php");
	}	
?>

