
<link href="loader.css" rel="stylesheet">

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
    function activateLoader(){

        var loader = document.getElementById('loader');
        var overlay = document.getElementById('hidePage');
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

    //Validierung bevor die Daten versendet werden.
    function checkVersand(){

        var warenkorbBtn = document.getElementById('warenkorbBtn');
        
        
        var checkStand = document.getElementById('checkboxStandard');
        var checkExp = document.getElementById('checkboxExpress');
        if(checkStand.checked != true && checkExp.checked != true){
            swal({
                title: "Bitte eine Versandart auswählen.",
                icon: "warning",
            });
            return false;
        } else{
            activateLoader();
            return true;
        } 
    }

    function sendEmail(){
        
    }

    
</script>

<div class="col mb-2">
    <div class="row">
        <div class="col-sm-12  col-md-6">
          <a class="btn btn-block btn-light" href="artikelpage.php">Weiter einkaufen</a>
        </div>
        <div class="col-sm-12 col-md-6 text-right">
            <form method="post" action="bestellen.php" onsubmit="return checkVersand();">
                <button class="btn btn-lg btn-block btn-success text-uppercase" id="sendOrderButton" type="submit" name="sendOrderButton" onclick="sendEmail()">Kostenpflichtig bestellen</button>
                <input type="hidden" name="cartId" id="cartId">
            </form>
                
            
            
        </div>
    </div>
</div>