<?php
  session_start();
?>

<!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Datenschutzerklärung</title>

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
    <h5 style="font-family: 'Cabin', sans-senif; font-size: 40px;">Datenschutzerklärung</h5>
    <br>
    <p><span style="font-weight: bold; font-size: 30px;">Datenschutz</span><br>
        Wir haben diese Datenschutzerklärung (Fassung 27.12.2020-321244939) verfasst, um Ihnen gemäß der Vorgaben der Datenschutz-<br>Grundverordnung (EU) 2016/679 zu erklären, welche Informationen wir sammeln, wie wir Daten verwenden und welche<br> Entscheidungsmöglichkeiten Sie als Besucher dieser Webseite haben.<br><br>
        
        Leider liegt es in der Natur der Sache, dass diese Erklärungen sehr technisch klingen, wir haben uns bei der Erstellung jedoch bemüht die<br> wichtigsten Dinge so einfach und klar wie möglich zu beschreiben.</p>

        
                

                    <p>
                        <span style="font-weight: bold; font-size: 30px;">Automatische Datenspeicherung</span>
                    </p>
                    <p>Wenn Sie heutzutage Webseiten besuchen, werden gewisse Informationen automatisch erstellt und gespeichert, so auch auf dieser<br> Webseite.<br><br>

                        Wenn Sie unsere Webseite so wie jetzt gerade besuchen, speichert unser Webserver (Computer auf dem diese Webseite gespeichert ist)<br> automatisch Daten wie
                        
                        <ul>
                        <li>die Adresse (URL) der aufgerufenen Webseite</li>
                        <li>Browser und Browserversion</li>
                        <li>das verwendete Betriebssystem</li>
                        <li>die Adresse (URL) der zuvor besuchten Seite (Referrer URL)</li>
                        <li>den Hostname und die IP-Adresse des Geräts von welchem aus zugegriffen wird</li>
                        <li>Datum und Uhrzeit</li>
                        </ul>
                        in Dateien (Webserver-Logfiles).<br><br>
                        
                        In der Regel werden Webserver-Logfiles zwei Wochen gespeichert und danach automatisch gelöscht. Wir geben diese Daten nicht weiter,<br> können jedoch nicht ausschließen, dass diese Daten beim Vorliegen von rechtswidrigem Verhalten eingesehen werden.</p>

                        <p>
                            <span style="font-weight: bold; font-size: 30px;">Cookies</span>
                        </p>
                        <p>Unsere Website verwendet HTTP-Cookies um nutzerspezifische Daten zu speichern.<br>
                            Im Folgenden erklären wir, was Cookies sind und warum Sie genutzt werden, damit Sie die folgende Datenschutzerklärung besser<br> verstehen.</p>

                            <p>
                                <span style="font-weight: bold; font-size: 22px;">Was genau sind Cookies?</span>
                            </p>
                            <p>Immer wenn Sie durch das Internet surfen, verwenden Sie einen Browser. Bekannte Browser sind beispielsweise Chrome, Safari, Firefox,<br> Internet Explorer und Microsoft Edge. Die meisten Webseiten speichern kleine Text-Dateien in Ihrem Browser. Diese Dateien nennt man<br> Cookies.<br><br>

                                Eines ist nicht von der Hand zu weisen: Cookies sind echt nützliche Helferlein. Fast alle Webseiten verwenden Cookies. Genauer<br> gesprochen sind es HTTP-Cookies, da es auch noch andere Cookies für andere Anwendungsbereiche gibt. HTTP-Cookies sind kleine<br> Dateien, die von unserer Website auf Ihrem Computer gespeichert werden. Diese Cookie-Dateien werden automatisch im Cookie-Ordner,<br> quasi dem “Hirn” Ihres Browsers, untergebracht. Ein Cookie besteht aus einem Namen und einem Wert. Bei der Definition eines Cookies<br> müssen zusätzlich ein oder mehrere Attribute angegeben werden.<br><br>
                                
                                Cookies speichern gewisse Nutzerdaten von Ihnen, wie beispielsweise Sprache oder persönliche Seiteneinstellungen. Wenn Sie unsere<br> Seite wieder aufrufen, übermittelt Ihr Browser die „userbezogenen“ Informationen an unsere Seite zurück. Dank der Cookies weiß unsere<br> Website, wer Sie sind und bietet Ihnen Ihre gewohnte Standardeinstellung. In einigen Browsern hat jedes Cookie eine eigene Datei, in<br> anderen wie beispielsweise Firefox sind alle Cookies in einer einzigen Datei gespeichert.<br><br>
                                
                                Es gibt sowohl Erstanbieter Cookies als auch Drittanbieter-Cookies. Erstanbieter-Cookies werden direkt von unserer Seite erstellt,<br> Drittanbieter-Cookies werden von Partner-Webseiten (z.B. Google Analytics) erstellt. Jedes Cookie ist individuell zu bewerten, da jedes<br> Cookie andere Daten speichert. Auch die Ablaufzeit eines Cookies variiert von ein paar Minuten bis hin zu ein paar Jahren. Cookies sind<br> keine Software-Programme und enthalten keine Viren, Trojaner oder andere „Schädlinge“. Cookies können auch nicht auf Informationen<br> Ihres PCs zugreifen.<br><br>
                                So können zum Beispiel Cookie-Daten aussehen:<br>
                            
                                <ul>
                                    <li>Name: _ga</li>
                                    <li>Ablaufzeit: 2 Jahre</li>
                                    <li>Verwendung: Unterscheidung der Webseitenbesucher</li>
                                    <li>Beispielhafter Wert: GA1.2.1326744211.152321244939</li>
                                
                                    </ul>
                                    
                                Ein Browser sollte folgende Mindestgrößen unterstützen:<br><br>

                                <ul>
                                        <li>Ein Cookie soll mindestens 4096 Bytes enthalten können</li>
                                        <li>Pro Domain sollen mindestens 50 Cookies gespeichert werden können</li>
                                        <li>Insgesamt sollen mindestens 3000 Cookies gespeichert werden können</li>
                                       
                                    
                                        </ul></p>

                                <p>
                                    <span style="font-weight: bold; font-size: 22px;">Welche Arten von Cookies gibt es?</span>
                                </p>
                                <p>Die Frage welche Cookies wir im Speziellen verwenden, hängt von den verwendeten Diensten ab und wird in der folgenden Abschnitten der<br> Datenschutzerklärung geklärt. An dieser Stelle möchten wir kurz auf die verschiedenen Arten von HTTP-Cookies eingehen.<br><br>

                                    Man kann 4 Arten von Cookies unterscheiden:</p>

                                    <p>
                                        <span style="font-weight: bold;">Unbedingt notwendige Cookies</span><br>
                                        Diese Cookies sind nötig, um grundlegende Funktionen der Website sicherzustellen. Zum Beispiel braucht es diese Cookies, wenn ein User<br> ein Produkt in den Warenkorb legt, dann auf anderen Seiten weitersurft und später erst zur Kasse geht. Durch diese Cookies wird der<br> Warenkorb nicht gelöscht, selbst wenn der User sein Browserfenster schließt.
                                    </p>
                                    <p>
                                        <span style="font-weight: bold;">Funktionelle Cookies</span><br>
                                        Diese Cookies sammeln Infos über das Userverhalten und ob der User etwaige Fehlermeldungen bekommt. Zudem werden mithilfe dieser<br> Cookies auch die Ladezeit und das Verhalten der Website bei verschiedenen Browsern gemessen.
                                    </p>
                                    <p>
                                        <span style="font-weight: bold;">Zielorientierte Cookies</span><br>
                                        Diese Cookies sorgen für eine bessere Nutzerfreundlichkeit. Beispielsweise werden eingegebene Standorte, Schriftgrößen<br> oder Formulardaten gespeichert.
                                    </p>
                                    <p>
                                        <span style="font-weight: bold;">Werbe-Cookies</span><br>
                                        Diese Cookies werden auch Targeting-Cookies genannt. Sie dienen dazu dem User individuell angepasste Werbung zu liefern. Das kann<br> sehr praktisch, aber auch sehr nervig sein.<br><br>

                                        Üblicherweise werden Sie beim erstmaligen Besuch einer Webseite gefragt, welche dieser Cookiearten Sie zulassen möchten. Und<br> natürlich wird diese Entscheidung auch in einem Cookie gespeichert.
                                    </p>
                                    <p>
                                        <span style="font-weight: bold; font-size: 22px;">Wie kann ich Cookies löschen?</span>
                                    </p>
                                    <p>Wie und ob Sie Cookies verwenden wollen, entscheiden Sie selbst. Unabhängig von welchem Service oder welcher Website die Cookies<br> stammen, haben Sie immer die Möglichkeit Cookies zu löschen, nur teilweise zuzulassen oder zu deaktivieren. Zum Beispiel können Sie<br> Cookies von Drittanbietern blockieren, aber alle anderen Cookies zulassen.<br><br>

                                        Wenn Sie feststellen möchten, welche Cookies in Ihrem Browser gespeichert wurden, wenn Sie Cookie-Einstellungen ändern oder löschen<br> wollen, können Sie dies in Ihren Browser-Einstellungen finden:<br><br>
                                        
                                        <a style="text-decoration: underline; color: rgb(82, 82, 82);" href="https://support.google.com/chrome/answer/95647?tid=321244939">Chrome: Cookies in Chrome löschen, aktivieren und verwalten</a><br><br>
                                        
                                        <a style="text-decoration: underline; color: rgb(82, 82, 82);" href="https://support.apple.com/de-at/guide/safari/sfri11471/mac?tid=321244939">Safari: Verwalten von Cookies und Websitedaten mit Safari</a><br><br>
                                        
                                        <a style="text-decoration: underline; color: rgb(82, 82, 82);" href="https://support.mozilla.org/de/kb/cookies-und-website-daten-in-firefox-loschen?tid=321244939">Firefox: Cookies löschen, um Daten zu entfernen, die Websites auf Ihrem Computer abgelegt haben</a><br><br>
                                        
                                        <a style="text-decoration: underline; color: rgb(82, 82, 82);" href="https://support.microsoft.com/de-de/topic/l%C3%B6schen-und-verwalten-von-cookies-168dab11-0753-043d-7c16-ede5947fc64d">Internet Explorer: Löschen und Verwalten von Cookies</a><br><br>
                                        
                                        <a style="text-decoration: underline; color: rgb(82, 82, 82);" href="https://support.microsoft.com/de-de/microsoft-edge/cookies-in-microsoft-edge-l%C3%B6schen-63947406-40ac-c3b8-57b9-2a946a29ae09">Microsoft Edge: Löschen und Verwalten von Cookies</a><br><br>
                                        
                                        Falls Sie grundsätzlich keine Cookies haben wollen, können Sie Ihren Browser so einrichten, dass er Sie immer informiert, wenn ein Cookie<br> gesetzt werden soll. So können Sie bei jedem einzelnen Cookie entscheiden, ob Sie das Cookie erlauben oder nicht. Die Vorgangsweise ist<br> je nach Browser verschieden. Am besten ist es Sie suchen die Anleitung in Google mit dem Suchbegriff “Cookies löschen Chrome” oder<br> “Cookies deaktivieren Chrome” im Falle eines Chrome Browsers oder tauschen das Wort “Chrome” gegen den Namen Ihres Browsers, z.B.<br> Edge, Firefox, Safari aus.</p>
                                        <p>
                                            <span style="font-weight: bold; font-size: 22px;">Wie sieht es mit meinem Datenschutz aus?</span>
                                        </p>
                                        <p>Seit 2009 gibt es die sogenannten „Cookie-Richtlinien“. Darin ist festgehalten, dass das Speichern von Cookies eine Einwilligung von Ihnen<br> verlangt. Innerhalb der EU-Länder gibt es allerdings noch sehr unterschiedliche Reaktionen auf diese Richtlinien. In Deutschland wurden<br> die Cookie-Richtlinien nicht als nationales Recht umgesetzt. Stattdessen erfolgte die Umsetzung dieser Richtlinie weitgehend in § 15<br> Abs.3 des Telemediengesetzes (TMG).<br><br>

                                            Wenn Sie mehr über Cookies wissen möchten und technischen Dokumentationen nicht scheuen, empfehlen<br> wir <a style="color: rgb(82, 82, 82) ; text-decoration: underline;" href="https://tools.ietf.org/html/rfc6265">https://tools.ietf.org/html/rfc6265</a>, dem Request for Comments der Internet Engineering Task Force (IETF) namens “HTTP State<br> Management Mechanism”.</p>
                                        <p>
                                            <span style="font-weight: bold; font-size: 30px;">Speicherung persönlicher Daten</span>
                                         </p>
                                         <p>Persönliche Daten, die Sie uns auf dieser Website elektronisch übermitteln, wie zum Beispiel Name, E-Mail-Adresse, Adresse oder andere<br> persönlichen Angaben im Rahmen der Übermittlung eines Formulars oder Kommentaren im Blog, werden von uns gemeinsam mit dem<br> Zeitpunkt und der IP-Adresse nur zum jeweils angegebenen Zweck verwendet, sicher verwahrt und nicht an Dritte weitergegeben.<br><br>

                                            Wir nutzen Ihre persönlichen Daten somit nur für die Kommunikation mit jenen Besuchern, die Kontakt ausdrücklich wünschen und für die<br> Abwicklung der auf dieser Webseite angebotenen Dienstleistungen und Produkte. Wir geben Ihre persönlichen Daten ohne Zustimmung<br> nicht weiter, können jedoch nicht ausschließen, dass diese Daten beim Vorliegen von rechtswidrigem Verhalten eingesehen werden.<br><br>
                                            
                                            Wenn Sie uns persönliche Daten per E-Mail schicken – somit abseits dieser Webseite – können wir keine sichere Übertragung und den<br> Schutz Ihrer Daten garantieren. Wir empfehlen Ihnen, vertrauliche Daten niemals unverschlüsselt per E-Mail zu übermitteln.<br><br>
                                            
                                            Die Rechtsgrundlage besteht nach <a style="text-decoration: underline; color: rgb(82, 82, 82);" href="https://eur-lex.europa.eu/legal-content/DE/TXT/HTML/?uri=CELEX:32016R0679&from=DE&tid=321244939">Artikel 6  Absatz 1 a DSGVO</a> (Rechtmäßigkeit der Verarbeitung) darin, dass Sie uns die Einwilligung zur<br> Verarbeitung der von Ihnen eingegebenen Daten geben. Sie können diesen Einwilligung jederzeit widerrufen – eine formlose E-Mail reicht<br> aus, Sie finden unsere Kontaktdaten im Impressum.</p>
                                            <p>
                                                <span style="font-weight: bold; font-size: 30px;">Rechte laut Datenschutzgrundverordnung</span>
                                             </p>
                                             <p>Ihnen stehen laut den Bestimmungen der DSGVO grundsätzlich die folgende Rechte zu:<br>
                                                <ul>
                                                <li>Recht auf Berichtigung (Artikel 16 DSGVO)</li>
                                                <li>Recht auf Löschung („Recht auf Vergessenwerden“) (Artikel 17 DSGVO)</li>
                                                <li>Recht auf Einschränkung der Verarbeitung (Artikel 18 DSGVO)</li>
                                                <li>Recht auf Benachrichtigung – Mitteilungspflicht im Zusammenhang mit der Berichtigung oder Löschung personenbezogener Daten<br> oder der Einschränkung der Verarbeitung (Artikel 19 DSGVO)</li>
                                                <li>Recht auf Datenübertragbarkeit (Artikel 20 DSGVO)</li>
                                                <li>Widerspruchsrecht (Artikel 21 DSGVO)</li>
                                                <li>Recht, nicht einer ausschließlich auf einer automatisierten Verarbeitung — einschließlich Profiling — beruhenden Entscheidung<br> unterworfen zu werden (Artikel 22 DSGVO)</li>
                                          
                                            </ul>
                                            Wenn Sie glauben, dass die Verarbeitung Ihrer Daten gegen das Datenschutzrecht verstößt oder Ihre datenschutzrechtlichen Ansprüche<br> sonst in einer Weise verletzt worden sind, können Sie sich an die <a style="text-decoration: underline; color: rgb(82, 82, 82);" href="https://www.bfdi.bund.de/DE/Home/home_node.html">Bundesbeauftragte für den Datenschutz und die Informationsfreiheit<br> (BfDI)</a> wenden.
                                            </p>
                                        
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