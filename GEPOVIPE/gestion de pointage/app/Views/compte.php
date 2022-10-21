<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once "header.php" ?>

</head>
<body>

<section class="col-lg-12"  id="tab" >
    <div class="container-lg"style="background-color:white;margin-top:-70px;">
    <hr style="background-color:#106eea; height:2px;">
    <h3 style="text-align:center;font-family: Bahnschrift;margin-top:-5px;margin-bottom:-10px;">LISTE DE COMPTE</h3>
    <hr style="background-color:#106eea; height:2px;">
    <div style="display:flex">
    <a  class="col-auto mr-auto" href="<?php echo base_url('register');?>"><button type="button" class="btn btn-primary mb-3"  > <i class="fas  fa-fw fa-plus" > </i>Ajouter</button></a>
     
    </div>
    
    <div class="table-responsive col-auto mr-auto" >
        <table class="table pagin table-sm table-bordered table-striped" id="mydata">
            <thead>
                <tr> 
                    <th>Nom</th>
                    <th>Rôle</th>
                    <th>Email</th>
                    <th>Mot de passe</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="showdata">
           
            </tbody>
        </table>
        </div>
        
</section>
   
<?php include_once "footer.php" ?>
<script src="<?php echo base_url('assets/ajaxCompte.js'); ?>"></script> 
   

    <!-- Modal Delete Product-->
    <form  method="post">
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Supprimer Compte</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
               <h4>Voulez-vous supprimer cette compte?</h4>
            
            </div>
            <div class="modal-footer">
            <form>
                <input type="hidden" id="NUMSEC" name="COMPTE">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                <button type="button"  id="btn-delete" class="btn btn-primary">Oui</button>
            </form>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- End Modal Delete Product-->


    <form  method="post" >  
        <div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modification</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
             <div class="form-group">
                <div class="inputWithIcon">
                    <label>Nom</label>
                    <input type="text"  class="form-control NOMSEC" name="NOMSEC" placeholder="Nom Utisateur" ><span id="nomsec"  class="alert"></span>
                    <a class="user-btn" href="#"><i class="fas fa-user"></i></a>
                </div>
                </div>


                <div class="form-group">
                <div class="inputWithIcon">
                    <label>Email</label>
                    <input type="text" id="EMAIL" class="form-control EMAIL" name="EMAIL" placeholder="Email"><span id="email" class="alert"></span>
                    <a class="user-btn" href="#"><i class="fas fa-envelope"></i></a>
                </div>
                </div>


                <div class="form-group">
                <div class="inputWithIcon">
                    <label>Mot de pass</label>
                    <input type="text"  id="mdp" class="form-control MDP" name="MDP" placeholder="Mot de passe"><span id="mdp" class="alert"></span>
                    <a class="user-btn" href="#"><i class="fas fa-lock"></i></a>
                </div>
                </div>

                <div class="form-group">
                <div class="inputWithIcon">
                    <label>Confirmation mot de pass</label>
                    <input type="text"  id="mdp1 "class="form-control MDP1" name="MDP" placeholder="Confirmation mot de passe"><span id="mdp1" class="alert"></span>
                    <a class="user-btn" href="#"><i class="fas fa-lock"></i></a>
                </div>
                </div>

                <div class="form-group">
                <div class="inputWithIcon">
                    <label>Role</label>
                    <select type="text" class="form-control ROLE" id="ROLE" name="ROLE" required>
                    <option value="">&nbsp &nbsp -Catégorie-</option>
                    <option value="admin">&nbsp &nbsp Admin</option>
                    <option value="utlisateur">&nbsp &nbsp Utilisateur</option>
 
                    </select><span id="role"  class="alert"></span>
                    <a href="#" class="user-btn" ><i class="fas fa-gear"></i></a>
                </div>
                </div>
        
            <div class="modal-footer">
                <input type="hidden" name="NUMSEC" class="NUMSEC">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button  type="button" id="btn-update" class="btn btn-primary">Modifier</button>
                </div>
            </div>
        </div>
        </div>
    </form>
    <!-- End Modal Edit Product -->
    
    
    

   
</body>
</html>