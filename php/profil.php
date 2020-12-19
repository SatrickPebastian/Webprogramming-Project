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
    <title>Document</title>

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
    <link href="../css/main.css" rel="stylesheet">
    <link href="../css/karussell.css" rel="stylesheet">
    
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
            <a class="nav-link" href="startpage.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="ueberuns.php">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="artikelpage.php">Shop</a>
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
    <?php
      
      //Verbindung herstellen
      $webshopcon = mysqli_connect("127.0.0.1", "root", "", "webshopdb");
                        
      if(!$webshopcon){
        echo "Fehler: konnte nicht mit MariaDB verbinden." . PHP_EOL;
        echo "Debug-Fehlernummer: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debug-Fehlermeldung: " . mysqli_connect_error() . PHP_EOL;
        exit;
      }

      $username = $_SESSION['username'];

      $sql = "SELECT email, stadt, country, plz, street FROM user WHERE username = '$username';";
      $result = $webshopcon->query($sql);
      $row = $result->fetch_assoc();

      $userEmail = $row['email'];
      $userStreet = $row['street'];
      $userCity = $row['stadt'];
      $userPlz = $row['plz'];
    
    ?>

      <div class="jumbotron jumbotron-fluid">
        <div class="container">
          <form>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputEmail4">E-Mail</label>
                <input type="email" class="form-control" id="inputEmail4" value="<?= $userEmail?>" style="width:500px;">
              </div>
              
            </div>

            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="inputAddress">Straße</label>
                <input type="text" class="form-control" id="inputAddress" value="<?= $userStreet?>" style="width:300px;">
              </div>
            </div>

            <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputAddress">Stadt</label>
                <input type="text" class="form-control" id="inputAddress" style="width:300px;" value="<?= $userCity?>">
              </div>
              <div class="form-group col-md-4">
                <label for="inputAddress">PLZ</label>
                <input type="text" class="form-control" id="inputAddress" style="width:100px;" value="<?= $userPlz?>">
              </div>
            </div>
            
              
                <label for="inputState">Land</label>
                <select id="select_land" name="select_land" class="form-control" required="" style="width:500px;">
                                        <option value="Afghanistan">Afghanistan</option>
                                        <option value="Ägypten">Ägypten</option>
                                        <option value="Aland">Aland</option>
                                        <option value="Albanien">Albanien</option>
                                        <option value="Algerien">Algerien</option>
                                        <option value="Amerikanisch-Samoa">Amerikanisch-Samoa</option>
                                        <option value="Amerikanische Jungferninseln">Amerikanische Jungferninseln</option>
                                        <option value="Andorra">Andorra</option>
                                        <option value="Angola">Angola</option>
                                        <option value="Anguilla">Anguilla</option>
                                        <option value="Antarktis">Antarktis</option>
                                        <option value="Antigua und Barbuda">Antigua und Barbuda</option>
                                        <option value="Äquatorialguinea">Äquatorialguinea</option>
                                        <option value="Argentinien">Argentinien</option>
                                        <option value="Armenien">Armenien</option>
                                        <option value="Aruba">Aruba</option>
                                        <option value="Ascension">Ascension</option>
                                        <option value="Aserbaidschan">Aserbaidschan</option>
                                        <option value="Äthiopien">Äthiopien</option>
                                        <option value="Australien">Australien</option>
                                        <option value="Bahamas">Bahamas</option>
                                        <option value="Bahrain">Bahrain</option>
                                        <option value="Bangladesch">Bangladesch</option>
                                        <option value="Barbados">Barbados</option>
                                        <option value="Belgien">Belgien</option>
                                        <option value="Belize">Belize</option>
                                        <option value="Benin">Benin</option>
                                        <option value="Bermuda">Bermuda</option>
                                        <option value="Bhutan">Bhutan</option>
                                        <option value="Bolivien">Bolivien</option>
                                        <option value="Bosnien und Herzegowina">Bosnien und Herzegowina</option>
                                        <option value="Botswana">Botswana</option>
                                        <option value="Bouvetinsel">Bouvetinsel</option>
                                        <option value="Brasilien">Brasilien</option>
                                        <option value="Brunei">Brunei</option>
                                        <option value="Bulgarien">Bulgarien</option>
                                        <option value="Burkina Faso">Burkina Faso</option>
                                        <option value="Burundi">Burundi</option>
                                        <option value="Chile">Chile</option>
                                        <option value="China">China</option>
                                        <option value="Cookinseln">Cookinseln</option>
                                        <option value="Costa Rica">Costa Rica</option>
                                        <option value="Cote d'Ivoire">Cote d'Ivoire</option>
                                        <option value="Dänemark">Dänemark</option>
                                        <option value="Deutschland">Deutschland</option>
                                        <option value="Diego Garcia">Diego Garcia</option>
                                        <option value="Dominica">Dominica</option>
                                        <option value="Dominikanische Republik">Dominikanische Republik</option>
                                        <option value="Dschibuti">Dschibuti</option>
                                        <option value="Ecuador">Ecuador</option>
                                        <option value="El Salvador">El Salvador</option>
                                        <option value="Eritrea">Eritrea</option>
                                        <option value="Estland">Estland</option>
                                        <option value="Europäische Union">Europäische Union</option>
                                        <option value="Falklandinseln">Falklandinseln</option>
                                        <option value="Färöer">Färöer</option>
                                        <option value="Fidschi">Fidschi</option>
                                        <option value="Finnland">Finnland</option>
                                        <option value="Frankreich">Frankreich</option>
                                        <option value="Französisch-Guayana">Französisch-Guayana</option>
                                        <option value="Französisch-Polynesien">Französisch-Polynesien</option>
                                        <option value="Gabun">Gabun</option>
                                        <option value="Gambia">Gambia</option>
                                        <option value="Georgien">Georgien</option>
                                        <option value="Ghana">Ghana</option>
                                        <option value="Gibraltar">Gibraltar</option>
                                        <option value="Grenada">Grenada</option>
                                        <option value="Griechenland">Griechenland</option>
                                        <option value="Grönland">Grönland</option>
                                        <option value="Großbritannien">Großbritannien</option>
                                        <option value="Guadeloupe">Guadeloupe</option>
                                        <option value="Guam">Guam</option>
                                        <option value="Guatemala">Guatemala</option>
                                        <option value="Guernsey">Guernsey</option>
                                        <option value="Guinea">Guinea</option>
                                        <option value="Guinea-Bissau">Guinea-Bissau</option>
                                        <option value="Guyana">Guyana</option>
                                        <option value="Haiti">Haiti</option>
                                        <option value="Heard und McDonaldinseln">Heard und McDonaldinseln</option>
                                        <option value="Honduras">Honduras</option>
                                        <option value="Hongkong">Hongkong</option>
                                        <option value="Indien">Indien</option>
                                        <option value="Indonesien">Indonesien</option>
                                        <option value="Irak">Irak</option>
                                        <option value="Iran">Iran</option>
                                        <option value="Irland">Irland</option>
                                        <option value="Island">Island</option>
                                        <option value="Israel">Israel</option>
                                        <option value="Italien">Italien</option>
                                        <option value="Jamaika">Jamaika</option>
                                        <option value="Japan">Japan</option>
                                        <option value="Jemen">Jemen</option>
                                        <option value="Jersey">Jersey</option>
                                        <option value="Jordanien">Jordanien</option>
                                        <option value="Kaimaninseln">Kaimaninseln</option>
                                        <option value="Kambodscha">Kambodscha</option>
                                        <option value="Kamerun">Kamerun</option>
                                        <option value="Kanada">Kanada</option>
                                        <option value="Kanarische Inseln">Kanarische Inseln</option>
                                        <option value="Kap Verde">Kap Verde</option>
                                        <option value="Kasachstan">Kasachstan</option>
                                        <option value="Katar">Katar</option>
                                        <option value="Kenia">Kenia</option>
                                        <option value="Kirgisistan">Kirgisistan</option>
                                        <option value="Kiribati">Kiribati</option>
                                        <option value="Kokosinseln">Kokosinseln</option>
                                        <option value="Kolumbien">Kolumbien</option>
                                        <option value="Komoren">Komoren</option>
                                        <option value="Kongo">Kongo</option>
                                        <option value="Kroatien">Kroatien</option>
                                        <option value="Kuba">Kuba</option>
                                        <option value="Kuwait">Kuwait</option>
                                        <option value="Laos">Laos</option>
                                        <option value="Lesotho">Lesotho</option>
                                        <option value="Lettland">Lettland</option>
                                        <option value="Libanon">Libanon</option>
                                        <option value="Liberia">Liberia</option>
                                        <option value="Libyen">Libyen</option>
                                        <option value="Liechtenstein">Liechtenstein</option>
                                        <option value="Litauen">Litauen</option>
                                        <option value="Luxemburg">Luxemburg</option>
                                        <option value="Macao">Macao</option>
                                        <option value="Madagaskar">Madagaskar</option>
                                        <option value="Malawi">Malawi</option>
                                        <option value="Malaysia">Malaysia</option>
                                        <option value="Malediven">Malediven</option>
                                        <option value="Mali">Mali</option>
                                        <option value="Malta">Malta</option>
                                        <option value="Marokko">Marokko</option>
                                        <option value="Marshallinseln">Marshallinseln</option>
                                        <option value="Martinique">Martinique</option>
                                        <option value="Mauretanien">Mauretanien</option>
                                        <option value="Mauritius">Mauritius</option>
                                        <option value="Mayotte">Mayotte</option>
                                        <option value="Mazedonien">Mazedonien</option>
                                        <option value="Mexiko">Mexiko</option>
                                        <option value="Mikronesien">Mikronesien</option>
                                        <option value="Moldawien">Moldawien</option>
                                        <option value="Monaco">Monaco</option>
                                        <option value="Mongolei">Mongolei</option>
                                        <option value="Montserrat">Montserrat</option>
                                        <option value="Mosambik">Mosambik</option>
                                        <option value="Myanmar">Myanmar</option>
                                        <option value="Namibia">Namibia</option>
                                        <option value="Nauru">Nauru</option>
                                        <option value="Nepal">Nepal</option>
                                        <option value="Neukaledonien">Neukaledonien</option>
                                        <option value="Neuseeland">Neuseeland</option>
                                        <option value="Neutrale Zone">Neutrale Zone</option>
                                        <option value="Nicaragua">Nicaragua</option>
                                        <option value="Niederlande">Niederlande</option>
                                        <option value="Niederländische Antillen">Niederländische Antillen</option>
                                        <option value="Niger">Niger</option>
                                        <option value="Nigeria">Nigeria</option>
                                        <option value="Niue">Niue</option>
                                        <option value="Nordkorea">Nordkorea</option>
                                        <option value="Nördliche Marianen">Nördliche Marianen</option>
                                        <option value="Norfolkinsel">Norfolkinsel</option>
                                        <option value="Norwegen">Norwegen</option>
                                        <option value="Oman">Oman</option>
                                        <option value="Österreich">Österreich</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="Palästina">Palästina</option>
                                        <option value="Palau">Palau</option>
                                        <option value="Panama">Panama</option>
                                        <option value="Papua-Neuguinea">Papua-Neuguinea</option>
                                        <option value="Paraguay">Paraguay</option>
                                        <option value="Peru">Peru</option>
                                        <option value="Philippinen">Philippinen</option>
                                        <option value="Pitcairninseln">Pitcairninseln</option>
                                        <option value="Polen">Polen</option>
                                        <option value="Portugal">Portugal</option>
                                        <option value="Puerto Rico">Puerto Rico</option>
                                        <option value="Réunion">Réunion</option>
                                        <option value="Ruanda">Ruanda</option>
                                        <option value="Rumänien">Rumänien</option>
                                        <option value="Russische Föderation">Russische Föderation</option>
                                        <option value="Salomonen">Salomonen</option>
                                        <option value="Sambia">Sambia</option>
                                        <option value="Samoa">Samoa</option>
                                        <option value="San Marino">San Marino</option>
                                        <option value="São Tomé und Príncipe">São Tomé und Príncipe</option>
                                        <option value="Saudi-Arabien">Saudi-Arabien</option>
                                        <option value="Schweden">Schweden</option>
                                        <option value="Schweiz">Schweiz</option>
                                        <option value="Senegal">Senegal</option>
                                        <option value="Serbien und Montenegro">Serbien und Montenegro</option>
                                        <option value="Seychellen">Seychellen</option>
                                        <option value="Sierra Leone">Sierra Leone</option>
                                        <option value="Simbabwe">Simbabwe</option>
                                        <option value="Singapur">Singapur</option>
                                        <option value="Slowakei">Slowakei</option>
                                        <option value="Slowenien">Slowenien</option>
                                        <option value="Somalia">Somalia</option>
                                        <option value="Spanien">Spanien</option>
                                        <option value="Sri Lanka">Sri Lanka</option>
                                        <option value="St. Helena">St. Helena</option>
                                        <option value="St. Kitts und Nevis">St. Kitts und Nevis</option>
                                        <option value="St. Lucia">St. Lucia</option>
                                        <option value="St. Pierre und Miquelon">St. Pierre und Miquelon</option>
                                        <option value="St. Vincent/Grenadinen (GB)">St. Vincent/Grenadinen (GB)</option>
                                        <option value="Südafrika, Republik">Südafrika, Republik</option>
                                        <option value="Sudan">Sudan</option>
                                        <option value="Südkorea">Südkorea</option>
                                        <option value="Suriname">Suriname</option>
                                        <option value="Svalbard und Jan Mayen">Svalbard und Jan Mayen</option>
                                        <option value="Swasiland">Swasiland</option>
                                        <option value="Syrien">Syrien</option>
                                        <option value="Tadschikistan">Tadschikistan</option>
                                        <option value="Taiwan">Taiwan</option>
                                        <option value="Tansania">Tansania</option>
                                        <option value="Thailand">Thailand</option>
                                        <option value="Timor-Leste">Timor-Leste</option>
                                        <option value="Togo">Togo</option>
                                        <option value="Tokelau">Tokelau</option>
                                        <option value="Tonga">Tonga</option>
                                        <option value="Trinidad und Tobago">Trinidad und Tobago</option>
                                        <option value="Tristan da Cunha">Tristan da Cunha</option>
                                        <option value="Tschad">Tschad</option>
                                        <option value="Tschechische Republik">Tschechische Republik</option>
                                        <option value="Tunesien">Tunesien</option>
                                        <option value="Türkei">Türkei</option>
                                        <option value="Turkmenistan">Turkmenistan</option>
                                        <option value="Turks- und Caicosinseln">Turks- und Caicosinseln</option>
                                        <option value="Tuvalu">Tuvalu</option>
                                        <option value="Uganda">Uganda</option>
                                        <option value="Ukraine">Ukraine</option>
                                        <option value="Ungarn">Ungarn</option>
                                        <option value="Uruguay">Uruguay</option>
                                        <option value="Usbekistan">Usbekistan</option>
                                        <option value="Vanuatu">Vanuatu</option>
                                        <option value="Vatikanstadt">Vatikanstadt</option>
                                        <option value="Venezuela">Venezuela</option>
                                        <option value="Vereinigte Arabische Emirate">Vereinigte Arabische Emirate</option>
                                        <option value="Vereinigte Staaten von Amerika">Vereinigte Staaten von Amerika</option>
                                        <option value="Vietnam">Vietnam</option>
                                        <option value="Wallis und Futuna">Wallis und Futuna</option>
                                        <option value="Weihnachtsinsel">Weihnachtsinsel</option>
                                        <option value="Weißrussland">Weißrussland</option>
                                        <option value="Westsahara">Westsahara</option>
                                        <option value="Zentralafrikanische Republik">Zentralafrikanische Republik</option>
                                        <option value="Zypern">Zypern</option>
                                    </select>
              
            
            <button type="submit" class="btn btn-primary mt-5">Bearbeiten</button>
          </form>
        </div>
      </div>

        

    </main>
    
</body>
</html>