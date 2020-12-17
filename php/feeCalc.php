
    <tr>
                                
    <td></td>
    <td></td>
    <td class="text-center">Zwischensumme</td>
    <?php 


      //Verbindung herstellen
      $webshopcon = mysqli_connect("127.0.0.1", "root", "", "webshopdb");
                  
                  if(!$webshopcon){
                      echo "Fehler: konnte nicht mit MariaDB verbinden." . PHP_EOL;
                      echo "Debug-Fehlernummer: " . mysqli_connect_errno() . PHP_EOL;
                      echo "Debug-Fehlermeldung: " . mysqli_connect_error() . PHP_EOL;
                      exit;
                  }
      //hole preis und anzahl aus gejointer tabelle
      $sql = "SELECT price, anzahl FROM artikel a, warenkorb w WHERE a.id = w.artikel;";
      $result = $webshopcon->query($sql);
      $gesamtSumme = 0;

      //berechne preis gesamtpreis
      while($row = $result->fetch_assoc()){
          $gesamtSumme += ($row['price'] * $row['anzahl']);
      }

      mysqli_close($webshopcon);
    ?>
    <td class="text-right"><?= $gesamtSumme ?>€</td>
    <td></td>
    </tr>

    <tr>
      <td>
      <!-- Buttons für Gebührenauswahl -->
        <form>
          <input id="checkboxStandard" type="radio" name="checkboxVersand" onclick="calcLiefergebuehren(); calcEntireSum()">&nbsp;Standardversand</input> 
          <br>
          <input id="checkboxExpress" type="radio" name="checkboxVersand" onclick="calcLiefergebuehren(); calcEntireSum()">&nbsp;Expressversand</input>
        </form>
      </td>
      <td></td>
      <td class="text-center">Liefergebühren</td>
      <td class="text-right" id="liefergebuehren">
        0.00€
      </td>
      <td></td>
    </tr>

    <tr>
      <td></td>
      <td></td>
      <td class="text-center"><b>Gesamtsumme</b></td>
      <td class="text-right"><b id="entireSum"><?= $gesamtSumme ?>€</b></td>
      <td></td>
    </tr>

                        


