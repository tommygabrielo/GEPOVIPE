<!DOCTYPE html>
<html lang="en">
<head>
    <title>Gestionpointage</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="<?php echo base_url('assets/vendor/fontawesome-free1/css/all.css'); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/vendor/font-awesome/css/font-awesome.css'); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/vendor/aos/aos.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/vendor/bootstrap-icons/bootstrap-icons.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/vendor/boxicons/css/boxicons.min.css'); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/styl.css');?>">
    <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">
</head>
  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
      <div id="time">
      <?php
  // setlocale(LC_TIME, 'fr_FR.UTF8');
 //setlocale(LC_TIME, 'mg_MG');
//setlocale(LC_TIME, 'MG');
setlocale(LC_TIME, 'FR_FR');
 
//echo strftime('%Y-%m-%d %H:%M:%S');  // 2012-10-11 16:03:04
//echo strftime('%A %d %B %Y, %H:%M'); // jeudi 11 octobre 2012, 16:03
echo strftime('%A %d %B %Y');           // 11 octobre 2012
//echo strftime('%d/%m/%y');           // 11/10/12
?></div>
    </div>
      <div class="social-links d-none d-md-flex align-items-center">
        <a  href="<?php echo base_url('/login/logout'); ?>" class="btn nav-link" type="button">
            <i class="fa fa-sign-out"></i>Se déconnecter</a>
      </div>
    </div>
    
  </section>

  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">
    <img class="logo" src="<?php echo base_url('assets/imgs/logo1.jpg'); ?>" style=" padding-left:-50px;width:200px;height:70px">  
     
    
      <nav id="navbar" class="navbar">
        <ul>
          <li><a  id="nav" class="nav-link scrollto" href="<?php echo base_url('/home'); ?>"><i class="fa fa-fw fa-home"></i>Accueil</a></li>
          <li <?php if (session()->get('ROLE')!='admin') {echo "hidden='true'";} ?>> <a href="<?php echo base_url('/fonction'); ?>"><i class="fa fa-fw fa-gear"> </i>Fonction</a></li> 
          <li <?php if (session()->get('ROLE')!='admin') {echo "hidden='true'";} ?>><a  href="<?php echo base_url('/employe'); ?>"><i class="fas  fa-fw fa-id-card" > </i> Employés</a></li>
          <li><a class="nav-link scrollto"  href="<?php echo base_url('/pointage'); ?>"><i class="fas fa-fw fa-clipboard-list"> </i>Pointage</a></li>
          <li><a class="nav-link scrollto"  href="<?php echo base_url('/visite'); ?>"><i class="fa fa-fw fa-calendar-check"> </i>Visite</a></li>
          <li <?php if (session()->get('ROLE')!='admin') {echo "hidden='true'";} ?>class="dropdown"><a href="#"><i class="fas  fa-fw fa-chart-bar" ></i><span>Etats</span> <i class="fa fa-chevron-down"></i></a>
            <ul>
              <li class="dropdown"><a href="#"> <span>PERSONNEL</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#" data-toggle="modal" data-target="#Modal_heure">Heure supplementaire de travail</a></li>
                  <li><a href="#"  data-toggle="modal" data-target="#Modal_total">Jour de travail par mois </a></li>
                </ul>
              </li>
              <li class="dropdown"><a href="#"> <span>VISITEUR</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#" data-toggle="modal" data-target="#Modal_bilan_visite">Liste de visiteurs entre 2 dates</a></li>      
                 </ul>
              </li>
              <li ><a href="/compte"> <span>PROFIL</span></a>
               
              </li>
              
            </ul>
          </li>
         
         
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <img class="logo" src="<?php echo base_url('assets/imgs/gepovipe.jpg'); ?>" style=" padding-left:-50px;width:80px;height:70px;">  
    </div>
  </header><!-- End Header -->

  <!-- BILAN VISITE -->
  <form action="/bilan"  method="post">  
        <div class="modal fade" id="Modal_bilan_visite" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sélectionner deux dates</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

 
            <div class="modal-body">
            
                <div class="form-group">
                    <label>Date 1</label>
                      <div class="inputWithIcon">
                    <input type="date" id="DATE1" class="form-control col-sm-4" name="DATE1" required>
                    <span id="date1"  class="alert"></span>                 
                     </div>
                </div>


                <div class="form-group">
                    <label>Date 2</label>
                      <div class="inputWithIcon">
                    <input type="date" id="DATE2" class="form-control col-sm-4" name="DATE2" required>
                    <span id="date2"  class="alert"></span>                 
                     </div>
                </div>              
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button type="submit"  class="btn btn-primary" >OK</button>
            </div>
            </div>
          </div>
        </div>
        <span id="error_message" class="text-danger"></span>
        <span id="success_message" class="text-success"></span>
  </form> 

