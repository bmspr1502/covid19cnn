$(document).ready(function(){
    $('#upimg').click(function(){
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
                    alert(response);
                    $("#img").attr("src",'prediction_api/train_img/'+response); 
                    predict(response);
                    
                    $(".preview img").show(); // Display image element
                }else{
                    alert("Upload failed");
                }
              },
          });
        
    })
});

function predict(path){
    $.ajax({
              url: 'http://127.0.0.1:5000/hosppredict',
              type: 'POST',
              data: {
                  path:   path
                  
              },
              //dataType: 'json',
              success: function(data){
                  console.log(data);
                  let msg = JSON.parse(JSON.stringify(data));
                  $('#img_name').val(msg.name);
                  $('#percentage').val(parseFloat(msg.percentage));
                  $('#scan_result').val(msg.result);
                  return data;
                  /*
                  let str = JSON.stringify(data);
                  let msg = JSON.parse(str);

                  $('#resultmodal').html('The prediction of the given image is: '+ msg.data);*/
              }
         });

         return null;
  }