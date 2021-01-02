<!-- Sweet alert import -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



<div class="card newsCard w-50" style="margin-left:50px;margin-top:20px;">
<img src="<?= $row['picture']?>" class="card-img-top" alt="<?= $row['title']?>" height="200" width="200">
    <div class="card-body">
    <p><?= $row['description']?></p>
    </div>
    
    <div class="card-footer m-0 pr-3 pl-3 pt-3">
    <div>
        <small class="text-muted"><b><?= $row['date']?></b></small>
        <button class="btn btn-primary btn-sm border mr-1" type="button" style="float:right;" onclick="checkReading()">Weiterlesen</button>
        <input type="hidden" value="<?= $row['link']?>" id="hiddenLink">
        </div>
    </div>
</div>

<script>
   
        
        let link = $('#hiddenLink').val();
        function checkReading(){
            swal({
                text: "Diese Aktion leitet dich auf eine andere Webseite weiter. Trotzdem fortfahren?",
                buttons : {
                    cancel: "Abbrechen",
                    confirm: "Ok"
                }

            }).then((willContinue) => {
                if(willContinue){
                    window.location.href = link;
                }
            });
            
        }

    
</script>
