<?php
  error_reporting(-1);
  ini_set('display_errors', 'On');

  $dsn = "mysql:host=localhost;dbname=webshopdb;charset=utf8";
  $db = new PDO($dsn, 'root', '');


  $sql ="SELECT id, title, descr, imageLink, price FROM artikel";
  $result = $db->query($sql);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Document</title>

      <!-- Bootstrap v4 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <!-- Fontawesome -->
    <link href="../fontawesome/css/font-awesome.css" rel="stylesheet">
    <link href="../fontawesome/css/font-awesome.min.css" rel="stylesheet">
    <script src="../https://kit.fontawesome.com/d36fdbef7d.js" crossorigin="anonymous"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=BioRhyme:wght@700&family=Cabin&display=swap" rel="stylesheet">

    <!-- CSS Files -->
    <link href="../css/main.css" rel="stylesheet">
    <link href="../css/karussell.css" rel="stylesheet">
    <link href="../css/artikelpage.css" rel="stylesheet">

</head>
<body>

  <!-- Navigationsleiste -->
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="../index.html"><img src="../images/resourceImages/hai23.png" width="40" height="auto"><span style="font-family: 'BioRhyme', serif;">&nbsp;GameShark</span></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="startpage.html">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="ueberuns.html">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="artikelpage.php">Shop</a>
          </li>
          
        </ul>
        <ul class="navbar-nav mr-2">
          <li class="nav-item dropdown">
            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><svg id="navbarDrop" aria-hidden="true" focusable="false" data-prefix="far" data-icon="caret-square-down" class="svg-inline--fa fa-caret-square-down fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M125.1 208h197.8c10.7 0 16.1 13 8.5 20.5l-98.9 98.3c-4.7 4.7-12.2 4.7-16.9 0l-98.9-98.3c-7.7-7.5-2.3-20.5 8.4-20.5zM448 80v352c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48h352c26.5 0 48 21.5 48 48zm-48 346V86c0-3.3-2.7-6-6-6H54c-3.3 0-6 2.7-6 6v340c0 3.3 2.7 6 6 6h340c3.3 0 6-2.7 6-6z"></path></svg></a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="../profil.html">Mein Profil</a>
              <a class="dropdown-item" href="#">Meine Bestellungen</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="../logout.html">Logout</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="warenkorb.php"><svg id="navbarCart" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="shopping-cart" class="svg-inline--fa fa-shopping-cart fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M528.12 301.319l47.273-208C578.806 78.301 567.391 64 551.99 64H159.208l-9.166-44.81C147.758 8.021 137.93 0 126.529 0H24C10.745 0 0 10.745 0 24v16c0 13.255 10.745 24 24 24h69.883l70.248 343.435C147.325 417.1 136 435.222 136 456c0 30.928 25.072 56 56 56s56-25.072 56-56c0-15.674-6.447-29.835-16.824-40h209.647C430.447 426.165 424 440.326 424 456c0 30.928 25.072 56 56 56s56-25.072 56-56c0-22.172-12.888-41.332-31.579-50.405l5.517-24.276c3.413-15.018-8.002-29.319-23.403-29.319H218.117l-6.545-32h293.145c11.206 0 20.92-7.754 23.403-18.681z"></path></svg></a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" action="../signup.html">
          <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Sign Up</button>
        </form>
        <form class="form-inline my-2 my-lg-0" action="../login.html">
          <button class="btn btn-outline-light my-2 my-sm-0" type="submit" style="margin:10px;">Login</button>
        </form>
      </div>
    </nav>
    </header>


  <main>
      <!-- Grid -->

      <div id="accordion">
        <div class="card">
          <div class="card-header headingOne" style="text-align:center">
            <h5 class="mb-0">
              <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Filter
              </button>
            </h5>
          </div>
          <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label class="col-md-4 control-label" for="checkboxes"><b>Genre</b></label>
                    <div class="col-md-4">
                      <div class="checkbox">
                        <label for="checkboxes-0">
                          <input type="checkbox" name="checkboxes" id="checkboxes-0" value="1">
                            Action
                        </label>
                      </div>
                      <div class="checkbox">
                        <label for="checkboxes-0">
                          <input type="checkbox" name="checkboxes" id="checkboxes-0" value="1">
                            Open-World
                        </label>
                      </div>
                      <div class="checkbox">
                        <label for="checkboxes-0">
                          <input type="checkbox" name="checkboxes" id="checkboxes-0" value="1">
                            Autorennen
                        </label>
                      </div>
                      <div class="checkbox">
                        <label for="checkboxes-0">
                          <input type="checkbox" name="checkboxes" id="checkboxes-0" value="1">
                            Ego-Shooter
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col">
                  
                  <!-- Hier Preis Range-Input hinzufügen -->

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>



      
      <section class="container" id="products">
        <div class="row">
          <?php while($row = $result->fetch()):?>
            <div class="col-3">
              <?php include 'articleCard.php'?>
            </div>
          <?php endwhile;?>
        </div>
        </section>


      </div>
    </div>
  </div>
</main>

</body>
</html>