<?php include('header.php'); ?>
        
    <body>

 <a href="index.php">Home</a>

<p class="last_t">Open a topic</p>
 
<form method="post" class="form">
	Title : <br><input type="text" name="titre" required><br>
	Description : <br><textarea name="description" required></textarea><br>

	<input type="submit" name="envoi_w" value="Send">
</form>

</body>
</html>