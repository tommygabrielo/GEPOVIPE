<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once "header.php" ?>
</head>
<body>


<section class="col-lg-12"  id="tab" >
    <div class="container-lg"style="background-color:white;margin-top:-70px;">
    <hr style="background-color:#106eea; height:2px;">
    <h3 style="text-align:center;margin-top:-5px; margin-bottom:-10px;">LISTE DE VISITEURS</h3>
    <hr style="background-color:#106eea; height:2px; ">
   
    <div style="display:flex">
    <div  class="col-auto mr-auto"><button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#Modal_Add"><i class="fas  fa-fw fa-plus" > </i>Ajouter</button></div>
    <div class="inputWithIconRight">
    <div class="col-auto" > <input type="text" id="recherche" class="form-control"  placeholder="Recherche" style="width:250px;"><i  id="search" class="fas fa-search"></i></div>
   
    </div>
    </div>

    <div class="table-responsive col-auto mr-auto" >
        <table class="table table-sm table-bordered table-striped">
            <thead>
                <tr>                   
                    <th>Nom et prénom visiteur</th>
                    <th>CIN</th>          
                    <th>Date</th>
                    <th>Entrée</th>
                    <th>Sortie</th>
                    <th>Service</th>
                    <th>Destination</th>
                    <th>Motif</th>
                </tr>
            </thead>
            <tbody id="showdata">
           
            </tbody>
        </table>
        </div>
        
</section>

    <!-- Modal Add visiteur-->  
     <form   method="post">  
        <div class="modal fade" id="Modal_Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter un nouveau visiteur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

 
            <div class="modal-body">
            
                <div class="form-group">
                    <label>Nom du visiteur</label>
                      <div class="inputWithIcon">
                    <input type="text" id="NOMVISITEUR" class="form-control" name="NOMVISITEUR" placeholder="Nom et prénom du visiteur">
                    <span id="nomvisiteur"  class="alert"></span>
                   <a class="user-btn" href="#"><i class="fas fa-user"></i></a> 
                     </div>
                </div>


                <div class="form-group">
                    <label>CIN</label>
                    <div class="inputWithIcon">
                    <input type="text" id="NUMCIN" class="form-control" name="NUMCIN" placeholder="carte d'identité national">
                    <span id="numcin"  class="alert"></span>
                    <a class="user-btn" href="#"><i class="fas fa-credit-card"></i></a> 
                    </div>
                </div>

                <div class="form-group">
                    <label>Service</label>
                    <div class="inputWithIcon">   
                    <select name="SERVICE"  id="SERVICE" class="form-control">
                    <option value="">&nbsp &nbsp &nbsp -Service-</option>
                         <?php foreach($fonction as $row):?>
                        <option value="<?=$row->CATFONCT;?>">&nbsp &nbsp &nbsp<?=$row->CATFONCT;?></option>
                        <?php endforeach;?>
                        </select>
                      
                    <span id="service"  class="alert"></span>
                    <a class="user-btn" href="#"><i class="fas fa-gear"></i></a> 
                   
                  
                </div>
                </div>

                <div class="form-group">
                <label>Destination</label>
                    <div class="inputWithIcon">   
                    <select name="NUMEMP"  id="DIRECTION" class="form-control">
                    <option value="">&nbsp &nbsp &nbsp -Destination-</option>
                    </select>
                    <span class="alert"></span>
                    <a class="user-btn" href="#"><i class="fas fa-users"></i></a> 
                  </div>
                </div>


                <div class="form-group">
                    <label>Motif</label>
                    <div class="inputWithIcon">
                    <input type="text" id="OBSERVATION" class="form-control" name="OBSERVATION" placeholder="raison de la visite">
                    <span id="observation"  class="alert"></span>
                    <a class="user-btn" href="#"><i class="fas fa-pen"></i></a> 
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

   
    <!-- End Modal Add visiteur-->

   <!-- debut modal sorti -->
   <form  method="post">
        <div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <label>Voulez vous confirmer?</label>        
            </div>
            <input type="hidden" id="HEURESORTV" class="form-control HEURESORTV" name="HEURESORTV">
            <div class="modal-footer">
            <input type="hidden" id="IDVISITE" class="form-control IDVISITE" name="IDVISITE">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                <button  type="button"  id="btn-update" class="btn btn-primary">Oui</button>

                
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- End Modal Edit Product-->

   

    <?php include_once "footer.php" ?>
    <script src="<?php echo base_url('assets/ajaxVisite.js');?>"></script> 
   
</body>
</html>