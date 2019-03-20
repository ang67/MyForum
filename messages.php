<!-- message.php -->
<?php
	session_start();

	if (!isset($_SESSION['pseudo']) && !isset($_SESSION['pass'])) {
		$_SESSION['pseudo']="Visiteur";//simple visteur
	}
	if (!isset($_GET['id_subject'])) {
		echo '<script type= text/javascript> alert("veillez selectioner un sujet"); history.back(); </script>';exit();
	}
	else{
		//pour la sécurité! il ne faudrait pas que l'utilsateur le change dans l'URL donc on le sauvegarde en session
		$_SESSION['id_sujet']=$_GET['id_subject'];
	}
	
?>

<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>MyForum</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="default.css">
	<link rel="stylesheet" type="text/css" href="messages.css">
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
			<li class="li"><a href="themes.php">Thèmes</a></li> >
			<li class="li"><a href="javascript:history.go(-1)">Sujets</a></li> >
			<li class="li"><a href="#"><span class="focus">Messages</span></a></li>
		</ul>
	</div>
	<!­­ La partie principale ­­>
	<div class="main">
		<h3>Thème: <u style="color: #e96f1b;"> <?php echo $_GET['theme']; ?> </u>  <b style="color: #aa0072;font-size: 30px;"> &emsp;>>&emsp; </b> sujet: <u style="color: #32de22;"><?php echo $_GET['subject']; ?></u> </h3>			
		<br/>
			
			<?php
				try{
					require_once("inc/connexPDO.inc.php");
				$id_con=connexPDO("myforum");
				// set the PDO error mode to exception
				$id_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				//requete principale
				$req =$id_con->query('SELECT id_subject, title, text, id_user, date, time FROM messages WHERE id_subject="'.$_GET['id_subject'].'" ');
				$i=0;
				$pre="2";
				while ($resultat=$req->fetch()) {$i++;
					
					//requete sur le pseudo de l'auteur du sujet
					$req1 =$id_con->query('SELECT id_user FROM users WHERE users.id_user="'.$resultat['id_user'].'" ');
					$resultat1=$req1->fetch();
					
					echo '<div class="lo">
						<div class="entete'.$i.''.$pre.'"><b>Posté par : &emsp;'.$resultat1['id_user'].'</b>   <i>&emsp;le&emsp;</i>'.$resultat['date'].' à '.$resultat['time'].'</div>';
				
						$photo=nom_photo($resultat['id_user']);
			
						if ($photo) {
							echo '<img  class="photoprof" src="imgs/'.$photo.'" title="profil de '.$resultat['id_user'].'">';
						}
						else{
							echo '<img  class="photoprof" src="imgs/Visiteur.png" title="photo de profil">';
						}
						echo '<p>
							&emsp;'.$resultat['text'].'
						</p>
					</div><hr width=50%">';
					$pre="";
					if ($i==2) {
						$i=0;
					}
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
			
		
		<!-- au lieu d'aller sur editerphp je vais plutot crééer un formulaire pour le message directement-->
		<br/><hr>
		<form method="post" action="envoieMessage.php">
			<label for=titre><h4>Titre</h4> </label>
			<input type="text" name="titre" id="titre" placeholder="ajouter un titre" size="70" value="<?php echo $_GET['subject']; ?>">
			
			<br/>
			<label for="message"><h4>Message</h4> </label>
			<textarea id="message" name="message" placeholder="Votre reponse..." cols="90" rows="15" value="reponse"></textarea>
			<br/>
			<div align="center"><input type="submit" name="repondre" id="repondre" value="Répondre">
			<input type="reset" name="Annuler" id="annuler" value="Réinitialiser">
				
			</div>
			
		</form>
		<br/>
		
	</div>
	<!­­ Le pied de page ­­>
	<br/><br/><br/><br/>
	<div class="footer">
		<br/>
		Copyright &copy; 2017-2018 Bini ANGUI<br />
		Ce logiciel est sous licence Sdn Genral Public License
	</div>


</body>
</html>