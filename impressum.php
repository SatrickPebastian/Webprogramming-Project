<?php
  session_start();
?>

<!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Impressum</title>

     <link rel="icon" href="images/resourceImages/hai23.png">

      <!-- Bootstrap v4 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <!-- Fontawesome -->
    <link href="../fontawesome/css/font-awesome.css" rel="stylesheet">
    <link href="../fontawesome/css/font-awesome.min.css" rel="stylesheet">
    

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=BioRhyme:wght@700&family=Cabin&display=swap" rel="stylesheet">

    <!-- CSS Files -->
    <link href="css/main.css" rel="stylesheet">
    <link href="css/karussell.css" rel="stylesheet">
    <link href="css/artikelpage.css" rel="stylesheet">
    <link href="css/loader.css" rel="stylesheet">
    
    
    
    

 </head>
 <body>

     <!-- Navigationsleiste -->
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="../index.php"><img src="images/resourceImages/hai23.png" width="40" height="auto"><span style="font-family: 'BioRhyme', serif;">&nbsp;GameShark</span></a>
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
              <a class="nav-link" href="php/warenkorb.php"><svg id="navbarCart" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="shopping-cart" class="svg-inline--fa fa-shopping-cart fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M528.12 301.319l47.273-208C578.806 78.301 567.391 64 551.99 64H159.208l-9.166-44.81C147.758 8.021 137.93 0 126.529 0H24C10.745 0 0 10.745 0 24v16c0 13.255 10.745 24 24 24h69.883l70.248 343.435C147.325 417.1 136 435.222 136 456c0 30.928 25.072 56 56 56s56-25.072 56-56c0-15.674-6.447-29.835-16.824-40h209.647C430.447 426.165 424 440.326 424 456c0 30.928 25.072 56 56 56s56-25.072 56-56c0-22.172-12.888-41.332-31.579-50.405l5.517-24.276c3.413-15.018-8.002-29.319-23.403-29.319H218.117l-6.545-32h293.145c11.206 0 20.92-7.754 23.403-18.681z"></path></svg></a>
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
<div class="container marketing">
    <br>
    <br>
    <br>
    <h5 style="font-family: 'Cabin', sans-senif; font-size: 40px;">Impressum</h5>
    <br>
    <p>Informationspflicht laut § 5 TMG.<br>
<br>
        GameShark<br>
        Alteburgstraße 150 ,<br>
        72770 Reutlingen,<br>
        Deutschland</p>

        <p><span style="font-weight: bold;">UID-Nummer:</span> DE12345678<br>
            <span style="font-weight: bold;">Wirtschafts-ID:</span> DE123456789</p>
            <p><span style="font-weight: bold;">Tel.:</span> 01234/56789<br>
                <span style="font-weight: bold;">Fax:</span> 01234/56789-0<br>
                <span style="font-weight: bold;">E-Mail:</span> office@musterfirma.de
                </p>
                <p><span style="font-weight: bold; font-size: larger;">Aufsichtsbehörde</span><br>
                    Regierungspräsidium Tübingen<br>
                    <span style="font-weight: bold;">Webseite der Aufsichtsbehörde</span><br>
                    <a style="text-decoration: underline; color: rgb(82, 82, 82);" href="http://rp.baden-wuerttemberg.de/">rp.baden-wuerttemberg.de</a><br>
                    <span style="font-weight: bold;">Anschrift der Aufsichtsbehörde</span><br>
                    Konrad-Adenauer-Straße 20, 72072 Tübingen</p>
                    <p><span style="font-weight: bold;">Geschäftsführer</span><br>
                    Patrick Stopper, Svenja Bystrzinski, Sabrina Klett</p>
