
    $(document).ready(function(){

       
        affiche();
        $("#recherche").on('keyup',function(){
            affiche($.trim($(this).val()));
        });
          
        function affiche(para=""){
            $.ajax({
                
                
                url:'compte/affiche/'+para,
                type:'GET',
                dataType : 'JSON',
                
                success:function(data){
                   
                  var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                '<td>'+data[i].NOMSEC+'</td>'+
                                '<td>'+data[i].ROLE+'</td>'+
                                '<td>'+data[i].EMAIL+'</td>'+
                                '<td>'+data[i].MDP+'</td>'+
                                '<td >'+
                                    '<a  id="bleu" href="#" class="btn-xm btn-edit fa fa-edit" data-id="'+data[i].NUMSEC+'"  data-nom="'+data[i].NOMSEC+'"  data-email="'+data[i].EMAIL+'" data-mdp="'+data[i].MDP+'" data-mdp1="'+data[i].MDP+'" data-role="'+data[i].ROLE+'"></a>'+' '+
                                    '<a   id="rouge" href="#" class="btn-xm btn-delete fa fa-trash" data-nid="'+data[i].NUMSEC+'"></a>'+
                                '</td>'+
                                '</tr>';
                    }
                    $('#showdata').html(html);
                   
                },
                error: function(){
                 alert('erreur');}
 
            });
        }
        

 
        //get data for update record
        $(document).on('click','.btn-edit',function(){
            var id = $(this).data('id');
            var nom = $(this).data('nom');
            var email= $(this).data('email');
            var role= $(this).data('role');
            var mdp= $(this).data('mdp');
            var mdp1= $(this).data('mdp1');
           
             
            $('.NUMSEC').val(id);
            $('.NOMSEC').val(nom);
            $('.EMAIL').val(email);
            $('.MDP').val(mdp);
            $('.MDP1').val(mdp1);
            $('.ROLE').val(role);
           
            
            
            $('#Modal_Edit').modal('show');
        });
 
        //update record to database
         $('#btn-update').on('click',function(){
            var texte = "Veuillez remplir le champ s'il vous plait";
            var NUMSEC = $.trim($('.NUMSEC').val());
            var NOMSEC = $.trim($('.NOMSEC').val());
            var EMAIL =  $.trim($('.EMAIL').val());
            var MDP =  $.trim($('.MDP').val());
            var MDP1 =  $.trim($('.MDP1').val());
            var ROLE = $.trim($('.ROLE').val());
            
            
            
            if(NOMSEC!=""){
           $('#nomsec').html("");
               
            }
            if(NOMSEC==""){
            $('#nomsec').html(texte);
               return false;
            }
            if(EMAIL!=""){
                $('#email').html("");
                
             }
           if(EMAIL==""){
               $('#email').html(texte);
               return false;
            }
            if(EMAIL.length > 0 && !(EMAIL.match(/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/)))
            {
               $('#email').html('Adresse email incorrecte');
               return false;
           }
            else if(email.length <= 30 ){
                $('#email').html("");
               
          }
          if(ROLE== "")
                  {
                       $('#role').html(texte);
                     return false;
                  }
         else if(ROLE !="" ){
                    $('#role').html("");
                   
              }

              if(MDP1==MDP)
        {
            $('#mdp1').html("");
                 
        }
        if(MDP== "")
              {
                   $('#mdp').html(texte);
                 return false;
              }
        if(MDP!= "")
              {
                   $('#mdp').html("");
                 
              } 

       if(MDP1== "")
              {
                   $('#mdp1').html(texte);
                 return false;
              }     
        else if(MDP1!= "")
              {
                   $('#mdp1').html("");
                 
              } 
        if(MDP1!=MDP)
        {
            $('#mdp1').html("La confirmation de passe doit être conforme au précédent");
                 return false;
        }
        
        
              else{
                  
            $.ajax({
                type : "POST",
                url  : 'compte/update',
               
                data : {NUMSEC:NUMSEC ,NOMSEC:NOMSEC ,EMAIL:EMAIL , MDP:MDP, ROLE:ROLE},
                success: function(){
                    $('[name="NUMSEC"]').val("");
                    $('[name="NOMSEC"]').val("");
                    $('[name="EMAIL"]').val("");
                    $('[name="MDP"]').val("");
                    $('[name="ROLE"]').val("");
                    
                    $('#Modal_Edit').modal('hide');
                     
                    affiche();
                  
                },
                error: function(){
                   alert('erreur');}
            });
            return false;
        }
        });
 
        //get data for delete record
        $(document).on('click','.btn-delete',function(){
            // get data from button edit
            var id = $(this).attr('data-nid');

            // Set data to Form Edit
            $('#NUMSEC').val(id);
            // Call Modal Edit
            $('#deleteModal').modal('show');
        });
        
        //delete record to database
         $('#btn-delete').on('click',function(){
            var COMPTE = $('#NUMSEC').val();
            $.ajax({
                type : "POST",
                url  : 'compte/delete/',
                data : {COMPTE:COMPTE},
                success: function(){
                    $('#deleteModal').modal('hide');
                    affiche();
                }
            });
            return false;
        });
 
    });
 
