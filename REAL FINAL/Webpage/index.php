<?php
    include_once 'header.php';


//<!--SLIDE SHOW PHOTO -->

include_once '../INCLUDES-files/ranking.inc.php';

?>



  <body>
    <div class="containerCarousel">
        <div class="slideshow" >
          <!-- carousel control buttons -->
          <button class="slide-btn slide-btn-1"></button>
          <button class="slide-btn slide-btn-2"></button>
          <button class="slide-btn slide-btn-3"></button>
          <button class="slide-btn slide-btn-4"></button>
          <!-- carousel wrapper which contains all images -->
          <div class="slideshow-wrapper">
            <div class="slide">
              <!-- assigne un lien au restaurant qui permet d'aller sur la page du restaurant puis récupère la photo 
            voir ranking.inc.php-->
              <?php echo "<a href='restau-individuel.php?ID=$tabID[0]'>"?>
                <img class="slide-img" <?php echo "src='$tabPath[0]'" ?> alt="1" >
              </a>
            </div>
            <div class="slide">
            <?php echo "<a href='restau-individuel.php?ID=$tabID[1]'>"?>
                <img class="slide-img" <?php echo "src='$tabPath[1]'" ?> alt="2">
              </a>
            </div>
            <div class="slide">
            <?php echo "<a href='restau-individuel.php?ID=$tabID[2]'>"?>
                <img class="slide-img" <?php echo "src='$tabPath[2]'" ?> alt="3">
              </a>
            </div>
            <div class="slide">
            <?php echo "<a href='restau-individuel.php?ID=$tabID[3]'>"?>
                <img class="slide-img" <?php echo "src='$tabPath[3]'" ?> alt="4">
              </a>
            </div>

        </div> 
      </div>
    </div>
  </body>


</html>

<?php
 include_once 'affichage-index-restau.php';
?>


<?php
include_once  'footer.php';
?>