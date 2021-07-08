<?php
// Biến kết nối toàn cục
global $conn;
 
// Hàm kết nối database
function connect_db()
{
    // Gọi tới biến toàn cục $conn
    global $conn;
     
    // Nếu chưa kết nối thì thực hiện kết nối
    if (!$conn){
        $conn = mysqli_connect('localhost', 'root', '10101995', 'bai4') or die ('Cant not connect to database');
        
        mysqli_set_charset($conn, 'utf8');
    }
}
 
// Hàm ngắt kết nối
function disconnect_db()
{
    // Gọi tới biến toàn cục $conn
    global $conn;
     
    // Nếu đã kêt nối thì thực hiện ngắt kết nối
    if ($conn){
        mysqli_close($conn);
    }
}
 

// Hàm lấy tất cả sinh viên
function get_all_students()
{
    // Gọi tới biến toàn cục $conn
    global $conn;
     
    // Hàm kết nối
    connect_db();
     
    // Câu truy vấn lấy tất cả sinh viên
    $sql = "select * from tb_sinhvien";
     
    // Thực hiện câu truy vấn
    $query = mysqli_query($conn, $sql);
     
    // Mảng chứa kết quả
    $result = array();
     
    // Lặp qua từng record và đưa vào biến kết quả
    if ($query){
        while ($row = mysqli_fetch_assoc($query)){
            $result[] = $row;
        }
    }
     
    // Trả kết quả về
    return $result;
}
 
// Hàm lấy sinh viên theo ID
function get_student($student_id)
{
    // Gọi tới biến toàn cục $conn
    global $conn;
     
    // Hàm kết nối
    connect_db();
     
    // Câu truy vấn lấy tất cả sinh viên
    $sql = "select * from tb_sinhvien where sv_id = {$student_id}";
     
    // Thực hiện câu truy vấn
    $query = mysqli_query($conn, $sql);
     
    // Mảng chứa kết quả
    $result = array();
     
    // Nếu có kết quả thì đưa vào biến $result
    if (mysqli_num_rows($query) > 0){
        $row = mysqli_fetch_assoc($query);
        $result = $row;
    }
     
    // Trả kết quả về
    return $result;
}
function add_test($newtest){
    // insert test
    global $conn;
     
    // Hàm kết nối
    connect_db();
     
    // Chống SQL Injection
    $testname=$newtest[0];
    // Câu truy vấn thêm
    $sql = "
            INSERT INTO test(test_name) VALUES
            ('$testname')
    ";
     
    // Thực hiện câu truy vấn
   // $query = mysqli_query($conn, $sql);
     
    // get last id
    $sql1="SELECT test_id FROM test ORDER BY test_id DESC LIMIT 1";

    $query1 = mysqli_query($conn, $sql1);
    // Nếu có kết quả thì đưa vào biến $result

        $row = mysqli_fetch_assoc($query1);
        
    
    //echo $row['test_id'];
    // insert to quest tables
    
    $sql = "
            INSERT INTO quest(test_id, question, ans1, ans2, ans3, ans4, correct) VALUES
            ('$student_name','$student_sex','$student_birthday')
    ";
}
function get_test($test_id){

    global $conn;
     
    // Hàm kết nối
    connect_db();
     
    // Câu truy vấn lấy tất cả sinh viên
    $sql = "SELECT * FROM test WHERE test_id = 1";
     
    // Thực hiện câu truy vấn
    $query = mysqli_query($conn, $sql);
     
    // Mảng chứa kết quả
    $result = '';
     
    // Nếu có kết quả thì đưa vào biến $result
    if (mysqli_num_rows($query) > 0){
        $row = mysqli_fetch_assoc($query);
        $result = $row;
        
    }
     
    // Trả kết quả về
    return $result;
}
function get_test_result($test,$chosen_ans){
    global $conn;
     
    // Hàm kết nối
    connect_db();
     
    // Câu truy vấn lấy tất cả sinh viên
    $sql = "SELECT * FROM quest WHERE test_id = '".$test['test_id']."'";
     
    $query = mysqli_query($conn, $sql);
     
    // Mảng chứa kết quả
    $correct = array();
    $score=0;
    // Lặp qua từng record và đưa vào biến kết quả
    if ($query){
        while ($row = mysqli_fetch_assoc($query)){
            $correct[] = $row;
        }
    }
    for($i=1;$i<count($chosen_ans);$i++){
        if($chosen_ans[$i]==$correct[$i-1]['correct']){
            $score+=1;
        }
    }
    //echo $score;
    header('Location: test-result.php?score='.$score);


     
    // Trả kết quả về
    //return $result;
}

function get_quest($test_id){

    global $conn;
     
    // Hàm kết nối
    connect_db();
     
    // Câu truy vấn lấy tất cả sinh viên
    $sql = "SELECT * FROM quest WHERE test_id = 1";
     
    $query = mysqli_query($conn, $sql);
     
    // Mảng chứa kết quả
    $result = array();
     
    // Lặp qua từng record và đưa vào biến kết quả
    if ($query){
        while ($row = mysqli_fetch_assoc($query)){
            $result[] = $row;
        }
    }
     
    // Trả kết quả về
    return $result;}
// Hàm thêm sinh viên
function add_student($student_name, $student_sex, $student_birthday)
{
    // Gọi tới biến toàn cục $conn
    global $conn;
     
    // Hàm kết nối
    connect_db();
     
    // Chống SQL Injection
    $student_name = addslashes($student_name);
    $student_sex = addslashes($student_sex);
    $student_birthday = addslashes($student_birthday);
     
    // Câu truy vấn thêm
    $sql = "
            INSERT INTO tb_sinhvien(sv_name, sv_sex, sv_birthday) VALUES
            ('$student_name','$student_sex','$student_birthday')
    ";
     
    // Thực hiện câu truy vấn
    $query = mysqli_query($conn, $sql);
     
    return $query;
}
 
 
// Hàm sửa sinh viên
function edit_student($student_id, $student_name, $student_sex, $student_birthday)
{
    // Gọi tới biến toàn cục $conn
    global $conn;
     
    // Hàm kết nối
    connect_db();
     
    // Chống SQL Injection
    $student_name       = addslashes($student_name);
    $student_sex        = addslashes($student_sex);
    $student_birthday   = addslashes($student_birthday);
     
    // Câu truy sửa
    $sql = "
            UPDATE tb_sinhvien SET
            sv_name = '$student_name',
            sv_sex = '$student_sex',
            sv_birthday = '$student_birthday'
            WHERE sv_id = $student_id
    ";
     
    // Thực hiện câu truy vấn
    $query = mysqli_query($conn, $sql);
     
    return $query;
}
 
 
// Hàm xóa sinh viên
function delete_student($student_id)
{
    // Gọi tới biến toàn cục $conn
    global $conn;
     
    // Hàm kết nối
    connect_db();
     
    // Câu truy sửa
    $sql = "
            DELETE FROM tb_sinhvien
            WHERE sv_id = $student_id
    ";
     
    // Thực hiện câu truy vấn
    $query = mysqli_query($conn, $sql);
     
    return $query;
}
?>