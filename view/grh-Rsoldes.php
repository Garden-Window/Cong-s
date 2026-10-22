<?php 
$mat=$_SESSION['authentifier'];
$getEmp=isset($_GET['emp'])?$_GET['emp']:"";
if ($getEmp) {
 
 $empSoldes=parent::selectWhere('soldeAN, soldeREC, soldeINZC','soldes',"empMat='$getEmp'")->fetch();
 $soldAN=$empSoldes['soldeAN'];
 $soldRec=$empSoldes['soldeREC'];
 $soldInzc=$empSoldes['soldeINZC'];
}

?>
<!DOCTYPE html>


<html lang="fr" class="light-style layout-navbar-fixed layout-menu-fixed " dir="ltr" data-theme="theme-semi-dark" data-assets-path="view/" data-template="vertical-menu-template-semi-dark">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Remplissage des soldes</title>
    
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

    <!-- s CSS -->
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


<?php $active=4; include 'grh-aside.php' ?>  
<!-- / Menu -->

    <!-- Layout container -->
    <div class="layout-page">
      
<!-- Navbar -->

<?php include 'grh-navbar.php' ?> 
<!-- / Navbar -->



<div class="content-wrapper">
  <div class="container-xxl flex-grow-1 container-p-y wi-auto">
  <?php $this->showAlert()?>  

    <h4 class="py-3 breadcrumb-wrapper mb-4">Champ de replissage des soldes de cong&eacute;s</h4>
        <!-- Content -->
    <div class="card">
      <div class="card-body" style="max-width: 23cm;">
        <form id="formRSoldes" method="POST" action="index.php?m=modifierSolde">
          <div class="row" >
            <div class="mb-3 col-md-6">
              <label for="empMAT" class="form-label">Matricule employ&eacute;</label>
              <input class="form-control" type="text" id="empMAT" name="empMAT" value="<?php
              if (isset($_GET['emp'])) {
                echo $_GET['emp'];
              }
              ?>"  onchange="autoFillSolde()"  autofocus required/>
            </div>
            <div class="mb-3 col-md-6">
              <label for="soldann" class="form-label">Solde annuel</label>
              <input class="form-control" type="text" id="soldann" name="soldann" value="<?php
              if (isset($_GET['emp'])) {
                echo $soldAN;
              }
              ?>" autofocus required/>
            </div>
            <div class="mb-3 col-md-6">
              <label for="soldrec" class="form-label">Solde de récuperation</label>
              <input class="form-control" type="text" id="soldrec" name="soldrec" value="<?php
              if (isset($_GET['emp'])) {
                echo $soldRec;
              }
              ?>" autofocus required />
            </div>
            <div class="mb-3 col-md-6">
              <label for="soldinzc" class="form-label">Solde de récuperation INZC</label>
              <input class="form-control" type="text" id="soldinzc" name="soldinzc" value="<?php
              if (isset($_GET['emp'])) {
                echo $soldInzc;
              }
              ?>" autofocus required/>
            </div>
          </div>
          <div class="mt-2 buttons">
              <button type="submit" class="btn btn-primary me-2" name="EnvSolde">Envoyer</button>
              <button type="reset" class="btn btn-label-secondary"><a href="index.php?m=grhRsoldes" style="color: #69809a">Annuler</a></button>
          </div>
        </form>
      </div>
    </div> 
</div>
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
  <script>
    function autoFillSolde(){
      $("#soldann").val('');
      $("#soldrec").val('');
      $("#soldinzc").val('');
        var str = $("#empMAT").val();
          var  parts = window.location.href.split('&emp')
            window.location.href = parts[0]+'&emp='+$("#empMAT").val();
          };
  </script>
  <!-- build:js assets//js/core.js -->
  <script src="view/libs/jquery/jquery.js"></script>
  <script src="view/libs/popper/popper.js"></script>
  <script src="view/js/bootstrap.js"></script>
  <script src="view/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  
  <script src="view/libs/hammer/hammer.js"></script>
  

  <script src="view/libs/i18n/i18n.js"></script>
  <script src="view/libs/typeahead-js/typeahead.js"></script>
  
  <script src="view/js/menu.js"></script>
  <!-- endbuild -->

  <!-- s JS -->
  <script src="view/libs/apex-charts/apexcharts.js"></script>

  <!-- Main JS -->
  <script src="view/js/main.js"></script>

  <!-- Page JS -->
  <script src="view/js/dashboards-analytics.js"></script>
</body>

</html>

<!-- beautify ignore:end -->
