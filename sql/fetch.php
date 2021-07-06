<?php 
$conn = mysqli_connect('localhost', 'root', '10101995', 'bai4') or die ('Cant not connect to database');
$output='';
$sql = "SELECT * FROM tb_sinhvien WHERE sv_name LIKE '%".$_POST["search"]."%'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result) > 0){
    $output .='<table width="100%" border="1" cellspacing="0" cellpadding="10">
    <tr>
        <td>ID</td>
        <td>Name</td>
        <td>Gender</td>
        <td>Birthday</td>
        <td>Options</td>
    </tr>';
    while($row=mysqli_fetch_array($result)){
        // $test = "<input onclick=window.location=student-edit.php?id='. $row['sv_id'] .' type="button" value="Sửa"/>";
        //check it done
        $test = "<input onclick=window.location='student-edit.php?id={$row['sv_id']}' type='button' value='Sửa'/>";

        $output .='
        <tr>
                <td>'.$row['sv_id'].'</td>
                <td>'.$row['sv_name'].'</td>
                <td>'.$row['sv_sex'].'</td>
                <td>'.$row['sv_birthday'].'</td>
                <td>
                <form method="post" action="student-delete.php">
               
                <input type="hidden" name="id" value="'.$row['sv_id'].'"/>
                <input onclick="return confirm("Bạn có chắc muốn xóa không?");" type="submit" name="delete" value="Xóa"/>
                '. $test .'
            
                </form>
                </td>
            </tr>
        
        ';
    }
    echo $output;
}else{
    echo'data not found';
}
?>