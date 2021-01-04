<!-- Sweet alert import -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<?php
    $articleDescr = $row['description'];
    if(strlen($articleDescr) > 105){
        $newString = substr($articleDescr, 0, 105);
        $articleDescr = $newString.'...';
    }
    
?>

<div class="card w-50 border-dark shadow-sm" style="margin-left:100px;margin-top:20px;margin-bottom:50px;">
<img src="<?= $row['picture']?>" class="card-img-top" alt="<?= $row['title']?>">
    <div class="card-body">
        <p><?= $articleDescr?></p>
        <small class="text-muted"><b><?= $row['date']?></b></small>
        <button class="btn btn-primary btn-sm border mr-1" type="button" style="float:right;" onclick="checkReading()">Weiterlesen</button>
        <input type="hidden" value="<?= $row['link']?>" class="hiddenLinks">
        <input type="hidden" value="<?= $counter?>" id="linkCounter">
    </div>
    
   
</div>

<script>   
   
    let linkCount = $('#linkCounter').val();
    let links = document.getElementsByClass("hiddenLinks");

    function checkReading(){
        swal({
            text: "Diese Aktion leitet dich auf eine andere Webseite weiter. Trotzdem fortfahren?",
            buttons : {
                cancel: "Abbrechen",
                confirm: "Ok"
            }

        }).then((willContinue) => {
            if(willContinue){
                window.open(links[linkCount]);
            }
        });
        
    }
</script>
