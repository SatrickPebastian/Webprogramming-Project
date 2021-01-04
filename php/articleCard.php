
<link href="../css/loader.css" rel="stylesheet">
<link href="../css/artikelpage.css" rel="stylesheet">
    

<script>
    $(document).ready(function(){
        $('[data-toggle="popover"]').popover();
    });

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

<div class="card artikelItems ">
<img src="<?= $row['imageLink']?>" class="card-img-top" alt="<?= $row['title']?>" height="350" width="200">
    <div class="card-body">
        <h5 class="card-title"><?= $row['title']?></h5>
        <?php
            if($row['genre'] == "Action"){
                echo '<span class="badge badge-danger">Action</span>';
            }else if($row['genre'] == "Open-World"){
                echo '<span class="badge badge-primary">Open-World</span>';
            }else if($row['genre'] == "Autorennen"){
                echo '<span class="badge badge-secondary">Autorennen</span>';
            }else if($row['genre'] == "Sport"){
                echo '<span class="badge badge-info">Sport</span>';
            }else if($row['genre'] == "Ego-Shooter"){
                echo '<span class="badge badge-warning">Ego-Shooter</span>';
            }else if($row['genre'] == "Simulation"){
                echo '<span class="badge badge-success">Simulation</span>';
            }else if($row['genre'] == "Rollenspiel"){
                echo '<span class="badge badge-dark">Rollenspiel</span>';
            }else {
                echo '<br>';
            }
        ?>

    </div>
    <div class="card-footer m-0 pr-3 pl-3 pt-3">
    <div >
        
        <form method="post" action="addToCart.php">
        <small class="text-muted"><b><?= $row['price']?>€</b></small>
        <?php 

        //Zeigt Warenkorb-Button nur an, wenn eingeloggt wurde.
        if(isset($_SESSION['login'])== 111){
            echo '<button class="btn btn-info btn-sm" style="float:right;" type="submit" name="warenkorbButton" onclick="activateLoader();">In Warenkorb</button>';
        } 
        ?>

        <input type="hidden" name="id" value="<?= $row['id']?>">
        <button class="btn btn-light btn-sm border mr-1" type="button" style="float:right;" data-toggle="popover" data-content="<?= $row['descr']?>" data-container="body" data-placement="top">Details</button>
        </form>
        
        </div>
    </div>
</div>