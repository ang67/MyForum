<!-- ****************envoie du nouveau message vers la base de donnée *******************************************-->
		
		
		<?php 
			session_start();

		if (!isset($_SESSION['pseudo']) | $_SESSION['pseudo']=="Visiteur") {
			echo '<script type= text/javascript> alert("Veillez vous connecter d\'abord! Cliquez sur \"Quitter\" ");history.back(); </script>';
			exit();
		}
			if (isset($_POST['titre']) && isset($_POST['message'])) {
				try{
					require("inc/connexPDO.inc.php");
					$id_con=connexPDO("myforum");
					// set the PDO error mode to exception
					$id_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

					$titre=$id_con->quote($_POST['titre']);
					$text=$id_con->quote($_POST['message']);
					$jour=date("Y-m-d");
					$time=date("H:i:s");
					$id_user=$_SESSION['pseudo'];
					$id_sujet=$_SESSION['id_sujet'];
					
					//echo $titre, $text, $jour, $time, $id_user, $id_sujet;
					//requete pour sauver le sujet
					$id_con->exec('INSERT INTO messages (title, text, date, time, id_user, id_subject) VALUES('.$titre.','.$text.', "'.$jour.'", "'.$time.'", "'.$id_user.'", "'.$id_sujet.'")');

					
					echo "ok";
					$id_con=null;
					
					echo '<script type= text/javascript> alert("message envoyé!");history.go(-1); </script>';
					
				}
				
				catch(Exception $e){
					$e->getMessage();
				}
			}
			
		?>
