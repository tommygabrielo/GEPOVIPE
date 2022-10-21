<!DOCTYPE html>
<html>
<head>
	<title>Insription</title>
   
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/style.css'); ?>">
   
	
</head>
<body>

	

	
<section>
	<div class="container">
	<h1>S'INSCRIRE</h1>
	<span>ou <a href="/login.php">SE CONNECTER</a></span>
	
                <form action="/register/save" method="post">
        <div class="icons">
           <img src="<?php echo base_url('assets/imgs/logo.png');?>" style="width:20%;border-radius:30%;"> 
        </div>
		<input type="text" placeholder="Entrer votre nom"name="name" class="form-control" id="InputForName" value="<?= set_value('name') ?>">
        <input type="email" placeholder="Entrer votre email" name="email" value="<?= set_value('email') ?>" required>
		<input type="password" id="psw" placeholder="et mot de passe" name="password" required>
		<input type="password" id="psw" placeholder="confirmation de mot de passe" name="confpassword" required>
		<input id="mdp" type="checkbox" onclick="show_password()">
        <button class="btn">S'inscrire</button>
        
    </div>
	</section>
</form>
<script type="text/javascript">
function show_password() {
	var x = document.getElementById("psw");
	if (x.type === "password") {
		x.type = "text";
	} else {
		x.type = "password";
	}
} 
</script>
</body>
</html>