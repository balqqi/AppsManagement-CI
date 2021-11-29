<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('layouts/header'); ?>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">

<?php $this->load->view('layouts/sidebar');?>

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
    <h3>Tiara Medika Enterprise System</h3>
</div>
<hr/>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-12">
           
            <div class="row">
                <div class="col-12 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Selamat Datang, <?= $this->session->userdata('nama_user');?>   
                                </h4>
                                    <div class="col-6 col-xl-6">
                                    <div class="row">
                                <form id="myForm">
                                    <div class="input-group mb-3">
                                       

                                     <select class="form-select" id="project_id">
                                        <option> Silahkan Pilih Project</option>
                                                <?php foreach($project as $l){ ?>
                                                      <option value="<?php echo $l['project_id']; ?>"><?php echo $l['project_name']; ?>   
                                                    </option>
                                                <?php } ?>
                                                                              
                                      </select>
                                      <div class="input-group-append">
                                         <div class="btn btn-primary" name="masuk" id="masuk">Masuk</div>
                                      </div>
                                    </div>
                                </form>                           
                                    </div>
                                    </div>
                        </div> 
                    </div> 
            </div>
            </div>
        </div>
       
    </section>
</div>


    <?php $this->load->view('layouts/footer'); ?> 

    <script>
            $(document).ready(function() {
               $("#masuk").click(function() {
                  
                var project_id = $('#project_id').val();
 


                   $.ajax({
                            url: "<?=base_url('home/goto_project')?>",
                            type: 'post',
                            dataType: 'json',
                            data: {project_id:project_id},
                            beforeSend: function() {},
                            success: function(data) {

                              
                            
                            window.location.href = '<?= base_url(); ?>'+data;
                                   
                                    
                               
                            }

                        });


                });
               
            }); 
        </script>
</body>

</html>

