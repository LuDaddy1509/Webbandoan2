<?php
    include "database/CustomerDBconnect.php";
    $this_id = $_GET['this_id'];

    // Nếu đã xác nhận xoá
    if (isset($_GET['confirm']) && $_GET['confirm'] === 'yes') {
        $delete_sql = "DELETE FROM sanpham WHERE ID = '$this_id'";
        mysqli_query($conn, $delete_sql);
        header('Location: adminproduct.php');
        exit();
    }

    // Kiểm tra sản phẩm đã được bán chưa
    $check_sql = "SELECT * FROM chitietdonhang WHERE masp = '$this_id'";
    $check_result = mysqli_query($conn, $check_sql);

    if (mysqli_num_rows($check_result) > 0) {
        // Nếu sản phẩm đã bán → ẩn sản phẩm
        $update_sql = "UPDATE sanpham SET Visible = 0 WHERE ID = '$this_id'";
        mysqli_query($conn, $update_sql);
        header('Location: adminproduct.php');
        exit();
    } else {
        // Sản phẩm chưa bán → hỏi xác nhận xoá
        echo "<script>
            if (confirm('Bạn có chắc chắn muốn xoá sản phẩm này không?')) {
                window.location.href = 'deleteproduct.php?this_id=$this_id&confirm=yes';
            } else {
                window.location.href = 'adminproduct.php';
            }
        </script>";
        exit();
    }
?>
