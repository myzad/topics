<?php

//lien avec la base de donnees
include_once('modele/espace/get_sujets.php');

//nombre de sujets a faire apparaître
$sujets = get_sujets(0, 5);

foreach($sujets as $cle => $sujet2){

	//sécuriser les données
    $sujets[$cle]['titre'] = htmlspecialchars($sujet2['titre']);
    $sujets[$cle]['pseudo'] = htmlspecialchars($sujet2['pseudo']);
    $sujets[$cle]['description'] = nl2br(htmlspecialchars($sujet2['description']));

}

//lien avec l'affichage
include_once('vue/espace/display.php');