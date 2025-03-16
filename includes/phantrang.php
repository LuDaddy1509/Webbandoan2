<?php
    include "connect.php";

    // Số sản phẩm trên mỗi trang
    $limit = 12;

    // Xác định trang hiện tại (mặc định là 1)
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $page = max($page, 1); // Đảm bảo trang không nhỏ hơn 1

    // Tính OFFSET
    $offset = ($page - 1) * $limit;

    // Truy vấn danh sách sản phẩm theo phân trang
    $stmt = $conn->prepare("SELECT * FROM sanpham LIMIT ? OFFSET ?");
    $stmt->bind_param("ii", $limit, $offset);
    $stmt->execute();
    $result = $stmt->get_result();
     // Lấy tổng số sản phẩm để tính tổng số trang (chỉ cần tính 1 lần)
     $total_result = $conn->query("SELECT COUNT(*) as total FROM sanpham");
     $total_row = $total_result->fetch_assoc();
     $total_products = $total_row['total'];
     $total_pages = ($total_products > 0) ? ceil($total_products / $limit) : 1;
     // Hiển thị nút trang đầu tiên
     if ($page >= 1) {
        echo '<li><a href="?page=1" class="inner-trang">1</a></li>';
    }

    // Hiển thị dấu "..." nếu trang hiện tại lớn hơn 3
    if ($page > 3) {
        echo '<li><span>...</span></li>';
    }

    // Tính toán phạm vi các trang cần hiển thị
    $start_page = max(2, $page - 1); // Bắt đầu từ trang 2 hoặc trang hiện tại trừ 1
    $end_page = min($total_pages - 1, $page + 1); // Kết thúc ở trang cuối cùng trừ 1 hoặc trang hiện tại cộng 1

    // Hiển thị các trang trong phạm vi
    for ($i = $start_page; $i <= $end_page; $i++) {
        $active_class = ($i == $page) ? 'trang-chinh' : '';
        echo '<li><a href="?page=' . $i . '" class="inner-trang ' . $active_class . '">' . $i . '</a></li>';
    }

    // Hiển thị dấu "..." nếu trang hiện tại nhỏ hơn tổng số trang trừ 2
    if ($page < $total_pages - 2) {
        echo '<li><span>...</span></li>';
    }

    // Hiển thị nút trang cuối cùng
    if ($page < $total_pages) {
        echo '<li><a href="?page=' . $total_pages . '" class="inner-trang">' . $total_pages . '</a></li>';
    }
?>
