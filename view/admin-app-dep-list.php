<?php 
$mat=$_SESSION['authentifier'];
if (isset($_GET['a'])) {
  $geta=$_GET['a'];
}
$chefMat=isset($geta)?parent::selectWhere('userMAT','users',"userROLE='chef' AND userDEPARTEMENT='$geta'")->fetch()['userMAT']:""  ?>

<!DOCTYPE html>


<html lang="fr" class="light-style layout-navbar-fixed layout-menu-fixed " dir="ltr" data-theme="theme-semi-dark" data-assets-path="view/" data-template="vertical-menu-template-semi-dark">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Liste des d&eacute;partements</title>

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

<?php $active=3; include 'admin-aside.php' ?>  
<!-- / Menu -->

    

    <!-- Layout container -->
    <div class="layout-page">
      
      



<!-- Navbar -->

<?php include 'admin-navbar.php' ?> 
<!-- / Navbar -->

      

      <!-- Content wrapper -->
<div class="content-wrapper">
        <!-- Content -->
 <div class="container-xxl flex-grow-1 container-p-y">
 
  <?php $this->showAlert()?>
    <h4 class="py-3 breadcrumb-wrapper mb-4">Liste des d&eacute;partements</h4>


    
    <div class="row align-items-center justify-content-evenly">
        <!-- Content -->
        <div class="mb-4 wi-auto">
        <div class="card">
        <div class="card-body" style="max-width: 7cm;">
        <form id="formDepList" method="POST" action="index.php?m=AddDep" >
          <div class="row" >
            <div class="mb-3">
              <label for="depID" class="form-label">ID d&eacute;partement</label>
              <input type="text" class="form-control" id="depID" name="depID" value="<?php if (isset($geta)) {
                echo $geta;
              }?>" onchange="fillMatricule()" required/>
            </div>
            <div class="mb-3 ">
              <label for="depNom" class="form-label">Nom d&eacute;partement</label>
              <input class="form-control" type="text" id="depNom" name="depNom"  required />
            </div>
            <div class="mb-3">
              <label for="chefMat" class="form-label">Matricule de chef </label>
              <input class="form-control" type="text" name="chefMat" id="chefMat" value="<?php echo $chefMat?>" required disabled/>
            </div>
          </div>
          <div class="mt-2 buttons">
            <button type="submit" class="btn btn-primary me-2" style="max-width: 2.2cm;" name="ajtDep">Ajouter</button>
            <button type="reset" class="btn btn-label-secondary" style="max-width: 2.2cm;"><a href="index.php?m=adminappdeplist" style="color: #69809a">Annuler</a></button>
          </div>
        </form>
      </div>
    </div>
    </div> 
<div class="mb-4 wi-auto">
  <div class="card">
    <div class="card-datatable table-responsive">
      <table class="dep-list-table table border-top">
        <thead>
          <tr>
            <th>#ID</th>
            <th>Nom de d&eacute;partement</th>
            <th>Chef de d&eacute;partement</th>
          </tr>
        </thead>
        <tbody>
          <!-- <tr><td>IT001</td><td>d&eacute;partement informatique et technologies</td><td>BENALI Djamal</td></tr>
          <tr><td>RH010</td><td>d&eacute;partement ressources humaines</td><td>BENYOUCEF Walid</td></tr> -->
          <?php $this->TableDepart();
          // if(isset($_GET['alert'])){
          //   $alertMessage = $_GET['alert'];
          //   echo "<script>alert('".$alertMessage."');var  parts = window.location.href.split('&alert')
          //   window.location.href = parts[0]</script>";
          // }?>
        </tbody>
      </table>
    </div>
  </div>
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
  function fillMatricule(){      
        var str = $("#depID").val();
          var  parts = window.location.href.split('&a')
            window.location.href = parts[0]+'&a='+str;
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
  <script src="view/libs/moment/moment.js"></script>
  <script src="view/libs/datatables-bs5/datatables-bootstrap5.js"></script>

  <!-- Main JS -->
  <script src="view/js/main.js"></script>

  <!-- Page JS -->
  <script src="view/js/app-dep-list.js"></script>
</body>

</html>

<!-- beautify ignore:end -->
