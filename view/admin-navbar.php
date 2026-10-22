<?php
$mat=$_SESSION['authentifier'];
$infoUser=parent::selectWhere('*','users',"userMAT='$mat'")->fetch(); ?>

<nav class="layout-navbar navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar">
    <div class="container-fluid">
    
      <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0   d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
          <i class="bx bx-menu bx-sm"></i>
        </a>
      </div>
      

      <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

        
        <!-- Search -->
        
        <!-- Search Small Screens -->
      <div class="navbar-search-wrapper search-input-wrapper d-none" style="display: flex;">
        <input type="text" class="form-control search-input container-fluid border-0" placeholder="Rechercher..." aria-label="Search...">
        <i id="dropSearch" class="bx bx-x bx-sm search-toggler cursor-pointer " style="display: flex;align-items: center;"></i>
      </div>
        <!-- /Search -->
        

        <ul class="navbar-nav flex-row align-items-center ms-auto">
          
          <!-- Language -->
          <!--/ Language -->
          
          <!-- Style Switcher -->
          <li class="nav-item me-2 me-xl-0">
            <a class="nav-link style-switcher-toggle hide-arrow" href="javascript:void(0);">
              <i class='bx bx-sm'></i>
            </a>
          </li>
          <!--/ Style Switcher -->

          <!-- Quick links  -->
          <li class="nav-item dropdown-shortcuts navbar-dropdown dropdown me-2 me-xl-0">
            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
              <i class='bx bx-grid-alt bx-sm'></i>
            </a>
            <div class="dropdown-menu dropdown-menu-end py-0">
              <div class="dropdown-menu-header border-bottom">
                <div class="dropdown-header d-flex align-items-center py-3">
                  <h5 class="text-body mb-0 me-auto">Raccourcis</h5>
                </div>
              </div>
              <div class="dropdown-shortcuts-list scrollable-container">
                <div class="row row-bordered overflow-visible g-0">
                  <div class="dropdown-shortcuts-item col">
                    <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                      <i class="bx bx-food-menu fs-4"></i>
                    </span>
                    <a href="index.php?m=adminappdeplist" class="stretched-link">Liste des d&eacute;partements</a>
                  </div>
                  <div class="dropdown-shortcuts-item col">
                    <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                      <i class="bx bx-user fs-4"></i>
                    </span>
                    <a href="index.php?m=adminappuserlist" class="stretched-link">Gestion des employ&eacute;s</a>
                  </div>
                </div>
                <div class="row row-bordered overflow-visible g-0">
                  
                  <div class="dropdown-shortcuts-item col">
                    <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                      <i class="bx bx-home-circle fs-4"></i>
                    </span>
                    <a href="index.php?m=adminindex" class="stretched-link">Tableaux de bord</a>
                  </div>
                  
                </div>
                
              </div>
            </div>
          </li>
          <!-- Quick links -->

          <!-- User -->
          <li class="nav-item navbar-dropdown dropdown-user dropdown">
            <div class="nav-link dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
              <div class="avatar avatar-online">
                <img src="view/img/avatars/<?php echo $infoUser['userPHOTO'];?>" alt class="rounded-circle">
              </div>
            </div>
            <ul class="dropdown-menu dropdown-menu-end">
              <li>
                <div class="dropdown-item" href="javascript:void(0)">
                  <div class="d-flex">
                    <div class="flex-shrink-0 me-3">
                      <div class="avatar avatar-online">
                        <img src="view/img/avatars/<?php echo $infoUser['userPHOTO'];?>" alt class="rounded-circle">
                      </div>
                    </div>
                    <div class="flex-grow-1">
                      <span class="fw-semibold d-block lh-1">           
                        <?php echo $infoUser['userNOM']." ".$infoUser['userPRE']?>
                      </span>
                      <small>
                        <?php echo $infoUser['userPOST']?>
                      </small>
                    </div>
                  </div>
                </div>
              </li>
              <li>
                <div class="dropdown-divider"></div>
              </li>
              <li>
                <a class="dropdown-item" href="index.php?m=adminprofile">
                  <i class="bx bx-user me-2"></i>
                  <span class="align-middle">Mon Profile</span>
                </a>
              </li>
                      
              <li>
                <a class="dropdown-item" href="index.php?m=Deconnexion">
                  <i class="bx bx-power-off me-2"></i>
                  <span class="align-middle">D&eacute;connexion</span>
                </a>
              </li>
            </ul>
          </li>
          <!--/ User -->
        </ul>
      </div>

    </div>
  </nav>
 

     