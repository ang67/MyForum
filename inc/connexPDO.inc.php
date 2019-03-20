<?php
	function connexPDO($base)
	{
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = $base;
		$dns="mysql:host=$servername;dbname=$dbname";
		try
		{
			$conn = new PDO("mysql:host=$servername;dbname=$dbname", "root", "");
			




			$conn = new PDO($dns, $username, $password);
			return $conn;
		}
		catch(PDOException $except)
		{
			echo"Echec de la connexion",$except–>getMessage();
			return FALSE;
			exit();
		}
	}
?>