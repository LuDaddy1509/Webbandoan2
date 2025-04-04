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

<!-- adminchangeproduct -->

<div class="adminaddproduct">
    <div class="add-product">
        <div class="row">
            <div class="col-12">
                <div class="inner-head">
                    <div class="inner-title">CHỈNH SỬA SẢN PHẨM</div>
                </div>
            </div>
           
            <script>
    function previewImage(event) {
    var file = event.target.files[0];
    if (file) {
        var reader = new FileReader();
        reader.onload = function () {
            var output = document.getElementById('product-image');
            output.src = reader.result;
        }
        reader.readAsDataURL(file);
    } else {
        alert("Chưa chọn ảnh!");
    }
}

</script>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="inner-item">
        <form action="updateproduct.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <div class="inner-img">
                    <!-- Hiển thị hình ảnh hiện tại -->
                    <img id="product-image" src="<?php echo $row['Image']; ?>" alt="Product Image" />
                </div>
                <div class="inner-choose">
                    <label for="choose"><i class="fa-light fa-cloud-arrow-up"></i> Chọn hình ảnh</label>
                    <!-- Thêm thuộc tính name cho input file -->
                    <input id="choose" type="file" name="image" accept="image/png, image/jpg, image/jpeg, image/gif" onchange="previewImage(event)" />
                </div>
            </div>
            <div class="form-group">
                <label for="name">Tên món</label>
                <input type="text" name="name" id="name" class="form-control" value="<?php echo htmlspecialchars($row['Name']); ?>" />
            </div>
            <div class="inner-select">
                <label for="select">Chọn món</label>
                <select name="type" id="select" class="form-control">
                    <option value="món chay" <?php echo ($row['Type'] == 'món chay') ? 'selected' : ''; ?>>Món chay</option>
                    <option value="món mặn" <?php echo ($row['Type'] == 'món mặn') ? 'selected' : ''; ?>>Món mặn</option>
                    <option value="món lẩu" <?php echo ($row['Type'] == 'món lẩu') ? 'selected' : ''; ?>>Món lẩu</option>
                    <option value="món ăn vặt" <?php echo ($row['Type'] == 'món ăn vặt') ? 'selected' : ''; ?>>Món ăn vặt</option>
                    <option value="món tráng miệng" <?php echo ($row['Type'] == 'món tráng miệng') ? 'selected' : ''; ?>>Món tráng miệng</option>
                    <option value="nước uống" <?php echo ($row['Type'] == 'nước uống') ? 'selected' : ''; ?>>Nước uống</option>
                    <option value="hải sản" <?php echo ($row['Type'] == 'hải sản') ? 'selected' : ''; ?>>Hải sản</option>
                </select>
            </div>
            <div class="form-group">
                <label for="sell">Giá bán</label>
                <input type="text" name="price" id="sell" class="form-control" value="<?php echo htmlspecialchars($row['Price']); ?>" />
            </div>
            <div class="form-group">
                <label for="desc">Mô tả</label>
                <textarea name="desc" id="desc" class="form-control"><?php echo htmlspecialchars($row['Describtion']); ?></textarea>
            </div>
            <input type="hidden" name="id" value="<?php echo $id; ?>" />
            <div class="inner-add">
                <button type="submit" class="inner-nut"><i class="fa-light fa-pencil"></i> Lưu thay đổi</button>
            </div>
        </form>
    </div>
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
