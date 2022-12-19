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
        body{
            background-image: url("../background/forgotpaword.gif");
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
    <form action="forgotpasswordPro.php" method="post">
        <!--        POURQUOI .INC? Cela veut seulement dire que c'est un fichier inclus, c'est extension du fichier -->
        <div class="form-content">
            <div class="login-form">
                <div class="title">Reset your password (Professional account)</div>
                <div class="input-boxes">
                    <!--                COMPTE + COMPTE SYMBOLE EN UTILISANT FONT AWESOME -->
                    <div class="input-box">
                        <i class="fas fa-user"></i>
                        <input placeholder="Enter your Email to reset your account" name="email" type="text">
                    </div>
                    <?php
                    require_once '../INCLUDES-files/connect-db-restau.php';
                    if (isset($_POST["forgotpasswordPro"])){
                        $email = $conn->real_escape_string($_POST["email"]);
                        $data = $conn->query("SELECT restaurantsId FROM restaurants WHERE email='$email'");

//Fonction qui genere les string au hasard ( TOKEN)
//    2 fonction: str_shuffle pour prendre les caracteres et choisir au hasard
//    substr() -> qui utilise seulement un certain nombre de caractere (okdas,0,2) -> ok
                        if ($data->num_rows >0){
                            $str = "0987654321qwertyuiopasdfghjklzxcvbnm";
                            $str = str_shuffle($str);
                            $str = substr($str,0,10);

                            $subject = "Reset password";
                            $url = "http://localhost/PROJECT%20NEWEST%2006-05/FINAL%20PROJECT%20-%20Copie%20-%2004-05/Webpage/resetpasswordPro.php?token=$str&email=$email";
                            $body = "Hi there, we provided to you an temporary code to reset : $str, please click on this link to have your password reset: $url";
                            $sender = "From:thanhlongtng.6821@gmail.com\r\n";

                            if(mail($email,$subject,$body, $sender )){
                                echo "Mail sent succesfully. Please check your email!";
                            } else {
                                echo "Sorry, failed while sending mail";
                            }
                            $conn->query("UPDATE restaurants SET token='$str' WHERE email='$email'");

                        } else {
                            echo "Please check your input forgotPro!";
                        }
                    }
                    //?>
                    <div class="button input-box">
                        <button type="submit" name="forgotpasswordPro" value="Resquest Password">Request Password</button>
                    </div>
                    <div class="text sign-up-text">Don't have an account?<a href="signup.php"> Sign-Up now</a></div>
                    <div class="text sign-up-text"><i class="fas fa-home"></i><a href="../Webpage/index.php"> Back to Home</a></div>
                </div>
            </div>
        </div>
    </form>
</div>



</body>
</html>