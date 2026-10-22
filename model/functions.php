<?php
class functions extends connectBDD{

    function authentification(){
        // header('location:index.php?m=grhindex');
        
        if (isset($_POST["login"])){  
            $UName=htmlentities($_POST["userName"]);
            $PWD=htmlentities($_POST["pwd"]);
            $sql="SELECT userRole FROM users WHERE userMat='$UName' AND userPwd='$PWD';";
            try {
            $result=$this->connect()->prepare($sql);
            $result->execute();
            } catch (PDOException $e) {
                die('Erreur SQL! <br>' . $sql . '<br>' . $e->getMessage());}
            $rs=$result->fetch();
            //
            $_SESSION['authentifier']=$_POST["userName"];
            if($result->rowCount()==1){
                $idChef = $this->VerifierIntrmr($UName);session_start();
                $_SESSION['intrmr'] = $idChef;
                ?>
                <script>alert("<?php echo $_SESSION['intrmr'];?>")</script>
                <?php
                header('location:index.php?m='.$rs["userRole"].'index');
                
            }
            else{
                //session_start();
                $message='<i class="bx bx-x-circle"></i> Nom d\'utilisateur ou mot de passe incorrect';
                $_SESSION['message']=$message;
                $_SESSION['none']="none";
                header('location:index.php?m=login');
                //header('location:'. $_SERVER['HTTP_REFERER']);
            
            }
            
        }
      
    }

    function Deconnexion() {
        header('location:index.php?m=logout');
    }

    function VerifierIntrmr($userMat) {
        $Infos = $this->selectWhere('*', 'interim', "IDemp='$userMat'");
        $idChef=null;
        while ($row=$Infos->fetch()) {
            $dateD = $row['dateD'];
            $dateF = $row['dateF'];
            $dateAujourdhui =date("Y-m-d"); 
            $vrif = $this->estDateEntre($dateAujourdhui, $dateD, $dateF);
            if ($vrif == true) { 
                $idChef = $row['IDchef'];
                break;
            }
            
        }
        return $idChef;    
    }
    
   
    function selectWhere($what,$from,$where)
    {
        $sql="SELECT $what FROM $from WHERE $where";
        try {
        $result=$this->connect()->prepare($sql);
        $result->execute();
        } catch (PDOException $e) {
            die('Erreur SQL! <br>' . $sql . '<br>' . $e->getMessage());
        }
        $rs=$result;
        return $rs;
    }
    
    function selectbdd($what,$from)
    {
        $sql="SELECT $what FROM $from";
        try {
        $result=$this->connect()->prepare($sql);
        $result->execute();
        } catch (PDOException $e) {
            die('Erreur SQL! <br>' . $sql . '<br>' . $e->getMessage());
        }
        $rs=$result;
        return $rs;
    }

    function insertInto($into,$where,$values){
        $sql="INSERT INTO $into $where  VALUES $values";
        try {
        $res=$this->connect()->prepare ($sql) ;
        $res->execute();
        } catch (PDOException $e) {
            die('Erreur SQL! <br>' . $sql . '<br>' . $e->getMessage());
        }
    }

    function update($from, $mofications, $condition){
        $sql="UPDATE $from SET $mofications WHERE $condition";
        try {
            $res=$this->connect()->prepare($sql) ;
            $res->execute();
        } catch (PDOException $e) {
            die('Erreur SQL! <br>' . $sql . '<br>' . $e->getMessage());
        }
    }

    function Deletefrom($from,$where){
        $sql="DELETE FROM $from WHERE $where";
        try {
            $res=$this->connect()->prepare($sql) ;
            $res->execute();
            } catch (PDOException $e) {
                die('Erreur SQL! <br>' . $sql . '<br>' . $e->getMessage());
            }
    }
    
    function calcDureeSansVendredi($dateDebut, $dateFin) {
        $fridays=$this->countFridays($dateDebut,$dateFin);
        $dateDebut = new DateTime($dateDebut);
        $dateFin = new DateTime($dateFin);
        $difference = $dateDebut->diff($dateFin);
    
        $duree = $difference->days;
        $duree=$duree-$fridays;
        return $duree+1;
    }

    function calculerDureeEnJours($dateDebut, $dateFin) {
        $dateDebut = new DateTime($dateDebut);
        $dateFin = new DateTime($dateFin);
        $difference = $dateDebut->diff($dateFin);
    
        $duree = $difference->days;
        return $duree+1;
    }

