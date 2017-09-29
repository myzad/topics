<?php

if(isset($_POST['envoi_c'])){

	//lien avec la base de donnees
	include_once('modele/espace/get_sujets.php');

	$pseudo = htmlspecialchars($_POST['pseudo']);

	$new_hash_mdp = sha1($_POST['mdp']);

	co_membres($pseudo, $new_hash_mdp);

}

//lien avec l'affichage
include_once('vue/espace/sign_in.php');