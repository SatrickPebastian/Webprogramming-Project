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
    <small class="text-muted"><b><?= $row['price']?>€</b></small>
    <button class="btn btn-info btn-sm" type="button" style="float:right;">In Warenkorb</button>
    <button class="btn btn-light btn-sm" type="button" style="float:right;" data-toggle="popover" data-content="<?= $row['descr']?>" data-container="body" data-placement="top">Details</button>
    </div>
</div>