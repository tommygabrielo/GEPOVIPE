<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once "header.php" ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.css');?>">
</head>
<body>

<section class="col-lg-12"  id="tab" >
    <div class="container-lg"style="background-color:white;margin-top:-70px;">
    <hr style="background-color:#106eea; height:2px;">
    <h3 style="text-align:center;margin-top:-5px; margin-bottom:-10px;">LISTE DE VISITEURS ENTRE DEUX DATES</h3>
    <hr style="background-color:#106eea; height:2px; ">
   
    <div style="display:flex;">
          <div  class="col-auto mr-auto alert-success " style="margin-bottom:20px; border-radius:40px; margin-left:15px;">
    <?php  
                    $db = \Config\Database::connect();
                    $date1 = $_POST['DATE1'];
                    $date2 = $_POST['DATE2']; 
                    $query=$db->query("SELECT count(IDVISITE) as nombre from visite  WHERE DATEV BETWEEN '$date1' AND '$date2'  ");
                    $row = $query->getRow();

                if (isset($row) && $row->nombre!= 0 && $row->nombre!= 1 )
                {   echo 'Nombres de visiteurs: '.' ' .$row->nombre.' '. ' entre'.' '.$date1.' '.'et'.' '.$date2 ;  } 
               
                if ($row->nombre== 0)
               { echo ' Aucun visiteur entre ces dates';} 
               

                if ($row->nombre== 1)
               { echo 'Nombres de visiteurs: '.' entre'.' '.$date1.' '.'et'.' '.$date2;} 
               ?> </div>
    <div  class="col-auto">
        <?php
         $date1=$_POST['DATE1'];
         $date2= $_POST['DATE2']; ?>
         <form action="/Bilan/excel" method="POST"><input type="hidden" value="<?=$date1;?>"  name="DATE1" > 
         <input  type="hidden" value="<?=$date2;?>" name="DATE2">
         <button type="submit" id="pdf"  class="btn-xm"><i class="fa fa-file-excel-o btn-xm"></i> Excel</button></form></div>
   
  
           
    </div>
    
  
    <div class="table-responsive col-auto mr-auto" >
        <table class="table table-sm table-bordered table-striped" id="dataTable">
            <thead>
                <tr>                                      
                    <th>Nom de visiteur</th>
                    <th>Date de visite</th>
                    <th>Service</th>
                    <th>Destination</th>
                    <th>Observation</th>
                </tr>
            </thead>
            <tbody >
            <?php foreach($bilan as $row):?>
            <tr>
            
            <td><?= $row->NOMVISITEUR;?></td>
            <td><?= $row->DATEV;?></td>
            <td><?= $row->CATFONCT;?></td>
            <td><?= $row->NOMEMP;?> <?= $row->PRENOMEMP;?></td>
            <td><?= $row->OBSERVATION;?></td>
            
           <?php endforeach;?>
            </tbody>
        </table>
    </div>
  
</section>

<?php include_once "footer.php" ?>
<script src="<?php echo base_url('assets/vendor/datatables/datatables-demo.js');?>"></script>
</body>
</html>