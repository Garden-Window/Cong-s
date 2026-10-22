<?php

class controller extends functions {

    function Login(){
        parent::createFirstAdmin();
        require_once ('view/login.php');}

    function Logout(){
        require_once ('view/logout.php');}
    
    function forgotPwd(){
        require_once ('view/forgotPwd.php');}

    function loader(){
        require_once ('view/loader.php');}
            
    function emailpwd(){
        include ('model/emailPWD.php');}  

    function showAlert(){
        if (isset($_SESSION['message']) && isset($_SESSION['msgType'])) {
            echo'<div class="alerts-container"style=" display:flex;justify-content: center;position:fixed;max-height: 300px; width: 90%;z-index: 1;">
            <div class="alert alert-'.$_SESSION["msgType"].' alert-dismissible d-flex align-items-center" style=" width: 70%;" role="alert">
              <i class="bx bx-xs bx-desktop me-2"></i>';
            echo $_SESSION['message'];
            echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div></div><script>
                setTimeout(function() {$(".alert").remove()}, 8000)
                </script>';
            unset($_SESSION['message']);
            unset($_SESSION['msgType']);
        }
    }
        
    function switchGenr($g){
        switch ($g) {
            case 'H':
                $g='Homme';
                break;
            case 'F':
                $g='Femme';
                break;
            
            default:
                # code...
                break;
        }
        return $g;
    }

    function switchEtatCng($etatCONG){
        switch ($etatCONG) {
            case 'valid&eacute;e':
              return "<span class='badge bg-label-success'>".$etatCONG."</span>";
              break;
            case 'refus&eacute;e':
              return "<span class='badge bg-label-danger'>".$etatCONG."</span>";
              break;
            case 'en attente':
              return "<span class='badge bg-label-warning'>".$etatCONG."</span>";
              break;
          }
    }

    //////////view chef///////////////////////////////////////////////////////////////////////////////////////
    function chefindex(){
        require_once ('view/chef-index.php');
    }

    function chefappcongeslist(){
            require_once ('view/chef-app-conges-list.php');}  

    function chefetatemp(){
        require_once ('view/chef-etat-emp.php');}  

    function chefprofile(){
        require_once ('view/chef-profile.php');}  

    function tableValidation($depart){
        $tabVald=$this->selectbdd('*','conges');
        if ($tabVald->rowCount() >0) {
            while ($row=$tabVald->fetch()){
                $idCng=$row['IDconge'];
                $demander=$row['userMat'];
                $infoDemander=parent::selectWhere('*','users',"userMAT='$demander'")->fetch(); 
                $photoDem=$infoDemander['userPHOTO'];
                $nomDem=$infoDemander['userNOM'];
                $preDem=$infoDemander['userPRE'];
                $postDem=$infoDemander['userPOST'];
                $departDem=$infoDemander['userDEPARTEMENT'];
                $type=$row['congeType'];
                $depo=$row['dateDepo'];
                $duree=$row['duree'];
                $etat=$row['cngETAT'];
                $rep=$row['dateRep'];
                $dateDb=$row['dateDebut'];
                $dateFn=$row['dateFin'];
                if ($departDem==$depart) {
                   echo '<tr>
                <td class="responsive"></td>
                <td class="responsive">'.$idCng.'</td>
                <td class="responsive"><div class="d-flex justify-content-start align-items-center user-name">
                        <div class="avatar-wrapper">
                          <div class="avatar avatar-sm me-3">
                            <img src="view/img/avatars/'.$photoDem.'" alt="Avatar" class="rounded-circle">
                          </div>
                        </div>
                        <div class="d-flex flex-column">
                            <span class="fw-semibold text-body text-truncate">'.$nomDem." ". $preDem.'</span>
                            <small class="text-muted">'.$postDem.'</small>
                            <small style="color: #5a8dee;">'.$demander.'</small>
                        </div>
                      </div></td>
                <td class="responsive">'.$type.'</td>
                <td class="responsive">'.$depo.'</td>
                <td class="responsive">'.$dateDb.'</td>
                <td class="responsive">'.$dateFn.'</td>
                <td class="responsive">'.parent::calculerDureeEnJours($dateDb,$dateFn).'jrs</td>
                <td class="responsive">'.$this->switchEtatCng($etat).'</td>
                <td><div class="ActionsChef d-flex justify-content-center">';
                    if ($etat=='en attente') {
                        echo '<a href="index.php?m=validerDemande&p='.$idCng.'" class="btn btn-sm btn-icon mx-2 valide-demande" title="valider <br/>la demande" data-toogle="tooltip">
                        <span class="badge bg-label-success"><i class="bx bx-check" style="font-size:large"></i></span>
                    </a>
                    <a class="btn btn-sm btn-icon mx-2 refuse-demande" title="Refuser <br/>la demande" onclick="refuserForm(this,'.$idCng.')" data-toogle="tooltip">
                        <span class="badge bg-label-danger"><i class="bx bx-x" style="font-size:large"></i></span>
                    </a>';
                    } else {
                        echo '---';
                    }
                
                echo '</div></td>
                </tr>';
                }
            }
        }
    }

