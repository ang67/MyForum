<?php
//­­­­­­­­­­­­­­­­­
// mail.php
//­­­­­­­­­­­­­­­­­

	// Controles

	if (!isset($_GET['pseudo'])) {
		header("Location: login.php?ERROR=Vous%20devez%20saisir%20votre%20code%20user.");
		exit();
	}
	$pseudo=$_GET['pseudo'];
	$requete="";
	try{
		require("inc/connexPDO.inc.php");
		$id_con=connexPDO("myforum");
		// set the PDO error mode to exception
		$id_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		//on recherce son pseudo
		$req =$id_con->query('SELECT passwd, email FROM users WHERE id_user="'.$pseudo.'" ') ;
		$result=$req->fetch();
		//s'il n'existe pas
		if ($result==null) {
			echo '<script type= text/javascript> alert("Cet utilisateur est inconnu, veuillez vous inscrire ");history.go(-1); </script>';
			exit();
		}
		$text="Bonjour vous avez demandé que l'on vous envoi votre mot de passe myForum.\n\nVotre mot de passe :".$result['passwd']."\n\nCordialement.";
		/*if (mail($result['email'], "mot de passe myforum", $text, "From: webmaster@$SERVER_NAME\n Reply­To:webmaster@$SERVER_NAME\nX­Mailer:PHP/".phpversion())) {
			header("Location: login.php?ERROR=Votre%20mot%20de%20passe%20vous%20à%20été%20envoyé%20par%20email.");
		}
		else {
			//header("Location: login.php?ERROR=Il%20y%20a%20eu%20un%20problème%20lors%20de%20l'envoi%20de%20mail.");
		}echo "string";*/
		echo '<script type= text/javascript> alert("Votre mot de pass vous a été envoyé ");history.go(-1); </script>';
		exit();
	}
	catch(Exception $e){
		$e->getMessage();
			
	}
?>