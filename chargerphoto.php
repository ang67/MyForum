<!-- chargerphoto.php -->
<?php
	session_start();

	if (!isset($_SESSION['pseudo']) && !isset($_SESSION['pass'])) {
		echo '<script type= text/javascript> history.go(-1) </script>';exit();
	}
?>
<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>MyForum</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="default.css">
	<link rel="stylesheet" type="text/css" href="themes.css">
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
			<li class="li"><span class="pseudo"><?php echo $_SESSION['pseudo'] ?> >></span> </li>
			<li class="li"><a href="login.php">Quitter</a></li>>
			<!-- <li class="li"><a href="javascript:history.go(-1)"><span class="focus">Thèmes</span> </li> -->
		</ul>
	</div>
	<!­­ La partie principale ­­>
	<div class="main1" align="center">
	<h1 class="legend1" >Choisissez une photo de profil</h1>
	<form  method="post" action="<?= $_SERVER["PHP_SELF"] ?>" enctype="multipart/form-data">

		<input align="center" type="file" name="photo" accept=".png, .jpg, .jpeg">
		<br/><br/>
		<input type="submit" name="envoye" value="Envoyer le fichier" />
	</form>

	</div>

	<?php
		// Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
		if (isset($_FILES['photo']) AND $_FILES['photo']['error']== 0)
		{
		// Testons si le fichier n'est pas trop gros
			if ($_FILES['photo']['size'] <= 20000000)
			{
			// Testons si l'extension est autorisée
				$infosfichier =	pathinfo($_FILES['photo']['name']);
				$extension_upload = $infosfichier['extension'];
				$extensions_autorisees = array('jpg', 'jpeg', 'png');
				if (in_array($extension_upload,	$extensions_autorisees))
				{
					// On peut valider le fichier et le stocker	définitivement
					move_uploaded_file($_FILES['photo']['tmp_name'], 'imgs/' .$_SESSION['pseudo'].'.'.$extension_upload);
					
					echo '<script type= text/javascript> alert("L\'envoi a bien été effectué ! ");history.go(-2) </script>';
				}
			}
		}
	?>
	
	<!­­ Le pied de page ­­>
	<br/><br/><br/><br/><br/><br/><br/><br/><br/>
	<div class="footer">
		<br/>
		Copyright &copy; 2017-2018 Bini ANGUI<br />
		Ce logiciel est sous licence Sdn Genral Public License
	</div>

</body>
</html>