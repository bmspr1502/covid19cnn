<!doctype html>

<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<body>
<h1>testing train</h1>
<button type='button' onclick='train_call()'>Click Me</button>
<p id='result'></p>

<script>
    function train_call(){
        $.post('http://127.0.0.1:5001/train', {
            epoch: 5
        }, function(data){
            $('#result').html(data);
        })
    }
</script>
</body>
</html>