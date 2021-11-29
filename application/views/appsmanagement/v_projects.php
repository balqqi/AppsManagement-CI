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
                <h3>Projects</h3>
             
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                     <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#addModal"><span class="fa-fw select-all fas"></span> Add Project</button>
                    
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
                            <th>Project</th>
                            <th>Address</th>
                            <th>Controller</th>
                           
                          
                        </tr>
                    </thead>
                    <tbody>

                         <?php $i=1; foreach($data_projects as $value): ?>
                        <tr>
                            <td>
                                 <a href="javascript:void(0);" title="Edit" class="item-update" data-id="<?= $value['project_id']?>">
                                                         <span class="fa-fw select-all fas"></span>
                                <a href="javascript:void(0);" title="Delete" class="item-delete" data-id="<?= $value['project_id']?>">
                                                         <span class="fa-fw select-all fas"></span>
                            </td>
                            <td><?=$value['project_name']?></td>
                            <td><?=$value['project_address']?></td>
                            <td><?=$value['controller_name']?></td>
                           
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
                                                                    <label class="col-form-label">Project Name <span class="required">*</span></label>
                                                                </div>
                                                                <div class="col-lg-10 col-9">
                                                                    <input type="hidden" id="primary_key" name="primary_key">
                                                                    <input type="text" id="project_name" class="form-control" name="project_name" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                         <div class="col-md-12">
                                                            <div class="form-group row align-items-center">
                                                                <div class="col-lg-2 col-3">
                                                                    <label class="col-form-label">Controller Name <span class="required">*</span></label>
                                                                </div>
                                                                <div class="col-lg-10 col-9">
                                                                  <input type="text" id="controller_name" class="form-control" name="controller_name" required>
                                                                </div>
                                                            </div>
                                                        </div>

                                                         <div class="col-md-12">
                                                            <div class="form-group row align-items-center">
                                                                <div class="col-lg-2 col-3">
                                                                    <label class="col-form-label">Project Address</label>
                                                                </div>
                                                                <div class="col-lg-10 col-9">
                                                                   <textarea class="form-control" name="project_address" id="project_address" rows="2"></textarea>
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


    <?php $this->load->view('layouts/footer'); ?> 
<script>
         let jquery_datatable = $("#table1").DataTable();

            $(document).ready(function() { 
            var uri1 =  "<?php echo $this->uri->segment(1); ?>";
            var uri2 =  "<?php echo $this->uri->segment(2); ?>"; 
            var uri_segmen = uri1+'/'+uri2; 

               
              
             



            $(".item-update").on('click',function(){
             var id = $(this).attr('data-id');
            $.ajax({
                url : "<?php echo base_url(); ?>"+uri_segmen+"/getdata_byid",
                type: 'POST',
                data: {id:id},
                dataType: 'json',
                success: function(response){
                    $("#addModal").modal('show');
                    $("#primary_key").val(response[0].project_id);
                     $("#project_name").val(response[0].project_name);
                      $("#project_address").val(response[0].project_address);
                       $("#controller_name").val(response[0].controller_name);
                     $("#myModalLabel160").text("Update Data");
                }
                }) 
            });


           

               
            }); 
</script>
<?php $this->load->view('helper/crud_modal.php') ?>
</body>

</html>

