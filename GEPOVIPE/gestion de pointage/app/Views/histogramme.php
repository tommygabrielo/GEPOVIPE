<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once "header.php" ?>
</head>
<body>

<section class="col-lg-12"  id="tab" >
    <div class="container-lg"style="background-color:white;margin-top:-70px;">
    <hr style="background-color:#106eea; height:2px;">
    <h3 style="text-align:center;font-family: Bahnschrift;margin-top:-5px;margin-bottom:-10px;">HISTOGRAMME</h3><hr style="background-color:#106eea; height:2px;">
    <div style="display:flex">
    
    </div>
  
   
    <div  class="col-sm-12 text-center">
    <div class="col-lg-12" >
      <div id="chart" ></div>
    </div>
     
     
    </div>
    </section>
    <?php include_once "footer.php" ?>
     <script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/morris.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/raphael-min.js');?>"></script>
  <script>
  var serries = JSON.parse('<?php echo $chart_data; ?>');
  console.log(serries);
  var data = serries,
    config = {
      data: data,
      xkey: 'y',
      ykeys: ['nombre'],
      labels: ['Nombre des employés'],
      fillOpacity: 0.6,
      hideHover: 'auto',
      behaveLikeLine: true,
      resize: true,
      pointFillColors:['#ffffff'],
      pointStrokeColors: ['black'],
      lineColors:['gray','red']
  };
 
 config.element = 'chart';
 Morris.Bar(config);
 
 
</script>
</body>