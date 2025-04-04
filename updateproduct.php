<?php
    include "connect.php"; // Kết nối database

    // Kiểm tra xem có dữ liệu từ form không
    if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['price']) && isset($_POST['desc']) && isset($_POST['type'])) {
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

        // Cập nhật dữ liệu vào database
        $update_sql = "UPDATE sanpham 
                       SET Name = '$name', Price = '$price', Describtion = '$desc', Type = '$type', Image = '$image_path' 
                       WHERE ID = $id";
        if (mysqli_query($conn, $update_sql)) {
            // Nếu cập nhật thành công, chuyển hướng về trang admin hoặc thông báo thành công
            header("Location: adminproducts.php"); // Thay adminproducts.php bằng trang quản lý sản phẩm của bạn
            exit();
        } else {
            echo "Lỗi khi cập nhật dữ liệu: " . mysqli_error($conn);
        }
    } else {
        echo "Dữ liệu không hợp lệ!";
    }

    mysqli_close($conn);
?>
