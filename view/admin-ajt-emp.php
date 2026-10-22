<?php 
$mat=$_SESSION['authentifier'];
if (isset($_GET['empEdit'])) {
  $getEmp=$_GET['empEdit'];
  $infoEmp=parent::selectWhere('*','users',"userMAT='$getEmp'")->fetch();
  $role=$infoEmp['userROLE'];
  $matric=$infoEmp['userMAT'];
  $nom=$infoEmp['userNOM'];
  $prenom=$infoEmp['userPRE'];
  $genre=$infoEmp['userGENRE'];
  $etaCiv=$infoEmp['userETACIV'];
  $naissDate=$infoEmp['userNAISS'];
  $email=$infoEmp['userEMAIL'];
  $phone=$infoEmp['userPHONE'];
  $adress=$infoEmp['userADRESSE'];
  $depart=$infoEmp['userDEPARTEMENT'];
  $post=$infoEmp['userPOST'];
  $photo=$infoEmp['userPHOTO'];
  $pwd=$infoEmp['userPWD'];
}?>
<!DOCTYPE html>


<html lang="fr" class="light-style layout-navbar-fixed layout-menu-fixed " dir="ltr" data-theme="theme-semi-dark" data-assets-path="view/" data-template="vertical-menu-template-semi-dark">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title><?php if (isset($_GET['empEdit'])) {echo "&Eacute;diter";}else {echo "Ajouter";}?> User</title>
    
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


<?php $active=4.2; include 'admin-aside.php' ?>  
<!-- / Menu -->

    <!-- Layout container -->
    <div class="layout-page">
      
<!-- Navbar -->

<?php include 'admin-navbar.php' ?> 
<!-- / Navbar -->



