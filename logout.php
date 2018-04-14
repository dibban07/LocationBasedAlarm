<?php
	session_start();
	session_destroy();
	header("location:index.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Summer Training Program</title>
	<meta charset="utf-8">
	<meta name="viewport">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="container-fluid">
	<?php
		include_once './header.php';
	?>
</div>
<div class="container-fluid"></div>
<div class="container-fluid no-margin no-padding">
	<?php
		include_once './footer.php';
	?>
</div>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/query.js"></script>
</body>
</html>