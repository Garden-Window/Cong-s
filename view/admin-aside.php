

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
 
  <div class="app-brand demo">
    <a href="index.php?m=adminindex" class="app-brand-link">
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
    <li class="menu-item <?php if ($active==1) { echo "active"; } ?>" >
      <a href="index.php?m=adminindex" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div>Tableaux de bord</div>
      </a>

    </li>

    <!-- Apps & Pages -->
    <li class="menu-header small text-uppercase"><span class="menu-header-text">Apps &amp; Pages</span></li>
    
    <li class="menu-item <?php if ($active==3) { echo "active";}?>">
      <a href="index.php?m=adminappdeplist" class="menu-link">
        <i class='menu-icon tf-icons bx bx-buildings'></i>
        <div>Liste des d&eacute;partements</div>
      </a>
    </li>
    <li class="menu-item <?php if ($active>=4 && $active<5) { echo "active open";}?>">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-user"></i>
        <div>Gestion des employ&eacute;s</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item <?php if ($active==4.1) { echo "active";}?>">
          <a href="index.php?m=adminappuserlist" class="menu-link">
            <div>Liste</div>
          </a>
        </li>
        <li class="menu-item <?php if ($active==4.2) { echo "active";}?>">
          <a href="index.php?m=adminajtemp" class="menu-link">
            <div>Ajouter employ&eacute;</div>
          </a>
        </li>
      </ul>
    </li>
    
    <li class="menu-item" style="position: sticky; top: 100%;">
      <a href="index.php?m=Deconnexion" class="menu-link">
        <i class="menu-icon tf-icons bx bx-power-off"></i>
        <div>D&eacute;connexion</div>
      </a>
    </li>

  </ul>
</aside>
