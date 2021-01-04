<?php
  session_start();

  //Verbindung herstellen
  $webshopcon = mysqli_connect("127.0.0.1", "root", "", "webshopdb");
                          
  if(!$webshopcon){
    echo "Fehler: konnte nicht mit MariaDB verbinden." . PHP_EOL;
    echo "Debug-Fehlernummer: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debug-Fehlermeldung: " . mysqli_connect_error() . PHP_EOL;
    exit;
  }

  $sql ="SELECT id, title, descr, imageLink, price, genre FROM artikel";
  $result = $webshopcon->query($sql);

  ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Shop</title>
 <!-- jQuery -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <!-- Bootstrap v4 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <!-- Fontawesome -->
    <link href="../fontawesome/css/font-awesome.css" rel="stylesheet">
    <link href="../fontawesome/css/font-awesome.min.css" rel="stylesheet">
    

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=BioRhyme:wght@700&family=Cabin&display=swap" rel="stylesheet">

    <!-- CSS Files -->
    <link href="../css/main.css" rel="stylesheet">
    <link href="../css/karussell.css" rel="stylesheet">
    <link href="../css/artikelpage.css" rel="stylesheet">
    <link href="../css/loader.css" rel="stylesheet">

   
    <script src ="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.6.0/umd/popper.min.js"></script>

</head>
<body>

  <!-- Navigationsleiste -->
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="../index.php"><img src="../images/resourceImages/hai23.png" width="40" height="auto"><span style="font-family: 'BioRhyme', serif;">&nbsp;GameShark</span></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link mr-2 ml-4" href="startpage.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mr-2 ml-2" href="ueberuns.php">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mr-2 ml-2" href="artikelpage.php">Shop</a>
          </li>
          
        </ul>

        <!-- Dynamische navbar anzeige, jenachdem ob man eingeloggt ist oder nicht -->
        <?php
          if(isset($_SESSION['login'])==111){
            echo '<ul class="navbar-nav mr-2">
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><svg id="navbarDrop" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user" class="svg-inline--fa fa-user fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"></path></svg></a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="profil.php">Mein Profil</a>
                <a class="dropdown-item" href="orders.php">Meine Bestellungen</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php">Logout</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="warenkorb.php"><svg id="navbarCart" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="shopping-cart" class="svg-inline--fa fa-shopping-cart fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M528.12 301.319l47.273-208C578.806 78.301 567.391 64 551.99 64H159.208l-9.166-44.81C147.758 8.021 137.93 0 126.529 0H24C10.745 0 0 10.745 0 24v16c0 13.255 10.745 24 24 24h69.883l70.248 343.435C147.325 417.1 136 435.222 136 456c0 30.928 25.072 56 56 56s56-25.072 56-56c0-15.674-6.447-29.835-16.824-40h209.647C430.447 426.165 424 440.326 424 456c0 30.928 25.072 56 56 56s56-25.072 56-56c0-22.172-12.888-41.332-31.579-50.405l5.517-24.276c3.413-15.018-8.002-29.319-23.403-29.319H218.117l-6.545-32h293.145c11.206 0 20.92-7.754 23.403-18.681z"></path></svg></a>
            </li>
          </ul>';
          } else {
            echo '<form class="form-inline my-2 my-lg-0" action="../signup.html">
            <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Sign Up</button>
          </form>
          <form class="form-inline my-2 my-lg-0" action="../login.html">
            <button class="btn btn-outline-light my-2 my-sm-0" type="submit" style="margin:10px;">Login</button>
          </form>';
          }

        ?>



        
      </div>
    </nav>
    </header>


  <main>
          <br><br>
      <section class="container" id="products">
        <div class="row">
          <?php while($row = $result->fetch_assoc()):?>
            <div class="col-3">
              <?php include 'articleCard.php'?>
            </div>
          <?php endwhile;?>
        </div>
      </section>
      
  
      
  

</main>
  <br><br>

  <footer>
  <br><br><br><br><br>
  <nav class="navbar navbar-expand-sm navbar-light bg-light navbar-bottom">
    <div class="collapse navbar-collapse" id="navbarCollapse">
          
      <ul class="navbar-nav mx-auto">
        <li class="nav-item mr-5 ml-5">
          <a class="nav-link" href="../impressum.php"><small>Impressum</small> <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item mr-5 ml-5">
          <a class="nav-link" href="../datenschutzerklärung.php"><small>Datenschutzerklärung</small></a>
        </li>
        <li class="nav-item mr-5 ml-5">
          <a class="nav-link" href="../agb.php"><small>AGB</small></a>
        </li>
        <li class="nav-item mr-5 ml-5">
          <a class="nav-link" href="../hilfe.php"><small>Hilfe</small></a>
        </li>      
      </ul>
  
    </div>
  </nav>

  <!-- Die Elemente, welche für den Lade-Spinner verantwortlich sind. -->
  <div class="cssload-spin-box" id="loader2"></div>
  <div id="hidePage2" class="hidePage"></div>
</footer>
            
  
</body>
</html>