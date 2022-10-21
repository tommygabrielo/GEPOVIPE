<meta charset="utf-8">
<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachement; filename=bilan.xls");

?>
<html>
<body>
<head>
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
<img style="width:150px;height:60px;" class="logo" src="<?php echo base_url('assets/imgs/logokely.jpg'); ?>"> 
<br>
<br> 
<br>
<h3>LISTE DE VISITEURS ENTRE DEUX DATES</h3>
<br>
<div>
<?php  
                    $db = \Config\Database::connect();
                    $date1 = $_POST['DATE1'];
                    $date2 = $_POST['DATE2']; 
                    $query=$db->query("SELECT count(IDVISITE) as nombre from visite  WHERE DATEV BETWEEN '$date1' AND '$date2'  ");
                    $row = $query->getRow();

                if (isset($row) && $row->nombre!= 0 && $row->nombre!= 1 )
                {   echo 'Nous avons'.' ' .$row->nombre.' '. 'visiteurs entre'.' '.$date1.' '.'et'.' '.$date2 ;  } 
               
                if ($row->nombre== 0)
               { echo 'Nous avons aucun visiteur entre ces dates';} 
               

                if ($row->nombre== 1)
               { echo 'Nous avons un visiteur entre '.' '.$date1.' '.'et'.' '.$date2;} 
               ?> 
</div>
<br>
<br>
<table class="table table-sm table-bordered table-striped">
<thead>
                <tr>                                      
                    <th>Nom de visiteur</th>
                    <th>Date de visite</th>
                    <th>Direction</th>
                    <th>Observation</th>
                </tr>
            </thead>
            <tbody >
            <?php foreach($excel as $row):?>
            <tr>
            
            <td><?= $row->NOMVISITEUR;?></td>
            <td><?= $row->DATEV;?></td>
            <td><?= $row->CATFONCT;?></td>
            <td><?= $row->NOMEMP;?> <?= $row->PRENOMEMP;?></td>
            <td><?= $row->OBSERVATION;?></td>
            
           <?php endforeach;?>
            </tbody>
        </table>
</body>

</html>

   