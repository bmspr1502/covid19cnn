<!DOCTYPE html>
<html lang="en">
<head>
    <title>Hospital</title>
    <link rel="icon" href="images/home.jpg" type="image/icon type">
    <meta charset="utf-8">
    <link rel="stylesheet" href="styling.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script>
    $(document).ready(function(){
      $("#patientform").on("submit", function(event){
            event.preventDefault();

            var formValues= $(this).serialize();
            console.log(formValues);

            $.post("pat_login.php", formValues, function(data){
                // Display the returned data in browser
                $("#result1").html(data);
            });
        });
        $("#hospitalform").on("submit", function(event){
            event.preventDefault();

            var formValues= $(this).serialize();
            console.log(formValues);

            $.post("hosp_login.php", formValues, function(data){
                // Display the returned data in browser
                $("#result2").html(data);
            });
        });
    });
    </script>
</head>

<body>
<div class="btn-group-vertical">
    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#hospital">Hospital login</button>
    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#patient">Patient login</button>
    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#predictimage">Predict</button>
</div>

<div class="modal fade" id="predictimage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Covid-19 Prediction</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Upload your CT Scan image
      </div>
      <div class="modal-footer">
        <form action="upload_image.php" method="post" enctype="multipart/form-data">
            <input type="file" name="image" id="image">
            <button type="submit" class="btn btn-danger" name = "predict">Predict</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="patient" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Patient</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Please Login to see your result
      </div>
      <div class="modal-footer">
        <form action="pat_login.php" method="post" id="patientform">
            <input type="text" name="pname" class = "pat_phone" placeholder = "Name">
            <input type="text" name="phone" class = "pat_phone" placeholder = "Phone">
            <div id="result1" style="color:red;"></div>
            <button type="submit" class="btn btn-danger">Login</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="hospital" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hospital</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Hospital login
      </div>
      <div class="modal-footer">
        <form action="hosp_login.php" id="hospitalform" method="post">
            <input type="text" name="hosp_id" class = "pat_phone" placeholder = "Hospital ID">
            <!--<input type="text" name="phone" class = "pat_phone" placeholder = "Phone">-->
            <div id="result2" style="color:red;"></div>
            <button type="submit" class="btn btn-danger">Login</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>
