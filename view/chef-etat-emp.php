<?php 
$mat=$_SESSION['authentifier'];
$infoUser=parent::selectWhere('*','users',"userMAT='$mat'")->fetch(); ?>
<!DOCTYPE html>


<html lang="fr" class="light-style layout-navbar-fixed layout-menu-fixed " dir="ltr" data-theme="theme-semi-dark" data-assets-path="view/" data-template="vertical-menu-template-semi-dark">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>&Eacute;tats d'employ&eacute;s</title>

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
    <link rel="stylesheet" href="view/libs/datatables-bs5/datatables.bootstrap5.css">
    <link rel="stylesheet" href="view/libs/datatables-responsive-bs5/responsive.bootstrap5.css">
    <link rel="stylesheet" href="view/libs/datatables-buttons-bs5/buttons.bootstrap5.css">

    <!-- Page CSS -->
    
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

<?php $active=3; include 'chef-aside.php' ?>  
<!-- / Menu -->

    

    <!-- Layout container -->
    <div class="layout-page">
      
      



<!-- Navbar -->

<?php include 'chef-navbar.php' ?> 
<!-- / Navbar -->

      

      <!-- Content wrapper -->
      <div class="content-wrapper">

        <!-- Content -->
        
          <div class="container-xxl flex-grow-1 container-p-y">
          <?php $this->showAlert()?>  

            
                
    <h4 class="py-3 breadcrumb-wrapper mb-4">
     Etats d'employ&eacute;s
    </h4>

<!-- Etat D'employés Table -->
<div class="d-flex justify-content-center ">
  <div class="card" style="min-width: 80%;">
    <div class="card-datatable table-responsive">
      <table class="etat-emp-table table border-top">
        <thead>
          <tr>
            <th>employé</th>
            <!-- <th>Nom</th>
            <th>Pr&eacute;nom</th>
            <th>Post</th> -->
            <th>Etat</th>
            <th>date de  retour</th>
          </tr>
        </thead>
        <tbody>
          <!-- <tr><td><div class="d-flex justify-content-start align-items-center user-name">
                    <div class="avatar-wrapper">
                      <div class="avatar avatar-sm me-3">
                      <img src="view/img/avatars/9.png" alt="Avatar" class="rounded-circle">
                    </div>
                  </div>
                  <div class="d-flex flex-column">
                      <span class="fw-semibold text-body text-truncate">TAIB Idris</span>
                      <small class="text-muted">technicien</small>
                      <small style="color: #5a8dee;">SonaE00011</small>
                    </div>
                  </div></td><td><span class="badge bg-label-secondary">En cong&eacute;</span></td><td><div class="d-flex justify-content-center ">2023-10-12</div></td></tr>
          <tr><td><div class="d-flex justify-content-start align-items-center user-name">
                    <div class="avatar-wrapper">
                      <div class="avatar avatar-sm me-3">
                        <img src="view/img/avatars/10.png" alt="Avatar" class="rounded-circle">
                      </div>
                    </div>
                    <div class="d-flex flex-column">
                        <span class="fw-semibold text-body text-truncate">HASNI Amel</span>
                        <small class="text-muted">ingenieur d'&eacute;tat</small>
                        <small style="color: #5a8dee;" >sSonaE00100</small>
                    </div>
                  </div></td><td><span class="badge bg-label-primary">active</span></td><td><div class="d-flex justify-content-center ">---</div></td></tr> -->
                  <?php $this->TableEtatEmps() ?>
        </tbody>
      </table>
    </div>
  </div>
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

  <!-- Main JS -->
  <script src="view/js/main.js"></script>

  <!-- Page JS -->
  <script src="view/js/etat-emp-table.js"></script>
</body>

</html>

<!-- beautify ignore:end -->