    function TableEtatEmps() {
        if (isset($_SESSION['authentifier'])) {
            $mat=$_SESSION['authentifier'];
            $chefDep=parent::selectWhere('userDEPARTEMENT','users',"userMAT='$mat'")->fetch();
            $depAct=$chefDep['userDEPARTEMENT'];
            $usersDep=parent::selectWhere('*','users',"userDEPARTEMENT='$depAct' AND NOT (userROLE=('admin')OR userROLE=('chef'))");
            if ($usersDep->rowCount()>0) {
                while ($row=$usersDep->fetch()) {
                    $Mat=$row['userMAT'];
                    $Photo=$row['userPHOTO'];
                    $Nom=$row['userNOM'];
                    $Pre=$row['userPRE'];
                    $Poste=$row['userPOST'];
                    $etatemp="active";
                    $congesUser=parent::selectWhere('dateDebut,dateFin','conges',"userMat='$Mat' AND cngETAT='valid&eacute;e'");
                    if ($congesUser->rowCount()>0) {
                        while ($row2=$congesUser->fetch()) {
                            $dateDebut=$row2['dateDebut'];
                            $dateFin=$row2['dateFin'];
                            if (parent::estDateEntre( date("Y-m-d"), $dateDebut, $dateFin)) {
                                $etatemp="En cong&eacute;";
                                $dateReprise= date("Y-m-d", strtotime($dateFin . "+1 day"));
                                break;
                            }
                        }
                    }

                    echo'<tr>
                    <td><div class="d-flex justify-content-start align-items-center user-name">
                            <div class="avatar-wrapper">
                            <div class="avatar avatar-sm me-3">
                            <img src="view/img/avatars/'.$Photo.'" alt="Avatar" class="rounded-circle">
                            </div>
                        </div>
                        <div class="d-flex flex-column">
                            <span class="fw-semibold text-body text-truncate">'.$Nom." ". $Pre.'</span>
                            <small class="text-muted">'.$Poste.'</small>
                            <small style="color: #5a8dee;">'.$Mat.'</small>
                            </div>
                        </div></td>
                        <td>';
                        if ($etatemp=='active') {
                            $dateReprise='---';
                            echo  $etatemp='<span class="badge bg-label-primary">active</span>';
                        }elseif ($etatemp=='En cong&eacute;') {
                            echo $etatemp='<span class="badge bg-label-secondary">En cong&eacute;</span>';
                        }
                        echo '</td>
                        <td><div class="d-flex justify-content-center ">'.$dateReprise.'</div></td>
                        </tr>';
                }
                
            }
            
        }
        
        
    }

    function validerDemande($idCng) {
        $userMat=parent::selectWhere('userMat','conges',"IDconge='$idCng'")->fetch();
        $userMat=$userMat['userMat'];
        
        $cngType=parent::selectWhere('congeType','conges',"IDconge='$idCng'")->fetch();
        $cngType=$cngType['congeType'];

        $dureeCng=parent::selectWhere('duree','conges',"IDconge='$idCng'")->fetch();
        $dureeCng=$dureeCng['duree'];
        $soldes=parent::selectWhere('*','soldes',"empMat='$userMat'")->fetch();
        $soldeAn=$soldes['soldeAN'];
        $soldeRec=$soldes['soldeREC'];
        $soldeInzc=$soldes['soldeINZC'];
        
        $dateAujourdhui = date("Y-m-d");
        parent::update('conges', "cngETAT='valid&eacute;e', dateRep='$dateAujourdhui'", "userMat='$userMat' AND IDconge='$idCng'");
        if($cngType=='Annuel'){
            $newSolde=$soldeAn-$dureeCng;
            parent::update('soldes', "soldeAN='$newSolde'","empMat='$userMat'");
            $_SESSION['message']="Demande validée avec succès!";
            $_SESSION['msgType']="success";
            header('location:index.php?m=chefappcongeslist');

        }elseif($cngType=='R&eacute;cup&eacute;ration'){
            $newSolde=$soldeRec-$dureeCng;
            parent::update('soldes', "soldeREC='$newSolde'","empMat='$userMat'");
            $_SESSION['message']="Demande validée avec succès!";
            $_SESSION['msgType']="success";
            header('location:index.php?m=chefappcongeslist');

        }elseif($cngType=='INZC'){
            $newSolde=$soldeInzc-$dureeCng;
            parent::update('soldes', "soldeINZC='$newSolde'","empMat='$userMat'");
            $_SESSION['message']="Demande validée avec succès!";
            $_SESSION['msgType']="success";
            header('location:index.php?m=chefappcongeslist');
        }
    }

