<?php 
$mat=$_SESSION['authentifier'];
$infoUser=parent::selectWhere('*','users',"userMAT='$mat'")->fetch(); ?>

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

<?php $active=0; include 'admin-aside.php' ?> 
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

            
          

<div class="row">
  <div class="col-md-12">
    <div class="card mb-4">
      <h5 class="card-header">D&eacute;tailles de Profile</h5>
      <!-- Account -->
      <div class="card-body">
        <div class="d-flex align-items-start align-items-sm-center gap-4">
          <img src="view/img/avatars/<?php 
                      echo $infoUser['userPHOTO'];
                    ?>"
                     alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
          <div class="button-wrapper">
          <form id="formAccountSettings" method="POST" action="index.php?m=updateAdmin">
            <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
              <span class="d-none d-sm-block">Nouvelle photo</span>
              <i class="bx bx-upload d-block d-sm-none"></i>
              <input type="file" id="upload" name="adminPhoto" class="account-file-input" hidden accept="image/png, image/jpeg" />
            </label>
            <button type="button" class="btn btn-label-secondary account-image-reset mb-4">
              <i class="bx bx-reset d-block d-sm-none"></i>
              <span class="d-none d-sm-block">R&eacute;nitialiser</span>
            </button>
            <p class="mb-0"> JPG ou PNG.</p>
          </div>
        </div>
      </div>
      <hr class="my-0">
      <div class="card-body">
        <!-- <form id="formAccountSettings" method="POST" action="index.php?m=updateAdmin"> -->
          <div class="row">
            <div class="mb-3 col-md-6">
              <label for="adminNom" class="form-label">Nom</label>
              <input class="form-control" type="text" id="adminNom" name="adminNom" value="<?php
                echo $infoUser['userNOM']?>" autofocus />
            </div>
            <div class="mb-3 col-md-6">
              <label for="adminPre" class="form-label">Pr&eacute;nom</label>
              <input class="form-control" type="text" name="adminPre" id="adminPre" value="<?php
                echo $infoUser['userPRE']?>" />
            </div>
            <div class="mb-3 col-md-6">
            <input class="form-control" type="hidden" id="empMat" name="MatPreced" value="<?php echo $mat?>" autofocus required/>
              <label for="adminMat" class="form-label">Nom d'utilisateur</label>
              <input class="form-control" type="text" name="adminMat" id="adminMat" value="<?php
                echo $mat?>" />
            </div>
            <div class="mb-3 col-md-6">
              <label for="adminEmail" class="form-label">E-mail</label>
              <input class="form-control" type="email" id="adminEmail" name="adminEmail" value="<?php
                      echo $infoUser['userEMAIL']?>" placeholder="@example.com" />
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label" for="phoneNumber">Num&eacute;ro de t&eacute;l&eacute;phone</label>
              <div class="input-group input-group-merge">
                <span class="input-group-text">(+213)</span>
                <input type="text" id="phoneNumber" name="phoneNumber" class="form-control" value="<?php
                      echo $infoUser['userPHONE']?> " />
              </div>
            </div>
            <div class="mb-3 col-md-6">
              <label for="adminAddress" class="form-label">Adresse</label>
              <input type="text" class="form-control" id="adminAddress" name="adminAddress" value="<?php
                     echo $infoUser['userADRESSE']?>" />
            </div>
            <div class="mb-3 col-md-6">
              <label for="adminNaiss" class="form-label">Date de naissance</label>
              <input class="form-control" type="text" name="adminNaiss" id="adminNaiss" value="<?php
                echo $infoUser['userNAISS']?>" />
            </div>
            <div class="mb-3 col-md-6">
              <label for="adminGenre" class="form-label">Genre</label>
              <select class="form-control" id="adminGenre" name="adminGenre" autofocus required style="-webkit-appearance: auto;-moz-appearance: auto;">
                <option value="H" <?php if($infoUser['userGENRE']=="H"){echo "selected";}?>>Homme</option>
                <option value="F" <?php if($infoUser['userGENRE']=="F"){echo "selected";}?>>Femme</option>
              </select>
            </div>
            <div class="mb-3 col-md-6">
              <label for="adminEtaciv" class="form-label">&Eacute;tat civile:&nbsp;</label>
              <div class="form-check form-check-inline mt-3">
                    <input class="form-check-input" type="radio" name="adminEtaciv" id="adminEtaciv" value="Mr"
                    <?php if($infoUser['userETACIV']=="Mr"){echo "checked";}?>/>
                    <label class="form-check-label" for="adminEtaciv">Mr</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="adminEtaciv" id="adminEtaciv" value="Mme" 
                    <?php if($infoUser['userETACIV']=="Mme"){echo "checked";}?>/>                    
                    <label class="form-check-label" for="adminEtaciv">Mme</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="adminEtaciv" id="adminEtaciv" value="Melle" 
                    <?php if($infoUser['userETACIV']=="Melle"){echo "checked";}?>/>                    
                    <label class="form-check-label" for="adminEtaciv">Melle</label>
                  </div>
            </div>
          </div>
          <div class="mt-2 buttons">
            <button type="submit" class="btn btn-primary me-2" name="saveAdmin">Sauvegarder</button>
            <button type="reset" class="btn btn-label-secondary">Annuler</button>
          </div>
        </form>
      </div>
      <!-- /Account -->
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
  <script>
    const fileInput = document.querySelector('#upload');

// Create a new File object
const myFile = new File( [],'<?php echo $infoUser['userPHOTO']?>', {
    type: 'image/jpeg',
    lastModified: new Date(),
});

// Now let's create a DataTransfer to get a FileList
const dataTransfer = new DataTransfer();
dataTransfer.items.add(myFile);
fileInput.files = dataTransfer.files;

    let e = document.getElementById("uploadedAvatar");
        
        const l = document.querySelector(".account-file-input")
          , c = document.querySelector(".account-image-reset");
        if (e) {
            const r = e.src;
            l.onchange = ()=>{
                
                l.files[0] && (e.src = "view/img/avatars/"+ l.files[0].name)
            }
            let userPhoto = "<?php echo $infoUser['userPHOTO']?>";
            c.onclick = ()=>{
                  // Get a reference to our file input
    const fileInput = document.querySelector('#upload');

    // Create a new File object
    const myFile = new File( [],'<?php echo $infoUser['userPHOTO']?>', {
        type: 'image/jpeg',
        lastModified: new Date(),
    });

    // Now let's create a DataTransfer to get a FileList
    const dataTransfer = new DataTransfer();
    dataTransfer.items.add(myFile);
    fileInput.files = dataTransfer.files;

                e.src = r
            }
        }
   
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
  <script src="view/libs/select2/select2.js"></script>
  <script src="view/libs/formvalidation/dist/js/FormValidation.min.js"></script>
  <script src="view/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>
  <script src="view/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script>
  <script src="view/libs/cleavejs/cleave.js"></script>
  <script src="view/libs/cleavejs/cleave-phone.js"></script>
  <script src="view/libs/sweetalert2/sweetalert2.js"></script>

  <!-- Main JS -->
  <script src="view/js/main.js"></script>

  <!-- Page JS -->
  
</body>

</html>

<!-- beautify ignore:end -->
