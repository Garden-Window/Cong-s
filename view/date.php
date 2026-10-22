<?php
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

    function calcDureeSansVendredi($dateDebut, $dateFin) {
        $fridays=countFridays($dateDebut,$dateFin);
        $dateDebut = new DateTime($dateDebut);
        $dateFin = new DateTime($dateFin);
        $difference = $dateDebut->diff($dateFin);
    
        $duree = $difference->days;
        $duree=$duree-$fridays;
        return $duree+1;
    }
    // echo calcDureeSansVendredi('2023-06-15','2023-06-17');
    // $date= countFridays('2023-06-15','2023-06-17');
    // echo  "ttt".$date;
    
// $new = htmlspecialchars("<a href='test'>Test</a>", ENT_QUOTES);
// echo $new; // &lt;a href=&#039;test&#039;&gt;Test&lt;/a&gt;
echo md5('SONA3212949399');
?>