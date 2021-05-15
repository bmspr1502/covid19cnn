<!doctype html>

<html>
<head>
    <title>Training Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body{
            background-image: url("home.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
}
    </style>
</head>
<body>
<div class='container'>
<h1>TESTING TRAIN</h1>
<button type='button' class='btn btn-success' onclick='train_call()'>Click Me to train the untrained images</button>
    <div class='col'>
    <h2>Non Trained Data</h2>
    <div id='nottrain'></div>
    </div>
    

    <div class='col'>
    <h2>Trained Data</h2>
    <div id='train'></div>
    </div>
<p id='result'></p>
</div>
<script>
    function train_call(){
        $.post('http://127.0.0.1:5001/train', {
            epoch: 5
        }, function(data){
            $('#result').html(data);
        })
    }

    function get_images(type){
        $.post('get_images.php', {
            train: type
        }, function (data){
            if(type==1){
                $('#train').html(data);
            }else{
                $('#nottrain').html(data);
            }
        })
    }

    $(document).ready(function(){
        get_images(0);
        get_images(1);
    })
</script>
</body>
</html>