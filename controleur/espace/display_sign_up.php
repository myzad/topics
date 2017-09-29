<?php

if(isset($_POST['envoi_i'])){

	//lien avec la base de donnees
	include_once('modele/espace/get_sujets.php');

	$pseudo = htmlspecialchars($_POST['pseudo']);
	$mail = htmlspecialchars($_POST['mail']);

	if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['mail'])  AND $_POST['mdp1'] == $_POST['mdp2']){

		$mdp = $_POST['mdp1'];

		$hash_mdp = sha1($mdp);

		get_membres($pseudo, $mail, $hash_mdp);

		header("Location: sign_in.php");

	}else{
		echo "An error has occured, please retry.";
	}

}

//lien avec l'affichage
include_once('vue/espace/sign_up.php');