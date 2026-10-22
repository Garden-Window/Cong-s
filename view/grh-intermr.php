<?php 
$mat=$_SESSION['authentifier'];
?>
<!DOCTYPE html>


<html lang="fr" class="light-style layout-navbar-fixed layout-menu-fixed " dir="ltr" data-theme="theme-semi-dark" data-assets-path="view/" data-template="vertical-menu-template-semi-dark">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Int&eacute;rimaires formulaire</title>
    
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


<?php $active=3; include 'grh-aside.php' ?>  
<!-- / Menu -->

    <!-- Layout container -->
    <div class="layout-page">
      
<!-- Navbar -->

<?php include 'grh-navbar.php' ?> 
<!-- / Navbar -->



<div class="content-wrapper">
  <div class="container-xxl flex-grow-1 container-p-y wi-auto">
  <?php $this->showAlert()?>  

    <h4 class="py-3 breadcrumb-wrapper mb-4">Champ de remplissage d'int&eacute;rimaire</h4>
        <!-- Content -->
    <div class="card">
      <div class="card-body" style="max-width: 23cm;">
        <form id="formIntermr" method="POST" action="index.php?m=GererIntrmr">
          <div class="row" >
            <div class="mb-3 col-md-6">
              <label for="chefMat" class="form-label">Matricule chef de d&eacute;partement</label>
              <input class="form-control" type="text" id="chefMat" name="chefMat" value="<?php 
              if(isset($_GET['a'])){ echo htmlspecialchars(htmlspecialchars($_GET['a']));}?>" onchange="autofill1()" autofocus required/>
            </div>
                <?php
                    if (isset($_GET['a'])) {
                      $geta=htmlspecialchars(htmlspecialchars($_GET['a']));
                      $npChef =parent::selectWhere('userNOM,userPRE','users',"userMAT='$geta'")->fetch();
                    }
                    ?>
            <div class="mb-3 col-md-6">
              <label for="chefNom" class="form-label">Nom chef de d&eacute;partement</label>
              <input class="form-control" type="text" id="chefNom" name="chefNom" value="<?php if (isset($_GET['a'])) {echo $npChef['userNOM'];}?>" autofocus disabled required/>
            </div>
            <div class="mb-3 col-md-6">
              <label for="chefPRE" class="form-label">Pr&eacute;nom chef de d&eacute;partement</label>
              <input class="form-control" type="text" id="chefPRE" name="chefPRE" value="<?php if (isset($_GET['a'])) {echo $npChef['userPRE'];}?>" autofocus disabled required/>
            </div>
            <hr class="border-light my-2" style="border-width:medium;">
            <div class="mb-3 col-md-6">
              <label for="intermMat" class="form-label">Matricule interimaire</label>
              <input class="form-control" type="text" id="intermMat" name="intermMat" value="<?php
               if(isset($_GET['b'])){ echo htmlspecialchars(htmlspecialchars($_GET['b']));}?>" onchange="autofill2()" autofocus required/>
            </div>
            <?php
                    if (isset($_GET['b'])) {
                      $getb=htmlspecialchars(htmlspecialchars($_GET['b']));
                      $nppINTERM =parent::selectWhere('userNOM,userPRE,userPOST','users',"userMAT='$getb'")->fetch();
                    }
                    ?>
            <div class="mb-3 col-md-6">
              <label for="intermPost" class="form-label">Poste interimaire</label>
              <input class="form-control" type="text" id="intermPost" name="intermPost" value="<?php if (isset($_GET['b'])) {echo $nppINTERM['userPOST'];}?>"disabled autofocus required/>
            </div>
            <div class="mb-3 col-md-6">
              <label for="intermNom" class="form-label">Nom interimaire</label>
              <input class="form-control" type="text" id="intermNom" name="intermNom" value="<?php if (isset($_GET['b'])) {echo $nppINTERM['userNOM'];}?>"disabled autofocus required/>
            </div>
            <div class="mb-3 col-md-6">
              <label for="intermPRE" class="form-label">Pr&eacute;nom interimaire</label>
              <input class="form-control" type="text" id="intermPRE" name="intermPRE" value="<?php if (isset($_GET['b'])) {echo $nppINTERM['userPRE'];}?>"disabled autofocus required/>
            </div>
            <hr class="border-light my-2" style="border-width:medium;">
            <div class="mb-3 col-md-6">
              <label for="Du" class="form-label">Du</label>
              <input class="form-control" type="date" id="Du" name="Du" value="" autofocus required/>
            </div>
            <div class="mb-3 col-md-6">
              <label for="Au" class="form-label">Au</label>
              <input class="form-control" type="date" id="Au" name="Au" value="" autofocus required/>
            </div>
          </div>
          <div class="mt-2 buttons">
              <button type="submit" name="Remplacer" class="btn btn-primary me-2">Remplacer</button>
              <button type="reset" class="btn btn-label-secondary">Annuler</button>
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
    function autofill1(){
        // Get value on button click and show alert
      
        var str = $("#chefMat").val();
          
          var  parts = window.location.href.split('&a')
            window.location.href = parts[0]+'&a='+str;
          };
    function autofill2(){
        // Get value on button click and show alert
      
        var str = $("#intermMat").val();
       
          var  parts = window.location.href.split('&b')
            window.location.href = parts[0]+'&b='+str;
          };
    </script>
  <!-- build:js assets/vendor/js/core.js -->
  <script src="view/libs/jquery/jquery.js"></script>
  <script src="view/libs/popper/popper.js"></script>
  <script src="view/js/bootstrap.js"></script>
  <script src="view/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  
  <script src="view/libs/hammer/hammer.js"></script>
  

  <script src="view/libs/i18n/i18n.js"></script>
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
