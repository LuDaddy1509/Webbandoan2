<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />

    <link
      rel="stylesheet"
      href="assets/font-awesome-pro-v6-6.2.0/css/all.min.css"
    />
    <link rel="stylesheet" href="assets/css/base.css" />
    <link rel="stylesheet" href="assets/css/style.css" />

    <title>Đặc sản 3 miền</title>
    <link href="./assets/img/logo.png" rel="icon" type="image/x-icon" />
  </head>

  <body>
    <!-- header top  -->
    <?php 
    include "includes/headerlogin.php";
    ?>
    <!-- End header bottom  -->

    <!-- Account -->

    <div class="ThongTin">
      <div class="container">
        <div class="row">
          <form action="thanhtoan.php" method="post">
          <div class="col-xl-7 col-lg-7 col-md-6 col-sm-12">
            
            <div class="inner-item">
              <div class="inner-tt">Giỏ hàng</div>
              <?php 
            include "connect.php";
            if(isset($_SESSION['makh'])){
              $makh = $_SESSION['makh'];
              $sql = "SELECT g.soluong,sp.Name,sp.Image,sp.Price FROM giohang g JOIN sanpham sp ON g.masp = sp.ID WHERE g.makh = ?;";
              $stmt = $conn->prepare($sql);
              $stmt->bind_param("i",$makh);
              $stmt->execute();
              $result = $stmt->get_result();
              while ($row = $result->fetch_assoc()) {
                $ten = htmlspecialchars($row['Name']);
                $soluong = $row['soluong'];
                $gia = number_format($row['Price'], 0, ',', '.') . ".000₫";
                $hinhanh = htmlspecialchars($row['Image']);
                echo '
                <div class="inner-gth">
                    <div class="inner-img">
                        <img src="'. $hinhanh .'" />
                    </div>
                    <div class="inner-mota">
                        <div class="inner-ten">' . $ten . '</div>
                        <div class="inner-sl">Số lượng: ' . $soluong . '</div>
                        <div class="inner-gia">' . $gia . '</div>
                    </div>
                </div>';
            }}
            ?>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="inner-item">
                    <div class="inner-tt">Thông tin khách hàng</div>
                    <div class="row">
                      <?php 
                      include "connect.php";
                      if(!isset($_SESSION['makh'])){

                      }
                        $makh = $_SESSION['makh'];
                        $sql = "SELECT kh.tenkh,kh.diachi,kh.sodienthoai FROM khachhang kh WHERE kh.makh = ? ";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("i",$makh);
                        $stmt->execute();
                        $result = $stmt->get_result();
                      ?>
                      <?php while($row = $result->fetch_assoc()): ?>
                      <div class="col-xl-12">
                        <div class="form-group">
                          <label for="name">Họ và tên:</label>
                          <input
                            type="text"
                            id="name"
                            class="form-control"
                            value="<?= htmlspecialchars($row['tenkh']); ?>"
                          />
                        </div>
                      </div>
                      <div class="col-xl-12">
                      <div class="form-group">
                          <label for="sdt">Số điện thoại:</label>
                          <input
                            type="text"
                            id="sdt"
                            class="form-control"
                            value="<?= htmlspecialchars($row['sodienthoai']); ?>"
                          />
                        </div>
                      </div>
                      <div class="col-xl-12">
                        <div class="form-group">
                          <label for="diachi">Địa chỉ:</label>
                          <input
                            type="text"
                            id="diachi"
                            class="form-control"
                            value="<?= htmlspecialchars($row['diachi']); ?>"
                          />
                        </div>
                      </div>
                      <div class="col-xl-12">
                        <div class="form-group">
                          <label for="ghichu">Ghi chú đơn hàng:</label>
                          <textarea
                            type="text"
                            id="ghichu"
                            class="form-control"
                            placeholder="Ghi chú"
                            name="ghichu"
                          ></textarea>
                        </div>
                      </div>
                    </div>
                    <?php endwhile; ?>
                </div>
              </div>

              <div class="col-12">
                <div class="inner-item">
                  <div class="PhuongThuc">
                    <div class="inner-body">
                      <div class="inner-tt">Phương thức thanh toán</div>
                      <div class="form-check">
                      <div class="accordion" id="accordionFaqs">
                      <div class="card">
                      <input class="form-check-input" type="radio" name="pttt" id="pttt_tienmat" value="Tiền mặt" required>
                      <label class="form-check-label" for="pttt_tienmat">Thanh toán tiền mặt khi nhận hàng</label>
                      </div>
                      </div>
                     </div>
                      <div class="form-check">
                      <input class="form-check-input" type="radio" name="pttt" id="pttt_chuyenkhoan" value="Chuyển khoản">
                      <label class="form-check-label" for="pttt_chuyenkhoan">Chuyển khoản ngân hàng</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12">
            <?php 
            include "connect.php";
            if(!isset($_SESSION['makh'])){

            }
            $sumtotal = 0;
            $makh = $_SESSION['makh'];
            $sql1 = "SELECT SUM(soluong) AS tong_mon, SUM(tongtien) AS tong_tien FROM giohang  WHERE makh = ? ";
            $stmt1 = $conn->prepare($sql1);
            $stmt1->bind_param("i",$makh);
            $stmt1->execute();
            $result1 = $stmt1->get_result();
            if ($row1 = $result1->fetch_assoc()): 
              $tong_mon = $row1['tong_mon'];
              $tien_so = $row1['tong_tien']; // Số nguyên
              $tong_tien = number_format($tien_so, 0, ',', '.') . ".000₫";
            ?>
            <div class="inner-item">
              <div class="inner-tien">
                <div class="inner-th">Tiền hàng <span> <?= $tong_mon; ?> món </span></div>
                <div class="inner-st" name="tongtien"><?= $tong_tien;?> </div>
                <input type="hidden" name="tongtien" value="<?= $tien_so; ?>">
                </div>
              
              <div class="inner-tientong">
                <div class="inner-tong">Tổng tiền</div>
                <div class="inner-total"></div>
              </div>
              <button type="submit" class="button" name="thanhtoan">Thanh toán</button>
              </div>
            <?php endif;?>
          </div>
          </form>
          <?php 
