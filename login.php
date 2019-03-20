<!-- login.php -->
<?php
	

	session_start();
	//on arrete la session s'il y en a
	session_destroy();
	$_SESSION['pseudo']="Visiteur";//simple visteur

?>
<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>MyForum</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="default.css">
	<link rel="stylesheet" type="text/css" href="login.css">
	
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
			<?php echo '<span class="pseudo">'.$_SESSION['pseudo'].' >></span> </a></li>';	?>			
		</ul>
	</div>
	<!­­ La partie principale ­­>
	<div class="main">
		<form method="post" action="loger.php" >
			<fieldset align="center">
				<img  class="photoprofil1" src="imgs/Visiteur.png" title="photo de profil">
				<br>
				<legend class="legend"> Connectez-vous</legend>
				<table align="center">
				<tr><td><label for="pseudo"><b>Pseudo:</b></label> </td> <td><input type="text" name="pseudo" id="pseudo" <?php echo'required' ?> ></td></tr>
				<tr><td><label for="pass"><b>Mot de passe:</b> </label> </td> <td><input type="password" name="pass" id="password" <?php echo'required' ?> ></td></tr>
			</table>
			<br>
			<input type="submit" name="connecter" id="connecter" value="Se connecter" >
			<button onclick="mail()">j'ai oublié mon mot de passe</button>
			</fieldset>
			
		</form>
		
		
		
		<div>
			<p align="center">
				<br/>
				<i >Si vous n'êtes pas encore inscrits veuillez cliquer <a href="inscription.php"><b>ici</b> </a>.</i>
			</p>
			 <br/><br/><br/>
		</div>
	</div>
	<!­­ Le pied de page ­­>
	<br/>
	<br/>
	<br/>
	<div class="footer">
		<hr>
		<br/>
		Copyright &copy; 2017-2018 Bini ANGUI<br />
		Ce logiciel est sous licence Sdn Genral Public License

	</div>
	<!-- ********************************************************************************************************************* -->

<script type="text/javascript">

		function mail(){
			var pseudo = prompt("Entrez votre pseudo");
			window.location = "mail.php?pseudo=" +  pseudo; 
		}
	</script>
<!-- *************************************************************************************************************************** -->

</body>
</html>

