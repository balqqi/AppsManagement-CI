<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('layouts/header'); ?>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">

<?php $this->load->view('layouts/sidebar_appsmanagement');?>

   <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
</div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Menus </h3>
             
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                     <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#addModal"><span class="fa-fw select-all fas"></span> Add Menus</button>
                    
                </nav>
            </div>
        </div>
    </div>

</div>
<hr/>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-12">
           
            <div class="row">
                <div class="col-12 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-body">
                          <table class="table" id="table1">
                    <thead>
                        <tr style="background-color: #33D5FF;">
                              <th>Action</th>
                            <th>Menu Name</th>
                            <th>Level</th>
                            <th>Parent</th>
                            <th>Controller</th>
                            <th>Menu Order</th>
                            <th>Icon</th>
                            <th>Project</th>
                           
                          
                        </tr>
                    </thead>
                    <tbody>

                         <?php $i=1; foreach($data_menus as $value): ?>
                        <tr>
                            <td>
                                 <a href="javascript:void(0);" title="Edit" class="item-update" data-id="<?= $value['menu_id']?>">
                                                         <span class="fa-fw select-all fas"></span>
                                <a href="javascript:void(0);" title="Delete" class="item-delete" data-id="<?= $value['menu_id']?>">
                                                         <span class="fa-fw select-all fas"></span>
                            </td>
                            <td><?=$value['menu_name']?></td>
                            <td><?=$value['level']?></td>
                            <td><?=$value['parent_name']?></td>
                            <td><?=$value['controller_name']?></td>
                            <td><?=$value['menu_order']?></td>
                            <td><?=$value['icon']?></td>
                            <td><?=$value['project_name']?></td>
                           
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
                        
                        </div> 
                    </div> 
            </div>
            </div>
        </div>
       
    </section>

       <div class="modal fade text-left" id="addModal" tabindex="-1" role="dialog"
                                            aria-labelledby="myModalLabel160" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg"
                                                role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-primary">
                                                        <h5 class="modal-title white" id="myModalLabel160">
                                                        </h5>
                                                        <button type="button" class="close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                            <i data-feather="x"></i>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="form_input">
                                                         <div class="col-md-12">
                                                            <div class="form-group row align-items-center">
                                                                <div class="col-lg-2 col-3">
                                                                    <label class="col-form-label">Menu Name <span class="required">*</span></label>
                                                                </div>
                                                                <div class="col-lg-10 col-9">
                                                                    <input type="hidden" id="primary_key" name="primary_key">
                                                                    <input type="text" id="menu_name" class="form-control" name="menu_name" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                         <div class="col-md-12">
                                                            <div class="form-group row align-items-center">
                                                                <div class="col-lg-2 col-3">
                                                                    <label class="col-form-label">Project</label>
                                                                </div>
                                                                <div class="col-lg-10 col-9">
                                                                    <select style="width: 100%;" class="form-control populate placeholder" name="project_id" id="project_id"></select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                         <div class="col-md-12">
                                                            <div class="form-group row align-items-center">
                                                                <div class="col-lg-2 col-3">
                                                                    <label class="col-form-label">Parent</label>
                                                                </div>
                                                                <div class="col-lg-10 col-9">
                                                                    <select style="width: 100%;" class="form-control populate placeholder" name="parent_id" id="parent_id"></select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                         <div class="col-md-12">
                                                            <div class="form-group row align-items-center">
                                                                <div class="col-lg-2 col-3">
                                                                    <label class="col-form-label">Controller Name</label>
                                                                </div>
                                                                <div class="col-lg-10 col-9">
                                                                  
                                                                    <input type="text" id="controller_name" class="form-control" name="controller_name">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group row align-items-center">
                                                                <div class="col-lg-2 col-3">
                                                                    <label class="col-form-label">Level</label>
                                                                </div>
                                                                <div class="col-lg-3 col-3">
                                                                    <input type="number" id="level" class="form-control" name="level" value="0">
                                                                </div>
                                                            </div>
                                                        </div>
                                                         <div class="col-md-12">
                                                            <div class="form-group row align-items-center">
                                                                <div class="col-lg-2 col-3">
                                                                    <label class="col-form-label">Menu Order</label>
                                                                </div>
                                                                <div class="col-lg-3 col-3">
                                                                    <input type="number" id="menu_order" class="form-control" name="menu_order" value="0">
                                                                </div>
                                                            </div>
                                                        </div>
                                                       <div id="menuicon">
                                                        <div class="col-md-12">
                                                            <div class="form-group row align-items-center">
                                                                <div class="col-lg-2 col-3">
                                                                    <label class="col-form-label">Menu Icon</label>
                                                                </div>
                                                                <div class="col-lg-6 col-6">
                                                                    <input type="text" id="icon" class="form-control" name="icon">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                        <hr/>
                                                         <div class="col-md-12">
                                                                <div class="form-group row align-items-center">
                                                         <div class="x_panel">
                                                            <div class="x_content">
                                                                <?php $this->load->view('helper/font-awesome') ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                        
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light-secondary"
                                                            data-bs-dismiss="modal" id="close">
                                                            <i class="bx bx-x d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Close</span>
                                                        </button>
                                                        <button type="submit" class="btn btn-primary ml-1" id="btn-submit">
                                                            <i class="bx bx-check d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Save</span>
                                                        </button>
                                                    </div>
                                                     </form>
                                                </div>
                                            </div>
                                        </div>
