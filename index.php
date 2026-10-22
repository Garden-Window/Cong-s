<?php
session_start();

require_once('model/ConnectBDD.php');
require_once('model/functions.php');

$c='Controller';                                //controlleur
$m= isset($_GET['m']) ? $_GET['m'] : 'Login';   //methode
$p= isset($_GET['p']) ? $_GET['p'] : '';        //parametre

if ($m!='Login' && $m!='authentification' && !(isset($_SESSION['authentifier']))) {
    $m='Login';
}
$authentifier=isset($_SESSION['authentifier'])?$_SESSION['authentifier']:'';

if(file_exists('controller/' . $c . '.php')){
    require_once 'controller/' . $c . '.php';
    if(method_exists($c, $m)){
        $c = new $c;
        $c->$m($p);
    }else{
        die("Erreur : la methode ou fonction [{$m}()] n'existe pas");
    }    
}else{
    die("Erreur : le controleur [{$c}] n'existe pas.");
}

?>