<br>
                    <p>
                        <span style="font-weight: bold; font-size: 30px;">EU-Streitschlichtung</span>
                    </p>
                    <p>Gemäß Verordnung über Online-Streitbeilegung in Verbraucherangelegenheiten (ODR-Verordnung) möchten wir Sie über die Online-<br>Streitbeilegungsplattform (OS-Plattform) informieren.<br>
                        Verbraucher haben die Möglichkeit, Beschwerden an die Online Streitbeilegungsplattform der Europäischen Kommission unter<br> http://ec.europa.eu/odr?tid=321244939 zu richten. Die dafür notwendigen Kontaktdaten finden Sie oberhalb in unserem Impressum.<br>
                        <br>
                        Wir möchten Sie jedoch darauf hinweisen, dass wir nicht bereit oder verpflichtet sind, an Streitbeilegungsverfahren vor einer<br> Verbraucherschlichtungsstelle teilzunehmen.</p>

                        <p>
                            <span style="font-weight: bold; font-size: 30px;">Haftung für Inhalt dieser Website</span>
                        </p>
                        <p>Wir entwickeln die Inhalte dieser Webseite ständig weiter und bemühen uns korrekte und aktuelle Informationen bereitzustellen. Laut<br> Telemediengesetz (TMG) §7 (1) sind wir als Diensteanbieter für eigene Informationen, die wir zur Nutzung bereitstellen, nach den<br> allgemeinen Gesetzen verantwortlich. Leider können wir keine Haftung für die Korrektheit aller Inhalte auf dieser Webseite übernehmen,<br> speziell für jene die seitens Dritter bereitgestellt wurden. Als Diensteanbieter im Sinne der §§ 8 bis 10 sind wir nicht verpflichtet, die von<br> ihnen übermittelten oder gespeicherten Informationen zu überwachen oder nach Umständen zu forschen, die auf eine rechtswidrige<br> Tätigkeit hinweisen.<br><br>

                            Unsere Verpflichtungen zur Entfernung von Informationen oder zur Sperrung der Nutzung von Informationen nach den allgemeinen<br> Gesetzen aufgrund von gerichtlichen oder behördlichen Anordnungen bleiben auch im Falle unserer Nichtverantwortlichkeit nach den §§ 8<br> bis 10 unberührt.<br><br>
                            
                            Sollten Ihnen problematische oder rechtswidrige Inhalte auffallen, bitte wir Sie uns umgehend zu kontaktieren, damit wir die<br> rechtswidrigen Inhalte entfernen können. Sie finden die Kontaktdaten im Impressum.</p>

                            <p>
                                <span style="font-weight: bold; font-size: 30px;">Haftung für Links auf dieser Website</span>
                            </p>
                            <p>Unsere Webseite enthält Links zu anderen Webseiten für deren Inhalt wir nicht verantwortlich sind. Haftung für verlinkte Websites besteht<br> für uns nicht, da wir keine Kenntnis rechtswidriger Tätigkeiten hatten und haben, uns solche Rechtswidrigkeiten auch bisher nicht<br> aufgefallen sind und wir Links sofort entfernen würden, wenn uns Rechtswidrigkeiten bekannt werden.<br><br>

                                Wenn Ihnen rechtswidrige Links auf unserer Website auffallen, bitte wir Sie uns zu kontaktieren. Sie finden die Kontaktdaten im<br> Impressum.</p>

                                <p>
                                    <span style="font-weight: bold; font-size: 30px;">Urheberrechtshinweis</span>
                                </p>
                                <p>Alle Inhalte dieser Webseite (Bilder, Fotos, Texte, Videos) unterliegen dem Urheberrecht der Bundesrepublik Deutschland. Bitte fragen Sie<br> uns bevor Sie die Inhalte dieser Website verbreiten, vervielfältigen oder verwerten wie zum Beispiel auf anderen Websites erneut<br> veröffentlichen. Falls notwendig, werden wir die unerlaubte Nutzung von Teilen der Inhalte unserer Seite rechtlich verfolgen.<br><br>

                                    Sollten Sie auf dieser Webseite Inhalte finden, die das Urheberrecht verletzen, bitten wir Sie uns zu kontaktieren.</p>

                                    <p>
                                        <span style="font-weight: bold; font-size: 30px;">Bildernachweis</span>
                                    </p>
                                    <p>Die Bilder, Fotos und Grafiken auf dieser Webseite sind urheberrechtlich geschützt.</p>

                                </div>

</main>
<footer>
    <br><br><br><br><br>
    <nav class="navbar navbar-expand-sm navbar-light bg-light navbar-bottom">
      <div class="collapse navbar-collapse" id="navbarCollapse">
            
        <ul class="navbar-nav mx-auto">
          
          <li class="nav-item mr-5 ml-5">
            <a class="nav-link" href="impressum.php"><small>Impressum</small></a>
          </li>
          <li class="nav-item mr-5 ml-5">
            <a class="nav-link" href="datenschutzerklärung.php"><small>Datenschutzerklärung</small></a>
          </li>
          <li class="nav-item mr-5 ml-5">
            <a class="nav-link" href="agb.php"><small>AGB</small></a>
          </li>
          <li class="nav-item mr-5 ml-5">
            <a class="nav-link" href="hilfe.php"><small>Hilfe</small></a>
          </li>      
        </ul>
    
      </div>
    </nav>
  </footer>

        </body>
        </html>