include "connect.php";
if (isset($_SESSION['makh']) && isset($_POST['thanhtoan']) && isset($_POST['pttt']) && isset($_POST['tongtien'])) {
    $makh = $_SESSION['makh'];
    $pt = $_POST['pttt'];
    $tongtien = $_POST['tongtien'];
    $ghichu = isset($_POST['ghichu']) ? $_POST['ghichu'] : "";

    // Thêm đơn hàng vào bảng donhang
    $sql = "INSERT INTO donhang(makh, tongtien, PT, ghichu) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiss", $makh, $tongtien, $pt, $ghichu);

    if ($stmt->execute()) {
        $last_id = $conn->insert_id;

        // Lấy giỏ hàng
        $sql2 = "SELECT masp, soluong, dongia, tongtien FROM giohang WHERE makh = ?";
        $stmt2 = $conn->prepare($sql2);
        $stmt2->bind_param("i", $makh);
        $stmt2->execute();
        $result2 = $stmt2->get_result();

        while ($row2 = $result2->fetch_assoc()) {
            $sql3 = "INSERT INTO chitietdonhang (madh, masp, soluong, dongia, tongtien) VALUES (?, ?, ?, ?, ?)";
            $stmt3 = $conn->prepare($sql3);
            $stmt3->bind_param("iiidd", $last_id, $row2['masp'], $row2['soluong'], $row2['dongia'], $row2['tongtien']);
            $stmt3->execute();
        }

        // Xóa giỏ hàng
        $sqlDelete = "DELETE FROM giohang WHERE makh = ?";
        $stmtDelete = $conn->prepare($sqlDelete);
        $stmtDelete->bind_param("i", $makh);
        $stmtDelete->execute();
        header("location: login.php");
        exit();
    } else {
        die("Lỗi khi thêm đơn hàng: " . $stmt->error);
    }
} 
?>


        </div>
      </div>
    </div>

    <!-- End Account -->

    <!-- Footer-top -->
     <?php 
     include "includes/footer.php";
     
     ?>
    <!-- End Footer-bottom -->

    <script
      src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
      integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
      integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
      integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
      crossorigin="anonymous"
    ></script>

    <script src="assets/js/main.js"></script>
  </body>
</html>
