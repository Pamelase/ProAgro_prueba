<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>ProAgro</title>
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>    
        <link href="../css/style.css" rel="stylesheet">
      
    </head>
    <body>
        
        
        <div class="wrapper fadeInDown">
          <div id="formContent">    
           
              <input type="text" id="login" class="fadeIn second" name="login" placeholder="RFC">
              <input type="text" id="password" class="fadeIn third" name="password" placeholder="Password">
              <input type="submit" class="" value="Ingresar"  onclick="loginEngine()">
           
          </div>
        </div>

    </body>
    <script type="text/javascript" src="../js/login.js"></script>
    <script type="text/javascript">
        window.onload = IndexLoadCode;
        function IndexLoadCode() {
            api = new Api('localhost','44307','http://','');
            
            api.GetSync('api/Usuario');
        }
    </script>
</html>