<?php

include_once('modele/connexion_sql.php');

if (!isset($_GET['section']) OR $_GET['section'] == 'index'){

    include_once('controleur/espace/display_last.php');

}