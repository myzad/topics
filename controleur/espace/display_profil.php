<?php

session_start();

if (isset($_SESSION['id']) AND isset($_SESSION['pseudo'])){

//lien avec la base de donnees
include_once('modele/espace/get_sujets.php');

//nombre de sujets a faire apparaître
$profils = profil($_SESSION['id']);

foreach($profils as $cle1 => $profil){

	//sécuriser les données
    $profils[$cle1]['pseudo'] = htmlspecialchars($profil['pseudo']);
    $profils[$cle1]['date_inscription'] = htmlspecialchars($profil['date_inscription']);
    $profils[$cle1]['email'] = htmlspecialchars($profil['email']);

}

$profil1 = profil1($_SESSION['id']);

foreach($profil1 as $cle1 => $profil2){

	//sécuriser les données
    $profil1[$cle1]['titre'] = htmlspecialchars($profil2['titre']);

}

//lien avec l'affichage
include_once('vue/espace/profil.php');

}