    function refuserDemande(){
        if (isset($_POST['refuser'])) {
            $idCng=$_POST['idCong'];
            $Note=$_POST['note'];
            echo $idCng." ".$Note;
            $userMat=parent::selectWhere('userMat','conges',"IDconge='$idCng'")->fetch()['userMat'];
            $dateReponse = date("Y-m-d");
            parent::update('conges',"cngETAT='refus&eacute;e', Note='$Note', dateRep='$dateReponse'","userMat='$userMat' AND IDconge='$idCng'");  
        }
        $_SESSION['message']="La demande a été refusée!";
        $_SESSION['msgType']="success";
        header('location:index.php?m=chefappcongeslist');
    }


            

    //////////view emp///////////////////////////////////////////////////////////////////////////////////////
    function empindex(){
        require_once ('view/emp-index.php');
    }

    function empapphistlist(){
        require_once ('view/emp-app-hist-list.php');
    }

    function empappcongesdemande(){
        require_once ('view/emp-app-conges-demande.php');
    }

    function empprofile(){
        require_once ('view/emp-profile.php');
    }

    function empHistorique(){
        $mat=$_SESSION['authentifier'];
        $tabHist=$this->selectWhere('*','conges',"userMAT='$mat'");
        if ($tabHist->rowCount() >0) {
            while ($row=$tabHist->fetch()){
                $idCng=$row['IDconge'];
                $type=$row['congeType'];
                $dateDm=$row['dateDepo'];
                $timeDm=$row['timeDepo'];
                $dateDb=$row['dateDebut'];
                $dateFn=$row['dateFin'];
                $dure=$row['duree'];
                $CngEta=$row['cngETAT'];
                $dateRps=$row['dateRep'];
                $dateTitre=$row['dateTitre'];
                $note=$row['Note'];
                echo '<tr>
                <td>'.$idCng.'</td>
                <td>'.$type.'</td>
                <td>'.$dateDm.'</td>
                <td>'.$timeDm.'</td>
                <td>'.$dateDb.'</td>
                <td>'.$dateFn.'</td>
                <td>'.$dure.'jrs</td>
                <td>'.$this->switchEtatCng($CngEta).'</td>
                <td>';
                if (!is_null($dateRps)) {
                    echo $dateRps;
                } else {
                    echo '---'; 
                }
                echo '</td>
                <td>';
                if (!is_null($dateTitre)) {
                    echo $dateTitre;
                } else {
                    echo '---';
                }
                echo '</td>
                <td>'.$note.'</td>
                </tr>';


            }
        }
    }
    //////////view grh///////////////////////////////////////////////////////////////////////////////////////
    function grhindex(){
        require_once ('view/grh-index.php');
    }

    function grhcongesliste(){
        require_once ('view/grh-conges-liste.php');
    }

    function grhintermr(){
        require_once ('view/grh-intermr.php');
    }

    function grhprofile(){
        require_once ('view/grh-profile.php');
    }

    function grhRsoldes(){
        require_once ('view/grh-Rsoldes.php');
    }

