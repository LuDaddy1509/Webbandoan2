<?php
session_start();
include 'connect.php';

$makh = $_SESSION['makh'];
$response = ['status' => 'success', 'discontinued' => []];

$sql = "
    SELECT gh.masp, sp.Name 
    FROM giohang gh 
    JOIN sanpham sp ON gh.masp = sp.ID 
    WHERE gh.makh = ? AND sp.Visible != 1
";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $makh);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    $response['status'] = 'error';
    $response['discontinued'][] = $row['Name'];
}

header('Content-Type: application/json');
echo json_encode($response);
?>