<!-----MODAL HEURE------>
<form action="/heure" method="post">
    <div class="modal fade" id="Modal_heure" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sélectionner le mois, l'année et l'employé</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
              <div class="modal-body">
                <div  style="display:flex;">
                <div class="form-group">
                    <label>Mois</label>
                      <select name="DATE"  id="DATE" class="form-control" required>
                      <option value="">Mois</option>
                  <?php  
                   $db = \Config\Database::connect();
                $query = $db->query("SELECT distinct month(DATEPOINTAGE) as DAT FROM pointage  ");
                 foreach ($query->getResult() as $row):?>
                  <option value="<?=$row->DAT;?>"><?=$row->DAT;?></option>
                  <?php endforeach;?>
                </select>
                </div>
                <div class="form-group">
                <label>Année</label>
                      <select name="AN"  id="DATE" class="form-control" required>
                      <option value="">Année</option>
                  <?php  
                   $db = \Config\Database::connect();
                $query = $db->query("SELECT distinct year(DATEPOINTAGE) as AN FROM pointage  ");
                 foreach ($query->getResult() as $row):?>
                  <option value="<?=$row->AN;?>"><?=$row->AN;?></option>
                  <?php endforeach;?>
                </select>
                </div>
                </div>
          
                <div class="form-group">
                    <label>Nom d'employé</label>
                    <select name="NOM"  id="NOM" class="form-control" required>
                    <option value="">Nom et prénoms</option>
                        <?php  
                         $db = \Config\Database::connect();
                      $query = $db->query('SELECT * FROM employe');
                       foreach ($query->getResult() as $row):?>
                        <option value="<?=$row->NUMEMP;?>"><?=$row->NUMEMP;?>-<?=$row->NOMEMP;?> <?=$row->PRENOMEMP;?></option>
                        <?php endforeach;?>
                        </select>
                </div>              
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button type="submit"  class="btn btn-primary" >Valider</button>
            </div>
            </div>
          </div>
        </div>
      </form> 


      <!-----MODAL TOTAL HEURE------>
<form action="/total" method="post">
    <div class="modal fade" id="Modal_total" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sélectionner le mois et l'année</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
              <div class="modal-body">
              <div  style="display:flex;">
                <div class="form-group">
                    <label>Mois</label>
                      <select name="DATE"  id="DATE" class="form-control" required>
                      <option value="">Mois</option>
                  <?php  
                   $db = \Config\Database::connect();
                $query = $db->query("SELECT distinct month(DATEPOINTAGE) as DAT FROM pointage  ");
                 foreach ($query->getResult() as $row):?>
                  <option value="<?=$row->DAT;?>"><?=$row->DAT;?></option>
                  <?php endforeach;?>
                </select>
                </div>
                <div class="form-group">
                <label>Année</label>
                      <select name="AN"  id="DATE" class="form-control" required>
                      <option value="">Année</option>
                  <?php  
                   $db = \Config\Database::connect();
                $query = $db->query("SELECT distinct year(DATEPOINTAGE) as AN FROM pointage  ");
                 foreach ($query->getResult() as $row):?>
                  <option value="<?=$row->AN;?>"><?=$row->AN;?></option>
                  <?php endforeach;?>
                </select>
                </div>
                </div>
          
          
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button type="submit"  class="btn btn-primary" >Valider</button>
            </div>
            </div>
          </div>
        </div>
      </form> 