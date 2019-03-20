<!-- themes.php -->
<?php
	session_start();

	if (!isset($_SESSION['pseudo']) && !isset($_SESSION['pass'])) {
		$_SESSION['pseudo']="Visiteur";//simple visteur
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
			<?php echo '<span class="pseudo">'.$_SESSION['pseudo'].' >></span> </a></li>';	?>
			<li class="li"><a href="login.php">Quitter</a></li>>
			<li class="li"><a href="#"><span class="focus">Thèmes</span> </li>
		</ul>
	</div>
	<!­­ La partie principale ­­>
	<div class="main1">
	<h1 class="legend" align="center">Liste des thèmes</h1>
	<?php 
		require("inc/connexPDO.inc.php");
		
		try{
			$id_con=connexPDO("myforum");
			// set the PDO error mode to exception
			$id_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//requete
			
			$req =$id_con->query('SELECT id_theme, name, description FROM themes');
			
			
			$i=0;
			while($result=$req->fetch()) {
				//requete pour avoir la date du dernier massage concernat un theme
				/*$req2 =$id_con->query('SELECT max(messages.date) AS last_date FROM ((subjects INNER JOIN messages ON subjects.id_subject = messages.id_subject)INNER JOIN themes ON subjects.id_theme = themes.id_theme) WHERE themes.id_theme = "'.$result['id_theme'].'" ');
				$result2=$req2->fetch();*/
				//requete pour avoir la date du dernier massage(sujet) concernat un theme
				$req2=$id_con->query('SELECT date, time, title FROM subjects WHERE subjects.id_theme ="'.$result['id_theme'].'" ORDER BY date desc, time desc ');
				$result2=$req2->fetch();
				
				//requete sur le nombre de sujets postés
				$req3 =$id_con->query('SELECT count(id_theme) AS nb_sujet FROM subjects WHERE id_theme="'.$result['id_theme'].'" ');
				$result3=$req3->fetch();
				$nom=utf8_decode($result['name']) ;
		  		echo '<div class="col" align="center">
					<a style="font-size: 25px; font-weight: bold;" class="lien" href="sujets.php?theme=';echo $result['id_theme'];echo '&amp;name=';echo $result['name'].'">';echo $nom.'</a>
					<br/><br/>
					<a class="lien" href="sujets.php?theme=';echo $result['id_theme'];echo '&amp;name=';echo $result['name'].'">';echo $result['description'].'</a>

					<br/><br/>
					<hr class="hr">
					
					Nombre de sujets: <b>'.$result3['nb_sujet'].'</b>	
					<br/><br/>
					dernier message:&emsp;';echo $result2['date'].' &emsp; '.$result2['time'].'
				</div>  ';
				$i++;
				if ($i>2) {
					echo "<br/>";
					$i=0;
				}
			}
			
		}
		catch(Exception $e){
			$e->getMessage();
		}
	?>

	</div>
	
	<!­­ Le pied de page ­­>
	<div class="footer">
		<br/>
		Copyright &copy; 2017-2018 Bini ANGUI<br />
		Ce logiciel est sous licence Sdn Genral Public License
	</div>

</body>
</html>