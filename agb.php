<?php
  session_start();
?>

<!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>AGB</title>

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
    <h5 style="font-family: 'Cabin', sans-senif; font-size: 40px;">Allgemeine Geschäftsbedingungen</h5>
    <br>
    <p>
        <ul>
        <li><a href="#geltungsbereich">Geltungsbereich</a></li>
        <li><a href="#vertragspartner">Vertragspartner</a></li>
        <li><a href="#vertragsschluss">Vertragsschluss</a></li>
        <li><a href="#widerrufsrecht">Widerrufsrecht</a></li>
        <li><a href="#versandkosten">Preise und Versandkosten</a></li>
        <li><a href="#lieferung">Lieferung</a></li>
        <li><a href="#zahlung">Zahlung</a></li>
        <li><a href="#eigentumsvorbehalt">Eigentumsvorbehalt</a></li>
        <li><a href="#streitbeilegung">Streitbeilegung</a></li>

    </ul>
    </p>
    
<br>

                    <p id="geltungsbereich">
                        <span style="font-weight: bold; font-size: 26px;">Geltungsbereich</span>
                    </p>
                    <p>Für alle Lieferungen von GameShark an Verbraucher gelten diese Allgemeinen Geschäftsbedingungen (AGB).<br>
                        Verbraucher ist jede natürliche Person, die ein Rechtsgeschäft zu einem Zwecke abschließt, der überwiegend weder ihrer gewerblichen<br> noch ihrer selbstständigen beruflichen Tätigkeit zugerechnet werden kann.</p>

                        <p id="vertragspartner">
                            <span style="font-weight: bold; font-size: 26px;">Vertragspartner</span>
                        </p>
                        <p>Der Kaufvertrag kommt zustande mit GameShark, Inhaber: Patrick Stopper, Svenja Bystrzinski, Sabrina Klett, Alteburgstraße 150,<br> 72720 Reutlingen, Handelsregister: Amtsgericht Reutlingen, HRA 12345.</p>

                            <p id="vertragsschluss">
                                <span style="font-weight: bold; font-size: 26px;">Vertragsschluss</span>
                            </p>
                            <p>
                                <ul>
                                    <li>Die Darstellung der Produkte im Online-Shop stellt kein rechtlich bindendes Angebot, sondern nur eine Aufforderung zur Bestellung dar.</li>
                                    <li>Durch Anklicken des Buttons [kostenpflichtig bestellen] geben Sie eine verbindliche Bestellung der auf der Bestellseite aufgelisteten<br> Waren ab. Ihr Kaufvertrag kommt zustande, wenn wir Ihre Bestellung durch eine Auftragsbestätigung per E-Mail unmittelbar nach dem<br> Erhalt Ihrer Bestellung annehmen.</li>
                                </ul>
                            </p>

                                <p id="widerrufsrecht">
                                    <span style="font-weight: bold; font-size: 26px;">Widerrufsrecht</span>
                                </p>
                                <p>
                                    <ul>
                                        <li>Wenn Sie Verbraucher sind (also eine natürliche Person, die die Bestellung zu einem Zweck abgibt, der weder Ihrer gewerblichen oder<br> selbständigen beruflichen Tätigkeit zugerechnet werden kann), steht Ihnen nach Maßgabe der gesetzlichen Bestimmungen ein<br> Widerrufsrecht zu.</li>
                                        <li>Machen Sie als Verbraucher von Ihrem Widerrufsrecht nach Ziffer 4.1 Gebrauch, so haben Sie die regelmäßigen Kosten der Rücksendung<br> zu tragen.</li>
                                        <li>Im Übrigen gelten für das Widerrufsrecht die Regelungen, die im Einzelnen wiedergegeben sind in der folgenden</li>
                                    </ul>
                                </p>

                                    <p>
                                        <span style="font-weight: bold; font-size: 20px;">Widerrufsbelehrung¹</span>
                                    </p>
                                    <p>
                                        <span style="font-weight: bold; font-size: 20px;">Widerrufsrecht</span>
                                    </p>
                                    <p>Sie haben das Recht, binnen vierzehn Tagen ohne Angabe von Gründen diesen Vertrag zu widerrufen.</p>
                                    <p>Die Widerrufsfrist beträgt vierzehn Tage ab dem Tag an dem Sie oder ein von Ihnen benannter Dritter, der nicht der Beförderer ist,<br> die Waren in Besitz genommen haben bzw. hat.</p>
                                    <p>Um Ihr Widerrufsrecht auszuüben, müssen Sie uns GameShark, Alteburgstraße 150, 72770 Reutlingen mittels einer eindeutigen Erklärung<br> (zB ein mit der Post versandter Brief, Telefax oder E-Mail) über Ihren Entschluss, diesen Vertrag zu widerrufen, informieren.<br> Sie können dafür das beigefügte Muster-Widerrufsformular verwenden, das jedoch nicht vorgeschrieben ist. Sie können das Muster- Widerrufsformular oder<br> eine andere eindeutige Erklärung auch auf unserer Webseite (GameShark.de) elektronisch ausfüllen und übermitteln. Machen Sie von dieser Möglichkeit<br> Gebrauch, so werden wir Ihnen unverzüglich (zB per E-Mail) eine Bestätigung über den Eingang eines solchen Widerrufs übermitteln.</p>
                                    <p>Zur Wahrung der Widerrufsfrist reicht es aus, dass Sie die Mitteilung über die Ausübung des Widerrufsrechts vor Ablauf der Widerrufsfrist absenden.</p>
                                    <p>
                                        <span style="font-weight: bold; font-size: 20px;">Folgen des Widerrufs</span>
                                    </p>
                                    <p>Wenn Sie diesen Vertrag widerrufen, haben wir Ihnen alle Zahlungen, die wir von Ihnen erhalten haben, einschließlich der Lieferkosten<br> (mit Ausnahme der zusätzlichen Kosten, die sich daraus ergeben, dass Sie eine andere Art der Lieferung als die von uns angebotene,<br> günstigste Standardlieferung gewählt haben), unverzüglich und spätestens binnen vierzehn Tagen ab dem Tag zurückzuzahlen, an dem die Mitteilung über<br> Ihren Widerruf dieses Vertrags bei uns eingegangen ist. Für diese Rückzahlung verwenden wir dasselbe Zahlungsmittel, das Sie bei der ursprünglichen<br> Transaktion eingesetzt haben, es sei denn, mit Ihnen wurde ausdrücklich etwas anderes vereinbart; in keinem Fall werden Ihnen wegen dieser Rückzahlung Entgelte<br> berechnet. Wir können die Rückzahlung verweigern, bis wir die Waren wieder zurückerhalten haben oder bis Sie den Nachweis erbracht haben, dass Sie die Waren zurückgesandt haben, je nachdem, welches der frühere Zeitpunkt ist.</p>
                                    <p>Sie haben die Waren unverzüglich und in jedem Fall spätestens binnen vierzehn Tagen ab dem Tag, an dem Sie uns über den Widerruf dieses Vertrages<br> unterrichten, an uns zurückzusenden oder zu übergeben. Die Frist ist gewahrt, wenn Sie die Waren vor Ablauf der Frist von vierzehn Tagen absenden.</p>
                                    <p>Sie tragen die unmittelbaren Kosten der Rücksendung der Waren.</p>
                                    <p>Sie müssen für einen etwaigen Wertverlust der Waren nur aufkommen, wenn dieser Wertverlust auf einen zur Prüfung der Beschaffenheit, Eigenschaften<br> und Funktionsweise der Waren nicht notwendigen Umgang mit ihnen zurückzuführen ist.</p>
                                    <p><span style="font-weight: bold; font-size: 20px;">- Ende der Widerrufsbelehrung -</span></p>
                                    <p>(¹ Diese Widerrufsbelehrung gilt nicht für die getrennte Lieferung von Waren.)</p>
                                    
                                    <p id="versandkosten">
                                        <span style="font-weight: bold; font-size: 26px;">Preise und Versandkosten</span>
                                    </p>
                                    <p>
                                        <ul>
                                            <li>Die auf den Produktseiten genannten Preise enthalten die gesetzliche Mehrwertsteuer und sonstige Preisbestandteile.</li>
                                            <li>Zusätzlich zu den angegebenen Preisen berechnen wir für die Lieferung innerhalb Deutschlands pauschal 6,90 Euro pro Bestellung.<br> Die Versandkosten werden Ihnen auf den Produktseiten, im Warenkorbsystem und auf der Bestellseite nochmals deutlich mitgeteilt.</li>
                                            <li>Bei Zahlung per Nachnahme wird zusätzlich eine Gebühr in Höhe von 2.- Euro fällig, die der Zusteller vor Ort erhebt. Weitere Steuern<br> oder Kosten fallen nicht an.
                                            </li>
                                        </ul> 
                                    </p>
                                    <p id="lieferung">
                                        <span style="font-weight: bold; font-size: 26px;">Lieferung</span>
                                    </p>
                                    <p>
                                        <ul>
                                            <li>Die Lieferung erfolgt nur innerhalb Deutschlands mit DHL.</li>
                                            <li>Die Lieferzeit beträgt bis zu 3 Tage. Auf eventuell abweichende Lieferzeiten weisen wir auf der jeweiligen Produktseite hin.</li>
                                            
                                        </ul> 
                                    </p>
                            
                                    <p id="zahlung">
                                        <span style="font-weight: bold; font-size: 26px;">Zahlung</span>
                                    </p>
                                    <p>
                                        <ul>
                                            <li>Die Zahlung erfolgt wahlweise per Vorkasse oder Nachnahme.</li>
                                            <li>Bei Auswahl der Zahlungsart Vorkasse nennen wir Ihnen unsere Bankverbindung in der Auftragsbestätigung und liefern die Ware nach Zahlungseingang.</li>
                                            
                                        </ul> 
                                    </p>
                           
                                    <p id="eigentumsvorbehalt">
                                        <span style="font-weight: bold; font-size: 26px;">Eigentumsvorbehalt</span>
                                    </p>
                                    <p>Bis zur vollständigen Zahlung bleibt die Ware unser Eigentum.</p>
                                
                                    <p id="streitbeilegung">
                                        <span style="font-weight: bold; font-size: 26px;">Streitbeilegung</span>
                                    </p>
                                    <p>Die EU-Kommission hat eine Internetplattform zur Online-Beilegung von Streitigkeiten geschaffen. Die Plattform dient als Anlaufstelle zur außergerichtlichen Beilegung von Streitigkeiten betreffend vertragliche Verpflichtungen, die aus Online-Kaufverträgen erwachsen. Nähere Informationen sind unter dem folgenden Link verfügbar: <a style="color: grey;" href="http://ec.europa.eu/consumers/odr">http://ec.europa.eu/consumers/odr</a>. Wir sind zur Beilegung von Streitigkeiten mit Verbrauchern zur Teilnahme an einem Streitbeilegungsverfahren vor einer Verbraucherschlichtungsstelle bereit oder gemäß XXX verpflichtet. Die zuständige Verbraucherschlichtungsstelle ist: Universalschlichtungsstelle des Bundes Zentrum für Schlichtung e.V., Straßburger Straße 8, 77694 Kehl am Rhein, www.verbraucher-schlichter.de. Zur Beilegung der genannten Streitigkeiten werden wir in einem Streitbeilegungsverfahren vor dieser Stelle teilnehmen.</p>
                               
                               <p>Alternativ:<br>
                                Die EU-Kommission hat eine Internetplattform zur Online-Beilegung von Streitigkeiten geschaffen. Die Plattform dient als Anlaufstelle zur außergerichtlichen Beilegung von Streitigkeiten betreffend vertragliche Verpflichtungen, die aus Online-Kaufverträgen erwachsen. Nähere Informationen sind unter dem folgenden Link verfügbar: <a style="color: grey;" href="http://ec.europa.eu/consumers/odr">http://ec.europa.eu/consumers/odr</a>. Zur Teilnahme an einem Streitbeilegungsverfahren vor einer Verbraucherschlichtungsstelle sind wir weder bereit noch verpflichtet.</p>
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