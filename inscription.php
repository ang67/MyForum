<!-- inscription.php -->

<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>MyForum</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="default.css">
	<link rel="stylesheet" type="text/css" href="inscription.css">
</head>
<body>
	<!­­ Entete de site ­­>
	<div class="header">
		<img class="icon" src="imgs/linux.png" title="icon MyForum">
		<br/>
		<h1 class="site">MyForum<span class="point">.</span></h1>
		<hr>
	</div>
	<!­­ La barre de menu ­­>
	<div class="menu">
		

		<ul>
			<li class="li"><span><b>Visiteur >></b> </span> </a></li>
			<li class="li"><a href="login.php">Quitter</a></li>
		</ul>
	</div>
	<!­­ La partie principale ­­>
	<div class="main">
		<form method="post" action="enregistrement.php" >
			<fieldset align="center">
				<legend class="legend"> Inscrivez-vous</legend>
				<table align="center">
				
				<tr><td><label for="nom"><b>Nom:</b></label> </td> <td><input type="text" name="nom" id="nom" required=""></td></tr>
				<tr><td><label for="prenom"><b>Prénom:</b></label> </td> <td><input type="text" name="prenom" id="prenom" required=""></td></tr>
				<tr><td><label for="email"><b>Email:</b></label> </td> <td><input type="text" name="email" id="email" required=""></td></tr>
				<tr><td><label for="pseudo"><b>Pseudo:</b></label> </td> <td><input type="text" name="pseudo" id="pseudo" required=""></td></tr>
				<tr><td><label for="pass"><b>Mot de passe:</b> </label> </td> <td><input type="password" name="pass" id="password" required=""></td></tr>
				<tr><td><label for="confPass"><b>Confirmer mot de passe:</b> </label> </td> <td><input type="password" name="confPass" id="confPass" required=""></td></tr>
			</table>
			<br>
			<input type="submit" name="Enregistrer" id="Enregistrer" value="Enregistrer" >
			<input type="reset" value="Effacer" id="Effacer">
			</fieldset>
			
		</form>
		
		
	</div>
	<br/>
	<!­­ Le pied de page ­­>
	<div class="footer">
		<br/>
		Copyright &copy; 2017-2018 Bini ANGUI<br />
		Ce logiciel est sous licence Sdn Genral Public License
	</div>

</body>
</html>
<!-- ***********************************************TRIATEMENT PHP***************************************************** -->
