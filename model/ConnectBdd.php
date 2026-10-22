<?php
class connectBDD{
    protected function connect() {
        try {
            $conn= new PDO('mysql:host=localhost;dbname=apprmk','root','');
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            die('Erreur!: '.$e->getMessage().".");  
        }
        return $conn;
    }
}
?>


