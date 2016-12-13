<?php
    session_start();
    if (isset($_POST['log_out'])){
        session_destroy();
        header('Location: index.php');
    }

    if (!isset($_SESSION['user_name'])){
        header('Location: index.php');
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
    <?php
        $user_name = $_SESSION['user_name'];
        echo '<h1>Welcome '.$user_name.' to the <strong>JS GYM</strong></h1>';
    ?>
    <p>You are in!!</p>
    <form action="main.php" method="post">
        <button name="log_out" class="btn btn-primary btn-lg">Log Out</button>
    </form>
</div>
    <div class="container">

        <?php
            if (isset($_POST['submit'])) {
        ?>
                <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-6">
                        <ul class="list-group">

                           <?php
                                $players = array();
                                foreach ($_POST as $player){
                                    if ($player != $_POST['submit']){
                                        array_push($players, $player);
                                    }
                                }

                                shuffle($players);
                                $last_player = end($players);

                                for ($i = 0; $i<count($players); $i++){
                                    if ($players[$i] != $last_player){
                                        $target = $players[$i + 1];
                                    }
                                    else{
                                        $target = $players[0];
                                    }
                                    echo '<li class="list-group-item">'.$players[$i].' -> '.$target.'</li>';
                                    echo '<br>';
                                }
                           ?>
                        </ul>
                    </div>
                    <div class="col-sm-3"></div>
                </div>
        <?php
            }
        ?>

        <div class="row">
            <div class="col-sm-4 text-center">
                <h3>JS text writer</h3>
                <div class="form-group">
                    <h3 id="to_write"></h3>
                    <textarea type="text" id="text" placeholder="Type text here..." class="form-control"></textarea>
                </div>
                <button type="button"
                        class="btn btn-warning btn-lg"
                        onclick="write_text()">
                    WRITE IT
                </button>
            </div>
            <div class="col-sm-4 text-center">
                <h3>JS Pass Checker</h3>
                <div class="form-group">
                    <div id="verify_pass"></div>
                    <input type="password" id="pass" class="form-control">
                </div>

                <button type="button"
                        class="btn btn-warning btn-lg"
                        onclick="check_pass()">
                    CHECK PASS
                </button>


            </div>
            <div class="col-sm-4">

                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <h3>Invisible Friend</h3>
                    </div>
                    <div class="panel-body" id="friends-form">
                        <p>Select the amount of friends who will play: </p>
                        <p id="error_msg" style="color: red"></p>
                        <input id="amount_of_friends">
                        <button class="btn btn-warning" onclick="generate_form()">submit</button>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        function write_text() {
            var text = document.getElementById('text').value;
            document.getElementById('to_write').innerHTML = text;
        }

        function check_pass (){
            var pass = '1234'
            var typed_pass = document.getElementById('pass').value;
            if (typed_pass == pass){
                document.getElementById('verify_pass').innerHTML = '<h3 style="color:green">OK</h3>';
            }
            else{
                document.getElementById('verify_pass').innerHTML = '<h3 style="color: red;"> FAIL </h3>';
            }
        }

        function generate_form() {
            var amount = document.getElementById('amount_of_friends').value;
            var max_amount_of_players = 100;
            if (isNaN(amount)){
               document.getElementById('error_msg').innerHTML = "Not valid value, please enter a number";
            }
            else if (amount > max_amount_of_players){
               document.getElementById('error_msg').innerHTML = "The max amount of players is 100";
            }
            else{
                var form = "<form method='post' action='main.php'>";
                for (var i=0; i<amount; i++){
                    var player_name = 'player_'+i;
                    form += '<div class="form-group">';
                    form += '<label for"'+player_name+'">Insert the name of <strong>' + player_name + '</strong></label>';
                    form += '<input class="form-control" placeholder="'+player_name+'" name="player_' + i + '">';
                    form += '</div>';
                }
                form += '<button type="submit" name="submit" class="btn btn-warning btn-lg">PLAY</button><br>';
                form += '</form>';
                document.getElementById('friends-form').innerHTML = form;
            }
        }

    </script>

