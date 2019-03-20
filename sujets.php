<!-- sujets.php -->
<?php
	session_start();

	if (!isset($_SESSION['pseudo']) && !isset($_SESSION['pass'])) {
		$_SESSION['pseudo']="Visiteur";//simple visteur
	}
	if (!isset($_GET['theme']) ) {
		echo '<script type= text/javascript> alert("veillez selectioner un theme"); history.back(); </script>';exit();
	}
	else{//pour la sécurité! il ne faudrait pas que l'utilsateur le change dans l'URL donc on le sauvegarde en session
		$_SESSION['id_theme']= $_GET['theme'];
	}
	

?>
<!DOCTYPE html>
<html>
<head>
	<title>MyForum</title>
	<meta charset="utf-8">
	
	<link rel="stylesheet" type="text/css" href="default.css">
	<link rel="stylesheet" type="text/css" href="sujets.css">


</head>
<body>
	<!­­ Entete de site ­­>
	<div class="header">
		<img class="icon" src="imgs/linux.png" title="icon MyForum">
		<?php 
			
			$photo=nom_photo($_SESSION['pseudo']);
			
			//il s'est loger et qu'il est une photo ou pas
			if ($photo && $_SESSION['pseudo']!="Visiteur") {
				echo '<a href="chargerphoto.php"><img  class="photoprofil" src="imgs/'.$photo.'" title="profil de '.$_SESSION['pseudo'].'"></a>';

			}
			//s'il s'est loger et qu'il n'a pas de photo on lui donne l'image des visiteur et la possibilité de la changer
			elseif(!$photo){
				echo '<a href="chargerphoto.php"><img  class="photoprofil" src="imgs/Visiteur.png" title="profil de '.$_SESSION['pseudo'].'"></a>';
			}
			//s'il s'agit d'un visiteur
			else{
				echo '<img  class="photoprofil" src="imgs/Visiteur.png" title="photo de profil">';
			}

		?>
		
		<!-- definition de la fonction nom_photo  -->
		<?php
	
			function nom_photo($pseudo){
				
				if($dossier = opendir("imgs/")){

					while(false !== ($fichier = readdir($dossier))){
						$nom_fichier= explode(".", $fichier);//pour separer l'extention

						if($nom_fichier[0]==$pseudo){
							return $fichier;//et on s'arrete là
						}
					}
					return 0;
					closedir($dossier);

				}
				else{
					return 0;
				}
			}
	
		?>

		<br/>
		<h1 class="site">MyForum<span class="point">.</span></h1>
		<hr>
	</div>
	<!­­ La barre de menu ­­>
	<div class="menu">

		<ul>
			<?php echo '<span class="pseudo">'.$_SESSION['pseudo'].' >></span> </a></li>';	?>
			<li class="li"><a href="login.php">Quitter</a></li> >
			<li class="li"><a href="themes.php">Thèmes</a>	</li> >
			<li class="li"><a href="#"><span class="focus">Sujets</span></a></li>
		</ul>
	</div>
	<!­­ La partie principale ­­>
	<div class="main1">
		<h1 class="legend" align="center">Les sujets du thème: <?php echo $_GET['name']; ?></h1>
		<br/>

		<form method="post" action=""  >
			<input type="submit" name="nouveauSujet" id="nouveauSujet" value="Nouveau sujet">
		</form>
		<?php
			if (isset($_POST['nouveauSujet']) && $_POST['nouveauSujet']=="Nouveau sujet") {
				//si c'un visiteur on l'arrete immediatemnent
				if (!isset($_SESSION['pseudo']) || $_SESSION['pseudo']=="Visiteur") {
					echo '<script type= text/javascript> alert("Veillez vous connecter d\'abord! Cliquez sur \"Quitter\" ");history.go(-1) </script>';exit();
				}
					echo '<form method="post" action="">
				<label for="titre"><h3>Titre</h3> </label>
				<input type="text" name="titre" id="titre" placeholder="titre de votre sujet" required="" size="50px">
				<br/>
				<label for="message"><h4>Message</h4> </label>
				<textarea id="message" name="text" placeholder="reponse..." cols="90" rows="15" value="reponse"></textarea>
				<br/>
				
				<br> <br/>

				<input type="submit" name="envoie" id="envoie" value="Envoie">
				<input type="reset" id="effacer" value="Effacer">
			</form>
		</div>';
			}
		?>
		<!-- ****************envoie du nouveau sujet vers la base de donnée *******************************************-->
		<?php 
			if (isset($_POST['titre']) && isset( $_POST['titre'])) {
				try{
					require_once("inc/connexPDO.inc.php");
					$id_con=connexPDO("myforum");
					// set the PDO error mode to exception
					$id_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

					$titre=$_POST['titre'];
					$jour=date("Y-m-d");
					$time=date("H:i:s");
					$id_user=$_SESSION['pseudo'];
					$id_theme=$_SESSION['id_theme'];
					$text=$_POST['text'];
					
					//requete pour sauver le sujet
					$id_con->exec('INSERT INTO subjects (title, date, time, id_user, id_theme) VALUES("'.$titre.'", "'.$jour.'", "'.$time.'", "'.$id_user.'", "'.$id_theme.'")');
					
					$req =$id_con->query('SELECT id_subject FROM subjects WHERE title="'.$titre.'" ');
					$var=$req->fetch();


					$id_con->exec('INSERT INTO messages (title, text, date, time, id_user, id_subject) VALUES("'.$titre.'","'.$text.'", "'.$jour.'", "'.$time.'", "'.$id_user.'", "'.$var['id_subject'].'")');
				}
				
				catch(Exception $e){
					$e->getMessage();
				}
			}
			
		?>

		<?php

		?>
		<!-- *****************************Affichage des sujets********************************************************* -->
		<br/><br/>
		<?php 
			require_once("inc/connexPDO.inc.php");
			
			try{
				$id_con=connexPDO("myforum");
				// set the PDO error mode to exception
				$id_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				//requete principale
				$req =$id_con->query('SELECT id_subject, id_theme, title, id_user, date, time FROM subjects WHERE id_theme="'.$_GET['theme'].'" ');
				
				while ($resultat=$req->fetch()) {
				
					//requete sur le pseudo de l'auteur du sujet
					$req1 =$id_con->query('SELECT id_user FROM users WHERE users.id_user="'.$resultat['id_user'].'" ');
					$resultat1=$req1->fetch();

					//requete sur le nombre de message
					$req2=$id_con->query('SELECT count(id_message) AS nb_message FROM messages WHERE id_subject="'.$resultat['id_subject'].'" ');
					$resultat2=$req2->fetch();
					if ($resultat2==null) {
						$resultat2=0;//pas de message
					}
					
					//requete sur la date du dernier message
					
					$req3 =$id_con->query('SELECT messages.date AS last_date, messages.time AS last_time FROM (subjects INNER JOIN messages ON subjects.id_subject = messages.id_subject) WHERE messages.id_subject = "'.$resultat['id_subject'].'" ORDER BY messages.date desc, messages.time desc');
					$resultat3=$req3->fetch();


					echo '<a class="sujets" href="messages.php?id_subject='.$resultat['id_subject'].'&amp;subject='.$resultat['title'].'&amp;theme='.$_GET['name'].'&amp;id_theme='.$resultat['id_theme'].'"> <div class="lo">
				
					<div class="div1">
						<p>
							<b class="sujet" >Sujet: <span style="color: #e96f1b;">'.$resultat['title'].'</span></b>
						</p>
						
						<p>
							Par : <b>'.$resultat1['id_user'].'</b>
							<br/>
							Le '.$resultat['date'].'&emsp;'.$resultat['time'].'
						</p>
						
					</div>

					<div class="div2">
						<p>
							<b class="nbSms">'.$resultat2['nb_message'].'</b> message(s)
						</p>
						
						<p>
							Dernier message:
							<br/>
							'.$resultat3['last_date'].' à '.$resultat3['last_time'].'
						</p>
					</div> 
					</div><a/>';
					echo '<br/><hr class="cl"><br/>';
				}
				
				$req=0;
				$id_con=null;
				//header("location: sujets.php");
				
				//requete sur la date du dernier message concernant ce sujet
			}
			catch(Exception $e){
				$e->getMessage();
			}
		?>
		
			
	</div>
	<br/><br/>
	<!­­ Le pied de page ­­>
	<div class="footer">
		<br/>
		Copyright &copy; 2017-2018 Bini ANGUI<br />
		Ce logiciel est sous licence Sdn Genral Public License
	</div>

</body>
</html>