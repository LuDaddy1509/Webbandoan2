<?php
    $server = 'localhost';    // Sửa "sever" thành "server"
    $user = 'root';
    $pass = '';
    $database = 'webbandoan2';
    
    $conn = new mysqli($server, $user, $pass, $database);
    
    if ($conn->connect_error) {
        die('Kết nối thất bại: ' . $conn->connect_error);
    }
    
    $conn->set_charset('utf8');
?>