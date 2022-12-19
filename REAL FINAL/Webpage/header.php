<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
          name="viewport">
    <meta content="ie=edge" http-equiv="X-UA-Compatible">

    <!--    WEB SYMBOL-->
    <link rel="shortcut icon" href="../background/dc1.png" />

    <!--    SEARCH ICON-->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
<!--INDEX WEB CSS-->
    <link href="../css%20blocks/web.css" rel="stylesheet" type="text/css">
<!--SLIDE PHOTO CSS-->
    <link rel="stylesheet" href="../css%20blocks/carousel.css" type="text/css">
<!-- index fiches restaurants  -->
    <link rel="stylesheet" href="../css blocks/index-restau.css">
    <link rel="stylesheet" href="../css blocks/footer.css">
    <title>PROJECT THANH CRICRI</title>

</head>
<body>
<!--SEARCH BAR BLOCK-->
<input id="check" type="checkbox">
<nav>
    <a href="index.php">
        <!--              <div class="icon">FOOD <b style="color: black;">A</b>ddict</div>-->
        <img class="icon" src="../background/WEBsymbol.png" title="HOMEPAGE" alt="">
    </a>


    <!--    SEARCH BAR FUNCTION WITH PHP-->
    <form action="recherche.php" method="post">
    <div class="search_box">
        <input name="search" placeholder="What are you craving?" type="search">
            <!-- SEARCH ICON -->
        <input type="submit" name="submit-recherche">
    </div>
    </form>

    <ol>
        <!-- <li><a href="#">Home</a></li>
        <li><a href="#">Reviews</a></li>
        <li><a href="#">Events</a></li>
        <li><a href="#">About</a></li> -->
        <?php
            if (isset($_SESSION["useruid"])){
                echo "<li><a href='profile.php'>Profile</a></li>";
                echo "<li><a href='../INCLUDES-files/logout.inc.php'>Log Out</a></li>";
            } 
            else if  (isset($_SESSION["email"]))
            {
                echo "<li><a href='profile-restau.php'>Profile</a></li>";
                echo "<li><a href='../INCLUDES-files/logout.inc.php'>Log Out</a></li>";
            }
            else
            {
                echo "<li><a href='login.php'>Login</a></li>";
                echo "<li><a href='signup.php'>Sign Up</a></li>";
            }

        ?>
    </ol>
    <!--    Users interface-->
    <label class="bar" for="check">
        <!--        bars symble from Font awesome FA-->
        <span class="fa fa-bars" id="bars"></span>
        <!--        Cross symbol-->
        <span class="fa fa-times" id="times"></span>
    </label>
</nav>

<?php
 //include_once 'index.php';
//
?>
