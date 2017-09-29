<?php include('header.php'); ?>
        
    <body>

<a href="index.php">Home</a>

<p class="last_t">Sign up </p>

<form method="post" class="form">
	Pseudo : <br><input type="text" name="pseudo" required><br>
	Password : <br><input type="password" name="mdp1" required><br>
	Enter your password again : <br><input type="password" name="mdp2" required><br>
	Mail : <br><input type="email" name="mail" required><br>

	<input type="submit" name="envoi_i" value="Send">
</form>

</body>
</html>