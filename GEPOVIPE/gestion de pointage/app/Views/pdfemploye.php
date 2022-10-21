<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>pdf</title>
  
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
  <div class="container mt-5">

    <h2 style="text-align:center;">LISTE DES EMPLOYES</h2>

   
    <div class="table-responsive col-auto mr-auto" >
    <table class="table table-striped">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Nom et Prénoms</th>
                    <th>Fonctions</th>
                    <th>Contact</th>
                   
                </tr>
            </thead>
            <tbody >
            <?php foreach($employe as $row):?>
                <tr>
                    <td><?= $row->NUMEMP;?></td>
                    <td><?= $row->NOMEMP;?> <?= $row->PRENOMEMP;?></td>
                    <td><?= $row->NOMFONCT;?></td>
                    <td><?= $row->CONTACT;?></td>
                    
                    
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
  </div>
  </div>
 
</body>

</html>