    function estDateEntre($date, $dateDebut, $dateFin) {
        $date = new DateTime($date);
        $dateDebut = new DateTime($dateDebut);
        $dateFin = new DateTime($dateFin);
    
        return ($date >= $dateDebut && $date <= $dateFin);
    }

    function countFridays($startDate, $endDate) {
        $startDate = strtotime($startDate);
        $endDate = strtotime($endDate);
        $fridays = 0;
        
        while ($startDate <= $endDate) {
            if (date('N', $startDate) == 5) { // Vérifie si le jour est vendredi (5)
                $fridays++;
            }
            $startDate = strtotime('+1 day', $startDate);
        }
        
        return $fridays;
    }

    function AjoutDemand() {
        if (isset($_POST['Demander'])) {
            $mat=htmlentities($_POST['mat']);
            $type=htmlentities($_POST['congType']);
            $debut=htmlentities($_POST['dateD']);
            $fin=htmlentities($_POST['dateF']);
            $duree=$this->calcDureeSansVendredi($debut,$fin);
            $depoDate=date("Y-m-d");
            $depoTime=date("H:i:s");

            $congeETAT="en attente";

            echo $mat ." ".$type." ".$debut." ".$fin." ".$duree." ".$depoDate." ".$depoTime." ".$duree." ".$congeETAT;

            $sql="CREATE TABLE IF NOT EXISTS conges (
                IDconge int(15) NOT NULL AUTO_INCREMENT,
                userMat varchar(15) NOT NULL,
                congeType varchar(26) NOT NULL,
                dateDepo date NOT NULL,
                timeDepo time DEFAULT NULL,
                dateDebut date NOT NULL,
                dateFin date NOT NULL,
                duree float NOT NULL,
                cngETAT varchar(20) NOT NULL,
                dateRep date DEFAULT NULL,
                dateTitre date DEFAULT NULL,
                Note text,
                PRIMARY KEY (IDconge,userMat)
              ) ENGINE=InnoDB AUTO_INCREMENT=10109 DEFAULT CHARSET=latin1;";
              try {
             $create=$this->connect()->prepare($sql);
             $create->execute();
             } catch (PDOException $e) {
                die('Erreur SQL! <br>' . $sql . '<br>' . $e->getMessage());
             }

             
             if ($type=='R&eacute;cup&eacute;ration') {
                $solde=$this->selectWhere('soldeREC','soldes',"empMat='$mat'")->fetch();
             }elseif ($type=="Annuel") {
                $solde=$this->selectWhere('soldeAN','soldes',"empMat='$mat'")->fetch();
             }
                
            if ($debut>$fin) {
                //session_start();
                $_SESSION['message']="Les dates sont incorrectes. La date de début&nbsp;<b>$debut</b>&nbsp;est postérieure à la date de fin&nbsp;<b>$fin</b>&nbsp;.";
                $_SESSION['msgType']="danger";
                header('location:index.php?m=empappcongesdemande');
                exit();
            }

              if($solde<=0 || $solde< $duree){
                //session_start();
                $_SESSION['message']="Votre solde (&nbsp;<b>$solde</b>&nbsp;) est insuffisant pour demander un congé d'une durée de &nbsp;<b>$duree</b>&nbsp; jours, en excluant les vendredis.";
                $_SESSION['msgType']="danger";
                header('location:index.php?m=empappcongesdemande');
                exit();
              }
            $this->insertInto('conges',"(userMat, congeType, dateDepo, timeDepo, dateDebut, dateFin, duree,cngETAT)"
              ,"('$mat','$type','$depoDate','$depoTime','$debut','$fin','$duree','$congeETAT')");
              $_SESSION['message']="Demande enregistrée avec succès. Veuillez consulter votre historique";
              $_SESSION['msgType']="success";
            header('location:index.php?m=empappcongesdemande');
            exit();
            
        }
        
    }

    function VrfSiIdDepExists($IDdep){
        $IdResult=$this->selectWhere('COUNT(IDdep)','depart',"IDdep='$IDdep'")->fetch();
        $IdResult=$IdResult['COUNT(IDdep)'];
        if($IdResult>0){
            //session_start();
            $_SESSION['message']="L'ID du département existe déjà.";
            $_SESSION['msgType']="danger";
            header("location:index.php?m=adminappdeplist");
            exit();
        }
    }

    function AddDep(){
        if(isset($_POST['ajtDep'])){
            $nomDep=$_POST['depNom'];
            $idDep=$_POST['depID'];
            $sql="CREATE TABLE IF NOT EXISTS depart (
                IDdep varchar(15) NOT NULL,
                nomDep varchar(15) NOT NULL,
                IDchef varchar(50)  DEFAULT NULL,
                PRIMARY KEY (IDdep)
              ) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
            try {
             $create=$this->connect()->prepare($sql);
             $create->execute(); 
            } catch (PDOException $e) {
                die('Erreur SQL! <br>' . $sql . '<br>' . $e->getMessage());
            }
            $this->VrfSiIdDepExists($idDep);
            
            $this->insertInto('depart',"(IDdep,nomDep)","('$idDep','$nomDep')");
            //session_start();
            $_SESSION['message']="L'ajout a été terminé avec succès. Veuillez consulter le tableau des départements";
            $_SESSION['msgType']="success";
            header("location:index.php?m=adminappdeplist");
        }
    }

    function insertTitrage() {
        $idCng=$_POST['idCng'];
        $dateTit=$_POST['DateTitrage'];
       if ($_POST['DateTitrage']) {
        echo $idCng." ".$dateTit;#
       } 
       $this->update('conges',"dateTitre='$dateTit'","IDconge='$idCng'");
       $_SESSION['message']="La date de titrage a été enregistrée avec succès!!";
        $_SESSION['msgType']="success";
       header('location: index.php?m=grhcongesliste');
    }

    function createFirstAdmin() {
        $sql="CREATE TABLE IF NOT EXISTS users (
            userMAT varchar(25) NOT NULL,
            userPWD varchar(15) NOT NULL,
            userROLE varchar(15) NOT NULL,
            userNOM varchar(25) NOT NULL,
            userPRE varchar(25) NOT NULL,
            userPHOTO varchar(20) NOT NULL,
            userGENRE varchar(5) NOT NULL,
            userETACIV varchar(10) NOT NULL,
            userNAISS date NOT NULL,
            userEMAIL varchar(35) NOT NULL,
            userPHONE int(50) NOT NULL,
            userADRESSE varchar(50) NOT NULL,
            userDEPARTEMENT varchar(25) NOT NULL,
            userPOST varchar(30) NOT NULL,
            PRIMARY KEY (userMAT),
            UNIQUE KEY userEMAIL (userEMAIL),
            UNIQUE KEY userPHONE (userPHONE),
            UNIQUE KEY userPWD (userPWD)
          ) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
        try {
         $create=$this->connect()->prepare($sql);
         $create->execute(); 
        } catch (PDOException $e) {
            die('Erreur SQL! <br>' . $sql . '<br>' . $e->getMessage());
        }
        $sql="INSERT INTO users (userMAT, userPWD, userROLE, userNOM, userPRE, userPHOTO, userGENRE, userETACIV, userNAISS, userEMAIL, userPHONE, userADRESSE, userDEPARTEMENT, userPOST)
        SELECT 'SonaA00001', '1', 'admin', 'Benacer', 'Mohamed', '14.png', 'Homme', 'Mr', '1963-09-20', 'M.benaser@gmail.com', '551234567', 'Rue mouradoudia-alger', '---', 'Admin'
        WHERE NOT EXISTS (
          SELECT 1 FROM users WHERE userMAT = 'SonaA00001'
        );";
        try {
        $res=$this->connect()->prepare ($sql) ;
        $res->execute();
        } catch (PDOException $e) {
            die('Erreur SQL! <br>' . $sql . '<br>' . $e->getMessage());
        }
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
         $sql="CREATE TABLE IF NOT EXISTS conges (
            IDconge int(15) NOT NULL AUTO_INCREMENT,
            userMat varchar(15) NOT NULL,
            congeType varchar(26) NOT NULL,
            dateDepo date NOT NULL,
            timeDepo time DEFAULT NULL,
            dateDebut date NOT NULL,
            dateFin date NOT NULL,
            duree float NOT NULL,
            cngETAT varchar(20) NOT NULL,
            dateRep date DEFAULT NULL,
            dateTitre date DEFAULT NULL,
            Note text,
            PRIMARY KEY (IDconge,userMat)
          ) ENGINE=InnoDB AUTO_INCREMENT=10109 DEFAULT CHARSET=latin1;";
          try {
         $create=$this->connect()->prepare($sql);
         $create->execute();
         } catch (PDOException $e) {
            die('Erreur SQL! <br>' . $sql . '<br>' . $e->getMessage());
         }
         $sql="CREATE TABLE IF NOT EXISTS depart (
            IDdep varchar(15) NOT NULL,
            nomDep varchar(15) NOT NULL,
            IDchef varchar(50)  DEFAULT NULL,
            PRIMARY KEY (IDdep)
          ) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
        try {
         $create=$this->connect()->prepare($sql);
         $create->execute(); 
        } catch (PDOException $e) {
            die('Erreur SQL! <br>' . $sql . '<br>' . $e->getMessage());
        }
        $sql2="CREATE TABLE IF NOT EXISTS soldes (
            empMat varchar(15) NOT NULL,
            soldeAN int(5) NOT NULL DEFAULT '0',
            soldeREC int(5) NOT NULL DEFAULT '0',
            soldeINZC int(5) NOT NULL DEFAULT '0',
            PRIMARY KEY (empMat)
          ) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
        try {
         $create=$this->connect()->prepare($sql2);
         $create->execute(); 
        } catch (PDOException $e) {
            die('Erreur SQL! <br>' . $sql2 . '<br>' . $e->getMessage());
        }
        
    }

    function ajouterUser() {
        if (isset($_POST['addEmp'])) {
            $role =htmlentities($_POST['empRole']);
            $matr = htmlentities($_POST['empMat']);
            $nom = htmlentities($_POST['empNom']);
            $pre = htmlentities($_POST['empPrenom']);
            $gnr = htmlentities($_POST['empGenre']);
            $etaCiv = htmlentities($_POST['empETACIV']);
            $Naiss =htmlentities( $_POST['empDateN']);
            $Email = htmlentities($_POST['empEmail']);
            $NumTel = htmlentities($_POST['empPhone']);
            $addrss = htmlentities($_POST['empAdress']);
            $depart = htmlentities($_POST['empDep']);
            $post =htmlentities( $_POST['empPost']);
            $photo = htmlentities($_POST['empPhoto']);
            $pwd = htmlentities($_POST['passWORD']);

            if(empty($photo)){$photo="Aucun.jpeg";}

            $sql="CREATE TABLE IF NOT EXISTS users (
                userMAT varchar(25) NOT NULL,
                userPWD varchar(15) NOT NULL,
                userROLE varchar(15) NOT NULL,
                userNOM varchar(25) NOT NULL,
                userPRE varchar(25) NOT NULL,
                userPHOTO varchar(20) NOT NULL,
                userGENRE varchar(5) NOT NULL,
                userETACIV varchar(10) NOT NULL,
                userNAISS date NOT NULL,
                userEMAIL varchar(35) NOT NULL,
                userPHONE int(50) NOT NULL,
                userADRESSE varchar(50) NOT NULL,
                userDEPARTEMENT varchar(25) NOT NULL,
                userPOST varchar(30) NOT NULL,
                PRIMARY KEY (userMAT),
                UNIQUE KEY userEMAIL (userEMAIL),
                UNIQUE KEY userPHONE (userPHONE),
                UNIQUE KEY userPWD (userPWD)
              ) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
            try {
             $create=$this->connect()->prepare($sql);
             $create->execute(); 
            } catch (PDOException $e) {
                die('Erreur SQL! <br>' . $sql . '<br>' . $e->getMessage());
            }
            
            $sql2="CREATE TABLE IF NOT EXISTS soldes (
                empMat varchar(15) NOT NULL,
                soldeAN int(5) NOT NULL DEFAULT '0',
                soldeREC int(5) NOT NULL DEFAULT '0',
                soldeINZC int(5) NOT NULL DEFAULT '0',
                PRIMARY KEY (empMat)
              ) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
            try {
             $create=$this->connect()->prepare($sql2);
             $create->execute(); 
            } catch (PDOException $e) {
                die('Erreur SQL! <br>' . $sql2 . '<br>' . $e->getMessage());
            }
            
            $nbUMat=$this->selectWhere('COUNT(userMAT)','users',"userMAT='$matr'")->fetch();
            $nbUMat=$nbUMat['COUNT(userMAT)'];

            $nbUMat2=$this->selectWhere('COUNT(empMat)','soldes',"empMat='$matr'")->fetch();
            $nbUMat2=$nbUMat2['COUNT(empMat)'];

            $nbUEmail=$this->selectWhere('COUNT(userEMAIL)','users',"userEMAIL='$Email'")->fetch();
            $nbUEmail=$nbUEmail['COUNT(userEMAIL)'];

            $nbUTel=$this->selectWhere('COUNT(userPHONE)','users',"userPHONE='$NumTel'")->fetch();
            $nbUTel=$nbUTel['COUNT(userPHONE)'];

            $nbPWD=$this->selectWhere('COUNT(userPWD)','users',"userPWD='$pwd'")->fetch();
            $nbPWD=$nbPWD['COUNT(userPWD)'];

            if ( ($nbUMat>0) || ($nbUEmail>0) || ($nbUTel>0) || ($nbPWD>0)) {
                if (($nbUMat>0)||($nbPWD>0)) {
                    //session_start();
                    $_SESSION['message']="Ce matricule &nbsp;<b>$matr</b>&nbsp; existe déjà.";
                    $_SESSION['msgType']="danger";
                    header("location:index.php?m=adminajtemp");
                    exit();            
                }
                if (($nbUEmail>0)) {
                    //session_start();
                    $_SESSION['message']="L'adresse e-mail &nbsp;<b>$Email</b>&nbsp; est déjà enregistré pour un autre employé. Il doit être unique";
                    $_SESSION['msgType']="danger";
                    header("location:index.php?m=adminajtemp");
                    exit(); 
                }if (($nbUTel>0)) {
                    //session_start();
                    $_SESSION['message']="Le numéro de téléphone &nbsp;<b>$NumTel</b>&nbsp; est déjà enregistré pour un autre employé. Il doit être unique";
                    $_SESSION['msgType']="danger";
                    header("location:index.php?m=adminajtemp");
                    exit(); 
                }
            } else {

                $this->insertInto('users', '(userMAT, userPWD, userROLE, userNOM, userPRE, userPHOTO,
                 userGENRE, userETACIV, userNAISS, userEMAIL, userPHONE, userADRESSE, userDEPARTEMENT,
                  userPOST)', "('$matr', '$pwd', '$role', '$nom', '$pre', '$photo', '$gnr', '$etaCiv',
                   '$Naiss', '$Email', '$NumTel', '$addrss', '$depart', '$post')");
                   if ($nbUMat2==0 && $role!="admin" && $role!="chef") {
                    $this->insertInto('soldes','(empMat, soldeAN, soldeREC, soldeINZC)',"('$matr','0','0','0')");
                    //session_start();
                   }
                $_SESSION['message']="L'ajout a été terminé avec succès. Veuillez consulter le tableau des employés";
                $_SESSION['msgType']="success";
                header("location:index.php?m=adminappuserlist");
            }
        }
    }
    
    function modifierUser(){
        if (isset($_POST['addEmp'])) {
            $matpreced=htmlentities($_POST['MatPreced']);
            $role =htmlentities($_POST['empRole']);
            $matr = htmlentities($_POST['empMat']);
            $nom = htmlentities($_POST['empNom']);
            $pre = htmlentities($_POST['empPrenom']);
            $gnr = htmlentities($_POST['empGenre']);
            $etaCiv = htmlentities($_POST['empETACIV']);
            $Naiss =htmlentities( $_POST['empDateN']);
            $Email = htmlentities($_POST['empEmail']);
            $NumTel = htmlentities($_POST['empPhone']);
            $addrss = htmlentities($_POST['empAdress']);
            $depart = htmlentities($_POST['empDep']);
            $post =htmlentities( $_POST['empPost']);
            $photo = htmlentities($_POST['empPhoto']);
            
            $nbUMat=$this->selectWhere('COUNT(userMAT)','users',"userMAT='$matr'")->fetch();
            $nbUMat=$nbUMat['COUNT(userMAT)'];

            if (($nbUMat>1)) {
                //session_start();
                    $_SESSION['message']="Ce matricule &nbsp;<b>$matr</b>&nbsp; existe déjà.";
                    $_SESSION['msgType']="danger";
                header("location:index.php?m=adminajtemp&&empEdit=$matr");
                exit();            
            }else {
                $this->update('users',"userROLE='$role',userMAT='$matr',userNOM='$nom', userPRE='$pre', userPHOTO='$photo',
            userGENRE='$gnr', userETACIV='$etaCiv', userNAISS='$Naiss', userEMAIL='$Email', userPHONE='$NumTel', userADRESSE='$addrss', userDEPARTEMENT='$depart',
             userPOST='$post'","userMAT='$matpreced'");
             //session_start();
                    $_SESSION['message']="La modification a été effectuée avec succès. Veuillez consulter le tableau des employés.";
                    $_SESSION['msgType']="success";
             header("location:index.php?m=adminappuserlist");

            }

            
        }
        
    }


}

?>