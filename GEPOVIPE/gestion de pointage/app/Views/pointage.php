<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once "header.php" ?>
</head>
<body>




<section class="col-lg-12"  id="tab" >

    <div class="container-lg"style="background-color:white;margin-top:-70px;">
    <hr style="background-color:#106eea; height:2px;">
    <h3 style="text-align:center;font-family: Bahnschrift;margin-top:-5px;margin-bottom:-10px;">POINTAGE DU PERSONNEL</h3><hr style="background-color:#106eea; height:2px;">
    <div style="display:flex">
    <div  class="col-auto mr-auto">
      

<!-- <div  class="col-auto mr-auto"><form action="/pointage/save"><button id="actualiser"  type="submit" class="btn btn-primary mb-3" data-toggle="modal" data-target="#Modal_Add"><i class="fas  fa-fw fa-refresh" > </i>Actualiser</button></form></div> -->

</div>


    <div class="col-auto" > <input type="text" id="recherche" class="form-control"  placeholder="Recherche" style="width:250px;"><i  id="search" class="fas fa-search"></i></div>
    </div>
   
    
    <div class="table-responsive-xl col-auto mr-auto" >
        <table  id="tableData" class="table table-sm table-bordered table-striped">
        
            <thead>
                <tr>
                <th>N°</th>
                <th>Nom et Prénoms</th>
                <th>Nom de fonction</th>
                <th>Entrée matin </th>
                <th>Sortie matin </th>
                <th>Entrée soir </th>
                <th>Sortie soir</th>
                <th>Observation</th>
                </tr>
            </thead>
            <tbody id="showdata">
           
            </tbody>
        </table>
        </div>
        
</section>
<form  method="post" >
        <div class="modal fade" id="heureMaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Heure d'entrée matin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
               <h4>Voulez-vous confirmer?</h4>
              
  <input type="hidden" id="HEUREENTMA"  class="HEUREENTMA" type="time" name="HEUREENTMA" step="2">
            </div>
            <div class="modal-footer">
                <input type="hidden" id="IDPOINTAGE" name="IDPOINTAGE" class="IDPOINTAGE">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                <button type="button"  id="btn-arriv" class="btn btn-primary"  >Oui</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- End Modal Delete Product-->
    


    <!-- Modal Add Product-->
    <form  method="post" >
        <div class="modal fade" id="sortma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Heure de sortie matin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
               <h4>Voulez-vous confirmer?</h4>
              
  <input type="hidden" id="HEURESORTMA"  class="HEURESORTMA" type="time" name="HEURESORTMA" step="2">
            </div>
            <div class="modal-footer">
                <input type="hidden" id="IDPOINTAGE" name="IDPOINTAGE" class="IDPOINTAGE">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                <button type="button"  id="btn-sort1" class="btn btn-primary"  >Oui</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- End Modal Delete Product-->



     <!-- Modal Add Product-->
     <form  method="post" >
        <div class="modal fade" id="entso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Heure d'entrée soir</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
               <h4>Voulez-vous confirmer?</h4>
              
  <input type="hidden" id="HEUREENTSO"  class="HEUREENTSO" type="time" name="HEUREENTSO" step="2">
            </div>
            <div class="modal-footer">
                <input type="hidden" id="IDPOINTAGE" name="IDPOINTAGE" class="IDPOINTAGE">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                <button type="button"  id="btn-ent1" class="btn btn-primary"  >Oui</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- End Modal Delete Product-->


    <!-- Modal Add Product-->
    <form  method="post" >
        <div class="modal fade" id="sortso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Heure de sortie soir</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
               <h4>Voulez-vous confirmer?</h4>
              
  <input type="hidden" id="HEURESORTSO"  class="HEURESORTSO" type="time" name="HEURESORTSO" step="2">
            </div>
            <div class="modal-footer">
                <input type="hidden" id="IDPOINTAGE" name="IDPOINTAGE" class="IDPOINTAGE">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                <button type="button"  id="btn-sort2" class="btn btn-primary"  >Oui</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- End Modal Delete Product-->



    <!-- Modal Add Product-->
    <form  method="post" >
        <div class="modal fade" id="obsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajout d'observation </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
               <div class="form-group">
                    <label>Observation</label>
                    <input type="text" id="OBSERVATION1" class="form-control" name="OBSERVATION1" placeholder="Observation">
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="IDPOINTAGE" name="IDPOINTAGE" class="IDPOINTAGE">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                <button type="button"  id="btn-obs" class="btn btn-primary"  >Oui</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- End Modal Delete Product-->
    
    <?php include_once "footer.php" ?>
    
    <script src="<?php echo base_url('assets/ajaxPointage.js'); ?>"></script> 
    
    
</body>
</html>