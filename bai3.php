<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $authors = array(
        array(
            'name' => 'Nguyễn Văn Cường',
            'blog' => 'freetuts.net',
            'position' => 'admin'
        ),
        array(
            'name' => 'Trương Phúc Hoài Minh',
            'blog' => 'freetuts.net',
            'position' => 'author'
        ),
        array(
            'name' => 'Hoàng Văn Tuyền',
            'blog' => 'freetuts.net',
            'position' => 'author'
        ),
        array(
            'name' => 'Nguyễn Tình',
            'blog' => 'freetuts.net',
            'position' => 'author'
        )
    );
    $authors[]['name'] = 'them 1';
    $au=array('name'=>'them 2');
    array_push($authors, $au);
    \array_splice($authors, 1, 1);
    ?>

    <ul>
        <?php

        $a = 1;
        for ($i = 1; $i <= count($authors); $i++) {

        ?>
            <li>
                <h4>Phan tu so : <?php echo $i; ?></h4>
                <p>Name : <?php echo $authors[$i - 1]['name'] ?></p>
                <p>----------------------------------</p>
            </li>
        <?php } ?>
    </ul>
</body>

</html>