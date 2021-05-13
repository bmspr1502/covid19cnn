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

    function insert_pred_table(name, result){
      $.post('db_add_predict.php', {
        img_name: name,
        result: result
      }, function(data){
        console.log(data);
          if(data==="SUCCESS"){
            $('#resultmodal').append('Your image is stored for quality and maintenance purpose.');
          }
      })
    }
    function predict(path){
      $.ajax({
                url: 'http://127.0.0.1:5000/predict',
                type: 'POST',
                data: {
                    path:   path
                    //framework: 'hello'
                },
                success: function(data){
                    console.log(data);
                    let str = JSON.stringify(data);
                    let msg = JSON.parse(str);
                    insert_pred_table(msg.name, msg.result);
                    $('#resultmodal').append('<br>The prediction of the given image is: <b>'+ msg.result+'</b><br>');
                }
           })
    }
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

        $("#pred_up").click(function(){
            $('#resultmodal').html('');
            var fd = new FormData();
            var files = $('#image')[0].files[0];
            //console.log(files);
            // Check file selected or not
              fd.append('image',files);
              //console.log();
              $.ajax({
                  url: 'upload_image.php',
                  type: 'post',
                  data: fd,
                  contentType: false,
                  processData: false,
                  cache: false,
                  success: function(response){
                    if(response!=0){
                        predict(response);
                        $("#img").attr("src",'hospital/prediction_api/pred_img/'+response); 
                        $(".preview img").show(); // Display image element
                    }else{
                        alert("Upload failed");
                    }
                  },
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
        <form action="" method="post" enctype="multipart/form-data" id='my_form'>
          <div class='preview'>
              <img src="" style='display:none' id="img" width="224" height="224">
              <p id='resultmodal'></p>
          </div>
            <input type="file" name="image" id="image" />
            <input type="button" class="btn btn-success" id='pred_up' name='upload' value='upload'>
            <button type="button" class="btn btn-danger" >Predict</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="patient" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalLabel">Patient Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div id="result1" >Please Login to see the details</div>
      </div>
      <div class="modal-footer">
        <form action="pat_login.php" method="post" id="patientform">
            <input type="text" name="pname" class = "pat_phone" placeholder = "Name">
            <input type="text" name="phone" class = "pat_phone" placeholder = "Phone">
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
