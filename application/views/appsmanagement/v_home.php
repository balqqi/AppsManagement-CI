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
    <h3>Application Management</h3>
</div>
<hr/>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-12">
           
            <div class="row">
                <div class="col-12 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                          <table border="0" width="50%">
                            <tr>
                                <td><h6>Nama User</h6> </td>
                                <td><h6>:</h6> </td>
                                <td><?= $this->session->userdata('nama_user');?>  </td>
                            </tr>
                            <tr>
                                <td><h6>Role</h6></td>
                                <td><h6>:</h6> </td>
                                <td>[<?= $this->session->userdata('project_group_name');?>] </td>
                            </tr>
                            </table> 
                               
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

