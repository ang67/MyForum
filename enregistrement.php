<?php
	//demarage de session
	session_start();
	require("inc/connexPDO.inc.php");

	echo '<meta charset="utf-8">';

	$model_nom="/(^[a-zA-Z]{2,50})$/";
	$model_prenom="/(^[ a-zA-Z]{2,50})$/";
	$model_email="/(^[a-z])([a-z0-9])+(\.|-)?([a-z0-9]+)@([a-z0-9]{2,})\.([a-z]{2,4}$)/";
	$model_pseudo="/(^[a-zA-Z0-9]{3,15})$/";

	if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['pseudo']) && isset($_POST['pass']) && isset($_POST['confPass'])) {
		//echo $_POST['nom']." ".$_POST['prenom']." ".$_POST['email']." ".$_POST['pseudo']." ".$_POST['pass'];
		
		if (!preg_match($model_nom, $_POST['nom']) ) {
			echo '<script type= text/javascript> alert("le nom est compris entre 2 et 50 caractères de l\'alphabet!");history.back(); </script>'; exit();
		}
		if (!preg_match($model_prenom, $_POST['prenom']) ) {
			echo '<script type= text/javascript> alert("le prenom est compris entre 2 et 50 caractères de l\'alphabet!");history.back(); </script>'; exit();
		}
		if (!preg_match($model_email, $_POST['email']) ) {
			echo '<script type= text/javascript> alert("email invalide. Voici un exemple: (exemple123.toto@gmail.com");history.back(); </script>'; exit();
		}
		if (!preg_match($model_pseudo, $_POST['pseudo']) ) {
			echo '<script type= text/javascript> alert("le pseudo est compris entre 2 et 50 caractères de l\'alphabet!");history.back(); </script>'; exit();
		}
		
		if ($_POST['confPass']!=$_POST['pass']) {
			echo '<script type= text/javascript> alert("Erreur de mot de passe!");history.back(); </script>'; exit();
		}
		$nom=$_POST['nom'];
		$prenom=$_POST['prenom'];
		$email=$_POST['email'];
		$pseudo=$_POST['pseudo'];
		$pass=$_POST['pass'];

		//creation de variable de session. On retient ici le pseudo et le mot de passe de l'utilisateur
		$_SESSION['pseudo']=$pseudo;
		$_SESSION['pass']=$pass;
		//connection à la base de donnée
		try{
			$id_con=connexPDO("myforum");
			// set the PDO error mode to exception
			$id_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$req = 'INSERT INTO users (id_user, passwd, name, firstname, email) VALUES ("'.$_POST['pseudo'].'", "'.$_POST['pass'].'", "'.$_POST['nom'].'", "'.$_POST['prenom'].'", "'.$_POST['email'].'")';
			//execution
			$id_con->exec($req);
			// commit the transaction
			
			//redirection vers la liste des thèmes
			header("Location: themes.php?pseudo=".$pseudo."&pass=");
		}
		catch(Exception $e){
			if ($e->getCode()==23000) {
				echo '<script type= text/javascript> alert("le pseudo est déja utilisé. Veillez changer!");history.back(); </script>';exit();
			}
			else{
				echo '<script type= text/javascript> alert("oups! :-( l\'enregistrement a echoué!");history.back(); </script>';exit();
			}
			
		}
			
			$id_con=null;
							
	}
	else{
		echo '<script type= text/javascript> alert("veillez bein renseigner le formulaire!"); history.back(); </script>';exit();
	}
?>