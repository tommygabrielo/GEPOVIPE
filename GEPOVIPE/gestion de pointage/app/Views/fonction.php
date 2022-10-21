<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<?php include_once "header.php" ?>
</head>
<body>




<section class="col-lg-12"  id="tab" >
    <div class="container-lg"style="background-color:white;margin-top:-70px;">
    <hr style="background-color:#106eea; height:2px;">
    <h3 style="text-align:center;font-family: Bahnschrift;margin-top:-5px;margin-bottom:-10px;">LISTE DE FONCTION</h3><hr style="background-color:#106eea; height:2px;">
    <div style="display:flex">
    <div  class="col-auto mr-auto"><button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#Modal_Add"><i class="fas  fa-fw fa-plus" > </i>Ajouter</button></div>
    <div class="col-auto" > <input type="text" id="recherche" class="form-control"  placeholder="Recherche" style="width:250px;"><i  id="search" class="fas fa-search"></i></div>
  
    </div>
    
    
    <div class="table-responsive col-auto mr-auto" >
        <table class="table table-sm table-bordered table-striped" id="mydata">
            <thead>
                <tr>
                    <th>Fonction</th>
                    <th>Service</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="showdata">
           </tbody>
        </table>

        
</section>
    <!-- Modal Add Product-->
     <form   method="post">  
        <div class="modal fade" id="Modal_Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter une nouvelle fonction</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
            <div class="form-group">
                <div class="inputWithIcon">
                    <label>Fonction</label>
                    <input type="text"  id="NOMFONCT" class="form-control " name="NOMFONCT" placeholder="Nom fonction" ><span id="nomfonct"  class="alert"></span>
                    <a href="#" class="user-btn"><i class="fas fa-user"></i></a>
                </div>
                </div>
                
                <div class="form-group">
                <div class="inputWithIcon">
                    <label>Service</label>
                    <select type="text" class="form-control" id="CATFONCT" name="CATFONCT" required>
                    <option value="">&nbsp &nbsp -Service-</option>
  <option value="DIRECTION">&nbsp &nbsp DIRECTION</option>
  <option value="SERVICE ADMINITRATIF ET FINANCE">&nbsp &nbsp SERVICE ADMINITRATIF ET FINANCE</option>
  <option value="SERVICE DES OPERATIONS ET ENVIRONNEMENT">&nbsp &nbsp SERVICE DES OPERATIONS ET ENVIRONNEMENT</option>
  <option value="PERSONNEL D&#145;APPUI">&nbsp &nbsp AUTRES</option>
  <option value="STAGIAIRES">&nbsp &nbsp STAGIAIRES</option>
</select><span id="catfonct"  class="alert"></span>
<a href="#" class="user-btn" ><i class="fas fa-user"></i></a>
                </div>
                </div>

               
            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button type="button"  id="btn_save" class="btn btn-primary">Enregistrer</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- End Modal Add Product-->

    <!-- Modal Edit Product-->
    <form  method="post">
        <div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modifier Fonction</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
                <div class="form-group">
                <div class="inputWithIcon">
                    <label>Nom Fonction</label>
                    <input type="text" id="NOMFONCT" class="form-control NOMFONCT" name="NOMFONCT" placeholder="Nom Fonction"><span id="nomfonct"  class="alert"></span>
                    <a href="#" class="user-btn"><i class="fas fa-user"></i></a>
                </div>
                </div>
                
                <div class="form-group">
                <div class="inputWithIcon">
                    <label>Catégorie Fonction </label>
                    <select type="text" class="form-control CATFONCT" id="CATFONCT" name="CATFONCT" >
  <option value="DIRECTION">&nbsp &nbsp DIRECTION</option>
  <option value="SERVICE ADMINITRATIF ET FINANCE">&nbsp &nbsp SERVICE ADMINITRATIF ET FINANCE</option>
  <option value="SERVICE DES OPERATIONS ET ENVIRONNEMENT">&nbsp &nbsp SERVICE DES OPERATIONS ET ENVIRONNEMENT</option>
  <option value="PERSONNEL D&#145;APPUI">&nbsp &nbsp PERSONNEL D'APPUI</option>
  <option value="STAGIAIRES">&nbsp &nbsp STAGIAIRES</option>
</select><span id="catfonct"  class="alert"></span>
<a href="#" class="user-btn" ><i class="fas fa-user"></i></a>
                </div>
                </div>

            </div>
            <div class="modal-footer">
                <input type="hidden" id="NUMFONCT" name="NUMFONCT" class="NUMFONCT">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button  type="button" id="btn-update" class="btn btn-primary">Modifier</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- End Modal Edit Product-->

    <!-- Modal Delete Product-->
    <form  method="post">
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Supprimer Fonction</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
               <h4>Voulez-vous supprimer cette fonction?</h4>
            
            </div>
            <div class="modal-footer">
                <input type="hidden" id="NUMFONCT" name="NUMFONCT" class="NUMFONCT">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                <button type="button"  id="btn-delete" class="btn btn-primary">Oui</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- End Modal Delete Product-->

    <?php include_once "footer.php" ?>
   
    <script src="<?php echo base_url('assets/ajaxFonction.js'); ?>"></script> 
  
    
</body>
</html>