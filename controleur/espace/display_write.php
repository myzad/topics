<?php

session_start();

if (isset($_SESSION['id']) AND isset($_SESSION['pseudo'])){

if(isset($_POST['envoi_w'])){

	//lien avec la base de donnees
	include_once('modele/espace/get_sujets.php');

	$titre = htmlspecialchars($_POST['titre']);
	$description = htmlspecialchars($_POST['description']);
	$id_m = htmlspecialchars($_SESSION['id']);


	write_topic($titre, $description, $id_m);

}

//lien avec l'affichage
include_once('vue/espace/write.php');

}