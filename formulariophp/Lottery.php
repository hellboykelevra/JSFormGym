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
    <h1>Lottery</h1>
    <p>Pick a button and good Luck!!</p>
</div>

<div class="container">
    <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4 text-center">
                    <div id="msg">
                        <h1>CHOOSE A BOX</h1>
                    </div>
                    <?php
                        $number_of_boxes = 10;
                        $price_button_pos = rand(0, $number_of_boxes - 1);
                        for ($i=0; $i<$number_of_boxes; $i++){
                            if ($price_button_pos == $i){
                                echo '<button class="btn btn-primary btn-lg" onclick="show_win_msg(this)" style="margin-bottom: 5px;" name="price">BOX '.$i.'</button>';
                            }
                            else{
                                echo '<button class="btn btn-primary btn-lg" onclick="show_lose_msg(this)" style="margin-bottom: 5px;" name="not_price">BOX '.$i.'</button>';
                            }
                            echo '<br>';
                        }
                    ?>
            </div>
            <div class="col-sm-4"></div>
    </div>
</div>
<script>
    function show_win_msg(button) {
        this.
        document.getElementById('msg').innerHTML = '<h1 style="color: green;">YOU WIN! <a href="Lottery.php"><span class="glyphicon glyphicon-repeat"></span></a></h1>';
        button.className = 'btn btn-warning btn-lg';
        paint_buttons();
    }

    function show_lose_msg (button){
        document.getElementById('msg').innerHTML = '<h1 style="color: red;">YOU LOSE!  <a href="Lottery.php"><span class="glyphicon glyphicon-repeat"></span></a></span></h1>';
        paint_buttons();
        button.className = 'btn btn-warning btn-lg';
    }

    function paint_buttons (){
        var buttons = document.getElementsByName('not_price');
        var i;
        for (i=0; i<buttons.length; i++ ){
            buttons[i].className = 'btn btn-danger btn-lg';
        }
        document.getElementsByName('price')[0].className = 'btn btn-success btn-lg';
    }

</script>