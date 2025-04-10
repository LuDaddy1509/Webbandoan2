<?php
<<<<<<< HEAD
    $server = 'localhost';    // Sửa "sever" thành "server"
    $user = 'root';
    $pass = '';
    $database = 'webbandoan2';
    
    $conn = new mysqli($server, $user, $pass, $database);
    
    if ($conn->connect_error) {
        die('Kết nối thất bại: ' . $conn->connect_error);
    }
    
    $conn->set_charset('utf8');
=======
    $sever='localhost';
    $user ='root';
    $pass ='';
    $database='webbandoan24';
    $conn = new mysqLi($sever, $user, $pass, $database);
    // if($conn){
    //     mysqLi_query($conn," SET NAMES 'utf8' ");
    //     echo 'Đã kết nói với cơ sở dử liêu thành công! <br> ';
    // }
    // else {
    //     echo 'kết nối thất bại!';
    // }
>>>>>>> 85781ed038db2eea7019327e8eaf5cd91a3614c1
?>