<?php 
$mat=$_SESSION['authentifier'];
$infoUser=parent::selectWhere('*','users',"userMAT='$mat'")->fetch(); ?>
<!DOCTYPE html>


<html lang="fr" class="light-style layout-navbar-fixed layout-menu-fixed " dir="ltr" data-theme="theme-semi-dark" data-assets-path="view/" data-template="vertical-menu-template-semi-dark">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Acceuil</title>
    
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
    <link rel="stylesheet" href="view/libs/apex-charts/apex-charts.css" />

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


<?php $active=1; include 'chef-aside.php' ?>  
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

            
            

<div class="row">
  <!-- Bienvenu-->
  <div class="mb-4 col-12 bienvenu">
    <div class="card" style="border-radius:20px;">
      <div class="card-body">
        <div class="d-flex align-items-center pb-0 pt-0 col-12 flex-wrap">
          <img src="view/img/bienvenu/bienvenu<?php echo $infoUser['userGENRE']?>.png" style="width:auto;height:210px;margin:0 10px;"/>        
          <div style="word-break: break-all;">
            <h3>
            <?php echo $infoUser['userETACIV'].".". $infoUser['userNOM']." ".$infoUser['userPRE']?>
            </h3>
            <br>
            <h5>Bienvenu dans l'espace de chef de d&eacute;partement</h5>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- / Bienvenu-->
  
</div>
<div class="row chef-anals g-4 mb-4 d-flex justify-content-center">
  <div class="col-sm-6 col-xl-3">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-start justify-content-between">
          <div class="content-left">
            <?php 
              $DepUser=parent::selectWhere('userdepartement','users',"userMAT='$mat'")->fetch();
              $DepUser=$DepUser['userdepartement'];?>
            <span>Employ&eacute;s totales</span>
            <div class="d-flex align-items-end mt-2">
              <h4 class="mb-0 me-2">
              <?php $nbUsers=parent::selectWhere('COUNT(userMAT)','users',"userDEPARTEMENT='$DepUser'AND NOT (userROLE=('chef') OR userROLE=('admin'))")->fetch();
              echo $nbUsers['COUNT(userMAT)'];?>
              </h4>
            </div>
          </div>
          <span class="badge bg-label-primary rounded p-2">
            <i class="bx bx-group bx-sm"></i>
          </span>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-xl-3">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-start justify-content-between">
          <div class="content-left">
            <span><b>Total</b> des demandes de cong&eacute;s</span>
            <div class="d-flex align-items-end mt-2">
              <h4 class="mb-0 me-2">

              <?php 
                $totalCngs = 0;
                $nbUsers = parent::selectWhere('usermat', 'users', "!userMAT AND userdepartement='$DepUser'");
                while ($row = $nbUsers->fetch()) {
                    $nbCngs = parent::selectWhere('COUNT(idconge)', 'conges', "usermat='" . $row['usermat'] . "'")->fetch();
                    $totalCngs += $nbCngs['COUNT(idconge)'];
                }
                
                echo $totalCngs; 
                // $depUser=$infoUser['userDEPARTEMENT'];
                // $nbDem=parent::selectWhere('COUNT(idconge)', 'conges',"usermat IN (SELECT userMAT FROM 'users' WHERE userdepartement='$depUser')")->fetch();
                ?> 
              </h4>
            </div>
          </div>
          <span class="badge bg-label-primary rounded p-2">
            <i class="bx bx-calendar bx-sm"></i>
          </span>
        </div>
      </div>
    </div>
  </div>

  <div class="col-sm-6 col-xl-3">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-start justify-content-between">
          <div class="content-left">
            <span>Demandes de cong&eacute; <b>valid&eacute;s</b></span>
            <div class="d-flex align-items-end mt-2">
              <h4 class="mb-0 me-2">
                <?php 
                 $totalCngsValides = 0;
                 $nbUsers = parent::selectWhere('usermat', 'users', "!userMAT AND userdepartement='$DepUser'");
                 while ($row = $nbUsers->fetch()) {
                     $nbCngsValides = parent::selectWhere('COUNT(idconge)', 'conges', "usermat='" . $row['usermat'] . "' AND cngETAT='valid&eacute;e'")->fetch();
                     $totalCngsValides += $nbCngsValides['COUNT(idconge)'];
                 }
                 
                 echo $totalCngsValides;
                ?>
              </h4>
            </div>
          </div>
          <span class="badge bg-label-success rounded p-2">
            <i class="bx bx-calendar-check bx-sm"></i>
          </span>
        </div>
      </div>
    </div>
  </div>  
</div>




<div class="chef-anals row g-4 mb-4 d-flex justify-content-center">
  <div class="col-sm-6 col-xl-3">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-start justify-content-between">
          <div class="content-left">
            <span>Demandes de cong&eacute;<b> refus&eacute;s</b></span>
            <div class="d-flex align-items-end mt-2">
              <h4 class="mb-0 me-2">
              <?php 
                  $totalCngsRefusees = 0;
                  $nbUsers = parent::selectWhere('usermat', 'users', "!userMAT AND userdepartement='$DepUser'");
                  while ($row = $nbUsers->fetch()) {
                      $nbCngsRefusees = parent::selectWhere('COUNT(idconge)', 'conges', "usermat='" . $row['usermat'] . "' AND cngETAT='refus&eacute;e'")->fetch();
                      $totalCngsRefusees += $nbCngsRefusees['COUNT(idconge)'];
                  }
                  
                  echo $totalCngsRefusees;
                ?>
              </h4>
            </div>
          </div>
          <span class="badge bg-label-danger rounded p-2">
            <i class="bx bx-calendar-x bx-sm"></i>
          </span>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-xl-3">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-start justify-content-between">
          <div class="content-left">
            <span>Demandes de cong&eacute;<b> en attente</b></span>
            <div class="d-flex align-items-end mt-2">
              <h4 class="mb-0 me-2">
              <?php 
                  $totalCngsEnAttente = 0;
                  $nbUsers = parent::selectWhere('usermat', 'users', "!userMAT AND userdepartement='$DepUser'");
                  while ($row = $nbUsers->fetch()) {
                      $nbCngsEnAttente = parent::selectWhere('COUNT(idconge)', 'conges', "usermat='" . $row['usermat'] . "' AND cngETAT='en attente'")->fetch();
                      $totalCngsEnAttente += $nbCngsEnAttente['COUNT(idconge)'];
                  }
                  
                  echo $totalCngsEnAttente;
                ?>
              </h4>
            </div>
          </div>
          <span class="badge bg-label-warning rounded p-2">
            <i class="bx bx-calendar-exclamation bx-sm"></i>
          </span>
        </div>
      </div>
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

  <!-- Main JS -->
  <script src="view/js/main.js"></script>

  <!-- Page JS -->

</body>

</html>

<!-- beautify ignore:end -->
