<?php

function get_sujets($nb, $limit){

	global $bdd;

	//variables
	$nb = (int) $nb;
	$limit = (int) $limit;

	$reponse1 = $bdd->prepare("SELECT s.id as id, s.titre as titre, s.description as description, DATE_FORMAT(s.date_sujet, 'the %d of %M %Y') as the_sujet, m.pseudo as pseudo FROM sujets as s INNER JOIN membres as m ON s.id_membre = m.ID ORDER BY s.id DESC LIMIT :nb, :nb_limit");
	$reponse1->bindParam(':nb', $nb, PDO::PARAM_INT);
	$reponse1->bindParam(':nb_limit', $limit, PDO::PARAM_INT);
	$reponse1->execute();
	
	$sujets = $reponse1->fetchAll();
	return $sujets;
}

function get_one_sujet($one){

	global $bdd;

	$id_sujet = (int) $_GET['sujet'];
	$one = (int) $one;

	$reponse2 = $bdd->prepare("SELECT s.id as id, s.titre as titre, s.description as description, DATE_FORMAT(s.date_sujet, 'the %d of %M %Y') as the_sujet, m.pseudo as pseudo FROM sujets as s INNER JOIN membres as m ON s.id_membre = m.ID WHERE s.id = :id_sujet1");
	$reponse2->bindParam(':id_sujet1', $id_sujet, PDO::PARAM_INT);
	$reponse2->execute();

	$sujet = $reponse2->fetchAll();
	return $sujet;
}

function display_coms($limit1, $limit2){

	global $bdd;

	$id_com_s = (int) $_GET['sujet'];
	$limit1 = (int) $limit1;
	$limit2 = (int) $limit2;

	$reponse5 = $bdd->prepare("SELECT id_sujet, membre, com, DATE_FORMAT(date_com, '%m-%d-%Y - %H:%i') as date_com FROM commentaires WHERE id_sujet = :id_com_s ORDER BY date_com DESC LIMIT :limit1, :limit2");
	$reponse5->bindParam(':id_com_s', $id_com_s, PDO::PARAM_INT);
	$reponse5->bindParam(':limit1', $limit1, PDO::PARAM_INT);
	$reponse5->bindParam(':limit2', $limit2, PDO::PARAM_INT);
	$reponse5->execute();

	$coms = $reponse5->fetchAll();
	return $coms;

}

function insert_coms($membre, $com){

	global $bdd;

	$id_s = (int) $_GET['sujet'];

	$reponse6 = $bdd->prepare("INSERT INTO commentaires(id_sujet, membre, com, date_com) VALUES (:id_s, :membre, :com, NOW())");
	$reponse6->execute(array(
		'id_s' => $id_s, 
		'membre' => $membre,
		'com' => $com
		));

}

function get_membres($pseudo, $mail, $hash_mdp){

	global $bdd;

	$reponse = $bdd->prepare("INSERT INTO membres(pseudo, mdp, email, date_inscription) VALUES (:pseudo, :mdp, :mail, CURDATE())");
	$reponse->execute(array(
		'pseudo' => $pseudo,
		'mdp' => $hash_mdp,
		'mail' => $mail
		));

}


function co_membres($pseudo, $new_hash_mdp){

	global $bdd;

	$reponse2 = $bdd->prepare("SELECT id FROM membres WHERE pseudo = :pseudo AND mdp = :mdp");
	$reponse2->execute(array(
		'mdp' => $new_hash_mdp,
		'pseudo' => $pseudo
		));

	$resultat = $reponse2->fetch();

	if($resultat){
		session_start();
		$_SESSION['id'] = $resultat['id'];
	    $_SESSION['pseudo'] = $pseudo;

	    header("Location: index.php");
	}else{
		echo "An error has occured, please retry.";

	}

}


function profil($one_profil){

	global $bdd;

	$one_profil = (int) $one_profil;

	$reponse3 = $bdd->prepare("SELECT * FROM membres WHERE id = :id_prof");
	$reponse3->bindParam(':id_prof', $one_profil, PDO::PARAM_INT);
	$reponse3->execute();

	$profils = $reponse3->fetchAll();
	return $profils;
}

function profil1($one_profil1){

	global $bdd;

	$one_profil1 = (int) $one_profil1;

	$reponse8 = $bdd->prepare("SELECT * FROM sujets WHERE id_membre = :id_prof");
	$reponse8->bindParam(':id_prof', $one_profil1, PDO::PARAM_INT);
	$reponse8->execute();

	$profils1 = $reponse8->fetchAll();
	return $profils1;
}



function write_topic($titre, $description, $id_m){

	global $bdd;

	$id_m = (int) $id_m;

	$reponse4 = $bdd->prepare("INSERT INTO sujets(id_membre, titre, description, date_sujet) VALUES (:id_m, :titre, :description, CURDATE())");
	$reponse4->execute(array(
		'id_m' => $id_m, 
		'titre' => $titre,
		'description' => $description
		));

}