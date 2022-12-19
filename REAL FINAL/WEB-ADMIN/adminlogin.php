<?php
session_start();
if (isset($_POST['submit'])) {
    //lorsque l'utilisateur clique sur le button, on excute notre code
    if (!empty($_POST['uid'] AND !empty($_POST['pwd']))) {
        $username_default = "Almight";
        $password_default = "admin123";

        $username_input = htmlspecialchars($_POST['uid']);
        $password_input = htmlspecialchars($_POST['pwd']);

        if ($username_input == $username_default and $password_input == $password_default) {
            $_SESSION['pwd'] = $password_input;
            header("location: ../WEB-ADMIN/adminIndex.php");
        } else {
            echo "Your password is incorrect";
        }
    } else {
        echo "Please fill in the cases!";
    }
}
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
    <style>
        @import url('http://fonts.cdnfonts.com/css/mad-hacker');
        *{
            font-family: 'MAD hacker', sans-serif;

        }
        body{
            background-image: url("../background/IMG_2328.jpeg");
        }
        .container{
            background-image: url("../background/whitewallmarbre.jpg");
            box-shadow: rgba(46, 240, 65, 0.67) -10px 10px, rgba(117, 240, 46, 0.3) -15px 15px, rgba(240, 46, 170, 0.37) -20px 20px, rgba(240, 46, 170, 0.1) -25px 25px, rgba(240, 46, 170, 0.05) -30px 30px;
        }
        form .form-content .button button {
            background: darkgreen;
        }
        form .form-content .button button:hover {
            background: darkseagreen;
        }
        .form-content .input-box i {
            color: black;
        }
        .form-content .input-box input:focus,
        .form-content .input-box input:valid {
            border-color: limegreen;
        }
    </style>
</head>
<body>
<div class="container">
    <input id="flip" type="checkbox">
    <!--    BLOC COVER = IMAGE SUR LOGIN ET SIGNUP-->
    <div class="cover">
        <!--        LOGIN PART-->
        <div class="front">
            <img src="../background/mrrobot.jpg" alt="">
            <div class="text">
                <span class="text-1">HACK THIS SUCKERS </span>
            </div>
        </div>
        <!--        SIGNUP PART -->
        <div class="back">
            <img src="../background/mrrobot.jpg" alt="">
        </div>
    </div>

    <!--    to reach to a link -->
    <!--   Action va etre va page qu'on va acceder quand la form est soumise  -->
    <!--    Ce qu'on va faire c'est qu'on va prendre tous les inputs dans cette form puis mettre dans
    le lien URL puis le faire passer à la prochaine page dans ce lien URL ( meme lien)-->
    <!--    Voila comment faire passer du data d'un document ou une page sur nôtre site à une autre-->
    <form action="" method="post">
        <!--        POURQUOI .INC? Cela veut seulement dire que c'est un fichier inclus, c'est extension du fichier -->
        <div class="form-content">
            <div class="login-form">
                <div class="title">Login Admin</div>
                <div class="input-boxes">
                    <!--                COMPTE + COMPTE SYMBOLE EN UTILISANT FONT AWESOME -->
                    <div class="input-box">
                        <i class="fas fa-user"></i>
                        <input placeholder="Enter your Username or Email" name="uid" type="text">
                    </div>
                    <!--MOT DE PASSE + MDP SYMBOLE EN UTILISANT FONT AWESOME -->
                    <div class="input-box">
                        <i class="fas fa-lock"></i>
                        <input placeholder="Enter your password" name="pwd" type="password">
                    </div>
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

                    <div class="text sign-up-text">Login as<a href="../Webpage/login.php"> User</a></div>
                    <div class="text sign-up-text">Sign-up as<a href="../Webpage/signup.php"> User</a></div>
                </div>
            </div>
        </div>
    </form>
</div>


</body>
</html>