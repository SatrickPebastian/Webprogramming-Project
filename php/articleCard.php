

<script>
    $( function( )
    {
        $( "[data-toggle='popover'" ).popover( );
    } );
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
        <button class="btn btn-info btn-sm" style="float:right;" type="submit" name="warenkorbButton" onclick="alert('Produkt wurde in den Warenkorb hinzugefügt.');">In Warenkorb</button>
        <input type="hidden" name="id" value="<?= $row['id']?>">
        <button class="btn btn-light btn-sm" type="button" style="float:right;" data-toggle="popover" data-content="<?= $row['descr']?>" data-container="body" data-placement="top">Details</button>
        </form>
        
        </div>
    </div>
</div>