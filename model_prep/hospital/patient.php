<?php 

?>
<!DOCTYPE html>
<html>
<head>
	<title>Patient | Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <style>
      body{
    background-image: url("home.jpg");
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
}
        .dabba{
            padding: 2em;
        }
    </style>
    <script>
    $(document).ready(function(){
      $("#displayall").on("submit", function(event){
            event.preventDefault();

            var formValues= $(this).serialize();
            console.log(formValues);
            $.ajax({
                method: "post",
                url: "display_type.php",
                data: formValues,
                datatype: "html",
                success: function(response) {
                    let va
                    $('#result').html(response);
                }
            });
            /*
            $.post("display_type.php", formValues, function(data){
                //alert(data);
                // Display the returned data in browser
                $("#result").html(data);
            });*/
        });
        $("#displaypositive").on("submit", function(event){
            event.preventDefault();

            var formValues= $(this).serialize();
            console.log(formValues);

            $.ajax({
                method: "post",
                url: "display_type.php",
                data: formValues,
                datatype: "html",
                success: function(response) {

                    $('#result').html(response);
                }
            });
            /*$.post("display_type.php", formValues, function(data){
                //alert(data);
                // Display the returned data in browser
                $("#result").html(data);
            });*/
        });
        $("#displaynegative").on("submit", function(event){
            event.preventDefault();

            var formValues= $(this).serialize();
            console.log(formValues);

            $.ajax({
                method: "post",
                url: "display_type.php",
                data: formValues,
                datatype: "html",
                success: function(response) {

                    $('#result').html(response);
                }
            });
        });
        $("#displaymonth").on("submit", function(event){
            event.preventDefault();

            var formValues= $(this).serialize();
            console.log(formValues);

            /*$.post("display_type.php", formValues, function(data){
                //alert(data);
                // Display the returned data in browser
                data = ('#result').serialize()
                //$("#result").html(data);
            });*/

        });
        $("#displaynotverified").on("submit", function(event){
            event.preventDefault();

            var formValues= $(this).serialize();
            console.log(formValues);

            /*$.post("display_type.php", formValues, function(data){
                //alert(data);
                // Display the returned data in browser
                $("#result").html(data);
            });*/
            $.ajax({
                method: "post",
                url: "display_type.php",
                data: formValues,
                datatype: "html",
                success: function(response) {
                    $('#result').html(response);
                }
            });
        });
    });
    </script>
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
          <a class="nav-link active" href="patient.php">PATIENT DETAILS<span class="sr-only">(current)</span></a>
        </li>
        <li>
          <a class="nav-link" href="train_request.php">TRAIN IMAGES<span class="sr-only">(current)</span></a>
        </li>
        <li>
        <a class="nav-link" href="../index.php">Log Out<span class="sr-only">(current)</span></a>
        </li>
        <li>
        <a class="nav-link" href="../index.php">Log Out<span class="sr-only">(current)</span></a>
        </li>

      </ul>
    </div>
  </nav>

<div class="dabba" >
<form id="displayall" style="float:left; margin-right:20em;" method="post">
<input type="hidden" name="disp_type" value="1">
<button type="submit" name='submit' class="btn btn-dark">All Patients</button>
</form>

<form id="displaypositive"  style="float:left; margin-right:20em;" method="post">
<input type="hidden" name="disp_type" value="2">
<button type="submit" name='submit' class="btn btn-dark">Positive</button>
</form>

<form id="displaynegative" style="float:left; margin-right:20em;" method="post">
<input type="hidden" name="disp_type" value="3">
<button type="submit" name='submit' class="btn btn-dark">Negative</button>
</form>

<form id="displaynotverified" style="float:left; margin-right:1em;" method="post">
<input type="hidden" name="disp_type" value="4">
<button type="submit" name='submit' class="btn btn-dark">Not verfied</button>
</form>

<br><br>
<div id="result"></div>

</div>
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">UPDATE PATIENT</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="result2"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script>
    function view(id){
        //var id = document.getElementsByClassName('view');
        console.log(id);
        var arr = {
            pat_id: id
        };
        $.ajax({
                method: "post",
                url: "display.php",
                data: arr,
                datatype: "html",
                success: function(response) {
                    $('#result2').html(response);
                }
            });
        //alert("heyy");
    }

</script>
</body>
</html>