    function tableTitrage(){
        $tabtit=$this->selectWhere('*','conges','cngETAT="valid&eacute;e"');
        if ($tabtit->rowCount() >0) {
            while ($row=$tabtit->fetch()){
                $idCng=$row['IDconge'];
                $demander=$row['userMat'];
                $infoDemander=parent::selectWhere('*','users',"userMAT='$demander'")->fetch(); 
                $photoDem=$infoDemander['userPHOTO'];
                $nomDem=$infoDemander['userNOM'];
                $preDem=$infoDemander['userPRE'];
                $postDem=$infoDemander['userPOST'];
                $type=$row['congeType'];
                $depo=$row['dateDepo'];
                $duree=$row['duree'];
                $etat=$row['cngETAT'];
                $rep=$row['dateRep'];
                $datetitre=$row['dateTitre'];
                echo"
                <tr>
                <td class='responsive'>$idCng</td>
                <td class='responsive'>
                    <div class='d-flex justify-content-start align-items-center user-name'>
                        <div class='avatar-wrapper'>
                            <div class='avatar avatar-sm me-3'>
                            <img src='view/img/avatars/$photoDem' alt='Avatar' class='rounded-circle'>
                            </div>
                        </div>
                        <div class='d-flex flex-column'>
                            <span class='fw-semibold text-body text-truncate'>$nomDem $preDem</span>
                            <small class='text-muted'>$postDem</small>
                            <small style='color: #5a8dee;'>$demander</small>
                        </div>
                        </div></td>
                <td class='responsive'>$depo</td>
                <td class='responsive'>$rep</td>
                <td class='responsive'>";if (isset($datetitre)) {
                        echo "<span class='badge bg-label-success'>titr&eacute;e</span></td>
                            <td class='responsive'>$datetitre</td></tr>";
                    }else {
                        echo "<span class='badge bg-label-danger'>non titr&eacute;e</span></td>
                            <td><form id='formTitrageDate' action='index.php?m=insertTitrage' method='post'>
                            <input type='hidden' name='idCng' value='$idCng'/>
                            <input class='titrInput form-control' type='text' name='DateTitrage' value='".date("Y-m-d")."'/>
                            </form></td></tr>";
                    }
                    
            }
        }
    }

    function modifierSolde(){
        if(isset($_POST['EnvSolde'])){
            $userMat=$_POST['empMAT'];
            $anSolde=$_POST['soldann'];
            $recSolde=$_POST['soldrec'];
            $inzcSolde=$_POST['soldinzc'];
            $this->update('soldes',"soldeAN='$anSolde',soldeREC='$recSolde',
                soldeINZC='$inzcSolde'","empMAT='$userMat'");
            echo $userMat." ".$anSolde." ".$recSolde." ".$inzcSolde;
            $_SESSION['message']="La mise à jour des soldes a été terminée avec succès!";
            $_SESSION['msgType']="success";
            header("location:index.php?m=grhRsoldes");
                exit();

            

        }
    }

    function GererIntrmr()
{
    if (isset($_POST['Remplacer'])) {
        $IDchef = $_POST['chefMat'];
        $IDemp = $_POST['intermMat'];
        $dateDb = $_POST['Du'];
        $dateFn = $_POST['Au'];
        
        $sql="CREATE TABLE IF NOT EXISTS interim (
            IDchef varchar(15) NOT NULL,
            IDemp varchar(15) NOT NULL,
            dateD date NOT NULL,
            dateF date NOT NULL
          ) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
          try {
         $create=$this->connect()->prepare($sql);
         $create->execute();
         } catch (PDOException $e) {
            die('Erreur SQL! <br>' . $sql . '<br>' . $e->getMessage());
         }

        
        //select Role
        $role=$this->selectWhere('userROLE','users',"userMAT='$IDemp'")->fetch()['userROLE'];
        echo $role;

        //select depEmp
        $idDepEmp=$this->selectWhere('userDEPARTEMENT','users',"userMAT='$IDemp'")->fetch()['userDEPARTEMENT'];
        echo $idDepEmp;

        //select depChef
        $idDepChef=$this->selectWhere('userDEPARTEMENT','users',"userMAT='$IDchef'")->fetch()['userDEPARTEMENT'];
        echo $idDepChef;

        if ($dateDb>$dateFn) {
            $_SESSION['message']="Les dates sont incorrectes. La date de début&nbsp;<b>$dateDb</b>&nbsp;est postérieure à la date de fin&nbsp;<b>$dateFn</b>&nbsp;.";
            $_SESSION['msgType']="danger";
            header('location:index.php?m=grhintermr');
            exit();
        }
        // //selcet dates
        $dateschef = $this->selectWhere('dateD, dateF', 'interim', "IDchef='$IDchef'");
        $vrifierF=false;
        $vrifierD=false;
        if ($dateschef->rowCount()>0){
            while ($row = $dateschef->fetch()) {
                $vrifierD = $this->estDateEntre($dateDb, $row['dateD'], $row['dateF']);
                if($vrifierD==true){
                    break;
                }
            }
            while ($row = $dateschef->fetch()) {
                $vrifierF = $this->estDateEntre($dateFn, $row['dateD'], $row['dateF']);
                if($vrifierF==true){
                    break;
                }
            }
        }
        $vrifier=$vrifierD||$vrifierF;
        //conditions
        $err="";
        if (!(($role=='emp') || ($role=='grh'))) {
                $err="Le rôle d'employé proposé n'est pas valide en tant qu'intérimaire.";
            }
        if (!($idDepChef==$idDepEmp)) {
            $err="L'intérimaire proposé n'appartient pas au même département que le chef.";
        }
        if((($role=='emp') || ($role=='grh')) && ($idDepChef==$idDepEmp) && ($vrifier !=true)){
            
            $this->insertInto('interim', "(IDchef, IDemp, dateD, dateF)", "('$IDchef', '$IDemp', '$dateDb', '$dateFn')");
            $_SESSION['message']="L'enregistrement de l'intérimaire a été terminé avec succès!";
            $_SESSION['msgType']="success";
            header("location:index.php?m=grhintermr");
        }else{
            $_SESSION['message']="L'opération a échoué!".$err;
            $_SESSION['msgType']="danger";
            header("location:index.php?m=grhintermr");
            exit();
        }
    }
}


    //////////view admine///////////////////////////////////////////////////////////////////////////////////////
    function adminindex(){
        require_once ('view/admin-index.php');
    }

    function adminajtemp(){
        require_once ('view/admin-ajt-emp.php');
    }

    function adminappdeplist(){
        require_once ('view/admin-app-dep-list.php');
    }

    function adminappuserlist(){
        require_once ('view/admin-app-user-list.php');
    }

    function adminappaccessroles(){
        require_once ('view/admin-app-access-roles.php');
    }
    
    function adminprofile(){
        require_once ('view/admin-profile.php');
    }

    function TableDepart(){
        $tabdep=$this->selectbdd('*','depart');
        if ($tabdep->rowCount() >0) {
            while ($row=$tabdep->fetch()){
                $IDdep=$row['IDdep'];
                $NOMdep=$row['nomDep'];
                $IDchef=$row['IDchef'];
                if ($IDchef=='') {
                    $IDchef=parent::selectWhere('userMAT','users',"userROLE='chef' AND userDEPARTEMENT='$IDdep'")->fetch()['userMAT'];
                }
                $infosChef=parent::selectWhere('*','users',"userMAT='$IDchef'")->fetch();
                $nomChef=$infosChef['userNOM'];
                $preChef=$infosChef['userPRE'];
                echo "<tr>
                <td>$IDdep</td>
                <td>$NOMdep</td>
                <td>$nomChef $preChef</td>
                </tr>";


            }
        }
    }

    function TableUsers() {
        $tabUsers=$this->selectWhere('*','users',"NOT userROLE = 'admin'");
        if ($tabUsers->rowCount() >0) {
            while ($row=$tabUsers->fetch()){
                $Role=$row['userROLE'];
                $Mat=$row['userMAT'];
                $Photo=$row['userPHOTO'];
                $Nom=$row['userNOM'];
                $Pre=$row['userPRE'];
                $Naiss=$row['userNAISS'];
                $Genre=$row['userGENRE'];
                $EtaCiv=$row['userETACIV'];
                $Addrs=$row['userADRESSE'];
                $Email=$row['userEMAIL'];
                $Phone=$row['userPHONE'];
                $Dep=$row['userDEPARTEMENT'];
                $NomDep=parent::selectWhere('nomDep','depart',"IDdep='$Dep'")->fetch()['nomDep'];
                $Poste=$row['userPOST'];
                echo '<tr>
                <td class="responsive">'.$Role.'</td>
                <td class="responsive" style="color: #5a8dee;">'.$Mat.'</td>
                <td class="responsive">
                  <div class="avatar avatar-md me-3">
                    <img src="view/img/avatars/'.$Photo.'" alt="Avatar" class="rounded-circle">
                  </div>
                    </td>
                <td class="responsive">'.$Pre.'</td>
                <td class="responsive">'.$Nom.'</td>
                <td class="responsive">'.$Naiss.'</td>
                <td class="responsive">'.$this->switchGenr($Genre).'</td>
                <td class="responsive">'.$EtaCiv.'</td>
                <td class="responsive">'.$Addrs.'</td>
                <td class="responsive">'.$Email.'</td>
                <td class="responsive"> (+213) '.$Phone.'</td>
                <td class="responsive">'.$Poste.'</td>
                <td class="responsive">'.$NomDep.'</td>
                <td>
                  <div class="Actionslistemps d-inline-block text-nowrap">
                    <a href="index.php?m=editerUser&p='.$Mat.'" class="btn btn-sm btn-icon" title="&Eacute;diter" style="color:#677788" data-toogle="tooltip">
                      <i class="bx bx-edit"></i>
                    </a>
                    <a href="index.php?m=supprimerUser&p='.$Mat.'" class="btn btn-sm btn-icon" title="Supprimer" style="color:#677788" data-toogle="tooltip">
                      <i class="bx bx-trash"></i>
                    </a>
                  </div>
                </td></tr>';
            }
        }
    }

    function supprimerUser($userMat){
        parent::Deletefrom('users',"userMat='$userMat'");
        parent::Deletefrom('soldes',"userMat='$userMat'");
        session_start();
            $_SESSION['message']="Suppression de &nbsp;<b>$userMat</b>&nbsp; terminée avec succès. Veuillez consulter le tableau des employés.";
            $_SESSION['msgType']="success";
        header('location:index.php?m=adminappuserlist');
    }

    function editerUser($userMat){
        header("location:index.php?m=adminajtemp&empEdit=$userMat");
    }

    function TableAdmins() {
        $tabAdmins=$this->selectWhere('*','users',"userROLE = 'admin'");
        if ($tabAdmins->rowCount() >0) {
            while ($row=$tabAdmins->fetch()){
                $Mat=$row['userMAT'];
                $Photo=$row['userPHOTO'];
                $Nom=$row['userNOM'];
                $Pre=$row['userPRE'];
                $Naiss=$row['userNAISS'];
                $Genre=$row['userGENRE'];
                $EtaCiv=$row['userETACIV'];
                $Addrs=$row['userADRESSE'];
                $Email=$row['userEMAIL'];
                $Phone=$row['userPHONE'];
                echo '<tr>
                <td style="color: #5a8dee;">'.$Mat.'</td>
                <td><div class="avatar avatar-md me-3">
                            <img src="view/img/avatars/'.$Photo.'" alt="Avatar" class="rounded-circle">
                          </div></td>
                <td>'.$Nom.'</td>
                <td>'.$Pre.'</td>
                <td>'.$Naiss.'</td>
                <td>'.$this->switchGenr($Genre).'</td>
                <td>'.$EtaCiv.'</td>
                <td>'.$Addrs.'</td>
                <td>'.$Email.'</td>
                <td>(+213) '.$Phone.'</td></tr>';
            }
        }
    }

    function updateAdmin(){
        if (isset($_POST['saveAdmin'])) {
            $matpreced=htmlentities($_POST['MatPreced']);
            $matr = htmlentities($_POST['adminMat']);
            $nom = htmlentities($_POST['adminNom']);
            $pre = htmlentities($_POST['adminPre']);
            $gnr = htmlentities($_POST['adminGenre']);
            $etaCiv = htmlentities($_POST['adminEtaciv']);
            $Naiss =htmlentities( $_POST['adminNaiss']);
            $Email = htmlentities($_POST['adminEmail']);
            $NumTel = htmlentities($_POST['phoneNumber']);
            $addrss = htmlentities($_POST['adminAddress']);
            $photo = htmlentities($_POST['adminPhoto']);

            echo $photo;
            $nbUMat=$this->selectWhere('COUNT(userMAT)','users',"userMAT='$matr'")->fetch();
            $nbUMat=$nbUMat['COUNT(userMAT)'];

            if (($nbUMat>1)) {
                $_SESSION['message']="Ce matricule &nbsp;<b>$matr</b>&nbsp; existe déjà";
                $_SESSION['msgType']="danger";
                header("location:index.php?m=adminajtemp&&empEdit=$matr");
                exit();            
            }else {
                $this->update('users',"userMAT='$matr',userNOM='$nom', userPRE='$pre', userPHOTO='$photo',
            userGENRE='$gnr', userETACIV='$etaCiv', userNAISS='$Naiss', userEMAIL='$Email', userPHONE='$NumTel', userADRESSE='$addrss'
             ","userMAT='$matpreced'");
             $_SESSION['message']="La modification a été effectuée avec succès. Veuillez consulter votre profile";
            $_SESSION['msgType']="success";
             header("location:index.php?m=adminprofile");

            }
            
        }
    }
    

}