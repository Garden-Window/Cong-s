<?php ?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Envoyer mon mot de passe</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet"  href="view/css/stylelog.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="view/fontawesome/css/fontawesome.css" />
        <script src="https://kit.fontawesome.com/a81368914c.js"></script>
        <link rel="icon" type="image/x-icon" href="view/img/favicon/sonatrachicon.png">

    </head>
    <body>
    <?php $this->loader(); ?>

        <div class="Main-div">
        <?php
            if(isset($_SESSION['SendE'])){?>
            <div class="alert alert-success">
                <h5><?php $_SESSION['SendE']; ?></h5>
            </div>
            <?php unset($_SESSION['SendE']);
            }?>
            <div class="form-box">
                <div class="headbox">
                    <span><img class="ltl-logo" src="view/img/icons/sonatrach.png"></span>
                    <h2>Espace de Cong&egrave;s</h2>
                </div>
                <p id="forgotP"> si voue avez oubliez votre mot de passe remplir votre nom d'utilisateur </p>
                <form action="index.php?m=emailpwd" method="post">
                    
                    <div class="input-class">
                        <span>
                            <i class="fas fa-user"></i>
                        </span>
                        <input type="text"  name="mat" required>
                        <label> Nom d'utilisateur</label>
                    </div>
                    
                    
            	    <input type="submit" class="btn" name=" fsubmit" value="envoyer">
                    <a class="boxpwd" href="index.php?m=login">retour au page login?</a>

                </form>
            </div>
        </div>
        <?php
            
        ?>
    </body>
</html>