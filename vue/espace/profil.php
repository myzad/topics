<?php 

include('header.php'); ?>

 <a href="index.php">Home</a>
 
<?php

//affiche ton profil
foreach($profils as $profil)
?>

<div>
	<h3>Your information : </h3>
    <p>Pseudo : <?php echo $profil['pseudo']; ?><br>
    Mail : <?php echo $profil['email']; ?><br>
    Registered : <?php echo $profil['date_inscription']; ?>
    </p>

    <h4 class="last_t">Your topics </h4>

    <?php 

    foreach ($profil1 as $one_p) {

    	echo "<a href='comment.php?sujet=$one_p[id]'>".$one_p['titre']."</a><br>";

	}

    ?>

</div>

</body>
</html>