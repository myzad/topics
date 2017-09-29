<?php

session_start();

//lien avec la base de donnees
include_once('modele/espace/get_sujets.php');

//nombre de sujets a faire apparaître
$sujet = get_one_sujet(1);

foreach($sujet as $cle1 => $sujet1){

	//sécuriser les données
    $sujet[$cle1]['titre'] = htmlspecialchars($sujet1['titre']);
    $sujet[$cle1]['pseudo'] = htmlspecialchars($sujet1['pseudo']);
    $sujet[$cle1]['description'] = nl2br(htmlspecialchars($sujet1['description']));

}

if (isset($_SESSION['id']) AND isset($_SESSION['pseudo'])){

if(isset($_POST['envoi_com'])){

	//lien avec la base de donnees
	include_once('modele/espace/get_sujets.php');

	$membre = htmlspecialchars($_SESSION['pseudo']);
	$com = htmlspecialchars($_POST['com']);

	insert_coms($membre, $com);

}

}

$coms = display_coms(0,10);

foreach($coms as $cle1 => $com1){

	//sécuriser les données
    $coms[$cle1]['membre'] = htmlspecialchars($com1['membre']);
    $coms[$cle1]['com'] = nl2br(htmlspecialchars($com1['com']));

}

//lien avec l'affichage
include_once('vue/espace/comment.php');