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

      <!-- adminstatistical  -->

      <div class="admin-statistical">
        <div class="admin-control">
          <div class="admin-control-left">
            <select name="the-loai-tk" id="the-loai-tk" onchange="thongKe()">
              <option>Tất cả</option>
              <option>Món chay</option>
              <option>Món mặn</option>
              <option>Món lẩu</option>
              <option>Món ăn vặt</option>
              <option>Món tráng miệng</option>
              <option>Nước uống</option>
              <option>Món khác</option>
            </select>
          </div>
          <div class="admin-control-center">
            <form action="" class="form-search">
              <span class="search-btn"
                ><i class="fa-light fa-magnifying-glass"></i
              ></span>
              <input
                id="form-search-tk"
                type="text"
                class="form-search-input"
                placeholder="Tìm kiếm tên món..."
                oninput="thongKe()"
              />
            </form>
          </div>
          <div class="admin-control-right">
            <form action="" class="fillter-date">
              <div>
                <label for="time-start">Từ</label>
                <input
                  type="date"
                  class="form-control-date"
                  id="time-start-tk"
                  onchange="thongKe()"
                />
              </div>
              <div>
                <label for="time-end">Đến</label>
                <input
                  type="date"
                  class="form-control-date"
                  id="time-end-tk"
                  onchange="thongKe()"
                />
              </div>
            </form>
            <button class="reset-order" onclick="thongKe(1)">
              <i class="fa-regular fa-arrow-up-short-wide"></i>
            </button>
            <button class="reset-order" onclick="thongKe(2)">
              <i class="fa-regular fa-arrow-down-wide-short"></i>
            </button>
            <a href="adminstatistical.html" class="reset-order"
              ><i class="fa-light fa-arrow-rotate-right"></i
            ></a>
          </div>
        </div>
        <?php
include "connect.php";
$sql1 = "SELECT COUNT(DISTINCT masp) AS tong_sp_khong_trung FROM chitietdonhang";
$result1 = $conn->query($sql1);
$tong_sp_khong_trung = ($result1 && $row1 = $result1->fetch_assoc()) ? $row1['tong_sp_khong_trung'] : 0;
$sql2 = "SELECT SUM(soluong) AS tong_soluong_san_pham FROM chitietdonhang";
$result2 = $conn->query($sql2);
$tong_soluong_san_pham = ($result2 && $row2 = $result2->fetch_assoc()) ? $row2['tong_soluong_san_pham'] : 0;
$sql3 = "SELECT SUM(tongtien) AS tong_doanh_thu FROM donhang";
$result3 = $conn->query($sql3);
$tong_doanh_thu = ($result3 && $row3 = $result3->fetch_assoc()) ? $row3['tong_doanh_thu'] : 0;
?>
<div class="order-statistical">
  <div class="row">
    <!-- Sản phẩm bán ra -->
    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
      <div class="order-statistical-item">
        <div class="order-statistical-item-content">
          <p class="order-statistical-item-content-desc">Sản phẩm được bán ra</p>
          <h4 class="order-statistical-item-content-h" id="quantity-product">
            <?= htmlspecialchars($tong_sp_khong_trung); ?>
          </h4>
        </div>
        <div class="order-statistical-item-icon">
          <i class="fa-light fa-salad"></i>
        </div>
      </div>
    </div>

    <!-- Số lượng bán ra -->
    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
      <div class="order-statistical-item">
        <div class="order-statistical-item-content">
          <p class="order-statistical-item-content-desc">Số lượng bán ra</p>
          <h4 class="order-statistical-item-content-h" id="quantity-order">
            <?= htmlspecialchars($tong_soluong_san_pham); ?>
          </h4>
        </div>
        <div class="order-statistical-item-icon">
          <i class="fa-light fa-file-lines"></i>
        </div>
      </div>
    </div>

    <!-- Doanh thu -->
    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
      <div class="order-statistical-item">
        <div class="order-statistical-item-content">
          <p class="order-statistical-item-content-desc">Doanh thu</p>
          <h4 class="order-statistical-item-content-h" id="quantity-sale">
            <?= number_format($tong_doanh_thu, 0, ',', '.') . '.000₫'; ?>
          </h4>
        </div>
        <div class="order-statistical-item-icon">
          <i class="fa-light fa-dollar-sign"></i>
        </div>
      </div>
    </div>
  </div>
</div>
        <div class="table">
          <table width="100%">
            <thead>
              <tr>
                <td>Mã khách hàng</td>
                <td>Tên khách hàng</td>
                <td>Doanh thu</td>
                <td>Đơn hàng</td>
              </tr>
            </thead>
            <?php
include "connect.php";
$limit = 10;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max($page, 1);
$offset = ($page - 1) * $limit;
$total_result = $conn->query("SELECT COUNT(*) as total FROM khachhang");
$total_row = $total_result->fetch_assoc();
$total_kh = $total_row['total'];
$total_pages = ceil($total_kh / $limit);
$stmt = $conn->prepare("SELECT * FROM khachhang LIMIT ? OFFSET ?");
$stmt->bind_param("ii", $limit, $offset);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()): 
?>
            <tbody>
              <tr>
                <td><?= $row['makh'];?></td>
                <td><?= $row['tenkh'];?></td>
                <td>
                  <?php 
                  include "connect.php";
                  $makh = intval($row['makh']);
                  $sql1 = "SELECT SUM(tongtien) AS totalPrice FROM donhang WHERE makh = ?;";
                  $stmt1 = $conn->prepare($sql1);
                  $stmt1->bind_param("i",$makh);
                  $stmt1->execute();
                  $result1 = $stmt1->get_result();
                  $row1 = $result1->fetch_assoc();
                  $totalPrice = $row1['totalPrice'];
                  echo number_format($totalPrice, 0, ',', '.') . '.000₫';?>
                </td>
                <td>
                  <a
                    href=""
                    class="btn-detail product-order-detail"
                  >
                    <i class="fa-regular fa-eye"></i> Chi tiết
                  </a>
                </td>
              </tr>
            </tbody>
            <?php endwhile; ?>
          </table>
        </div>
        <div class="Pagination">
  <div class="container">
    <ul>
      <?php for ($i = 1; $i <= $total_pages; $i++): ?>
        <li>
          <a href="?page=<?= $i ?>" class="inner-trang <?= ($i == $page) ? 'trang-chinh' : '' ?>">
            <?= $i ?>
          </a>
        </li>
      <?php endfor; ?>
    </ul>
  </div>
</div>
    <script src="admin/js/jquery.min.js"></script>
    <script src="admin/js/bootstrap.min.js"></script>
    <script src="admin/js/main.js"></script>
    <script src="admin/js/popper.js"></script>
    <script src="assets/js/admin.js"></script>
  </body>
</html>
