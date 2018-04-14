<?php
	include './db.php';
	$link =null;
	function OpenConnection()
	{
		global $link;
		$link = mysql_connect(HOST,USERNAME,PASSWORD);
		mysql_select_db(DATABASE);

	}
	function CloseConnection()
	{
		global $link;
		mysql_close($link);
	}
	function ExecuteNonQuery($qry) //Insert Update Delete
	{
		OpenConnection();
		mysql_query($qry);
		$x = mysql_affected_rows();
		CloseConnection();
		return $x;
	}
	function ExecuteQuery($qry) //select
	{
		OpenConnection();
		$res=mysql_query($qry);
		//CloseConnection();
		return $res;
	}
?>