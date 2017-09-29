<?php

session_start();
include('header.php'); 

?>
        <h1>Share your opinion !</h1>


<!-- MENU -->
<div class="menu">
<nav>

<?php

if (!isset($_SESSION['id']) AND !isset($_SESSION['pseudo'])){

?>

    <li><a href="sign_in.php">Sign in</a></li>
    <li><a href="sign_up.php">Sign up</a></li>

<?php
}else{
?>

	<li><a href='profil.php'>My profil</a></li>
	<li><a href='write.php'>Open a topic</a></li>
	<li><a href='logout.php'>Logout</a></li>
<?php
}
?>

</div>
<p>In this website, you can share your opinion about something you like. You can also comment topics if you are interested in.
Of course, you have to sign in first ! 

<h2 class="last_t">Last topics</h2>

<?php
//affiche les sujets
foreach($sujets as $sujet){
?>

<div class="subjects">
    <h3><?php echo $sujet['titre']; ?></h3><p class="post_by">Post by : <span class="post"><?php echo $sujet['pseudo']."</span> ".$sujet['the_sujet']; ?></p>
    
    <p class="description"><?php echo $sujet['description']; ?><br>

    <em><a href="comment.php?sujet=<?php echo $sujet['id']; ?>">Comments</a></em>

    </p>
</div>

<?php
}
?>

</body>
</html>