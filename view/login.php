

<?php // session_start();?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Authentification</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" type="text/css" href="view/fonts/boxicons/css/boxicons.css" />
        <link rel="stylesheet"  href="view/css/stylelog.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="view/fonts/fontawesome/css/fontawesome.css" />
        <script src="https://kit.fontawesome.com/a81368914c.js"></script>
        <link rel="icon" type="image/x-icon" href="view/img/favicon/sonatrachicon.png">
        <script src="view/js/hidePWD.js"></script>

    </head>

    <body>
       <?php $this->loader(); ?>
        <div class="Main-div">
        <?php $this->showAlert()?>  

            <div class="form-box">
                <div class="headbox">
                    <span><img class="ltl-logo" src="view/img/icons/sonatrach.png"></span>
                    <h2>Espace de Cong&eacute;s</h2>
                </div>
                <form action="index.php?m=authentification" method="post">
                    <div class="input-class">
                        <span>
                            <i class="fas fa-user"></i>
                        </span>
                        <input type="text" name="userName" required>
                        <label> Nom d'utilisateur</label>
                    </div>
                    <div class="input-class pwd">
                        <span>
                            <i class="fas fa-lock"></i>
                        </span>
                        <input type="password" name="pwd" required>
                        <label> Mot de passe</label>
                        <span class="password-i" onclick="initPASSWORDtoggle()">
                            <i id="pwdi" class="bx bx-hide"></i>
                        </span>
                    </div>
                    <a href="index.php?m=forgotPWD">Mot de passe oubli&eacute;?</a>
                    <div class='incorrect'>
                    <?php if (isset($_SESSION['message'])) { 
                        echo "<p>".$_SESSION['message']."</p>";
                        unset($_SESSION['message']);
                    }
                    ?></div>
            	    <input type="submit" class="btn"  name="login" value="Connexion">
                </form>
            </div>
        </div>
        <script>
            document.addEventListener('keydown', function(event) {
            var key = event.key;
            var specialCharacters = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/;
            
            if (specialCharacters.test(key)) {
                event.preventDefault();
            }
            }); 
       </script>
    </body>
</html>