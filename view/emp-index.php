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
    <link rel="stylesheet" href="view/css/tableSolde.css" />

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


<?php $active=1; include 'emp-aside.php' ?>  
<!-- / Menu -->

    <!-- Layout container -->
    <div class="layout-page">
      
<!-- Navbar -->

<?php include 'emp-navbar.php' ?> 
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
              <h3><?php
              echo $infoUser['userETACIV'].".". $infoUser['userNOM']." ".$infoUser['userPRE']?>
              </h3>
              <br>
              <h5>Bienvenu dans l'espace d'employ&eacute;</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / Bienvenu-->
  </div>

  <div class="right-sidebar" >
    <h4>Consultation:</h4>
      <div class="card" >
        <div class="card-body">
           <?php $sldUser=parent::selectWhere('soldean,solderec,soldeinzc','soldes',"empMat='$mat'")->fetch();?>

          <table class="table"  >
            <thead>        </thead>
            <tbody>
              <tr>
                
                <td>Le solde de cong&eacute; annuel</td>
                <td><?php if (isset($sldUser['soldean'])) {
                  echo $sldUser['soldean']."jrs" ;
                }else {
                  echo "0jrs";
                }
                ?> 
                </td>
                
              </tr>
              <tr>
                
                <td>Le solde de cong&eacute; de r&eacute;cuperation</td>
                <td><?php if (isset($sldUser['solderec'])) {
                  echo $sldUser['solderec']."jrs";
                }else {
                  echo "0jrs";
                }
                ?></td>
                
              </tr>
              <tr>
                
                <td>Le solde de cong&eacute; de r&eacute;cuperation INZC</td>
                <td><?php if (isset($sldUser['soldeinzc'])) {
                  echo $sldUser['soldeinzc']."jrs";
                }else {
                  echo "0jrs";
                }
                ?></td>
                
              </tr>
              <tr>
                <?php

                $etaDer=parent::selectWhere('cngETAT','conges',"timeDepo='".parent::selectWhere('MAX(timeDepo)','conges',"userMat='$mat' AND dateDepo='".parent::selectWhere('MAX(dateDepo)','conges',"userMat='$mat'")->fetch()['MAX(dateDepo)']."'")->fetch()['MAX(timeDepo)']."'")->fetch()
                ?>
                <td>&Eacute;tat de derni&egrave;re demande de cong&eacute;</td>
                <td><?php if (isset($etaDer['cngETAT'])) {
                switch ($etaDer['cngETAT']) {
                  case 'valid&eacute;e':
                    echo "<span class='badge bg-label-success'>".$etaDer['cngETAT']."</span>";
                    break;
                  case 'refus&eacute;e':
                    echo "<span class='badge bg-label-danger'>".$etaDer['cngETAT']."</span>";
                    break;
                  case 'en attente':
                    echo "<span class='badge bg-label-warning'>".$etaDer['cngETAT']."</span>";
                    break;
                  
                  default:
                    echo "Aucune demande";
                    break;
                }
                }else {
                  echo "Aucune demande";
                }
                ?>
                  </td>
                
              </tr>
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
  <script src="view/libs/apex-charts/apexcharts.js"></script>

  <!-- Main JS -->
  <script src="view/js/main.js"></script>

  <!-- Page JS -->
  <script src="view/js/dashboards-analytics.js"></script>
</body>

</html>

<!-- beautify ignore:end -->
