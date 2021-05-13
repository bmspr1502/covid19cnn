<?php 

?>
<!DOCTYPE html>
<html>
<head>
	<title>Patient | Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <style>
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

            $.post("display_type.php", formValues, function(data){
                //alert(data);
                // Display the returned data in browser
                $("#result").html(data);
            });
        });
        $("#displaynegative").on("submit", function(event){
            event.preventDefault();

            var formValues= $(this).serialize();
            console.log(formValues);

            $.post("display_type.php", formValues, function(data){
                //alert(data);
                // Display the returned data in browser
                $("#result").html(data);
            });
        });
        $("#displaymonth").on("submit", function(event){
            event.preventDefault();

            var formValues= $(this).serialize();
            console.log(formValues);

            $.post("display_type.php", formValues, function(data){
                //alert(data);
                // Display the returned data in browser
                data = ('#result').serialize()
                //$("#result").html(data);
            });
        });
        $("#displaynotverified").on("submit", function(event){
            event.preventDefault();

            var formValues= $(this).serialize();
            console.log(formValues);

            $.post("display_type.php", formValues, function(data){
                //alert(data);
                // Display the returned data in browser
                $("#result").html(data);
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
        <a class="nav-link" href="#">Log Out<span class="sr-only">(current)</span></a>
        </li>
      </ul>
    </div>
  </nav>
  
<div class="dabba" >
<form id="displayall" style="float:left; margin-right:14em;" method="post">
<input type="hidden" name="disp_type" value="1">
<button type="submit" name='submit' class="btn btn-danger">All Patients</button>
</form>

<form id="displaypositive"  style="float:left; margin-right:14em;" method="post">
<input type="hidden" name="disp_type" value="2">
<button type="submit" name='submit' class="btn btn-danger">Positive</button>
</form>

<form id="displaynegative" style="float:left; margin-right:14em;" method="post">
<input type="hidden" name="disp_type" value="3">
<button type="submit" name='submit' class="btn btn-danger">Negative</button>
</form>

<form id="displaymonth"  style="float:left; margin-right:14em;" method="post">
<input type="hidden" name="disp_type" value="4">
<button type="submit" name='submit' class="btn btn-danger">Month</button>
</form>

<form id="displaynotverified" style="float:left; margin-right:1em;" method="post">
<input type="hidden" name="disp_type" value="5">
<button type="submit" name='submit' class="btn btn-danger">Not verfied</button>
</form>
<br><br>
<div id="result"></div>

</div>
<div class="modal" id='exmod' tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</body>
</html>