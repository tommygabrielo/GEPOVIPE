

<!DOCTYPE html>
<html>
<head>
	<title>Connexion</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/style.css'); ?>">
</head>
<body>

	

	
<section>

	<div class="container">
	<h1>SE CONNECTER</h1>
	
	
                <form action="/log" method="post">
	<div class="icons">
		<img src="<?php echo base_url('assets/imgs/logo.png'); ?>" style="width:20%; border-radius:30%;">  
        </div>
		<?php if(session()->getFlashdata('msg')):?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
                <?php endif;?>
  		<input type="text" placeholder="Entrer votre nom" name="name"  required>
		<input type="password" placeholder="et mot de passe" id="psw" name="password" required>
		<input id="mdp" type="checkbox" onclick="show_password()">
		   
        <button id="btn" class="btn">Se connecter</button>
       </form>
    </div>
	</section>
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