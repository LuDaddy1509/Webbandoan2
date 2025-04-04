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
    include_once "./includes/headeradmin.php";
    include_once "./connect.php";
   
include "connect.php"; // Kết nối database

// Kiểm tra xem có ID sản phẩm không
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Chuyển ID về dạng số nguyên để tránh lỗi SQL Injection

    // Truy vấn dữ liệu sản phẩm
    $sql = "SELECT * FROM sanpham WHERE ID = $id";
    $result = mysqli_query($conn, $sql);

    // Kiểm tra sản phẩm có tồn tại không
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result); // Lấy dữ liệu sản phẩm
    } else {
        echo "<h2>Không tìm thấy sản phẩm!</h2>";
        exit(); // Dừng trang nếu không có sản phẩm
    }
} else {
    echo "<h2>Không có sản phẩm nào được chọn!</h2>";
    exit(); // Dừng trang nếu không có ID
}
     ?>

      <!-- adminchangeproduct  -->

      <div class="adminaddproduct">
        <div class="add-product">
          <div class="row">
            <div class="col-12">
              <div class="inner-head">
                <div class="inner-title">CHỈNH SỬA SẢN PHẨM</div>
              </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
              <div class="inner-item">
                <div class="inner-img">
                  <img src="assets/img/products/phobo.jpg" />
                </div>
                <div class="inner-choose">
                  <label for="choose"
                    ><i class="fa-light fa-cloud-arrow-up"></i> Chọn hình
                    ảnh</label
                  >
                  <input
                    id="choose"
                    type="file"
                    accept="image/png, image/jpg, image/jpeg, image/gif"
                  />
                </div>
              </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
              <div class="inner-item">
                <form action="">
                  <div class="form-group">
                    <label for="name">Tên món</label>
                    <input
                      value="Phở bò"
                      type="text"
                      id="name"
                      class="form-control"
                    />
                  </div>
                  <div class="inner-select">
                    <label for="select">Chọn món</label>
                    <select name="Món mặn" id="select">
                      <option>Món chay</option>
                      <option selected>Món mặn</option>
                      <option>Món lẩu</option>
                      <option>Món ăn vặt</option>
                      <option>Món tráng miệng</option>
                      <option>Nước uống</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="sell">Giá bán</label>
                    <input
                      type="text"
                      id="sell"
                      class="form-control"
                      value="50.000 ₫"
                    />
                  </div>
                  <div class="form-group">
                    <label for="desc">Mô tả</label>
                    <textarea name="desc" id="desc" class="form-control">
Phở là món ăn đặc trưng của Việt Nam với nước dùng trong vắt, đậm đà từ xương và gia vị. Sợi phở mềm, thường được ăn kèm với thịt bò hoặc gà thái mỏng, rau thơm, chanh và ớt. Vị thanh mát, thơm ngon của phở khiến người ăn dễ dàng mê mẩn ngay từ lần thử đầu tiên. Phở không chỉ ngon mà còn mang đậm hương vị truyền thống của ẩm thực Việt.</textarea
                    >
                  </div>
                  <div class="inner-add">
                    <button class="inner-nut" onclick="changeMonAn()">
                      <i class="fa-light fa-pencil"></i>Lưu thay đổi
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

        

    <!-- End adminchangeproduct  -->

    <script src="admin/js/jquery.min.js"></script>
    <script src="admin/js/bootstrap.min.js"></script>
    <script src="admin/js/main.js"></script>
    <script src="admin/js/popper.js"></script>
    <script src="assets/js/admin.js"></script>
  </body>
</html>
