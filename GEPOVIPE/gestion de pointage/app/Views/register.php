<!DOCTYPE html>
<html>
<head>
<?php include_once "header.php" ?>
<style>
.reg{
margin-bottom:50px;
border-radius: 50px;
	background-color: #dde7eb ;}
</style>
   
	
</head>
<body>

<div class="color-line"></div>
<br>
    <div class="container">
        <div class="row">
			
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="back-link back-backend">
                    <a href="<?php echo base_url('compte');?>" class="btn btn-secondary" ><i class="bi bi-chevron-left" > </i>Retour</a>
                </div>
            </div>
        </div>
	</div>
	
<hr>
    <div class="container-fluid" >
        <div class="row">
      
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
                <div class="reg col-md-6 col-md-6 col-sm-6 col-xs-12 ">
 <div class="reg">
                    <div class="text-center custom-login">
				
                    <h3>Inscription</h3>
                    <!-- <p>Admin template with very clean and aesthetic style prepared for your next app. </p> -->
                
                    </div>
               
               
                     <div class="hpanel">
                        <div class="panel-body">
                        <form action="/register/save" method="post">
                            <div class="row">

						
								<div class="checkbox col-lg-6">
                                    <input type="radio" name="role" value="admin"> Administrateur
							    </div>

                                <div class="checkbox col-lg-6">
                                    <input type="radio" name="role" value="utilisateur"> Utilisateur
							    </div>
			
			
								<hr>
							   
								<div class="form-group col-lg-12">
                                    <label>Nom</label>
									<input type="text" placeholder="Entrer votre nom" name="name" class="form-control" id="InputForName" value="<?= set_value('name') ?>">
									<br>
                                </div>
							   

								<div class="form-group col-lg-12">
                                    <label>Adresse email</label>
									<input type="email" placeholder="Entrer votre email" name="email" class="form-control" value="<?= set_value('email') ?>" required>
									<br>
								</div>
								

								<div class="form-group col-lg-6">
                                    <label>Mot de passe</label>
                                    <input type="text" placeholder="et mot de passe" name="password" class="form-control"required>
                                </div>
							   
								<div class="form-group col-lg-6">
                                    <label>Confirmation du mot de passe</label>
                                    <input type="text" placeholder="confirmation de mot de passe" name="confpassword" class="form-control" required>
								<br>
								</div>
								
							</div>
                            <div class="text-center">
                                <button class="btn" onclick="verification()">Enregistrer</button>
                              
                            </div>
                        </form>
                    </div>
				</div>
                </div>			
            </div>
			
        </div>
	
    </div>
    <?php include_once "footer.php" ?>
</body>
</html>