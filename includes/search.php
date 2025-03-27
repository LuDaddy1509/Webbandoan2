<?php
header("Content-Type: application/json; charset=utf-8");
include "connect.php"; // Điều chỉnh đường dẫn nếu cần

if ($conn->connect_error) {
    die(json_encode(["error" => "Kết nối thất bại: " . $conn->connect_error]));
}

// Kiểm tra nếu request không phải POST thì dừng lại
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    die(json_encode(["error" => "Chỉ chấp nhận request POST"]));
}

// Nhận dữ liệu từ request
$name = $_POST["name"] ?? '';
$category = $_POST["category"] ?? '';
$min_price = $_POST["min_price"] ?? '';
$max_price = $_POST["max_price"] ?? '';
$sort_order = $_POST["sort_order"] ?? 0;

$sql = "SELECT * FROM sanpham";
$conditions = [];

if (!empty($name)) {
    $escaped_name = $conn->real_escape_string($name);
    $conditions[] = "(name LIKE '%$escaped_name%' OR SOUNDEX(name) = SOUNDEX('$escaped_name'))";
}

if (!empty($category) && $category !== "Tất cả") {
    $conditions[] = "category = '" . $conn->real_escape_string($category) . "'";
}

if (!empty($min_price)) {
    $conditions[] = "price >= " . (float)$min_price;
}
if (!empty($max_price)) {
    $conditions[] = "price <= " . (float)$max_price;
}

if (!empty($conditions)) {
    $sql .= " WHERE " . implode(" AND ", $conditions);
}

if ($sort_order == 1) {
    $sql .= " ORDER BY price ASC";
} elseif ($sort_order == 2) {
    $sql .= " ORDER BY price DESC";
}

$result = $conn->query($sql);
$products = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}

echo json_encode($products, JSON_UNESCAPED_UNICODE);
$conn->close();
?>
