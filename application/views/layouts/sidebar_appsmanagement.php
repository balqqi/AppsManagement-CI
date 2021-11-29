 <div class="sidebar-header">
        <div class="d-flex justify-content-between">
            <div class="logo">
                <a href="index.html"><img src="<?=base_url('assets/images/logo/logo.png')?>" alt="Logo" srcset=""></a>
            </div>
            <div class="toggler">
                <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
            </div>
        </div>
    </div>
    <div class="sidebar-menu">
        <ul class="menu">
            <li class='sidebar-link'><a href="<?=base_url('auth/do_logout')?>">  <i class="bi bi-x-octagon-fill"></i><span>Logout</span></a>
            </li>

             <li class='sidebar-link'><a href="<?=base_url('home')?>">  <i class="bi bi-stack"></i><span>Pindah Project</span></a>
            </li>
            
       
            
            <?= $menus ?>
           
            
        </ul>
    </div>