</div>

<!----- GLOBAL MODAL ------>
 <div class="modal fade" id="global-modal" tabindex="-1" role="dialog" aria-labelledby="global-modal-label" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <!--<h5 class="modal-title" id="exampleModalLongTitle">Scrolling Modal</h5> -->
                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <i data-feather="x"></i>
                                            </button><br/>
                                             <div class="input-group custom-search-form" >                   
                    <input type="text" class="form-control" placeholder="Search..." name="filterModal" id="searchModal1" title="tbl-sel-id-mandor">
                    <span class="input-group-btn">
                    <button class="btn btn-primary" type="button" id='search_modal' title='global-sel-id#searchModal1'>
                      <span class="fa-fw select-all fas"></span>
                    </button>                            
                    </span>
                </div>
                                        </div>
                        <div class="modal-body" style="max-height:420px; overflow-y:auto; cursor:pointer;">
                        <table  class="table table-hover" id="global-sel-id">
                        <tbody>
                            
                        </tbody>
                        </table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light-secondary"
                                                data-bs-dismiss="modal">
                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">Close</span>
                                            </button>

                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
<!--- END GLOBAL MODAL --->

    <?php $this->load->view('layouts/footer'); ?> 
<script>
         let jquery_datatable = $("#table1").DataTable({
                                                "scrollY": 700,
                                                "scrollX": true
                                });

    $(document).ready(function() { 
            var uri1 =  "<?php echo $this->uri->segment(1); ?>";
            var uri2 =  "<?php echo $this->uri->segment(2); ?>"; 
            var uri_segmen = uri1+'/'+uri2; 

             $('#project_id').select2({
                    width: 'resolve',
                    data: <?php echo $projects; ?>
                });

              $('#parent_id').select2({
                    width: 'resolve',
                    data: <?php echo $parents; ?>
                });

               $('.icon-click').on('click', function() {
            var icon = $(this).attr('href'),
                icon2 = 'fa-' + icon.replace(/#\//g, ''); 
            $('#icon').val(icon2);
            //$("#icon").animate({ scrollTop: 0 }, 1000);
            $("#icon").focus();
            return false;
            });


    $("#parent_id").on('change', function(){
        var parent_id = $(this).val();
       if(parent_id != 0){
        $("#menuicon").hide();
        $("#icon").val('');
       }else{
        $("#menuicon").show();
       }

    })



               
              
    $("#btn-employee,#employee_name").click(function() {
        showAllrow("global-sel-id");
        $.ajax({ // ajax call starts
            url: $(this).attr('url'), // JQuery loads serverside.php
            dataType: 'json', // Choosing a JSON datatype
            data: null,
            success: function(data) // Variable data contains the data we get from serverside
             { 
                var dor     =   new Array;
                var n = data.data.length;
                if (n != 0) {
                    $('#global-modal-label').text('List Employee');
                    $('#global-sel-id').html('');
                    $('#global-sel-id').append('<tbody>');
                    var html = "";

                    $('#global-sel-id').append("<tr><th>id</th><th>Employee Name</th><th>Identitas</th><th>Jabatan</th></tr>");   

                    $.each(data.data, function(i,row){
                                              
                            $('#global-sel-id').append("<tr><td>"+row.employee_id+"</td><td >"+row.nama+"</td><td >"+row.identitas+"</td><td >"+row.nm_jabatan+"</td></tr>");       
                      
                    });
                    $('#global-sel-id').append(html);
                    $('#global-sel-id').append('</tbody>');
                    $('#global-modal').modal('show');
                    modalTipe = 'list_employee';  
                }
            }
        }); 
    });






            $(".item-update").on('click',function(){
             var id = $(this).attr('data-id');
            $.ajax({
                url : "<?php echo base_url(); ?>"+uri_segmen+"/getdata_byid",
                type: 'POST',
                data: {id:id},
                dataType: 'json',
                success: function(response){
                    $("#addModal").modal('show');
                    $("#primary_key").val(response[0].menu_id);
                     $("#menu_name").val(response[0].menu_name);
                      $('#project_id').val(response[0].project_id).trigger('change');;
                     $("#parent_id").val(response[0].parent_id).trigger('change');;
                     $("#controller_name").val(response[0].controller_name);
                     $("#level").val(response[0].level);
                     $("#menu_order").val(response[0].menu_order);
                     $("#icon").val(response[0].icon);
                     $("#myModalLabel160").text("Update Data");
                }
                }) 
            });


           

               
            }); 
</script>
<?php $this->load->view('helper/crud_modal.php') ?>
</body>

</html>

