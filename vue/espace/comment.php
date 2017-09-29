<?php include('header.php'); ?>

 <a href="index.php">Home</a>
 
<?php

//affiche le sujet
foreach($sujet as $sujet1){
?>

<div class="subjects">
    <h3><?php echo $sujet1['titre']; ?></h3><p class="post_by">Post by : <span class="post"><?php echo $sujet1['pseudo']. "</span> " .$sujet1['the_sujet']; ?></p>
    
    <p class="description"><?php echo $sujet1['description']; ?><br>
</div>

<?php
}

if (isset($_SESSION['id']) AND isset($_SESSION['pseudo'])){
	?>

<p><form method="post">

	Share your opinion about this topic :

	<input type="text" name="com">

	<input type="submit" name="envoi_com" value="Send">

</form></p>


<?php
}
?>

<!-- affiche les commentaires -->
<p class="last_t">Comments</p>

<?php

foreach ($coms as $com) {

	echo "<span class='post'>".$com['membre']. "</span> : ".$com['com']."<br>";
	echo "<div class='date_c'>".$com['date_com']."</div><br><br>";
}

?>

</body>
</html>