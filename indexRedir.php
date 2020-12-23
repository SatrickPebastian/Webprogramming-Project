<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>GameShark</title>

  <!-- Bootstrap v4 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <!-- Fontawesome -->
  <link href="fontawesome/css/font-awesome.css" rel="stylesheet">
  <link href="fontawesome/css/font-awesome.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/d36fdbef7d.js" crossorigin="anonymous"></script>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=BioRhyme:wght@700&family=Cabin&display=swap" rel="stylesheet">

  <!-- CSS Files -->
  <link href="css/main.css" rel="stylesheet">
  <link href="css/karussell.css" rel="stylesheet">

</head>
<body>


  <!-- Navigationsleiste -->
<header>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php"><img src="images/resourceImages/hai23.png" width="40" height="auto"><span style="font-family: 'BioRhyme', serif;">&nbsp;GameShark</span></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link mr-2 ml-4" href="php/startpage.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link mr-2 ml-2" href="php/ueberuns.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link mr-2 ml-2" href="php/artikelpage.php">Shop</a>
        </li>
        
      </ul>

      <!-- Dynamische navbar anzeige, jenachdem ob man eingeloggt ist oder nicht -->
      <?php
        if(isset($_SESSION['login'])==111){
          echo '<ul class="navbar-nav mr-2">
          <li class="nav-item dropdown">
            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><svg id="navbarDrop" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user" class="svg-inline--fa fa-user fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"></path></svg></a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="php/profil.php">Mein Profil</a>
              <a class="dropdown-item" href="php/orders.php">Meine Bestellungen</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="php/logout.php">Logout</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="warenkorb.php"><svg id="navbarCart" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="shopping-cart" class="svg-inline--fa fa-shopping-cart fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M528.12 301.319l47.273-208C578.806 78.301 567.391 64 551.99 64H159.208l-9.166-44.81C147.758 8.021 137.93 0 126.529 0H24C10.745 0 0 10.745 0 24v16c0 13.255 10.745 24 24 24h69.883l70.248 343.435C147.325 417.1 136 435.222 136 456c0 30.928 25.072 56 56 56s56-25.072 56-56c0-15.674-6.447-29.835-16.824-40h209.647C430.447 426.165 424 440.326 424 456c0 30.928 25.072 56 56 56s56-25.072 56-56c0-22.172-12.888-41.332-31.579-50.405l5.517-24.276c3.413-15.018-8.002-29.319-23.403-29.319H218.117l-6.545-32h293.145c11.206 0 20.92-7.754 23.403-18.681z"></path></svg></a>
          </li>
        </ul>';
        } else {
          echo '<form class="form-inline my-2 my-lg-0" action="signup.html">
          <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Sign Up</button>
        </form>
        <form class="form-inline my-2 my-lg-0" action="login.html">
          <button class="btn btn-outline-light my-2 my-sm-0" type="submit" style="margin:10px;">Login</button>
        </form>';
        }

      ?>

    </div>
  </nav>
</header>
<main>
  

<!-- Karussell -->
<!--Carousel Wrapper-->
<div id="video-carousel-example2" class="carousel slide carousel-fade" data-ride="carousel">
  <!--Indicators-->
  <ol class="carousel-indicators">
    <li data-target="#video-carousel-example2" data-slide-to="0" class="active"></li>
    <li data-target="#video-carousel-example2" data-slide-to="1"></li>
    <li data-target="#video-carousel-example2" data-slide-to="2"></li>
  </ol>
  <!--/.Indicators-->
  <!--Slides-->
  <div class="carousel-inner" role="listbox">
    <!-- First slide -->
    <div class="carousel-item active">
      <!--Mask color-->
      <div class="view">
        <!--Video source-->
        <video class="video-fluid" autoplay loop muted>
          <source src="videos/Assassin's Creed Valhalla „Cinematic World Premiere Trailer“    Ubisoft [DE]_Trim.mp4" type="video/mp4" />
        </video>
        <div class="mask rgba-indigo-light"></div>
      </div>

      <!--Caption-->
      <div class="carousel-caption">
        <div class="animated fadeInDown">
          <h3 class="h3-responsive">Assassin's Creed Valhalla</h3>
          <p>Tauche ein in die Welt der Wikinger und nordischer Mythologien.</p>
        </div>
      </div>
      <!--Caption-->
    </div>
    <!-- /.First slide -->

    <!-- Second slide -->
    <div class="carousel-item">
      <!--Mask color-->
      <div class="view">
        <!--Video source-->
        <video class="video-fluid" autoplay loop muted>
          <source src="videos/Apex Legends Gameplay Trailer_Trim.mp4" type="video/mp4" />
        </video>
        <div class="mask rgba-indigo-light"></div>
      </div>

      <!--Caption-->
      <div class="carousel-caption">
        <div class="animated fadeInDown">
          <h3 class="h3-responsive">Apex Legends</h3>
          <p>Intensives Battle Royale mit all deinen Freunden.</p>
        </div>
      </div>
      <!--Caption-->
    </div>
    <!-- /.Second slide -->

    <!-- Third slide -->
    <div class="carousel-item">
      <!--Mask color-->
      <div class="view">
        <!--Video source-->
        <video class="video-fluid" autoplay loop muted>
          <source src="videos/Need for Speed™ Heat Official Reveal Trailer_Trim.mp4" type="video/mp4" />
        </video>
        <div class="mask rgba-indigo-light"></div>
      </div>

      <!--Caption-->
      <div class="carousel-caption">
        <div class="animated fadeInDown">
          <h3 class="h3-responsive">Need for Speed: Heat </h3>
          <p>Rase am Tag und riskiere alles in der Nacht. Ein packendes Racing-Erlebnis.</p>
        </div>
      </div>
      <!--Caption-->
    </div>
    <!-- /.Third slide -->
  </div>
  <!--/.Slides-->
  <!--Controls-->
  <a class="carousel-control-prev" href="#video-carousel-example2" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#video-carousel-example2" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  <!--/.Controls-->
</div>
<!--Carousel Wrapper-->



  <br>
  <br>
  <!-- Marketing Messages -->
  <div class="container marketing">

    <!-- Three columns of text below the carousel -->
    <div class="row">
      <div class="col-lg-4">
        <img src="images/resourceImages/regler.png" height="100" width="auto">
        <br>
        <br>
        <h2>Riesiges Angebot</h2>
        <p>100+ Spiele und DLC's bei uns im Angebot. <br>Alles was dein Herz begehrt. Hier wirst du definitiv fündig.</p>
        
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        
        <img src="images/resourceImages/geld-zuruck-garantie.png" height="100" width="auto">
        <br>
        <br>
        <h2>Unschlagbare Preise</h2>
        <p>Auf GameShark findest du absolute Spitzenpreise. Solltest du im Netz ein besseres Angebot finden, werden wir unseren Preis an diesen anpassen.</p>
        
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
       
        <img src="images/resourceImages/expresszustellung.png" height="100" width="auto">
       
          <br>
        <br>
        <h2>Schnelle Lieferung</h2>
        <p>Durch kostenlosen Premiumversand sind sämtliche Artikel spätestens in zwei Tagen bei dir zuhause.</p>
      
      </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->
</main>



</body>
</html>