<div class="content-wrapper">
  <div class="container-xxl flex-grow-1 container-p-y wi-auto">
    <?php $this->showAlert()?>  
    <h4 class="py-3 breadcrumb-wrapper mb-4">Ajouter employ&eacute;</h4>
        <!-- Content -->
    <div class="card">
      <div class="card-body" style="max-width: 23cm;">
        <form id="formAjoutUser" method="POST" action="index.php?m=<?php if (isset($_GET['empEdit'])) {echo "modifierUser"; }else{echo"ajouterUser";}?>">
          <div class="row" >
          <div class="mb-3 col-md-6">
              <label for="empRole" class="form-label">Role<span style="color:red">*</span></label>
              <select class="form-control" id="empRole" name="empRole" autofocus required style="-webkit-appearance: auto;-moz-appearance: auto;">
                <option value='emp'<?php if (isset($_GET['empEdit'])) { if($role=="emp") echo "selected";} ?>>Employ&eacute;</option>
                <option value='chef'<?php if (isset($_GET['empEdit'])) { if($role=="chef") echo "selected";} ?>>Chef de d&eacute;partement</option>
                <option value='grh'<?php if (isset($_GET['empEdit'])) { if($role=="grh") echo "selected";} ?>>GRH</option>
                <option value='admin'<?php if (isset($_GET['empEdit'])) { if($role=="admin") echo "selected";} ?>>Administrateur</option>
              </select>
            </div>
            <div class="mb-3 col-md-6">
            <?php if (isset($_GET['empEdit'])) { echo'<input class="form-control" type="hidden" id="empMat" name="MatPreced" value="'.$getEmp.'" autofocus required/>';} ?>
              <label for="empMat" class="form-label">Matricule<span style="color:red">*</span></label>
              <input class="form-control" type="text" id="empMat" name="empMat" value="<?php if (isset($_GET['empEdit'])) { echo $matric;} ?>" autofocus required/>
            </div>
            <div class="mb-3 col-md-6">
              <label for="empNom" class="form-label">Nom<span style="color:red">*</span></label>
              <input class="form-control" type="text" id="empNom" name="empNom" value="<?php if (isset($_GET['empEdit'])) {echo $nom; } ?>" autofocus required/>
            </div>
            <div class="mb-3 col-md-6">
              <label for="empPrenom" class="form-label">Pr&eacute;nom<span style="color:red">*</span></label>
              <input class="form-control" type="text" id="empPrenom" name="empPrenom" value="<?php if (isset($_GET['empEdit'])) {echo $prenom; } ?>" autofocus required/>
            </div>
            <div class="mb-3 col-md-6">
              <label for="empGenre" class="form-label">Genre<span style="color:red">*</span></label>
              <select class="form-control" id="empGenre" name="empGenre" autofocus required style="-webkit-appearance: auto;-moz-appearance: auto;">
                <option <?php if (isset($_GET['empEdit'])) { if($genre=="Homme") echo "selected";} ?>>Homme</option>
                <option <?php if (isset($_GET['empEdit'])) { if($genre=="Femme") echo "selected";} ?>>Femme</option>
              </select>
            </div>
            <div class="mb-3 col-md-6">
                  <label for="empETACIV" class="form-label">&eacute;tat civile <span style="color:red">*</span> </label>
                  <div class="form-check form-check-inline mt-3">
                    <input class="form-check-input" type="radio" name="empETACIV" id="empETACIV1" value="Mr" <?php if (isset($_GET['empEdit'])) { if($etaCiv=="Mr") echo "checked ";} ?>required  />
                    <label class="form-check-label" for="empETACIV1">Mr</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="empETACIV" id="empETACIV2" value="Mme" <?php if (isset($_GET['empEdit'])) { if($etaCiv=="Mme") echo "checked ";}?>/>
                    <label class="form-check-label" for="empETACIV2">Mme</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="empETACIV" id="empETACIV3" value="Melle"<?php if (isset($_GET['empEdit'])) { if($etaCiv=="Melle") echo "checked ";}?> />
                    <label class="form-check-label" for="empETACIV3">Melle</label>
                  </div>
            </div>
            <div class="mb-3 col-md-6">
              <label for="empNaiss" class="form-label">Date de naissance<span style="color:red">*</span></label>
              <input class="form-control" type="date" id="empNaiss" name="empDateN" value="<?php if (isset($_GET['empEdit'])) {echo $naissDate; } ?>" autofocus required/>
            </div>
            <div class="mb-3 col-md-6">
              <label for="empEmail" class="form-label">Email<span style="color:red">*</span></label>
              <input class="form-control" type="text" id="empEmail" name="empEmail" value="<?php if (isset($_GET['empEdit'])) {echo $email; } ?>" autofocus required/>
            </div>
            <div class="mb-3 col-md-6">
              <label for="empPhone" class="form-label">Num&eacute;ro tel<span style="color:red">*</span></label>
              <div class="input-group input-group-merge">
                <span class="input-group-text">(+213)</span>
                <input class="form-control" type="number" id="empPhone" name="empPhone" value="<?php if (isset($_GET['empEdit'])) {echo $phone; } ?>" autofocus required/>
              </div>
            </div>
            <div class="mb-3 col-md-6">
              <label for="empAdress" class="form-label">Adresse<span style="color:red">*</span></label>
              <input class="form-control" type="text" id="empAdress" name="empAdress" value="<?php if (isset($_GET['empEdit'])) {echo $adress; } ?>" autofocus required/>
            </div>
            <div class="mb-3 col-md-6">
              <label for="empDep" class="form-label">D&eacute;partement<span style="color:red">*</span></label>
              <input class="form-control" type="text" id="empDep" name="empDep" value="<?php if (isset($_GET['empEdit'])) {echo $depart; }else {echo "---";} ?>" autofocus required/>
            </div>
            <div class="mb-3 col-md-6">
              <label for="empPost" class="form-label">Poste<span style="color:red">*</span></label>
              <input class="form-control" type="text" id="empPost" name="empPost" value="<?php if (isset($_GET['empEdit'])) {echo $post; } ?>" autofocus required/>
            </div>
            <div class="mb-3 col-md-6">
              <label for="empPhoto" class="form-label">Ajouter photo:&emsp;<span class="text-lowercase">(seulement .png/.jpeg)</span></label><!--remarque-->
              <input type="file" class="form-control" id="empPhoto" name="empPhoto" accept="image/jpeg,image/png"><!--acceder au photo-->
            </div>
            <div class="mb-3 col-md-6">
              <button type="button" class="btn btn-secondary me-2" name="passGenerator" onclick="generatePWD()" <?php if (isset($_GET['empEdit'])) {echo "disabled"; }else{echo "required";} ?>>génerer un mot de passe<span style="color:red">*</span></button>
              <input type="hidden" class="form-control" id="passWORD" name="passWORD" value="" <?php if (!isset($_GET['empEdit'])) {echo "required"; } ?>>
            </div>
          </div>
          <div class="mt-2 buttons">
              <button type="submit" class="btn btn-primary me-2" name="addEmp"><?php if (isset($_GET['empEdit'])) {echo "Modifier"; }else{echo"Ajouter";} ?></button>
              <button type="reset" class="btn btn-label-secondary">Annuler</button>
          </div> 
        </form>
      </div>
    </div> 
</div>
<?php if (isset($_GET['empEdit'])) {echo "<script>
    // Get a reference to our file input
    const fileInput = document.querySelector('#empPhoto');

    // Create a new File object
    const myFile = new File( [],'$photo', {
        type: 'image/jpeg',
        lastModified: new Date(),
    });

    // Now let's create a DataTransfer to get a FileList
    const dataTransfer = new DataTransfer();
    dataTransfer.items.add(myFile);
    fileInput.files = dataTransfer.files;
    </script>"; } ?>
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
  function generatePWD() {
    <?php
     do {
      $pass="SONA";
     for($i=0;$i<10;$i++){
         $pass.=rand(0,9);
     }
     $pwdExist=parent::selectWhere('userPWD','users',"userPWD='$pass'")->fetch()['userPWD'];
     } while (!empty($pwdExist));
    
    ?>

    $('#passWORD').val('<?php echo $pass?>');
  }
  $('#formAjoutUser input').on('keydown', function (event) {
  if (event.keyCode === 13 && !$(event.target).is('input')) {
      event.preventDefault();
      return false;
  }
  });          
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
