<?
session_start();

    if($_SESSION['login']!=111){
        header("Location: ../login.html");
    }
?>
 
<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
    <form>
      <fieldset>
        <legend>Passwort bestätigen</legend>
        <label for="password1">Passwort:</label>
        <input type="password" required id="password1" />
  
        <label for="password2">Passwort bestätigen:</label>
        <input type="password" required id="password2" />

        <button>Absenden</button>
      </fieldset>
    </form>
    <script type="text/javascript">
        var password1 = document.getElementById('password1');
        var password2 = document.getElementById('password2');

        var checkPasswordValidity = function() {
            if (password1.value != password2.value) {
                password2.setCustomValidity('Passwörter müssen übereinstimmen!');
            } else {
                password2.setCustomValidity('');
            }        
        };

        password1.addEventListener('change', checkPasswordValidity);
        password2.addEventListener('change', checkPasswordValidity);
    </script>
    </body>
</html>
