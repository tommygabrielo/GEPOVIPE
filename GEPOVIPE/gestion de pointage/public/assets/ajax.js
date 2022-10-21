
    $(document).ready(function(){

       
        show_product(); //call function show all product
        //$('#mydata').dataTable();
          //function show all product
        function show_product(){
            $.ajax({
                
                //type:'POST',
                url:'product/affiche',
                dataType : 'JSON',
                success:function(data){
                    //alert(data.length);
                  var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                '<td>'+data[i].product_name+'</td>'+
                                '<td>'+data[i].product_price+'$</td>'+
                                '<td>'+data[i].category_name+'</td>'+
                                '<td >'+
                                
                                '<a  class="btn btn-info btn-sm btn-edit" data-id="'+data[i].product_id+'"  data-name="'+data[i].product_name+'"  data-price="'+data[i].product_price+'"  data-category_id="'+data[i].product_category_id+'" >Edit</a>'+' '+
                                    '<a   class="btn btn-danger btn-sm btn-delete" data-id="'+data[i].product_id+'">Delete</a>'+
                                '</td>'+
                                '</tr>';
                    }
                    $('#showdata').html(html);
                    
                },
                //error: function(){
                   // alert('erreur');}
 
            });
        }
       
    
        //Save product
        $('#btn_save').on('click',function(){
            var product_name = $('#product_name').val();
            var product_price = $('#product_price').val();
            var product_category  = $('#product_category').val();

            $.ajax({
                type : "POST",
                url  : 'product/save',
               
                data : {product_name:product_name , product_price:product_price, product_category:product_category},
                success: function(){
                    $('[name="product_name"]').val("");
                    $('[name="product_price"]').val("");
                    $('[name="product_category"]').val("");
                    $('#Modal_Add').modal('hide');
                     //$('#Modal_Add').modal('hide');
                    show_product();
                     
                },
               // error: function(){
                  //  alert('erreur');}
            });
            return false;
        });
 
        //get data for update record
        $(document).on('click','.btn-edit',function(){
            const id = $(this).data('id');
            const name = $(this).data('name');
            const price = $(this).data('price');
            const category = $(this).data('category_id');
             
            
            $('.product_id').val(id);
            $('.product_name').val(name);
            $('.product_price').val(price);
            $('.product_category').val(category).trigger('change');
            $('#Modal_Edit').modal('show');
        });
 
        //update record to database
         $('#btn-update').on('click',function(){
            var product_id = $('.product_id').val();
            var product_name = $('.product_name').val();
            var product_price = $('.product_price').val();
            var product_category  = $('.product_category').val();

            $.ajax({
                type : "POST",
                url  : 'product/update',
               
                data : {product_id:product_id ,product_name:product_name , product_price:product_price, product_category:product_category},
                success: function(){
                    $('[name="product_id"]').val("");
                    $('[name="product_name"]').val("");
                    $('[name="product_price"]').val("");
                    $('[name="product_category"]').val("");
                    $('#Modal_Edit').modal('hide');
                     
                    show_product();
                     
                },
                error: function(){
                    alert('erreur');}
            });
            return false;
        });
 
        //get data for delete record
        $(document).on('click','.btn-delete',function(){
            // get data from button edit
            const id = $(this).data('id');
            // Set data to Form Edit
            $('.product_id').val(id);
            // Call Modal Edit
            $('#deleteModal').modal('show');
        });
        
        //delete record to database
         $('#btn-delete').on('click',function(){
            var product_id = $('#product_id').val();
            $.ajax({
                type : "POST",
                url  : 'product/delete',
                dataType : "JSON",
                data : {product_id:product_id},
                success: function(data){
                    $('[name="product_id"]').val("");
                    $('#deleteModal').modal('hide');
                    show_product();
                }
            });
            return false;
        });
 
    });
 
