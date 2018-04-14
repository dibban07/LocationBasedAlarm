<?php  
if(isset($_POST['sbt1']))
{
    header("location:location.php");
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
<link href="MyCss.css" type="text/css" rel="stylesheet" />
</head>
<body>
<center >
<h1 style="color: red;">MULTIPURPOSE LOCATION BASED ALARM</h1>
</center>
<h3 style="float: center;color: red; text-align: center;">CLICK ON THE TYPE OF THE ALARM:</h3>
<form method="post" style="float: center;">
<br /><br /><br /><br />
<center>
<input type="submit" name="sbt1"  value="LOCATION BASED ALARM!!" style="float: center; text-align: center;"/></br></br></br></br></br></br></br>
<input type="submit" name="sbt2"  value="DATE BASED ALARM!!" style="float: center; text-align: center;"/></br></br></br></br></br></br></br>
<input type="submit" name="sbt3"  value="TIME BASED ALARM!!" style="float: center; text-align: center;"/></br></br></br></br></br></br></br>
</center>
</form>

</body>
</html>