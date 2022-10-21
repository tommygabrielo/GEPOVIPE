
    $(document).ready(function(){

         
        
         //call function show all product
        
         affiche();
        $("#recherche").on('keyup',function(){
            affiche($.trim($(this).val()));
            

        });
        
          //function show all product
        function affiche(para=""){
           
            $.ajax({
                
               url:'fonction/affiche/'+para,
                type:'GET',
                dataType : 'JSON',
                success:function(data){
                    //alert(data.length);
                  var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                       
                        html += '<tr>'+
                                
                                '<td>'+data[i].NOMFONCT+'</td>'+
                                '<td>'+data[i].CATFONCT+'</td>'+
                                '<td >'+
                                    '<a type="button" id="bleu" href="#" class="btn-xm btn-edit fa fa-edit" data-id="'+data[i].NUMFONCT+'"  data-nom="'+data[i].NOMFONCT+'"  data-cat="'+data[i].CATFONCT+'" ></a>'+' '+
                                    '<a type="button" id="rouge" href="#" class=" btn-xm btn-delete fa fa-trash" data-id="'+data[i].NUMFONCT+'"></a>'+
                                '</td>'+
                                '</tr>';
                    
                }
           
                    $('#showdata').html(html);
                    //$('#mydata').DataTable();
                   
                            
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
        
        //Save product
        $('#btn_save').on('click',function(){
            var texte = "Veuillez remplir le champ s'il vous plait";
            var NOMFONCT = $.trim($('#NOMFONCT').val());
            var CATFONCT = $.trim($('#CATFONCT').val());
            var NOMFONCT=accepteApostrophe(NOMFONCT);
            //var exp=new RegExp("[a-zA-Z0-9\']");
            //var NOMFONCT=chaine.match(exp);
            if(NOMFONCT==""){
                $('#nomfonct').html(texte);
                return false;
            }
            
           else if(NOMFONCT!=""){
                $('#nomfonct').html("");
               
            }
             if(CATFONCT!=""){
                $('#catfonct').html("");
               
            }
            if(CATFONCT==""){
                $('#catfonct').html(texte);
                return false;
            }
           
            else{

            $.ajax({
                type : "POST",
                url  : 'fonction/save/',
               
                data : {NOMFONCT:NOMFONCT , CATFONCT:CATFONCT},
                success: function(){
                    $('[name="NOMFONCT"]').val("");
                    $('[name="CATFONCT"]').val("");
                   
                    $('#Modal_Add').modal('hide');
                     //$('#Modal_Add').modal('hide');
                     affiche();
                     
                },
                error: function(){
                    alert('erreur');}
            });
            return false;
        };
        });
 
        //get data for update record
        $(document).on('click','.btn-edit',function(){
            const id = $(this).data('id');
            const nom = $(this).data('nom');
            const cat = $(this).data('cat');
           
            $('.NUMFONCT').val(id);
            $('.NOMFONCT').val(nom);
            $('.CATFONCT').val(cat);
            
            $('#Modal_Edit').modal('show');
        });
 
        //update record to database
         $('#btn-update').on('click',function(){
            var texte = "Veuillez remplir le champ s'il vous plait";
            var NUMFONCT = $('.NUMFONCT').val();
            var NOMFONCT = $('.NOMFONCT').val();
            var CATFONCT = $('.CATFONCT').val();
            var NOMFONCT=accepteApostrophe(NOMFONCT);
            
            if(NOMFONCT==""){
                $('#nomfonct').html(texte);
                return false;
            }
           else if(NOMFONCT!=""){
                $('#nomfonct').html("");
               
            }
             if(CATFONCT!=""){
                $('#catfonct').html("");
               
            }
            if(CATFONCT==""){
                $('#catfonct').html(texte);
                return false;
            }
           
            else{
            $.ajax({
                type : "POST",
                url  : 'fonction/update/',
               
                data : {NUMFONCT:NUMFONCT ,NOMFONCT:NOMFONCT , CATFONCT:CATFONCT},
                success: function(){
                    $('[name="NUMFONCT"]').val("");
                    $('[name="NOMFONCT"]').val("");
                    $('[name="CATFONCT"]').val("");
                    
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
            const id = $(this).data('id');
            // Set data to Form Edit
            $('.NUMFONCT').val(id);
            // Call Modal Edit
            $('#deleteModal').modal('show');
        });
        
        //delete record to database
         $('#btn-delete').on('click',function(){
            var NUMFONCT = $('#NUMFONCT').val();
            $.ajax({
                type : "POST",
                url  : 'fonction/delete/',
                dataType : "JSON",
                data : {NUMFONCT:NUMFONCT},
                success: function(data){
                    $('[name="NUMFONCT"]').val("");
                    $('#deleteModal').modal('hide');
                    affiche();
                    
                }
            });
            return false;
        });
 
    });
 
