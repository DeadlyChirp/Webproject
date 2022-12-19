
<?php
    require_once '../INCLUDES-files/connect-db-restau.php';
    if (isset($_GET["email"]) && isset($_GET["token"])) {

        $email = $conn->real_escape_string($_GET["email"]);
        $token = $conn->real_escape_string($_GET["token"]);

        $data1 = $conn->query("SELECT restaurantsId FROM restaurants WHERE email='$email' AND token='$token'");

        if($data1->num_rows >0){
            //si on peut pas retrouver des utilisateurs avec cet email et token
            $str = "1234567890qwertyuiopasdfghjklzxcvbnm";
            $str = str_shuffle($str);
            $str = substr($str,0,10);
            $password = sha1($str);

            $conn->query("UPDATE restaurants SET pwd='$password', token='' WHERE email='$email'");

            $str;
        } else {
            echo "Please check your link";
        }
    } else {
        header("location: ../Webpage/login.php");
        exit();
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
    <form action="../INCLUDES-files/login.inc.php" method="post">
        <!--        POURQUOI .INC? Cela veut seulement dire que c'est un fichier inclus, c'est extension du fichier -->
        <div class="form-content">
            <div class="login-form">
                <?php
                echo  "Your new password is: $str";
                ?>
                    <div class="text sign-up-text">Don't have an account?<a href="signup.php"> Sign-Up now</a></div>
                    <div class="text sign-up-text">Log in as<a href="../WEB-ADMIN/adminlogin.php"> Admin</a></div>
                    <div class="text sign-up-text">Log in as<a href="../Webpage/login-restaurant.php"> User Pro</a></div>
                    <div class="text sign-up-text"><i class="fas fa-home"></i><a href="../Webpage/index.php"> Back to Home</a></div>
                </div>
            </div>
        </div>
    </form>
</div>



</body>
</html>
