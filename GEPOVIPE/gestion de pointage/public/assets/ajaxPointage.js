
    $(document).ready(function(){
        
        
       
       
        affiche(); //call function show all product
        
        $("#recherche").on('keyup',function(){
            affiche($.trim($(this).val()));
        });
       
          //function show all product
        function affiche(para=""){
            $.ajax({
                
                url:'pointage/affiche/'+para,
                type:'GET',
                dataType : 'JSON',
                success:function(data){ 
                    //alert(data.length);
                   
                  var html = '';
                    var i;
                    var btnma1;
                    var entma;
                    var btnma2;
                    var sortma;
                    var btnso1;
                    var entso;
                    var btnso2;
                    var sortso;
                    var btnob;
                    var obs;
                   
                    for(i=0; i<data.length; i++){
                        
                        if(data[i].HEUREENTMA!="00:00:00"){
                            btnma1="";
                            entma=data[i].HEUREENTMA;
                        }else{
                            entma="";
                            btnma1='<a id="entre" href="#" type="button" class=" btn-md btn-arriv"  data-id="'+data[i].IDPOINTAGE+'" data-heure="'+data[i].HEUREENTMA+'" ><i class="fa fa-sign-in"></i></a>';

                        }
                        if(data[i].HEURESORTMA!="00:00:00"){
                            btnma2="";
                            sortma=data[i].HEURESORTMA;
                        }else{
                            sortma="";
                            btnma2='<a id="sortie" href="#" type="button" class=" btn-md btn-sort1 fa fa-succes" data-id="'+data[i].IDPOINTAGE+'"  data-heure="'+data[i].HEURESORTMA+'"><i class="fa fa-sign-out"></i></a>';
                        }
                        if(data[i].HEUREENTSO!="00:00:00"){
                            btnso1="";
                            entso=data[i].HEUREENTSO;
                        }else{
                            entso="";
                            btnso1='<a  id="entre" href="#" type="button" class="btn-md btn-ent1 fa fa-succes"  data-id="'+data[i].IDPOINTAGE+'" data-heure="'+data[i].HEUREENTSO+'"><i class="fa fa-sign-in"></i></a>';
                        }
                        if(data[i].HEURESORTSO!="00:00:00"){
                            btnso2='';
                            sortso=data[i].HEURESORTSO;
                        }else{
                            sortso='';
                            btnso2='<a  id="sortie" href="#" type="button" class="btn-md btn-sort2 fa fa-succes" data-id="'+data[i].IDPOINTAGE+'" data-heure="'+data[i].HEURESORTSO+'"><i class="fa fa-sign-out"></i></a>';
                        }
                        if (data[i].OBSERVATION1!="") {
                            btnob="";
                            obs=data[i].OBSERVATION1;
                        }else{
                            obs="";
                           btnob= '<a  id="obs" href="#" type="button" class="btn-md btn-obs " data-id="'+data[i].IDPOINTAGE+'" data-obs="'+data[i].OBSERVATION1+'"><i class="fa fa-eye-dropper"></i></a>';
                        }

                        html += '<tr>'+
                        '<td>'+data[i].NUMEMP+'</td>'+
                                '<td>'+data[i].NOMEMP.toUpperCase()+' '+data[i].PRENOMEMP+'</td>'+
                                '<td>'+data[i].NOMFONCT+'</td>'+
                                '<td >'+entma+' '+
                                btnma1+
                                '</td>'+
                                '<td >'+sortma+' '+btnma2
                                +
                                '</td>'+
                                '<td >'+entso+' '+btnso1
                                +
                                '</td>'+
                                '<td >'+sortso+' '+btnso2
                                +
                                '</td>'+
                                '<td>'+obs+' '+btnob
                               +
                                '</td>'+
                                '</tr>';
                    }
                    $('#showdata').html(html);
                   
                },
                //error: function(){
                   // alert('erreur');}
 
            });
        }
        
        //get data for update record
        $(document).on('click','.btn-arriv',function(){
            var id = $(this).attr('data-id');
            var heure = $(this).attr('data-heure');

            $('#IDPOINTAGE').val(id);
            $('#HEUREENTMA').val(heure);
            $('#heureMaModal').modal('show');
        });
        //update record to database
         $('#btn-arriv').on('click',function(){
            var IDPOINTAGE = $('#IDPOINTAGE').val();
            var HEUREENTMA = $('#HEUREENTMA').val();
            
            $.ajax({
                type : "POST",
                url  : 'pointage/update/',
               
                data : {IDPOINTAGE:IDPOINTAGE,HEUREENTMA:HEUREENTMA},
                success: function(){
                    $('[name="IDPOINTAGE"]').val("");
                    $('[name="HEUREENTMA"]').val("");
                    $('#heureMaModal').modal('hide');
                     affiche();
                    
                },
                error: function(){
                    alert('erreur');}
            });
            return false;
        });
       
        $(document).on('click','.btn-sort1',function(){
            var id = $(this).attr('data-id');
            var heure = $(this).attr('data-heure');

            $('#IDPOINTAGE').val(id);
            $('#HEURESORTMA').val(heure);
            $('#sortma').modal('show');
        });

        //update record to database
         $('#btn-sort1').on('click',function(){
            var IDPOINTAGE = $('#IDPOINTAGE').val();
            var HEURESORTMA = $('#HEURESORTMA').val();
            
            $.ajax({
                type : "POST",
                url  : 'pointage/update1/',
               
                data : {IDPOINTAGE:IDPOINTAGE,HEURESORTMA:HEURESORTMA},
                success: function(){
                    $('[name="IDPOINTAGE"]').val("");
                    $('[name="HEURESORTMA"]').val("");
                    $('#sortma').modal('hide');
                     
                    affiche();
                   
                },
                error: function(){
                    alert('erreur');}
            });
            return false;
        });
       
        $(document).on('click','.btn-ent1',function(){
            var id = $(this).attr('data-id');
            var heure = $(this).attr('data-heure');

            $('#IDPOINTAGE').val(id);
            $('#HEUREENTSO').val(heure);
            $('#entso').modal('show');
        });
        
        //modif heure entree
         $('#btn-ent1').on('click',function(){
            var IDPOINTAGE = $('#IDPOINTAGE').val();
            var HEUREENTSO = $('#HEUREENTSO').val();
            
            $.ajax({
                type : "POST",
                url  : 'pointage/update2/',
               
                data : {IDPOINTAGE:IDPOINTAGE,HEUREENTSO:HEUREENTSO},
                success: function(){
                    $('[name="IDPOINTAGE"]').val("");
                    $('[name="HEUREENTSO"]').val("");
                    $('#entso').modal('hide');
                     affiche();
                    
                },
                error: function(){
                    alert('erreur');}
            });
            return false;
        });
       

        $(document).on('click','.btn-sort2',function(){
            var id = $(this).attr('data-id');
            var heure = $(this).attr('data-heure');

            $('#IDPOINTAGE').val(id);
            $('#HEURESORTSO').val(heure);
            $('#sortso').modal('show');
        });

        //modif heure sortie
         $('#btn-sort2').on('click',function(){
            var IDPOINTAGE = $('#IDPOINTAGE').val();
            var HEURESORTSO = $('#HEURESORTSO').val();
            
            $.ajax({
                type : "POST",
                url  : 'pointage/update3/',
               
                data : {IDPOINTAGE:IDPOINTAGE,HEURESORTSO:HEURESORTSO},
                success: function(){
                    $('[name="IDPOINTAGE"]').val("");
                    $('[name="HEURESORTSO"]').val("");
                    $('#sortso').modal('hide');
                     
                    affiche();
                    
                },
                error: function(){
                    alert('erreur');}
            });
            return false;
        });

        
        $(document).on('click','.btn-obs',function(){
            var id = $(this).attr('data-id');
            var obs = $(this).attr('data-obs');

            $('#IDPOINTAGE').val(id);
            $('#OBSERVATION1').val(obs);
            $('#obsModal').modal('show');
        });


        //modif observation
         $('#btn-obs').on('click',function(){
            var IDPOINTAGE = $('#IDPOINTAGE').val();
            var OBSERVATION1 = $('#OBSERVATION1').val();
            
            $.ajax({
                type : "POST",
                url  : 'pointage/update4/',
               
                data : {IDPOINTAGE:IDPOINTAGE,OBSERVATION1:OBSERVATION1},
                success: function(){
                    $('[name="IDPOINTAGE"]').val("");
                    $('[name="OBSERVATION1"]').val("");
                    $('#obsModal').modal('hide');
                     
                    affiche();
                    
                },
                error: function(){
                    alert('erreur');}
            });
            return false;
        });
       

       
});
 
