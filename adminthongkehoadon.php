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
    include "includes/headeradmin.php";
    ?>

      <!-- admin-hoadon  -->

      <?php 
  include "connect.php";
    $madh = $_GET['madh'];
    
    // ✅ Đổi $Sql thành $sql (hoặc ngược lại, nhưng phải thống nhất)
    $sql = "SELECT ch.*, kh.tenkh, kh.diachi, kh.sodienthoai, sp.Name, sp.Image, dh.trangthai, dh.ngaytao 
            FROM chitietdonhang ch 
            JOIN donhang dh ON ch.madh = dh.madh 
            JOIN khachhang kh ON dh.makh = kh.makh 
            JOIN sanpham sp ON ch.masp = sp.ID 
            WHERE ch.madh = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $madh);
    $stmt->execute();
    $result = $stmt->get_result();
?>
    <?php while($row = $result->fetch_assoc()):?>
      <div class="admin-hoadon">
        <div class="hoadon">
          <div class="inner-head">
            <div class="inner-title">Chi tiết hóa đơn</div>
          </div>
          <div class="container">
            <div class="inner-chitiet">
              <div class="inner-tt">Chi tiết đơn hàng <?= htmlspecialchars($row['madh']);?></div>
              <div class="inner-vc">Ngày đặt hàng: <?= htmlspecialchars($row['ngaytao']);?></div>
            </div>
            <div class="inner-trangthai">
              <div class="inner-ct">
                Trạng thái thanh toán: <i><?= $row['trangthai'];?></i>
              </div>
              <div class="inner-ngay">
                Trạng thái vận chuyển: <i>Đã giao hàng</i>
              </div>
            </div>
            <div class="row">
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="inner-diachi">
                  <div class="inner-ten">ĐỊA CHỈ GIAO HÀNG</div>
                  <div class="inner-gth">
                    <div class="inner-ten"><?=  htmlspecialchars($row['tenkh']);?></div>
                    <div class="inner-dc">
                      Địa chỉ: <?= htmlspecialchars($row['diachi']);?>
                    </div>
                    <div class="inner-sdt">Số điện thoại: <?= htmlspecialchars($row['sodienthoai']);?></div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                <div class="inner-diachi">
                  <div class="inner-ten">THANH TOÁN</div>
                  <div class="inner-gth">
                    <div class="inner-tt">Thanh toán khi giao hàng</div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                <div class="inner-diachi">
                  <div class="inner-ten">GHI CHÚ</div>
                  <div class="inner-gth">
                    <div class="inner-ghichu">Không có ghi chú</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="inner-menu">
            <?php 
    $tongtien = 0;
    $somon = 0;
    while($row = $result->fetch_assoc()):
      $thanhtien = $row['soluong'] * $row['dongia'];
      $tongtien += $thanhtien;
      $somon += $row['soluong'];
  ?>
    <div class="inner-item">
      <div class="inner-info">
        <div class="inner-img">
          <img src="<?= htmlspecialchars($row['Image']); ?>" width="80px" height="80px" />
        </div>
        <div class="inner-chu">
          <div class="inner-ten"><?= htmlspecialchars($row['Name']); ?></div>
          <div class="inner-sl">x<?= $row['soluong']; ?></div>
        </div>
      </div>
      <div class="inner-gia"><?= number_format($thanhtien, 0, ',', '.') ?>.000₫</div>
    </div>
  <?php endwhile; ?>
  
  <!-- Tổng cộng -->
  <div class="inner-tonggia">
    <div class="inner-tien">
      <div class="inner-th">Tiền hàng <span><?= $somon ?> món</span></div>
      <div class="inner-st"><?= number_format($tongtien, 0, ',', '.') ?>.000₫</div>
    </div>
    <div class="inner-vanchuyen">
      <span class="inner-vc1">Vận chuyển</span>
      <span class="inner-vc2">30.000 ₫</span>
    </div>
    <div class="inner-total">
      <span class="inner-tong1">Tổng tiền:</span>
      <span class="inner-tong2"><?= number_format($tongtien + 30, 0, ',', '.') ?>.000₫</span>
    </div>
  </div>      
            </div>
          </div>
        </div>
      </div>
<?php endwhile; ?>
    <!-- End admin-hoadon  -->

    <script src="admin/js/jquery.min.js"></script>
    <script src="admin/js/bootstrap.min.js"></script>
    <script src="admin/js/main.js"></script>
    <script src="admin/js/popper.js"></script>
    <script src="assets/js/admin.js"></script>
  </body>
</html>
