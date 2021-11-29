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
                <h3>Group Menus </h3>
             
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                     <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#addModal"><span class="fa-fw select-all fas"></span> Add Group Menu</button>
                    
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
                            <th>Menu</th>
                            <th>Project</th>
                            <th>Role</th>
                            
                           
                          
                        </tr>
                    </thead>
                    <tbody>

                         <?php $i=1; foreach($data_groupmenus as $value): ?>
                        <tr>
                            <td>
                                 <a href="javascript:void(0);" title="Edit" class="item-update" data-id="<?= $value['menu_group_id']?>">
                                                         <span class="fa-fw select-all fas"></span>
                                <a href="javascript:void(0);" title="Delete" class="item-delete" data-id="<?= $value['menu_group_id']?>">
                                                         <span class="fa-fw select-all fas"></span>
                            </td>
                            <td><?=$value['menu_name']?></td>
                            <td><?=$value['project_name']?></td>
                            <td><?=$value['project_group_name']?></td>
                           
                           
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
                                                                    <label class="col-form-label">Project</label>
                                                                </div>
                                                                <div class="col-lg-10 col-9">
                                                                    <input type="hidden" name="primary_key" id="primary_key">
                                                                    <select style="width: 100%;" class="form-control populate placeholder" name="project_id" id="project_id">
                                                                        <option>Select Project</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                         <div class="col-md-12">
                                                            <div class="form-group row align-items-center">
                                                                <div class="col-lg-2 col-3">
                                                                    <label class="col-form-label">Role</label>
                                                                </div>
                                                                <div class="col-lg-10 col-9">
                                                                    <select style="width: 100%;" class="form-control populate placeholder" name="project_group_id" id="project_group_id"></select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                         <div class="col-md-12">
                                                            <div class="form-group row align-items-center">
                                                                <div class="col-lg-2 col-3">
                                                                    <label class="col-form-label">Menu</label>
                                                                </div>
                                                                <div class="col-lg-10 col-9">
                                                                    <select style="width: 100%;" class="form-control populate placeholder" name="menu_id" id="menu_id"></select>
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
         let jquery_datatable = $("#table1").DataTable();

    $(document).ready(function() { 

            var uri1 =  "<?php echo $this->uri->segment(1); ?>";
            var uri2 =  "<?php echo $this->uri->segment(2); ?>"; 
            var uri_segmen = uri1+'/'+uri2; 

             $('#project_id').select2({
                    width: 'resolve',
                    data: <?php echo $projects; ?>
            });

             $('#menu_id').select2({
                    width: 'resolve',
                    data: <?php echo $data_menus; ?>
            });




              $("#project_id").on('change',function(){
                if($("#primary_key").val() == ''){
                    listrole(0);       
                }
                
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
                    $("#primary_key").val(response[0].menu_group_id);
                     $("#menu_id").val(response[0].menu_id).trigger('change');
                      
                     $("#project_id").val(response[0].project_id).trigger('change');
                     listrole(response[0].project_group_id);
                     $("#myModalLabel160").text("Update Data");

                }
                }) 
            });


           

               
            }); 

    function listrole(id){
         var id_proj = $("#project_id").val();
          $("#project_group_id").empty().trigger('change');
          $.ajax({
                url: "<?php echo base_url(); ?>appsmanagement/group_user/list_role",
                type: 'POST',
                data: {id:id_proj},
                dataType: 'json',
                success: function(response){
               
                   $('#project_group_id').select2({
                                    data: response.data,
                                     width: 'resolve',
                                   
                                });

                    if(id != 0){
                            $("#project_group_id").val(id).trigger('change');
                    }



                }

                });
         
         
    }
</script>
<?php $this->load->view('helper/crud_modal.php') ?>
</body>

</html>

