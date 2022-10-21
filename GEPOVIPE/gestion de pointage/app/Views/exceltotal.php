<?php 
header("Content-Type:application/vnd.ms-excel");
header("Content-Disposition:attachment; filename=Bilanheure.xls");
?>  
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Excel</title>
  
  <style>
    table th {
          background: #0c1c60 !important;
          color: #fff !important;
          border: 1px solid #ddd !important;
          line-height:15px!important;
          text-align:center!important;
          vertical-align:middle!important;

      }
      table td{line-height:15px!important; text-align:center!important;  border: 1px solid #ddd !important;}
  </style>

</head>
<body>
<img style="width:150px;height:60px;" class="logo" src="<?php echo base_url('assets/imgs/logokely.jpg'); ?>"> 
<br>
<br> 
<br>
<div class="container">
        <h2 class="text-center mt-4 mb-4">HEURE DE TRAVAIL DU PERSONNEL</h2>
        <div >
       <?php  
                  
                   $mois=$_POST['DATE'];
                   $an=$_POST['AN'];
                if ($mois==1)
                {
                    echo "<span> Nombre de jour durant le mois de Janvier $an </span>";  
                } 
                if ($mois==2)
                {
                    echo "<span> Nombre de jour durant le mois de Février $an </span>";  
                } 
                if ($mois==3)
                {
                    echo "<span> Nombre de jour durant le mois de Mars $an </span>";  
                } 
                if ($mois==4)
                {
                    echo "<span> Nombre total d'heure durant le mois de Avril $an </span>";  
                } 
                if ($mois==5)
                {
                    echo "<span> Nombre de jour durant le mois de Mai $an </span>";  
                } 
                if ($mois==6)
                {
                    echo "<span> Nombre total d'heure durant le mois de Juin $an </span>";  
                } 
                if ($mois==7)
                {
                    echo "<span> Nombre de jour durant le mois de Juillet $an </span>";  
                } 
                if ($mois==8)
                {
                    echo "<span> Nombre de jour durant le mois d'Août $an </span>";  
                } 
                if ($mois==9)
                {
                    echo "<span> Nombre de jour durant le mois de Septembre $an </span>";  
                } 
                if ($mois==10)
                {
                    echo "<span> Nombre de jour durant le mois d'Octobre $an </span>";  
                } 
                if ($mois==11)
                {
                    echo "<span> Nombre de jour durant le mois de Novembre $an </span>";  
                } 
                if ($mois==12)
                {
                    echo "<span> Nombre de jour durant le mois de Décembre $an </span>";  
                } 
    ?>  
    </div>
    <br>
    <br>
    <div class="table-responsive col-auto mr-auto" >
        <table class="table table-sm table-bordered table-striped">
            <thead>
                <tr>       
                     <th>Nom et prénoms</th>
                     <th>Fonction</th>
                    <th>Nombres de jour</th>
                   <th>Observation</th>
                </tr>
            </thead>
            <tbody >
             
            <?php foreach($total as $row):?>
           
            <tr>

            <td><?= $row->nom;?> <?= $row->prenom;?></td>
            <td><?= $row->fonction;?></td>
            <td><?= $row->nbj;?></td>
            <td><?= $row->OBSERVATION1;?></td>
                        <?php endforeach;?>
                        </tr>
            </tbody>
        </table>
    </div>
      
</section>
</body>
</html>
