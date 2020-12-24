<?php
  
  session_start(); 
    
  if($_SESSION['login']!=111){
    header("Location: ../login.html");
  }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meine Bestellungen</title>

    <!-- Bootstrap v4 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <!-- Fontawesome -->
    

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=BioRhyme:wght@700&family=Cabin&display=swap" rel="stylesheet">

    <!-- CSS Files -->
    <link href="../css/main.css" rel="stylesheet">
    <link href="../css/karussell.css" rel="stylesheet">
    <link href="../css/artikelpage.css" rel="stylesheet">
    <link href="../css/loader.css" rel="stylesheet">

    <!-- neuestes fontawesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <!-- Sweet alert import -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  
    

    <script type="text/javascript">
    var checker = false;
      function areYouSure(){
        if(confirm("Sind Sie sicher, dass Sie ihre gesamte Bestellhistorie löschen möchten?")){
          return true;
        }else {
          return false;
        }
      }

      function activateLoader(){

        var loader = document.getElementById('loader2');
        var overlay = document.getElementById('hidePage2');
        var origOverlay = overlay.style.visibility;
        var origLoader = loader.style.visibility;
        loader.style.visibility = 'visible';
        overlay.style.visibility = 'visible';
        setTimeout(function(){
                loader.style.visibility = origLoader;
                
        }, 1750);
        setTimeout(function(){
                
                overlay.style.visibility = origOverlay;
        }, 2000); 

      }

      function checkBuyAgain(e){
        
      }
      
      


      

    </script>
    

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

        <ul class="navbar-nav mr-2">
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
        </ul>
        
      </div>
    </nav>
    </header>

<main>

<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">Meine Bestellungen</h1>
     </div>
</section>

<br>
<div class="container">
<table class="table">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">Produkte</th>
      <th scope="col">Preis</th>
      <th scope="col">Versandart</th>
      <th scope="col">Zeitpunkt</th>
      <th scope="col" class="text-center">Buy again</th>
    </tr>
  </thead>
  <tbody>
  
  <?php
    //Verbindung herstellen
    $webshopcon = mysqli_connect("127.0.0.1", "root", "", "webshopdb");
                        
    if(!$webshopcon){
        echo "Fehler: konnte nicht mit MariaDB verbinden." . PHP_EOL;
        echo "Debug-Fehlernummer: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debug-Fehlermeldung: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }

    $userId = $_SESSION['id'];
    //Absteigende Ordnung, damit die neuesten Bestellungen als erstes gelistet werden.
    $sql = "SELECT id, userid, date, artikelnamen, gesamteSumme, versandOption FROM bestellungen WHERE userid = '$userId' ORDER BY id DESC;";
    $result = $webshopcon->query($sql);

    $rowCounter = 1;
    while($row = $result->fetch_assoc()):
  ?>

    <tr>  
      <th scope="row"><?= $rowCounter?></th>
      <td><?= $row['artikelnamen']?></td>
      <td><?= $row['gesamteSumme']?>€</td>
      <td><?= $row['versandOption']?></td>
      <td><?= $row['date']?></td>
      <form method="post" action="buyAgain.php" id="buyAgainForm" onsubmit="return checkBuyAgain()">
      <td class="text-center"><button id="buyAgainButton" type="submit" class="btn btn-sm btn-light border" value="<?= $row['id']?>" name="buyAgainButton"><i class="fas fa-redo"></i></button></td>
      
      </form>
    </tr>
      <?php $rowCounter++; ?>
    <?php endwhile; mysqli_close($webshopcon);?> 
  </tbody>
</table>

<?php
  if($rowCounter > 1){
    echo '<div class="row">
    <div class="col">
      <form method="post" action="deleteOrders.php" onsubmit="return areYouSure();">
      <button class="btn btn-danger text-center" style="margin-bottom:50px;" onclick="activateLoader()">Bestellverlauf löschen</button>
      <form>
    </div>
</div>';
  }else {
    echo '<br><h2 class="text-center">Keine durchgeführten Bestellungen hinterlegt.</h2>';
  }

?>

</div>


<!-- Die Elemente, welche für den Lade-Spinner verantwortlich sind. -->
<div class="cssload-spin-box" id="loader2"></div>
<div id="hidePage2" class="hidePage"></div>
</main>

<footer>
  <br><br><br><br><br>
  <nav class="navbar navbar-expand-sm navbar-light bg-light navbar-bottom">
    <div class="collapse navbar-collapse" id="navbarCollapse">
          
      <ul class="navbar-nav mx-auto">
        <li class="nav-item mr-5 ml-5">
          <a class="nav-link" href="../impressum.html"><small>Impressum</small> <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item mr-5 ml-5">
          <a class="nav-link" href="../datenschutzerklärung.html"><small>Datenschutzerklärung</small></a>
        </li>
        <li class="nav-item mr-5 ml-5">
          <a class="nav-link" href="../agb.html"><small>AGB</small></a>
        </li>
        <li class="nav-item mr-5 ml-5">
          <a class="nav-link" href="../hilfe.html"><small>Hilfe</small></a>
        </li>      
      </ul>
  
    </div>
  </nav>
</footer>

</body>

</html>