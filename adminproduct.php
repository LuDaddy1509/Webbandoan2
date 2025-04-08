<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- <title>Sidebar 09</title> -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
      integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N"
      crossorigin="anonymous"
    />

    <link
      rel="stylesheet"
      href="assets/font-awesome-pro-v6-6.2.0/css/all.min.css"
    />

    <link rel="stylesheet" href="admin/css/style.css" />
    <link rel="stylesheet" href="assets/css/base.css" />
    <link rel="stylesheet" href="assets/css/admin.css" />

    <title>Admin</title>
    <link href="./assets/img/logo.png" rel="icon" type="image/x-icon" />
  </head>

  <body>
    <?php
    include_once "includes/headeradmin.php";
    ?>
    <script>
function fetchProducts() {
    var category = document.getElementById("the-loai").value;
    var searchTerm = document.getElementById("form-search-product").value;

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "./includes/searchadmin.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById("product-results").innerHTML = xhr.responseText;
        }
    };

    xhr.send("category=" + encodeURIComponent(category) + "&search=" + encodeURIComponent(searchTerm));
}
</script>
      <!-- adminproduct  -->

        <div class="admin-product">
    <div class="admin-control">
        <div class="admin-control-left">
            <select name="the-loai" id="the-loai" onchange="fetchProducts()">
                <option value="">Tất cả</option>
                <option value="món chay">Món chay</option>
                <option value="món mặn">Món mặn</option>
                <option value="món lẩu">Món lẩu</option>
                <option value="món ăn vặt">Món ăn vặt</option>
                <option value="món tráng miệng">Món tráng miệng</option>
                <option value="nước uống">Nước uống</option>
                <option value="hải sản">Hải sản</option>
            </select>
        </div>
        <div class="admin-control-center">
            <form onsubmit="fetchProducts(); return false;">
                <span class="search-btn"><i class="fa-light fa-magnifying-glass"></i></span>
                <input id="form-search-product" type="text" class="form-search-input" placeholder="Tìm kiếm tên món..." oninput="fetchProducts()"/>
            </form>
        </div>
        <div class="admin-control-right">
            <a href="adminproduct.php" class="inner-nut"><i class="fa-light fa-rotate-right"></i> Làm mới</a>
            <a href="adminaddproduct.php" class="inner-nut"><i class="fa-light fa-plus"></i> Thêm món mới</a>
        </div>
    </div>
    <!-- Kết quả tìm kiếm -->
<div id="product-results"></div>

        <div class="show-product">
    <div class="row">
        <?php
        include "connect.php";

        // Xác định số sản phẩm trên mỗi trang
        $limit = 12;

        // Xác định trang hiện tại (nếu không có thì mặc định là trang 1)
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $start = ($page - 1) * $limit;

        // Lấy tổng số sản phẩm
        $total_query = "SELECT COUNT(*) AS total FROM sanpham";
        $total_result = mysqli_query($conn, $total_query);
        $total_row = mysqli_fetch_assoc($total_result);
        $total_products = $total_row['total'];

        // Tính tổng số trang
        $total_pages = ceil($total_products / $limit);

        // Lấy danh sách sản phẩm cho trang hiện tại
        $sql = "SELECT * FROM sanpham ORDER BY ID DESC LIMIT $start, $limit";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_array($result)) {
        ?>
            <div class="col-12">
                <div class="list">
                    <div class="list-left">
                        <img src="<?php echo $row['Image']; ?>" alt="<?php echo $row['Name']; ?>" />
                        <div class="list-info">
                            <h4><?php echo $row['Name']; ?></h4>
                            <p><?php echo $row['Describtion']; ?></p>
                            <div class="list-category"><?php echo $row['Type']; ?></div>
                        </div>
                    </div>
                    <div class="list-right">
                        <div class="list-price"><?php echo $row['Price'] . ".000₫"; ?></div>
                        <div class="list-control">
                            <div class="list-tool">
                                <a href="adminchangeproduct.php?id=<?= $row['ID']; ?>" class="btn-edit">
                                    <i class="fa-light fa-pen-to-square"></i>
                                </a>
                                <a class="btn-delete" href="deleteproduct.php?this_id=<?php echo $row['ID']; ?>">
                                    <i class="fa-regular fa-trash"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
        <!-- Pagination -->

        <div class="Pagination">
    <div class="container">
        <ul>
        <?php
    // Hiển thị tất cả các trang từ 1 đến tổng số trang
    for ($i = 1; $i <= $total_pages; $i++) {
        $active_class = ($i == $page) ? 'trang-chinh' : '';
        echo '<li><a href="?page=' . $i . '" class="inner-trang ' . $active_class . '">' . $i . '</a></li>';
    }
?>
        </ul>
    </div>
</div>

    <!-- End adminproduct  -->

    <script src="admin/js/jquery.min.js"></script>
    <script src="admin/js/bootstrap.min.js"></script>
    <script src="admin/js/main.js"></script>
    <script src="admin/js/popper.js"></script>
    <script src="assets/js/admin.js"></script>
  </body>
</html>
