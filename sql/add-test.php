<?php

require 'students.php';
$quest = array();
if (isset($_POST['submit'])) {
    foreach ($_POST as $param_name => $param_val) {
        //echo "Param: $param_name; Value: $param_val<br />\n";
        $quest[] = $param_val;
    }
    add_test($quest);
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

    <title>Document</title>
</head>

<body>
    <div class="container">
        <h4> ADD TEST</h4>

        <form id="myForm" action="add-test.php" method="POST">
            <label for="name"> Test name </label>
            <input type="text" placeholder="Type name..." name="name" required>
            <div id="add"></div>
            <p>Click the button to create a P element with some text.</p>

            <div class="row">
               

                <button class="col-2" onclick="myFunction()">Add a quesion</button>
                <button class="col-2" type="submit" name="submit" value="submit">save </button>
            </div>
        </form>
    </div>

</body>

</html>


<script>
    var i = 1;

    function myFunction() {
        var div = document.createElement("div");
        var ques_input = document.createElement("input");
        var ans1_input = document.createElement("input");
        var ans2_input = document.createElement("input");
        var ans3_input = document.createElement("input");
        var ans4_input = document.createElement("input");
        var selectList = document.createElement("select");
        selectList.id = "mySelect";
        var x = "chosen" + i.toString();
        selectList.setAttribute("name", x);


        var quest_text = document.createElement("P");
        quest_text.setAttribute("class", "col-2");
        var an1_text = document.createElement("P");
        var an2_text = document.createElement("P");
        var an3_text = document.createElement("P");
        var an4_text = document.createElement("P");
        var button = document.createElement("button");
        var hr = document.createElement("hr");
        div.setAttribute("id", i);

        ques_input.type = "text";
        ques_input.required = "required";
        ques_input.setAttribute("name", i);
        ques_input.setAttribute("placeholder", "type");


        ans1_input.type = "text";
        ans1_input.setAttribute("name", i + 1);
        ans1_input.required = "required";

        ans2_input.type = "text";
        ans2_input.setAttribute("name", i + 2);
        ans2_input.required = "required";

        ans3_input.type = "text";
        ans3_input.setAttribute("name", i + 3);
        ans3_input.required = "required";

        ans4_input.type = "text";
        ans4_input.setAttribute("name", i + 4);
        ans4_input.required = "required";

        button.textContent = 'Delete';
        button.setAttribute("id", "destroy");
        quest_text.innerText = "Question";
        an1_text.innerText = "Answer 1";
        an2_text.innerText = "Answer 2";
        an3_text.innerText = "Answer 3";
        an4_text.innerText = "Answer 4";
        document.getElementById("add").appendChild(div);
        div.appendChild(quest_text);
        div.appendChild(ques_input);
        div.appendChild(an1_text);

        div.appendChild(ans1_input);

        div.appendChild(an2_text);
        div.appendChild(ans2_input);
        div.appendChild(an3_text);
        div.appendChild(ans3_input);
        div.appendChild(an4_text);
        div.appendChild(ans4_input);

        div.appendChild(selectList);

        var option = document.createElement("option");
        option.value = 1;
        option.text = "answer" + 1;
        selectList.appendChild(option);
        var option1 = document.createElement("option");
        option1.value = 2;
        option1.text = "answer" + 2;
        selectList.appendChild(option1);
        var option2 = document.createElement("option");
        option2.value = 3;
        option2.text = "answer" + 3;
        selectList.appendChild(option2);
        var option3 = document.createElement("option");
        option3.value = 4;
        option3.text = "answer" + 4;
        selectList.appendChild(option3);

        div.appendChild(button);
        div.appendChild(hr);
        i = i + 7;
        button.onclick = function() {
            div.remove()
        }
    }
</script>