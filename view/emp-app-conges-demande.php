<?php 
$mat=$_SESSION['authentifier'];
$infoUser=parent::selectWhere('*','users',"userMAT='$mat'")->fetch();?>

<!DOCTYPE html>


<html lang="fr" class="light-style layout-navbar-fixed layout-menu-fixed " dir="ltr" data-theme="theme-semi-dark" data-assets-path="view/" data-template="vertical-menu-template-semi-dark">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Demande de cong&eacute;</title>

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
    <link rel="stylesheet" href="view/libs/select2/select2.css" />
    <link rel="stylesheet" href="view/libs/formvalidation/dist/css/formValidation.min.css" />

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

<?php $active=2; include 'emp-aside.php' ?>
<!-- / Menu -->

    

    <!-- Layout container -->
    <div class="layout-page">
      
      



<!-- Navbar -->

<?php include 'emp-navbar.php' ?> 
<!-- / Navbar -->



      <!-- Content wrapper -->
      <div class="content-wrapper">
      <div class="container-xxl flex-grow-1 container-p-y wi-auto">
        <?php $this->showAlert()?>  

      <h4 class="py-3 breadcrumb-wrapper mb-4">
            Demande de cong&eacute;
          </h4>
        <!-- Content -->
        <div class="card">
        <div class="card-body" style="max-width: 23cm;">
        <form id="formCongDemande" method="POST" action="index.php?m=AjoutDemand">
          <div class="row" >
            <input type="hidden" value="<?php echo $mat?>" name="mat"/>
            <div class="mb-3 col-md-6">
              <label class="form-label">Nom</label>
              <input class="form-control" type="text" id="nomEmp" name="nomEmp" value="<?php 
                echo $infoUser['userNOM']?>" disabled/>
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label">Pr&eacute;nom</label>
              <input class="form-control" type="text" name="prnmEmp" id="prnmEmp" value="<?php 
                echo $infoUser['userPRE'];?>" disabled/>
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label">Poste</label>
              <input type="text" class="form-control" id="postEmp" name="postEmp" value="<?php
                echo $infoUser['userPOST']?> "disabled />
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label">Type de cong&eacute;</label>
              <select class="form-control" id="congType" name="congType" autofocus style="-webkit-appearance: auto;-moz-appearance: auto;">
                <option value="R&eacute;cup&eacute;ration">R&eacute;cup&eacute;ration</option>
                <option value="Annuel">Annuel</option>
              </select>
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label">Date d&eacute;but</label>
              <input type="date" id="dateD" name="dateD" class="form-control"  value="" autofocus />
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label">Date fin</label>
              <input class="form-control" type="date" id="dateF" name="dateF"  value="" autofocus />
            </div>
          </div>
          <div class="mt-2 buttons">
            <button type="submit" class="btn btn-primary me-2" name="Demander">Demander</button>
            <button type="reset" class="btn btn-label-secondary">Annuler</button>
          </div>
        </form>
      </div>
    </div> 



          <!-- / Content -->

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
  <script src="view/libs/select2/select2.js"></script>
  <script src="view/libs/formvalidation/dist/js/FormValidation.min.js"></script>
  <script src="view/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>
  <script src="view/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script>
  <script src="view/libs/cleavejs/cleave.js"></script>
  <script src="view/libs/cleavejs/cleave-phone.js"></script>

  <!-- Main JS -->
  <script src="view/js/main.js"></script>

  <!-- Page JS -->
  <script src="view/js/app-user-list.js"></script>
</body>

</html>

<!-- beautify ignore:end -->
