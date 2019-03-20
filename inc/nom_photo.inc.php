<?php
	
	function nom_photo($pseudo){
		$nb_fichier = 0;
		
		if($dossier = opendir('../myForum/imgs')){

			while(false !== ($fichier = readdir($dossier))){
				$nom_fichier= explode(".", $fichier);//pour separer l'extention
				if($nom_fichier==$pseudo){
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