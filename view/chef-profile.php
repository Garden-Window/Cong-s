<?php 
$mat=$_SESSION['authentifier'];
$infoUser=parent::selectWhere('*','users',"userMAT='$mat'")->fetch();?>
<!DOCTYPE html>


<html lang="fr" class="light-style layout-navbar-fixed layout-menu-fixed " dir="ltr" data-theme="theme-semi-dark" data-assets-path="view/" data-template="vertical-menu-template-semi-dark">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Mon profile</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="view/img/favicon/sonatrachicon.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="view/fonts/boxicons/css/boxicons.css" />
    <link rel="stylesheet" href="view/fonts/fontawesome/css/fontawesome.css" />
    <link rel="stylesheet" href="view/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="view/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="view/css/rtl/theme-semi-dark.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="view/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="view/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="view/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="view/libs/select2/select2.css" />
    <link rel="stylesheet" href="view/libs/formvalidation/dist/css/formValidation.min.css" />
    <link rel="stylesheet" href="view/libs/animate-css/animate.css" />
    <link rel="stylesheet" href="view/libs/sweetalert2/sweetalert2.css" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="view/css/userfiche.css" />

    <!-- Helpers -->
    <script src="view/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="view/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="view/js/config.js"></script>
</head>

<body>
<?php $this->loader(); ?>

  
  <!-- ?PROD Only: Google Tag Manager (noscript) (Default ThemeSelection: GTM-5DDHKGP, PixInvent: GTM-5J3LMKC) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5DDHKGP" height="0" width="0" style="display: none; visibility: hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
  
  <!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
  <div class="layout-container">

    
    




<!-- Menu -->

<?php $active=4; include 'chef-aside.php' ?>
<!-- / Menu -->

    

    <!-- Layout container -->
    <div class="layout-page">
      
      



<!-- Navbar -->

<?php include 'chef-navbar.php' ?> 
<!-- / Navbar -->

      

      <!-- Content wrapper -->
      <div class="content-wrapper">

        <!-- Content -->
        
          <div class="container-xxl flex-grow-1 container-p-y wi-auto">
            <?php $this->showAlert()?>  

            
            <h4 class="py-3 breadcrumb-wrapper mb-4">
              Mon Profile
            </h4>
          <div class="row justify-content-center" >
  <!-- User Sidebar -->
  <div class="sheet d-flex justify-content-center col-12 col-sm-06 col-md-12 mb-4">
    <!-- User Card -->
    <div class="card mb-4">
      <div class="card-body">
          <div class="row flex-wrap justify-content-around">
            <div class="user-avatar-section">
              <div class=" d-flex align-items-center flex-column">
                <div class="d-flex">
                  <img class="img-fluid rounded my-4" src="view/img/avatars/<?php 
                      echo "".$infoUser['userPHOTO'];
                    ?>" height="110" width="110" alt="User avatar" />
                  <div class="user-info d-flex text-center align-items-start justify-content-center">
                    <h5 class="mb-2">
                    <?php
              echo  $infoUser['userNOM']." ".$infoUser['userPRE']?>
                    </h5>
                    <span>
                    <?php
                      echo $infoUser['userPOST']?>
                    </span>
                  </div>
                </div>
                <h5 class="listData pb-2 border-bottom mb-4">D&eacute;tails</h5>
                <div >
                <ul class="list-unstyled">
                  <li class="mb-3">
                    <span class="fw-bold me-2">Nom:</span>
                    <span><?php echo  $infoUser['userNOM'] ?></span>
                  </li>
                  <li class="mb-3">
                    <span class="fw-bold me-2">Pr&eacute;nom:</span>
                    <span><?php echo  $infoUser['userPRE'] ?></span>
                  </li>
                  <li class="mb-3">
                    <span class="fw-bold me-2">L'&eacute;tat:</span>
                    <span class="badge bg-label-success">Active</span>
                  </li>
                </ul>
              </div>
              </div>
            </div>
            <div class="d-flex align-items-end ml-4">
                <ul class="list-unstyled">
                  <li class="mb-3">
                    <span class="fw-bold me-2">Nom d'utilisateur:</span>
                    <span><?php echo $mat?></span>
                  </li>
                  <li class="mb-3">
                    <span class="fw-bold me-2">Email:</span>
                    <span>
                    <?php
                      echo $infoUser['userEMAIL']?>
                    </span>
                  </li>
                  <li class="mb-3">
                    <span class="fw-bold me-2">N° t&eacute;l&eacute;phone:</span>
                    <span> (+213) 
                    <?php
                      echo $infoUser['userPHONE']?> 
                    </span>
                  </li>
                  <li class="mb-3">
                    <span class="fw-bold me-2">Adresse:</span>
                    <span>
                    <?php
                      echo $infoUser['userADRESSE']?>
                    </span>
                  </li>
                  <li class="mb-3">
                    <span class="fw-bold me-2">Date de naissance:</span>
                    <span>
                    <?php
                      echo $infoUser['userNAISS']?>
                    </span>
                  </li>
                  <li class="mb-3">
                    <span class="fw-bold me-2">Genre:</span>
                    <span>
                    <?php
                    $GnrUser=$infoUser['userGENRE'];
                    $GnrUser=$this->switchGenr($GnrUser);echo $GnrUser?> 
                    </span>
                  </li>
                  <li class="mb-3">
                    <span class="fw-bold me-2">D&eacute;partement:</span>
                    <span>
                    <?php
                      $DepUser=parent::selectWhere('nomDEP','depart',"IDdep='".$infoUser['userDEPARTEMENT']."'")->fetch();
                      echo $DepUser['nomDEP']?>
                    </span>
                  </li>
                </ul>
              </div>
            </div>
      </div>
    </div>
    <!-- /User Card -->
   
  </div>
    <!-- /User Sidebar -->
</div>

            
          </div>
          <!-- / Content -->

          
          

<!-- Footer -->
<?php include 'footer.php'?>
<!-- / Footer -->

          
          <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>

    
    
    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
    
    
    <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>
    
  </div>
  <!-- / Layout wrapper -->

  
  
  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src="view/libs/jquery/jquery.js"></script>
  <script src="view/libs/popper/popper.js"></script>
  <script src="view/js/bootstrap.js"></script>
  <script src="view/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  
  <script src="view/libs/hammer/hammer.js"></script>
  

  <script src="view/libs/typeahead-js/typeahead.js"></script>
  
  <script src="view/js/menu.js"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src="view/libs/moment/moment.js"></script>
  <script src="view/libs/datatables-bs5/datatables-bootstrap5.js"></script>
  <script src="view/libs/sweetalert2/sweetalert2.js"></script>
  <script src="view/libs/cleavejs/cleave.js"></script>
  <script src="view/libs/cleavejs/cleave-phone.js"></script>
  <script src="view/libs/select2/select2.js"></script>
  <script src="view/libs/formvalidation/dist/js/FormValidation.min.js"></script>
  <script src="view/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>
  <script src="view/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script>

  <!-- Main JS -->
  <script src="view/js/main.js"></script>

  <!-- Page JS -->
  <script src="view/js/modal-edit-user.js"></script>
  <script src="view/js/app-user-view.js"></script>
  <script src="view/js/app-user-view-account.js"></script>
</body>

</html>

<!-- beautify ignore:end -->
