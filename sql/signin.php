<?php
//Khai báo sử dụng session
session_start();
// redirect active user to home
if (isset($_SESSION['username']) ){
    if($_SESSION['level']==1){
        Header("Location: home1.php");
    }else{
        Header("Location: home2.php");
    }
}
$kt=0;
if (isset($_POST['submit_login'])) {


    $username = addslashes($_POST['username']);
    $password = addslashes($_POST['pass']);
    $conn = mysqli_connect('localhost', 'root', '10101995', 'bai4') or die('Cant not connect to database');

    $sql = "SELECT * FROM tb_sinhvien WHERE sv_username='".$username."'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            if($row['sv_pass']==$password){
                // dang nhap thanh cong
                $_SESSION['username'] = $username;
                $_SESSION['level'] = $row['sv_level'];
                if($_SESSION['level']==1){
                    Header("Location: home1.php");
                }else{
                    Header("Location: home2.php");
                }
            }else{
                //sai mat khau
               // echo'sai mat khau';
               $kt=1;
            }
        }
    } else {
        //ten dang nhap khong ton tai
        $kt=1;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">
        <h2>Stacked form</h2>
        <form method="post" action="signin.php">
        <p>
            <?php if($kt==1){
                echo ' Incorect username or pass ';
            } ?>
            </p>
            <div class="form-group">
                <label for="email">Username:</label>
                <input type="text" class="form-control" id="username" placeholder="Enter email" name="username" required>
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pass" required>
            </div>
            <div class="form-group form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" name="remember"> Remember me
                </label>
            </div>
            <button type="submit" class="btn btn-primary" name="submit_login">Submit</button>
        </form>
    </div>

</body>

</html>