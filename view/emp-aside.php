<?php $infoUser=parent::selectWhere('*','users',"userMAT='$mat'")->fetch();?>
<link rel="stylesheet" href="view/css/emp-profile.css">
<aside id="layout-menu" class="layout-menu menu-vertical menu emp-menu bg-menu-theme">

<div class="app-brand demo">
    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
      <i class="bx menu-toggle-icon d-none d-xl-block fs-4 align-middle"></i>
      <i class="bx bx-x d-block d-xl-none bx-sm align-middle"></i>
    </a>
</div>

  <ul class="menu-inner py-1">
    <!----------------------->
    <div class="profile">
        <div class="profile-image">
        <a href="index.php?m=empprofile"><img src="view/img/avatars/<?php echo $infoUser['userPHOTO'];?>" alt="john" class="mcs_img_loaded"></a> 
        </div>
        <div class="profile-data">
        <a href="index.php?m=empprofile">
          <div class="profile-data-name">
          <?php
              echo $infoUser['userNOM']." ".$infoUser['userPRE']?>
          </div></a> 
          <div class="profile-datatitle">
          <?php
              echo $infoUser['userPOST']?>
          </div>
        </div> 
      </div> 
    <!----------------------->
    <div class="menu-divider mt-0">
    </div>

    <!-- Apps & Pages -->
    <li class="menu-item <?php if ($active==1) { echo "active"; } ?>" >
      <a href="index.php?m=empindex" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div>Accueil</div>
      </a>

    </li>
    <li class="menu-item <?php if ($active==2) { echo "active";}?>">
      <a href="index.php?m=empappcongesdemande" class="menu-link">
        <i class="menu-icon tf-icons bx bx-calendar"></i>
        <div>Demande de cong&eacute;</div>
      </a>
    </li>
    <li class="menu-item <?php if ($active==3) { echo "active";}?>">
      <a href="index.php?m=empapphistlist" class="menu-link">
        <i class="menu-icon tf-icons bx bx-food-menu"></i>
        <div>Historique</div>
      </a>
    </li>
    <li class="menu-item <?php if ($active==4) { echo "active";}?>">
      <a href="index.php?m=empprofile" class="menu-link">
      <i class="menu-icon tf-icons bx bx-user"></i>
        <div>Profile</div>
      </a>
    </li>
    <?php 
    if ($infoUser['userROLE']=="grh"){
      echo'<li class="menu-header small text-uppercase"><span class="menu-header-text">Espace GRH </span></li>
      <li class="menu-item">
      <a href="index.php?m=grhindex" class="menu-link">
        <i class="menu-icon tf-icons bx bx-user"></i>
        <div>Mon espace</div>
      </a>
    </li> ';
    }
    if (isset($_SESSION['intrmr'])) {
      echo'<li class="menu-header small text-uppercase"><span class="menu-header-text">Espace chef d&eacute;partement </span></li>
      <li class="menu-item">
      <a href="index.php?m=chefindex" class="menu-link">
        <i class="menu-icon tf-icons bx bx-user"></i>
        <div>Espace int&eacute;rimaire</div>
      </a>
    </li> ';
    }
    ?>
  
    <li class="menu-item" style="position: sticky; top: 100%;">
      <a href="index.php?m=Deconnexion" class="menu-link">
      <i class="menu-icon tf-icons bx bx-power-off"></i>
      <div>D&eacute;connexion</div>
      </a>
    </li>

  </ul>
</aside>
