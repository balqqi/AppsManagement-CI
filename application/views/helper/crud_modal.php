<!-- 
    this function global add update in another page
    how to use: 
    1. set id form to myForm
    2. in controller, ex: controller : users. create function in controller users name add, update
    3. return from controller function delete make sure json encode  
        a.message = 'data has been added or updated!', 
        b.type ='success'
    4. make sure uri_segment_2 add or update. in here im using hmvc
    5. make sure uri_segment_1 name controller in this case is users for redirect
    6. done happy for use :)
 -->
<script>
    $(document).ready(function() {
        var uri1 =  "<?php echo $this->uri->segment(1); ?>";
        var uri2 =  "<?php echo $this->uri->segment(2); ?>"; 
        var uri_segmen = uri1+'/'+uri2; 

       $("#myModalLabel160").text("Add Data");
       $('#form_input')[0].reset();

        


        $("#close").on('click',function(){
                    $("#myModalLabel160").text("Add Data");
                    $('#form_input')[0].reset();   

        });


        $.validator.setDefaults({
                    errorClass: 'help-block',
                    highlight: function(element) {
                        $(element)
                            .closest('.form-group')
                            .addClass('has-error');
                    },
                    unhighlight: function(element) {
                        $(element)
                            .closest('.form-group')
                            .removeClass('has-error')
                            .addClass('has-success');
                    }
                });
              
                $('#form_input').validate({
                    submitHandler: function(form) {
                                var primary_key = $("#primary_key").val();
                                var url = '';

                                if(primary_key == ''){
                                    url = "<?php echo base_url(); ?>"+uri_segmen+"/add";
                                }else{
                                    url = "<?php echo base_url(); ?>"+uri_segmen+"/update";
                                }

                                data = $("#form_input").serialize();
                                $.ajax({
                                        url : url,
                                        type: 'POST',
                                         data : data,
                                          dataType: "json",
                                        success: function(r){
                                          if(r.error == false) {
                                            Swal.fire({
                                                    icon: r.type,
                                                      title: r.title,
                                                      text: r.message,
                                                    });
                                               
                                                setTimeout(function() {
                                                    window.location.href = "<?=base_url()?>"+uri_segmen;  
                                                }, 2000);
                                            }else{
                                              Swal.fire({
                                                    icon: r.type,
                                                      title: r.title,
                                                      text: r.message,
                                                    });
                                               
                                                setTimeout(function() {
                                                    window.location.href = "<?=base_url()?>"+uri_segmen;  
                                                }, 2000);
                                            }
                                        }
                                })      
                        }
                });

        $(".item-delete").on('click',function(){
             var id = $(this).attr('data-id');
             Swal.fire({
                          title: 'Are you sure want to delete this ?',
                          showCancelButton: true,
                          confirmButtonText: 'Yes',
                          
                        }).then((result) => {
                          if (result.isConfirmed) {
                              $.ajax({
                                    url : "<?php echo base_url(); ?>"+uri_segmen+"/delete",
                                    type: 'POST',
                                     data : {id:id},
                                      dataType: "json",
                                    success: function(r){
                                      if(r.error == false) {
                                        Swal.fire({
                                                icon: r.type,
                                                  title: r.title,
                                                  text: r.message,
                                                });
                                           
                                            setTimeout(function() {
                                                window.location.href = "<?=base_url()?>"+uri_segmen;  
                                            }, 2000);
                                        }else{
                                              Swal.fire({
                                                    icon: r.type,
                                                      title: r.title,
                                                      text: r.message,
                                                    });
                                               
                                                setTimeout(function() {
                                                    window.location.href = "<?=base_url()?>"+uri_segmen;  
                                                }, 2000);
                                            }
                                    }
                                })      
                          } 
            })
            });

    })
</script>