<!-- ****************envoie du nouveau sujet vers la base de donnée *******************************************-->
		<?php 
			if (isset($_POST['titre'])) {
				try{
					require_once("inc/connexPDO.inc.php");
					$id_con=connexPDO("myforum");
					// set the PDO error mode to exception
					$id_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

					
					$titre=$id_con->quote($_POST['titre']);
					$jour=date("d-m-Y");
					$time=date("H:i:s");
					$id_user=$_SESSION['pseudo'];
					$id_theme=$_SESSION['id_theme'];
					
					//requete pour sauver le sujet
					$req =$id_con->exec('INSERT INTO subjects (title, date, time, id_user, id_theme) VALUES('.$titre.', "'.$jour.'", "'.$time.'", "'.$id_user.'", "'.$id_theme.'")');
					echo "<script>javascript:history.go(-1);</script>";
					

				}
				
				catch(Exception $e){
					$e->getMessage();
				}
			}
			
		?>