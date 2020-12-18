
<link href="../css/loader.css" rel="stylesheet">
<link href="../css/artikelpage.css" rel="stylesheet">

<script>
    $( function( )
    {
        $( "[data-toggle='popover'" ).popover( );
    } );

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


</script>

<div class="card artikelItems">
<img src="<?= $row['imageLink']?>" class="card-img-top" alt="<?= $row['title']?>" height="350" width="200">
    <div class="card-body">
        <h5 class="card-title"><?= $row['title']?></h5>
    </div>
    <div class="card-footer">
    <div >
        
        <form method="post" action="addToCart.php">
        <small class="text-muted"><b><?= $row['price']?>€</b></small>
        <button class="btn btn-info btn-sm" style="float:right;" type="submit" name="warenkorbButton" onclick="activateLoader();">In Warenkorb</button>
        <input type="hidden" name="id" value="<?= $row['id']?>">
        <button class="btn btn-light btn-sm" type="button" style="float:right;" data-toggle="popover" data-content="<?= $row['descr']?>" data-container="body" data-placement="top">Details</button>
        </form>
        
        </div>
    </div>
</div>