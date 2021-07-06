<?php
require 'students.php';
$students = get_all_students();
disconnect_db();
?>
 
<!DOCTYPE html>
<html>
    <head>
        <title>Danh sách sinh vien</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>
    <body>
        <input type="text" id="livesearch"name="livesearch" placeholder="Type name ...">
        <h1>Danh sách sinh vien</h1>
        <a href="student-add.php">Thêm sinh viên</a> <br/> <br/>
        <table width="100%" border="1" cellspacing="0" cellpadding="10" id="origin">
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Gender</td>
                <td>Birthday</td>
                <td>Options</td>
            </tr>
            <?php foreach ($students as $item){ ?>
            <tr>
                <td><?php echo $item['sv_id']; ?></td>
                <td><?php echo $item['sv_name']; ?></td>
                <td><?php echo $item['sv_sex']; ?></td>
                <td><?php echo $item['sv_birthday']; ?></td>
                <td>
                    <form method="post" action="student-delete.php">
                        <input onclick="window.location = 'student-edit.php?id=<?php echo $item['sv_id']; ?>'" type="button" value="Sửa"/>
                        <input type="hidden" name="id" value="<?php echo $item['sv_id']; ?>"/>
                        <input onclick="return confirm('Bạn có chắc muốn xóa không?');" type="submit" name="delete" value="Xóa"/>
                    </form>
                </td>
            </tr>
            <?php } ?>
        </table>

        <div id="result"></div>
    </body>
</html>
<script>
$(document).ready(function() {
    $('#livesearch').keyup(function(){
        var txt=$(this).val();
        console.log(txt);
        if(txt==''){
            $("#origin").show();
            $("#result").hide();
        }else{
            $("#origin").hide();
            $("#result").show();
            $('#result').html('');
            $.ajax({
                url:"fetch.php",
                method:"post",
                data:{search:txt},
                dataType:"text",
                success:function(data){
                    $('#result').html(data);
                }
            });
        }
    });
});
</script>