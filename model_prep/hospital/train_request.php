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
            background-color: #fb3640;
        }
        .container{
            margin-top: 2em;
        }
        hr{
            border: 2px solid black;
        }
<<<<<<< HEAD
=======
        .dab{
            padding: 2px;
            background-color: #303030	;
            color: white;
            width: 18em;
        }
>>>>>>> 87fa7ec640cee1e44287fe0053e1fed571f12e2b
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">HOSPITAL</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="hosp.php">ADD PATIENT <span class="sr-only">(current)</span></a>
        </li>
        <li>
          <a class="nav-link" href="patient.php">PATIENT DETAILS<span class="sr-only">(current)</span></a>
        </li>
        <li>
        <a class="nav-link active" href="train_request.php">TRAIN DATA<span class="sr-only">(current)</span></a>
        </li>
       <li>
        <a class="nav-link" href="../index.php">LOGOUT<span class="sr-only">(current)</span></a>
        </li>
      </ul>
    </div>
  </nav>
<div class='container'>
<button type='button' class='btn btn-dark' onclick='train_call()' id = "dis" style = "margin-left:500px">Click me to train the model</button>
<hr>
    <div class='col'>
    <div class="dab"> <h2>Untrained Data</h2> </div><br>
    <div id='nottrain'></div>
    </div>
    <hr>
    <div class='col'>
    <div class="dab"><h2>UnValued Data</h2></div><br>
    <div id='notgraded'></div>
    </div>
    <hr>
    <div class='col'>
   <div class="dab" style="width: 12em;"> <h2>Trained Data</h2> </div>
    <div id='train'></div>
    </div>
<p id='result'></p>
</div>
<script>
    function train_call(){
        document.getElementById("dis").disabled = true;
        $.post('http://127.0.0.1:5001/train', {
            epoch: 5
        }, function(data){
            $('#result').html(data);
            location.reload();
        })

    }
    function get_images(type){
        $.post('get_images.php', {
            train: type,
        }, function (data){
            if(type==1){
                $('#train').html(data);
            }else if(type==0){
                $('#nottrain').html(data);
            }else{
                $('#notgraded').html(data);
            }
        })
    }
    $(document).ready(function(){
        get_images(0);
        get_images(1);
        get_images(-1);
        $.ajax({
            url: 'try_call.php',
            success: function(data) {
                if(data == 0)
                document.getElementById("dis").style.display = "none";
            }
        });
    })
</script>
</body>
</html>
