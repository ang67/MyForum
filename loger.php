<?php

	session_start();
	

require("inc/connexPDO.inc.php");

	if (isset($_POST['pseudo']) && isset($_POST['pass'])) {
		
		$pseudo=$_POST['pseudo'];
		$pass=$_POST['pass'];

		
		//connection à la base de donnée
		try{
			$id_con=connexPDO("myforum");
			// set the PDO error mode to exception
			$id_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$result =$id_con->query('SELECT * FROM users WHERE id_user="'.$pseudo.'" AND passwd="'.$pass.'" ') ;
			//s'il existe
			if ($result->fetch()) {
				//creation de variable de session. On retient ici le pseudo et le mot de passe de l'utilisateur
				$_SESSION['pseudo']=$pseudo;
				$_SESSION['pass']=$pass;
				
				//redirection vers la liste des thèmes
				header("Location: themes.php?pseudo=".$pseudo."&pass=");
			}
			else{
				echo '<script type= text/javascript> alert("mot de passe ou pseudo incorrect!"); history.back(); </script>';exit();
			}
			
		}
		catch(Exception $e){
			$e->getMessage();
			
		}
	}

?>