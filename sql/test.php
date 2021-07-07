<?php
require 'students.php';
$count = 1;
$test = get_test(1);
$quest = array();
$quest = get_quest(1);
$chosen_ans = new SplFixedArray(1 + count($quest));
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // echo 'hello';
    for ($i = 1; $i <= count($quest); $i++) {
        $t = (string)$i;

        $chosen_ans[$i] = $_POST[$t];
    }
    get_test_result($test, $chosen_ans);
    //  echo "<meta http-equiv='refresh' content='0'>";
}

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
    <div class="container">
        <form action="test.php" method="post" id="theForm">

            <h3 style="text-align: center;"><?php echo $test['test_name'];
                ?></h3>

            <div style="text-align: center;">Closes in <h4><span id="time">00:00</span> </h4>
            </div>
            <?php foreach ($quest as $item) { ?>
                <h4> Cau <?php echo $count; ?> : <?php echo $item['question'] ?></h4>
                <div>
                    <input type="radio" id="age1" name="<?php echo $count; ?>" value="<?php echo $item['ans1'] ?>">
                    <label for="age1">Ans 1</label><br>
                    <input type="radio" id="age1" name="<?php echo $count; ?>" value="<?php echo $item['ans2'] ?>">
                    <label for="age1">Ans 2</label><br>
                    <input type="radio" id="age1" name="<?php echo $count; ?>" value="<?php echo $item['ans3'] ?>">
                    <label for="age1">Ans 3</label><br>
                    <input type="radio" id="age1" name="<?php echo $count; ?>" value="<?php echo $item['ans4'] ?>">
                    <label for="age1">Ans 4</label><br>
                </div>
            <?php $count++;
            } ?>
            <button type="submit" name="btnsubmit" value="submit"> submit</button>
    </div>
    </form>
    <hr>
</body>

</html>
<script>
//  decreasing time set
    function startTimer(duration, display) {
        var timer = duration,
            minutes, seconds;
        setInterval(function() {
            minutes = parseInt(timer / 60, 10)
            seconds = parseInt(timer % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            display.textContent = minutes + ":" + seconds;
            if (timer <= 0) {

                // alert("done");

                  formSubmit();

                //  break;

            } else {
                timer--;

            }

        }, 1000);
    }

    window.onload = function() {
        var fiveMinutes = 10,
            display = document.querySelector('#time');
        startTimer(fiveMinutes, display);
    };
//auto submit
    function formSubmit() {
        document.getElementById("theForm").submit();

    }
// disable back
    // $(document).ready(function() {
    //     function disableBack() {
    //         window.history.forward()
    //     }

    //     window.onload = disableBack();
    //     window.onpageshow = function(evt) {
    //         if (evt.persisted) disableBack()
    //     }
    // });
</script>