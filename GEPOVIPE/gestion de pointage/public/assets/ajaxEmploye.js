
    $(document).ready(function(){

       
        affiche(); //call function show all product
        $("#recherche").on('keyup',function(){
            affiche($.trim($(this).val()));
        });
          //function show all product
        function affiche(para=""){
            $.ajax({
                url:'employe/affiche/'+para,
                type:'GET',
                dataType : 'JSON',
                
                success:function(data){
                    //alert(data.length);
                  var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                '<td>'+data[i].NUMEMP+'</td>'+
                                '<td>'+data[i].NOMEMP.toUpperCase()+' '+data[i].PRENOMEMP+'</td>'+
                                '<td>'+data[i].NOMFONCT+'</td>'+
                                '<td>'+data[i].CONTACT+'</td>'+
                                '<td >'+
                                    '<a  id="bleu" href="#" class="btn-xm btn-edit fa fa-edit" data-id="'+data[i].NUMEMP+'"  data-num="'+data[i].NUMFONCT+'"  data-nom="'+data[i].NOMEMP+'" data-prenom="'+data[i].PRENOMEMP+'" data-cont="'+data[i].CONTACT+'"></a>'+' '+
                                    '<a   id="rouge" href="#" class="btn-xm btn-delete fa fa-trash" data-nid="'+data[i].NUMEMP+'"></a>'+
                                '</td>'+
                                '</tr>';
                    }
                    $('#showdata').html(html);
                   // $('#mydata').DataTable();
                },
                //error: function(){
                   // alert('erreur');}
 
            });
        }
        function accepteApostrophe(ch) {
            ch = ch.replace(/\\/g,"\\\\")
            ch = ch.replace(/\'/g,"\\'")
            ch = ch.replace(/\"/g,"\\\"")
            return ch
            }
        
        //Save employé
        $('#btn_save').on('click',function(){
            var texte = "Veuillez remplir le champ s'il vous plait";
            var NUMEMP = $.trim($('#NUMEMP').val());
            var NUMFONCT = $.trim($('#NUMFONCT').val());
            var NOMEMP =  $.trim($('#NOMEMP').val());
            var PRENOMEMP = $.trim($('#PRENOMEMP').val());
            var CONTACT = $.trim($('#CONTACT').val());
            var NOMEMP=accepteApostrophe(NOMEMP);
            var PRENOMEMP=accepteApostrophe(PRENOMEMP);
            //var matricule = $.trim($('#matric').val());
            //var nom = $.trim($('#no').val());
           
           if(NUMEMP==""){
            $('#numemp').html("Remplir le champ avec de chiffre different de l'éxistant");
            return false;
        }
       else if(NUMEMP!=""){
            $('#numemp').html("");
           
        }
        
       if(!($.isNumeric(NUMEMP)))
        {
            $('#numemp').html('Ce champ ne doit contenir que de chiffre');
            return false;
        }

        if(NUMFONCT==""){
            $('#numfonct').html('Selectionnez le nom de fonction');
           
            return false;
        }
       else if(NUMFONCT!=""){
            $('#numfonct').html("");
            
        }
        
        if(NOMEMP==""){
            $('#nomemp').html(texte);
           return false;
        }
         else if(NOMEMP!=""){
            $('#nomemp').html("");
           
        }

        if(PRENOMEMP==""){
            $('#prenomemp').html(texte);
           return false;
        }
       else if(PRENOMEMP!=""){
            $('#prenomemp').html("");
           
        }
        
            /*if(matricule == "" || !(matricule.match(/^\d{0,4}\/\d{0,2}$/)) )
            {
                $('#matriculeHelp').html(texte+' '+'avec le format requis');
                $('#matric').addClass("is-invalid");
                return false;
            }*/
           /* if(nom == "")
            {
                $('#nomHelp').html(texte);
                $('#no').addClass("is-invalid");
                return false;
            }
            if(email.length > 0 && !(email.match(/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/)))
            {
                $('#emailHelp').html('Adresse email non correcte');
                $('#mail').addClass("is-invalid");
                return false;
            }*/
            if(CONTACT == "")
            {
                $('#contact').html(texte);
               return false;
            }
            if(!(CONTACT == ""))
            {
                $('#contact').html("");
               
            }
            
            if(!($.isNumeric(CONTACT)))
            {
                $('#contact').html('Ce champs ne doit avoir que des chiffres');
                return false;
            }
            if(CONTACT.length != 10)
            {
                $('#contact').html('Ce champs doit contenir 10 chiffres');
               return false;

               }
              
        
            else{
            

             $.ajax({
                type : "POST",
                url  : 'employe/save/',
               
                data : {NUMEMP:NUMEMP ,NUMFONCT:NUMFONCT ,NOMEMP:NOMEMP ,PRENOMEMP:PRENOMEMP , CONTACT:CONTACT},
                success: function(){
                    $('[name="NUMEMP"]').val("");
                    $('[name="NUMFONCT"]').val("");
                    $('[name="NOMEMP"]').val("");
                    $('[name="PRENOMEMP"]').val("");
                    $('[name="CONTACT"]').val("");
                   
                    $('#Modal_Add').modal('hide');
                    
                     affiche();
                     
                     
                },
            error: function(){
                alert('misy diso')
            }
            });
            return false;
        };
        }),
    
 
        //get data for update record
        $(document).on('click','.btn-edit',function(){
            var id = $(this).data('id');
            var num = $(this).data('num');
            var nom = $(this).data('nom');
            var prenom = $(this).data('prenom');
            var cont = $(this).data('cont');
           
             
            
            $('.NUMEMP').val(id);
            $('.NUMFONCT').val(num);
            $('.NOMEMP').val(nom);
            $('.PRENOMEMP').val(prenom);
            $('.CONTACT').val(cont);
            
            
            $('#Modal_Edit').modal('show');
        });
 
        //update record to database
         $('#btn-update').on('click',function(){
            var texte = "Veuillez remplir le champ s'il vous plait";
            var NUMEMP = $.trim($('.NUMEMP').val());
            var NUMFONCT = $.trim($('.NUMFONCT').val());
            var NOMEMP =  $.trim($('.NOMEMP').val());
            var PRENOMEMP = $.trim($('.PRENOMEMP').val());
            var CONTACT = $.trim($('.CONTACT').val());
            var NOMEMP=accepteApostrophe(NOMEMP);
            var PRENOMEMP=accepteApostrophe(PRENOMEMP);
           
            
            
            if(NOMEMP!=""){
                $('#Nomemp').html("");
               
            }
            if(NOMEMP==""){
                $('#Nomemp').html(texte);
               return false;
            }
    
            if(PRENOMEMP==""){
                $('#Prenomemp').html(texte);
               return false;
            }
           else if(PRENOMEMP!=""){
                $('#Prenomemp').html("");
               
            }
            
                /*if(matricule == "" || !(matricule.match(/^\d{0,4}\/\d{0,2}$/)) )
                {
                    $('#matriculeHelp').html(texte+' '+'avec le format requis');
                    $('#matric').addClass("is-invalid");
                    return false;
                }*/
               /* if(nom == "")
                {
                    $('#nomHelp').html(texte);
                    $('#no').addClass("is-invalid");
                    return false;
                }
                if(email.length > 0 && !(email.match(/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/)))
                {
                    $('#emailHelp').html('Adresse email non correcte');
                    $('#mail').addClass("is-invalid");
                    return false;
                }*/
                if(CONTACT == "")
                {
                    $('#Contact').html(texte);
                   return false;
                }
                if(!(CONTACT == ""))
                {
                    $('#Contact').html("");
                   
                }
                
                if(!($.isNumeric(CONTACT)))
                {
                    $('#Contact').html('Ce champs ne doit avoir que des chiffres');
                    return false;
                }
                if(CONTACT.length != 10)
                {
                    $('#Contact').html('Ce champs doit contenir 10 chiffres');
                   return false;
                } 
                   else{
                  
            $.ajax({
                type : "POST",
                url  : 'employe/update/',
               
                data : {NUMEMP:NUMEMP ,NUMFONCT:NUMFONCT ,NOMEMP:NOMEMP , PRENOMEMP:PRENOMEMP, CONTACT:CONTACT},
                success: function(){
                    $('[name="NUMEMP"]').val("");
                    $('[name="NUMFONCT"]').val("");
                    $('[name="NOMEMP"]').val("");
                    $('[name="PRENOMEMP"]').val("");
                    $('[name="CONTACT"]').val("");
                    
                    $('#Modal_Edit').modal('hide');
                     
                    affiche();
                  
                },
                error: function(){
                   alert('erreur');}
            });
            return false;
        };
        });
 
        //get data for delete record
        $(document).on('click','.btn-delete',function(){
            // get data from button edit
            var id = $(this).attr('data-nid');

            // Set data to Form Edit
            $('#NUMEMP').val(id);
            // Call Modal Edit
            $('#deleteModal').modal('show');
        });
        
        //delete record to database
         $('#btn-delete').on('click',function(){
            var EMP = $('#NUMEMP').val();
            $.ajax({
                type : "POST",
                url  : 'employe/delete/',
                data : {EMP:EMP},
                success: function(){
                    $('#deleteModal').modal('hide');
                    affiche();
                }
            });
            return false;
        });
 
    });
 
