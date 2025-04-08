<?php
include "connect.php"; // Kết nối database
echo "<pre>";
print_r($_FILES);
echo "</pre>";

// Kiểm tra xem có dữ liệu từ form không
if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['price']) && isset($_POST['desc']) && isset($_POST['type']) && isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    // var_dump($_FILES); // Kiểm tra xem dữ liệu tệp có được gửi lên không
    // exit(); // Dừng việc thực hiện tiếp tục để kiểm tra $_FILES

    $id = intval($_POST['id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $desc = mysqli_real_escape_string($conn, $_POST['desc']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);

   
    // Kiểm tra xem có hình ảnh mới không
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        // Xử lý hình ảnh tải lên
        $image = $_FILES['image'];
        $image_name = time() . "_" . $image['name'];
        $target_dir = "assets/img/products/";
        $target_file = $target_dir . basename($image_name);

        // Kiểm tra file có phải là hình ảnh không
        $check = getimagesize($image['tmp_name']);
        if ($check !== false) {
            // Di chuyển file đến thư mục mong muốn
            if (move_uploaded_file($image['tmp_name'], $target_file)) {
                $image_path = "assets/img/products/" . $image_name;
            } else {
                echo "Lỗi khi tải hình ảnh lên.";
                exit();
            }
        } else {
            echo "Tệp không phải là hình ảnh.";
            exit();
        }
    } else {
        // Nếu không có hình ảnh mới, sử dụng hình ảnh cũ
        $sql = "SELECT Image FROM sanpham WHERE ID = $id";
        $result = mysqli_query($conn, $sql);
        
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $image_path = $row['Image']; // Dùng lại đường dẫn hình ảnh cũ
        } else {
            echo "Không tìm thấy sản phẩm!";
            exit();
        }
    }

    // Cập nhật dữ liệu vào database với Prepared Statements
    $stmt = $conn->prepare("UPDATE sanpham SET Name = ?, Price = ?, Describtion = ?, Type = ?, Image = ? WHERE ID = ?");
    $stmt->bind_param("sdsssi", $name, $price, $desc, $type, $image_path, $id);
    if ($stmt->execute()) {
        header("Location: adminproduct.php"); // Chuyển hướng về trang quản lý sản phẩm
        exit();
    } else {
        echo "Lỗi khi cập nhật dữ liệu: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "Dữ liệu không hợp lệ!";
    echo "<pre>";
    print_r($_POST);
    var_dump($_FILES);
    echo "</pre>";
}

mysqli_close($conn);
?>
