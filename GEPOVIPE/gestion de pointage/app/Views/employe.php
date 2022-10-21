<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once "header.php" ?>

</head>
<body>

<section class="col-lg-12"  id="tab" >
    <div class="container-lg"style="background-color:white;margin-top:-70px;">
    <hr style="background-color:#106eea; height:2px;">
    <h3 style="text-align:center;font-family: Bahnschrift;margin-top:-5px;margin-bottom:-10px;">LISTE DES EMPLOYES</h3><hr style="background-color:#106eea; height:2px;">
    <div style="display:flex">
    <div  class="col-auto mr-auto"><button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#Modal_Add"><i class="fas  fa-fw fa-plus" > </i>Ajouter</button></div>
    <!-- <div  class="col-auto"><a id="pdf" href="<?php echo base_url('PdfEmploye/htmlToPDF') ?>" type="button" class="btn-lg"> <i class="fas  fa-fw fa-file-pdf-o" ></i>pdf</a></div> -->
     <div class="col-auto" > <input type="text" id="recherche" class="form-control"  placeholder="Recherche" style="width:250px;"><i  id="search" class="fas fa-search"></i></div>
    </div>
    
    <div class="table-responsive col-auto mr-auto" >
        <table class="table pagin table-sm table-bordered table-striped" id="mydata">
            <thead>
                <tr> 
                    <th>N° Employé</th>
                    <th>Nom et prénoms d'employé</th>
                    <th>Nom de fonction</th>
                    <th>Contact</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="showdata">
           
            </tbody>
        </table>
        </div>
        
</section>
    <!-- Modal Add Product-->
     <form   method="post">  
        <div class="modal fade" id="Modal_Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter un nouveau employé</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
                <div class="form-group">
                <div class="inputWithIcon">
                    <label>N° Employé</label>
                    <input type="text" id="NUMEMP" class="form-control" name="NUMEMP" placeholder="N° Employé"><span id="numemp" class="alert"></span>
                    <a class="user-btn" href="#"><i class="fas fa-user"></i></a> 
                </div>
                </div>

                <div class="form-group">
                <div class="inputWithIcon">
                    <label>Nom de fonction</label>
                    <select name="NUMFONCT"  id="NUMFONCT" class="form-control">
                    <option value="">&nbsp &nbsp &nbsp -Nom de fonction-</option>
                        <?php foreach($fonction as $row):?>
                        <option value="<?=$row->NUMFONCT;?>">&nbsp &nbsp &nbsp<?=$row->NOMFONCT;?></option>
                        <?php endforeach;?>
                        </select><span id="numfonct" class="alert"></span>
                        <a class="user-btn" href="#"><i class="fas fa-toolbox"></i></a>
                </div>
                </div>
            
                
                <div class="form-group">
                <div class="inputWithIcon">
                    <label>Nom d'employé</label>
                    <input type="text" id="NOMEMP" class="form-control" name="NOMEMP" placeholder="Nom Employé" ><span id="nomemp"  class="alert"></span>
                    <a class="user-btn" href="#"><i class="fas fa-user"></i></a>
                </div>
                </div>


                <div class="form-group">
                <div class="inputWithIcon">
                    <label>Prénoms d'employé</label>
                    <input type="text" id="PRENOMEMP" class="form-control" name="PRENOMEMP" placeholder="Prénoms Employé"><span id="prenomemp" class="alert"></span>
                    <a class="user-btn" href="#"><i class="fas fa-user"></i></a>
                </div>
                </div>

                <div class="form-group">
                <div class="inputWithIcon">
                    <label>Contact</label>
                    <input type="text" id="CONTACT" class="form-control" name="CONTACT" placeholder="Contact"><span id="contact" class="alert"></span>
                    <a class="user-btn" href="#"><i class="fas fa-phone"></i></a>
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
                <h5 class="modal-title" id="exampleModalLabel">Modifier Employé</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
          
            <div class="form-group">
                <div class="inputWithIcon">
                    <label>Nom de fonction</label>
                    <select name="NUMFONCT"  class="form-control NUMFONCT">
                   
                        <?php foreach($fonction as $row):?>
                        <option value="<?=$row->NUMFONCT;?>">&nbsp &nbsp &nbsp<?=$row->NOMFONCT;?></option>
                        <?php endforeach;?>
                        </select><span id="Numfonct" class="alert"></span>
                        <a class="user-btn" href="#"><i class="fas fa-toolbox"></i></a>
                </div>
                </div>
            
                
                <div class="form-group">
                <div class="inputWithIcon">
                    <label>Nom d'employé</label>
                    <input type="text"  class="form-control NOMEMP" name="NOMEMP" placeholder="Nom Employé" ><span id="Nomemp"  class="alert"></span>
                    <a class="user-btn" href="#"><i class="fas fa-user"></i></a>
                </div>
                </div>


                <div class="form-group">
                <div class="inputWithIcon">
                    <label>Prénoms d'employé</label>
                    <input type="text" id="PRENOMEMP" class="form-control PRENOMEMP" name="PRENOMEMP" placeholder="Prénoms Employé"><span id="Prenomemp" class="alert"></span>
                    <a class="user-btn" href="#"><i class="fas fa-user"></i></a>
                </div>
                </div>


                <div class="form-group">
                <div class="inputWithIcon">
                    <label>Contact</label>
                    <input type="text"  class="form-control CONTACT" name="CONTACT" placeholder="Contact"><span id="Contact" class="alert"></span>
                    <a class="user-btn" href="#"><i class="fas fa-phone"></i></a>
                </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="NUMEMP" class="NUMEMP">
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
                <h5 class="modal-title" id="exampleModalLabel">Supprimer Employé</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
               <h4>Voulez-vous supprimer cet employé?</h4>
            
            </div>
            <div class="modal-footer">
            <form>
                <input type="hidden" id="NUMEMP" name="EMP">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                <button type="button"  id="btn-delete" class="btn btn-primary">Oui</button>
            </form>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- End Modal Delete Product-->
    
    <?php include_once "footer.php" ?>
    <script src="<?php echo base_url('assets/ajaxEmploye.js'); ?>"></script> 
    

   
</body>
</html>