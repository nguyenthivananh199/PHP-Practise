<!DOCTYPE html>
<html>

<head>
    <title>Giải phương trình bậc hai</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<style>
    body {
        text-align: center;
    }
</style>

<body>
    <?php
    $result = '';
    if (isset($_POST['calculate'])) {
        // Bước 1: Lấy tham số
        if (is_numeric($_POST['a']) == 1 && is_numeric($_POST['b']) == 1 && is_numeric($_POST['c']) == 1) {
            $a = $_POST['a'] ;$b = $_POST['b']; $c = $_POST['c'];
            // Bước 2: Validate và tính toán
            $delta = ($b * $b) - (4 * $a * $c);
            if ($a == $b && $b == $c && $c == 0) {
                $result = 'Phương trình vô so nghiệm';
            } else if ($delta < 0) {
                $result = 'Phương trình vô nghiệm';
            } else if ($delta == 0) {

                $result = 'Phương trình nghiệm kép x1 = x2 = ' . (-$b / (2 * $a));
            } else {
                $result = 'Phương trình có hai nghiệm phân biệt, x1 = ' . ((-$b + sqrt($delta)) / 2 * $a);
                $result .= ',x2 = ' . ((-$b - sqrt($delta)) / 2 * $a);
            }
        } else {
            $result = 'Nhap sai/thieu thong tin';
        }
    }
    ?>
    <h1>Giải phương trình bậc hai</h1>
    <form method="post" action="">
        <input type="text" style="width: 50px" name="a" value="" />x <sup>2</sup>
        +
        <input type="text" style="width: 50px" name="b" value="" />x
        +
        <input type="text" style="width: 50px" name="c" value="" />
        = 0
        <br /><br />
        <input class="btn btn-primary" type="submit" name="calculate" value="Tính" />
    </form>
    <?php echo $result; ?>
</body>

</html>