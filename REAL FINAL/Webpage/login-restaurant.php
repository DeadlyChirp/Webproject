<?php

?>

<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset="UTF-8">
    <title>FOOD ADDICT's Login</title>
    <link crossorigin="anonymous" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
          name="viewport">
    <meta content="ie=edge" http-equiv="X-UA-Compatible">
    <link href="../css blocks/login&singup.css" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="../background/dc1.png" />
</head>
<body>
<div class="container">
    <input id="flip" type="checkbox">
    <!--    BLOC COVER = IMAGE SUR LOGIN ET SIGNUP-->
    <div class="cover">
        <!--        LOGIN PART-->
        <div class="front">
            <img src="../background/neko-sushi-bar-vincent-trinidad.jpg" alt="">
            <div class="text">
                <span class="text-1">EVERYTHING IS FOOD </span>
                <span class="text-2">IF YOU'RE BRAVE ENOUGH </span>
            </div>
        </div>
        <!--        SIGNUP PART -->
        <div class="back">
            <img src="../background/neko-sushi-bar-vincent-trinidad.jpg" alt="">
            <div class="text">
                <span class="text-1">EVERYTHING IS FOOD </span>
                <span class="text-2">IF YOU'RE BRAVE ENOUGH </span>
            </div>
        </div>
    </div>

    <!--    to reach to a link -->
<!--   Action va etre va page qu'on va acceder quand la form est soumise  -->
<!--    Ce qu'on va faire c'est qu'on va prendre tous les inputs dans cette form puis mettre dans
le lien URL puis le faire passer à la prochaine page dans ce lien URL ( meme lien)-->
<!--    Voila comment faire passer du data d'un document ou une page sur nôtre site à une autre-->
    <form action="../INCLUDES-files/login.inc.restau.php" method="post">
<!--        POURQUOI .INC? Cela veut seulement dire que c'est un fichier inclus, c'est extension du fichier -->
        <div class="form-content">
            <div class="login-form">
                <div class="title">Login Professional</div>
                <div class="input-boxes">
                    <!--                COMPTE + COMPTE SYMBOLE EN UTILISANT FONT AWESOME -->
                    <div class="input-box">
                        <i class="fas fa-user"></i>
                        <input placeholder="Enter your Email" name="email" type="text">
                    </div>
                    <!--MOT DE PASSE + MDP SYMBOLE EN UTILISANT FONT AWESOME -->
                    <div class="input-box">
                        <i class="fas fa-lock"></i>
                        <input placeholder="Enter your password" name="pwd" type="password">
                    </div>
                    <div class="text"><a href="forgotpasswordPro.php">Forgot password?</a></div>
                    <?php
                    if (isset($_GET["error"])) {
                        if ($_GET["error"] == "emptyinput") {
                            echo "<p>Fill in all fields please</p>";
                        } else if ($_GET["error"] == "wrongloginbro") {
                            echo "<p>Incorrect login informations!</p>";
                        }
                    }
                    ?>
                    <div class="button input-box">
                        <!--                        <i class="fas fa-sign-in"></i>-->
                        <button type="submit" name="submit">Login</button>

                    </div>
                    <div class="text sign-up-text">Don't have an account?<a href="signup-restaurant.php"> Sign-Up as a Professional</a></div>
                    <div class="text sign-up-text"><i class="fas fa-home"></i><a href="../Webpage/index.php"> Back to Home</a></div>
                </div>
            </div>
        </div>
    </form>
</div>


</body>
</html>