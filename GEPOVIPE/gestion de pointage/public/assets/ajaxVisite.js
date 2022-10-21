
    $(document).ready(function(){

        
        affiche();
     
        $("#recherche").on('keyup',function(){
            affiche($.trim($(this).val()));
        });


        $('#SERVICE').on('change',function(){

        var SERVICE = $('#SERVICE').val();
        
         $.ajax({
               
                 url:'visite/service/'+SERVICE,
                 type:'GET',
                 dataType:'Json',
                 success:function(data){
                     
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                    html += 
                   '<option value="'+data[i].NUMEMP+'">' +'&nbsp'+' '+'&nbsp'+' '+'&nbsp'+data[i].NOMEMP+' '+data[i].PRENOMEMP +'</option>';
                    }
                    $('#DIRECTION').html(html);
               
                  }
                });
        })
        
        
       
      
        function affiche(para=""){
            $.ajax({
               
                url:'visite/affiche/'+para,
                type:'GET',
                dataType : 'JSON',
                success:function(data){
                  
                  var html = '';
                  var bout ='';
                  var sortie='';
                    var i;
                    for(i=0; i<data.length; i++){
                        if(data[i].HEURESORTV!="00:00:00") {
                            bout="";
                            sortie=data[i].HEURESORTV;
                        }
                        else {
                            sortie='';
                            bout = '<a  id="sortie" href="#" class="btn-md btn-edit alarm" data-id="'+data[i].IDVISITE+'" data-heuresorti="'+data[i].HEURESORTV+'" ><i class="fa fa-sign-out"></i></a>';                         
                        }
                        html += '<tr>'+
                        
                        '<td>'+data[i].NOMVISITEUR+'</td>'+
                        '<td>'+data[i].CIN+'</td>'+
                        '<td>'+(data[i].DATEV).split("-").reverse().join("/")+'</td>'+
                        '<td>'+data[i].HEUREENTV+'</td>'+
                        '<td>'+sortie +' '+bout+'</td>'+
                        '<td>'+data[i].CATFONCT+'</td>'+
                        '<td>'+data[i].NOMEMP+' '+data[i].PRENOMEMP+'</td>'+
                        '<td>'+data[i].OBSERVATION+'</td>'+
                        '</tr>';
                    }

                    $('#showdata').html(html);
                   },
               
 
            });
        }
 
        function accepteApostrophe(ch) {
            ch = ch.replace(/\\/g,"\\\\")
            ch = ch.replace(/\'/g,"\\'")
            ch = ch.replace(/\"/g,"\\\"")
            return ch
            }
        
        //-------------------Save VISITE
        $('#btn_save').on('click',function(){
            var texte = "veuillez remplir le champ s'il vous plait" ;
            var NOMVISITEUR = $('#NOMVISITEUR').val();
            var NUMCIN = $('#NUMCIN').val();   
            var OBSERVATION = $('#OBSERVATION').val();
            var SERVICE = $('#SERVICE').val();
            var NUMEMP = $('#DIRECTION').val();
            var OBSERVATION=accepteApostrophe(OBSERVATION);
          
          
              if (NOMVISITEUR==""){
                  $('#nomvisiteur').html(texte);
                  $('#NOMVISITEUR').addclass("is-invalid");
                  return false;
                }
                if((NOMVISITEUR!="")){
                    $('#nomvisiteur').html("");                 
            }
              
                if(OBSERVATION!=""){
                $('#observation').html("");
               
            } 
                if (SERVICE==""){
                $('#service').html("Veuillez selectionner le service");
                return false;
              }
              if (SERVICE!=""){
                $('#service').html("");
               
              }

              if(!($.isNumeric(NUMCIN)) && NUMCIN!=""){
                  $('#numcin').html('Ce champ ne doit contenir que de chiffre');
                  $('#NUMCIN').addclass("is-invalid");
                  return false;
                }

              if(NUMCIN.length !=12 && NUMCIN!=""){
                    $('#numcin').html('Ce champ ne doit contenir 12 chiffres');
                    $('#NUMCIN').addclass("is-invalid");
                    return false;
                  }

             if(NUMCIN==""){
                    $('#numcin').html("");
                   }

             if(($.isNumeric(NUMCIN)) && (NUMCIN.length=12) && NUMCIN!="" ){
                    $('#numcin').html("");
                   
                }
                
            if(OBSERVATION==""){
                    $('#observation').html(texte);
                    $('#OBSERVATION').addclass("is-invalid");
                    return false;
                }

                else {
            $.ajax({
                type : "POST",
                url  : 'visite/save',
                data : { NOMVISITEUR:NOMVISITEUR, NUMCIN:NUMCIN , OBSERVATION:OBSERVATION, SERVICE:SERVICE, NUMEMP:NUMEMP},
                success: function(){
                    $('[name="NOMVISITEUR"]').val("");
                    $('[name="NUMCIN"]').val(""); 
                    $('[name="SERVICE"]').val("");
                    $('[name="NUMEMP"]').val("");                
                    $('[name="OBSERVATION"]').val("");
                    
                   
                   
                   
                    $('#Modal_Add').modal('hide');
                     affiche();
                     
                },
                error: function(){
                    alert('erreur');}
            });
            return false;
        }
        });
    

// ---------------------------recevoir le donné update date sorti
      $(document).on('click','.btn-edit',function(){
     const id=$(this).data('id');
    const heuresorti=$(this).data('heuresorti');

    $('.IDVISITE').val(id);   
    $('.HEURESORTV').val(heuresorti);

    $('#Modal_Edit').modal('show');
      }) ; 

// -------------sauvegarde de update
$('#btn-update').on('click',function(){
    var IDVISITE=$('.IDVISITE').val();
    var HEURESORTV=$('.HEURESORTV').val();

      $.ajax({
          type:"POST",
          url:'visite/update',
          data:{IDVISITE:IDVISITE,HEURESORTV:HEURESORTV},
          success: function(){
            $('[name="IDVISITE"]').val("");
            $('[name="HEURESORTV"]').val("");
            $('#Modal_Edit').modal('hide');
            affiche();
            
      },
          error: function(){
              alert ('erreur');}
          });
          return false;
      });
    });

        
 

 
   