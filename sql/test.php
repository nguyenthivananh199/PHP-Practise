<?php
//  $conn = mysqli_connect('localhost', 'root', '10101995', 'bai4') or die ('Cant not connect to database');

//  $sql = "SELECT * FROM test WHERE test_id=1";
//  $test='';
//     $result1 = $conn->query($sql);

//     if ($result1->num_rows > 0) {
//         // output data of each row
//         while ($row = $result1->fetch_assoc()) {
//             $result=$row;
//             echo $test['test_name'];
//         }
//     } else{
//         echo 'no';
//     }

// $sql = "SELECT * FROM test WHERE test_id=1";
require 'students.php';
$test = get_test(1);
$quest = array();
$quest = get_quest(1);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Git test</title>
</head>

<body>
    <div>
        <h3><?php echo $test['test_name'];
            $count = 1; ?></h3>

        <div>Registration closes in <span id="time">05:00</span> minutes!</div>
        <?php foreach ($quest as $item) { ?>
            <h4> Cau <?php echo $count;
                        $count++; ?> : <?php echo $item['question'] ?></h4>
            <div>
                <input type="radio" id="age1" name="<?php echo $count; ?>" value="<?php echo $item['ans1']?>"; ?>">
                <label for="age1">Ans 1</label><br>
                <input type="radio" id="age1" name="<?php echo $count; ?>" value="<?php echo $item['ans2']?>">
                <label for="age1">Ans 2</label><br>
                <input type="radio" id="age1" name="<?php echo $count; ?>" value="<?php echo $item['ans3']?>">
                <label for="age1">Ans 3</label><br>
                <input type="radio" id="age1" name="<?php echo $count; ?>" value="<?php echo $item['ans1']?>">
                <label for="age1">Ans 4</label><br>
            </div>
        <?php } ?>
    </div>
    <hr>
</body>

</html>
<script>
    function startTimer(duration, display) {
        var timer = duration,
            minutes, seconds;
        setInterval(function() {
            minutes = parseInt(timer / 60, 10)
            seconds = parseInt(timer % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            display.textContent = minutes + ":" + seconds;
            if (timer < 0) {
                // alert("done");
            }
            timer--;

        }, 1000);
    }

    window.onload = function() {
        var fiveMinutes = 10,
            display = document.querySelector('#time');
        startTimer(fiveMinutes, display);
    };
</script>