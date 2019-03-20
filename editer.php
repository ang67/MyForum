<!-- editer.php -->
<?php
	session_start();

	if (!isset($_SESSION['pseudo']) && !isset($_SESSION['pass'])) {
		header("location: login.php");
	}
?>
<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>MyForum</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="default.css">
	<link rel="stylesheet" type="text/css" href="editer.css">
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
			<li class="li"><span>Pseudo >></span> </a></li>
			<li class="li"><a href="login.php">Quitter</a></li>|
			<li class="li"><a href="themes.php">Thèmes</li>|
			<li class="li"><a href="sujet.php"><span class="focus">Sujets</span></li>|
			<li class="li"><a href="messages.php">Messages</li></a>
		</ul>
	</div>
	<!­­ La partie principale ­­>
	<div class="main">
		<h1>Répondre au message</h1>

		<form method="post" action="messages.php">
			<label for="thème"><h3>Titre</h3> </label>
			<input type="text" name="theme" id="theme" placeholder="titre de votre sujet" required="" size="50px">

			<label for="message"><h3>Message</h3></label>
			<textarea name="message" id="message" placeholder="votre message..." rows="10" cols="70" value="" ></textarea>
			<br> <br/>

			<input type="submit" name="envoie" id="envoie" value="Envoie">
			<input type="reset" id="effacer" value="Effacer">
		</form>
			
		<br/>
		<div class="lo">
			
			
					<b>Auteur:</b>   <i>Titre de la calac did ndj  toto</i>    [02/08/2018]

				</tr>
			</table>
				
			<p>
				Si vous devez placer un mot très long dans un bloc, qui ne tient pas dans la largeur, vous allez adorer word-wrap. Cette
				propriété permet de forcer la césure des très longs mots (généralement des adress
				fsjfk sjfjk spods adkq kiksds idskdskfzff zfiofd difd fdif difdf dfodjnfdf
				dfjndfd difd fud fdoffnqf sdfpfnf dfsds fdifd fdf i
			</p>
		
	</div>
	
	<hr width="70%">
	<div class="lo">
			
			
					<b>Auteur:</b>   <i>Titre de la calac did ndj  toto</i>    [02/08/2018]

				</tr>
			</table>
				
			<p>
				Si vous devez placer un mot très long dans un bloc, qui ne tient pas dans la largeur, vous allez adorer word-wrap. Cette
				propriété permet de forcer la césure des très longs mots (généralement des adress
			</p>
		
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