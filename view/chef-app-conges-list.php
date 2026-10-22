<?php 
$mat=$_SESSION['authentifier'];
$infoUser=parent::selectWhere('*','users',"userMAT='$mat'")->fetch();?>
<!DOCTYPE html>


<html lang="fr" class="light-style layout-navbar-fixed layout-menu-fixed " dir="ltr" data-theme="theme-semi-dark" data-assets-path="view/" data-template="vertical-menu-template-semi-dark">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Gestion des cong&eacute;s</title>

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

<?php $active=2; include 'chef-aside.php' ?>
<!-- / Menu -->

    

    <!-- Layout container -->
    <div class="layout-page">
      
      



<!-- Navbar -->

<?php include 'chef-navbar.php' ?> 
<!-- / Navbar -->


      <!-- Content wrapper -->
      <div class="content-wrapper">

        <!-- Content -->

<script>
  function refuserForm(e,u) {
    var c=e.onclick;
    e.onclick = null;
    $(".refuse-Form-container").css("display", "flex");
    $(".refuse-Form-container .card-body").append('<form id="FormRefus" action="index.php?m=refuserDemande" method="post"><input type="hidden" name="idCong" value="'+u+'" /><textarea class="form-control" name="note" rows="3" style="height: 74px;"></textarea><div class="mt-2 buttons"><button type="submit" class="btn btn-primary me-2" name="refuser">Envoyer</button><button type="reset" onclick="annulerRefus('+c+')" class="btn btn-label-secondary">Annuler</button></div></form>')
  } 
  function annulerRefus(c) {
    enableOnClickForClass('refuse-demande',c);
    $(".refuse-Form-container").css("display", "none");
    var form = document.getElementById("FormRefus");
    form.remove();
  }
  function enableOnClickForClass(className,c) {
  var elements = document.querySelectorAll("." + className);
  for (var i = 0; i < elements.length; i++) {
    var element = elements[i];
    element.onclick =c;
    // element.onclick = ;alert("kkk")
  }
}
</script>
        <div class="container-xxl flex-grow-1 container-p-y">
          <?php $this->showAlert()?>  
            <div class="refuse-Form-container" style=" display:none;justify-content: center;position:absolute;max-height: 300px; width: 90%;z-index: 1;">
              <div class="card" style="width:50%">
                <div class="card-body">
                  <h5>Pour compléter la procédure de refus, veuillez fournir la<b style="color: red;"> raison du refus</b>, s'il vous plaît.</h5>
                </div>  
              </div>
            </div>
          <h4 class="py-3 breadcrumb-wrapper mb-4">
            Gestion de validation des cong&eacute;s
          </h4>
<!-- Conges List Table -->
<div class="card">
  <div class="card-header border-bottom">
    <h5 class="card-title">Liste des demandes de cong&eacute;</h5>
    <div class="d-flex justify-content-evenly align-items-center row py-3 gap-3 gap-md-0">
      <div class="col-md-4 conge_type"></div>
      <div class="col-md-4 conge_etat"></div>
    </div>
  </div>
  <div class="card-datatable table-responsive">
    <table class="datatables-conges-validation table border-top display nowrap">
      <thead>
        <tr>
          <th></th>
          <th>#ID</th>
          <th>Demandeur</th>
          <!-- <th>Poste</th> -->
          <th>Type</th>
          <th>Date de dépôt</th>
          <th>D&eacute;but de cong&eacute;</th>
          <th>Fin de cong&eacute;</th>
          <th>Dur&eacute;e</th>
          <th>état</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <!-- <tr><td></td><td>CNJ0001</td>
          <td><div class="d-flex justify-content-start align-items-center user-name">
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
                </div>
              </td><td>Annuel</td><td>2023-04-23</td><td>2023-07-15</td><td>2023-08-14</td><td>30jrs</td><td><span class="badge bg-label-warning">en attente</span></td>
              <td><div class="ActionsChef d-flex justify-content-between text-nowrap">
                    <button class="btn btn-sm btn-icon mx-2 valide-demande" onclick="alertv()" title="valider <br/>la demande" data-toogle="tooltip">
                      <span class="badge bg-label-success"><i class="bx bx-check"></i></span>
                    </button>
                    <button class="btn btn-sm btn-icon mx-2 delete-demande">
                      <span class="badge bg-label-danger"><i class="bx bx-x"></i></span>
                    </button>
                  </div>

                  <script type="text/javascript">
                    function alertv() {
                      // $(".alertss-container").append('<div class="alerts-container" style="z-index:1;position:absolute"></div>'),
                      $(".alerts-container").prepend('<div id="alertv"  class="alert alert-success alert-dismissible d-flex align-items-center" role="alert"><i class="bx bx-xs bx-desktop me-2"></i>This is a success dismissible alert — check it out!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'),
                      //$(".valide-demande").on("click",function() {
                        // let arr=document.getElementsByClassName("alert");
                        // arr.forEach(alert => {
                          
                        // });
                        $("#alertv").show('fade')
                        // ;$(document).ready(function(){
                        //   setTimeout(function() {$("#alertv").hide('fade'),setTimeout(function() {$(".alert:first-child").remove()}, 500)}, 5000)
                        // })
                        , setTimeout(function() {$("#alertv").hide('fade'),setTimeout(function() {$("#alertv").remove()}, 500)}, 7000)
                        //  ;setTimeout(function() {$("#alertv").hide("fade"),sleep(2),$("#alertv").remove()}, 1000)
                      //} )

                   
                    }
                  </script>
                </td></tr>
        <tr><td></td><td>#609</td>
          <td><div class="d-flex justify-content-start align-items-center user-name">
                  <div class="avatar-wrapper">
                    <div class="avatar avatar-sm me-3">
                      <img src="view/img/avatars/10.png" alt="Avatar" class="rounded-circle">
                    </div>
                  </div>
                  <div class="d-flex flex-column">
                      <span class="fw-semibold text-body text-truncate">Amel hasni</span>
                      <small class="text-muted">ingenieur d'etat</small>
                      <small style="color: #5a8dee;">sona854775</small>
                  </div>
                </div></td><td>r&eacute;cuperation</td><td>12-05-2023</td><td>13-08-2023</td><td>17-08-2023</td><td>5jrs</td><td><span class="badge bg-label-success">valid&eacute;e</span></td><td><div class="ActionsChef d-flex justify-content-center">---</div></td></tr> -->
                <?php $this->tableValidation($infoUser['userDEPARTEMENT'])?>
      </tbody>
    </table>
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
    
  </script>
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
  <script src="view/js/chef-app-conges-list.js"></script>
</body>

</html>

<!-- beautify ignore:end -->
