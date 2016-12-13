<?php
    session_start();
    if (isset($_SESSION['user_name'])){
        header('Location: main.php');
    }
    require_once ('User.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Actividad 3 Formulario PHP</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="style/main.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>

<div class="jumbotron text-center">
    <img src="img/inscripcion.png" width="180px" height="180px">
    <h1>Formulario</h1>
    <p>Poner usuario y contraseña correctos</p>
</div>


<div class="container">
   <div class="row">
       <div class="col-sm-4"></div>
       <div class="col-sm-4">
           <?php
               $users = array(
                   'victor' => '1234',
                   'silverio' => '1234',
                   'besay' => '1234',
                   'carlos' => '1234',
                   'abian' => '1234',
                   'aaron' => '1234'
               );

               if (isset($_POST['submit'])){
                   if ( !array_key_exists($_POST['user'], $users)){
                       show_alert('El usuario no existe', 'danger');
                   }
                   elseif ($users[$_POST['user']] == strtolower($_POST['password'])) {
                       $_SESSION['user_name'] = ucfirst(strtolower($_POST['user']));
                       header('Location: main.php');
                   }
                   else{
                       show_alert('La contraseña es incorrecta', 'danger');
                   }
               }

               function show_alert ($msg, $type){
                   echo '<div class="alert alert-'.$type.'">
                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                              <strong>Atención</strong> '.$msg.'
                         </div>';
               }
           ?>
       </div>
       <div class="col-sm-4">
       </div>
   </div>
  <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3>LOGIN</h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="user">Username:</label>
                            <input type="text"class="form-control" name="user">
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                    </div>
                    <div class="panel-footer">
                        <input type="submit" class="btn btn-primary btn-lg" value="Submit" name="submit">
                        <input type="button" class="btn btn-danger btn-lg" value="Help" onclick="show_help()">
                    </div>
                </div>
            </form>
        </div>
        <div class="col-sm-4"></div>
  </div>
</div>

</body>
</html>
<script>
    function show_help() {
        var help_info = 'Las contraseñas y usuarios están escritas en el código, index.php';
        alert(help_info);
    }
</script>