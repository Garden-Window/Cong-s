

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
 
  <div class="app-brand demo">
    <a href="index.php?m=grhindex" class="app-brand-link">
      <span class="app-brand-logo demo">
        <img  src="view/img/favicon/sonatrachicon.png" >
      </span>
      <div style="display:block">
      <small class="ms-2 menu-text">Espace de</small><br>
      <span class="app-brand-text demo menu-text fw-bold ms-2">cong&eacute;s</span></div>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
      <i class="bx menu-toggle-icon d-none d-xl-block fs-4 align-middle"></i>
      <i class="bx bx-x d-block d-xl-none bx-sm align-middle"></i>
    </a>
  </div>

  
  <div class="menu-divider mt-0">
  </div>


  <ul class="menu-inner py-1">
    <!-- Dashboards -->
    <li class="menu-header small text-uppercase"><span class="menu-header-text">Espace GRH</span></li>
    <li class="menu-item <?php if ($active==1) { echo "active"; } ?>" >
      <a href="index.php?m=grhindex" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div>Tableaux de bord</div>
      </a>

    </li>

  
    <li class="menu-item <?php if ($active==2) { echo "active";}?>">
      <a href="index.php?m=grhcongesliste" class="menu-link">
        <i class="menu-icon tf-icons bx bx-calendar"></i>
        <div>Gestion de titrage</div>
      </a>
    </li>
    <li class="menu-item <?php if ($active==3) { echo "active";}?>">
      <a href="index.php?m=grhintermr" class="menu-link">
        <i class="menu-icon tf-icons bx bx-user"></i>
        <div>Gestion d'int&eacute;rimaire</div>
      </a>
    </li>
    <li class="menu-item <?php if ($active==4) { echo "active";}?>">
      <a href="index.php?m=grhRsoldes" class="menu-link">
        <i class="menu-icon tf-icons bx bx-objects-horizontal-right"></i>
        <div>Remplissage de soldes</div>
      </a>
    </li>
      <!-- L'espace de congés -->
      <li class="menu-header small text-uppercase"><span class="menu-header-text">Espace employ&eacute;</span></li>
      <li class="menu-item">
      <a href="index.php?m=empindex" class="menu-link">
        <i class="menu-icon tf-icons bx bx-user"></i>
        <div>Mon espace</div>
      </a>
    </li> 
    <?php 
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
