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
      <!-- adminthongkechitiet  -->

      <div class="adminthongkechitiet">
        <div class="admin-control">
          <div class="admin-control-center">
            <form action="" class="form-search">
              <span class="search-btn"
                ><i class="fa-light fa-magnifying-glass"></i
              ></span>
              <input
                id="form-search-tk"
                type="text"
                class="form-search-input"
                placeholder="Tìm kiếm hóa đơn..."
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
            <a href="adminthongkechitiet.html" class="reset-order"
              ><i class="fa-light fa-arrow-rotate-right"></i
            ></a>
          </div>
        </div>

        <?php 
include "connect.php";

// Số đơn hàng mỗi trang
$limit = 10;

// Lấy số trang hiện tại từ URL, mặc định là 1
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;

// Tính vị trí bắt đầu lấy dữ liệu
$offset = ($page - 1) * $limit;

// Lấy tổng số đơn hàng
$totalSql = "SELECT COUNT(*) AS total FROM donhang";
$totalResult = $conn->query($totalSql);
$totalRow = $totalResult->fetch_assoc();
$totalRecords = $totalRow['total'];
$totalPages = ceil($totalRecords / $limit);

// Lấy danh sách đơn hàng cho trang hiện tại
$sql = "SELECT dh.madh, dh.ngaytao, dh.tongtien FROM donhang dh ORDER BY dh.ngaytao DESC LIMIT ? OFFSET ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $limit, $offset);
$stmt->execute();
$result = $stmt->get_result();
?>

        <div class="table">
          <table width="100%">
            <thead>
              <tr>
                <td>Hóa đơn</td>
                <td>Ngày đặt</td>
                <td>Tổng tiền</td>
                <td>Thao tác</td>
              </tr>
            </thead>
            <tbody id="showOrder">
             <?php while($row = $result->fetch_assoc()):?>
              <tr>
              <td><?= htmlspecialchars($row['madh']) ?></td>
              <td><?= htmlspecialchars($row['ngaytao']) ?></td>
              <td><?= number_format($row['tongtien'], 0, ',', '.') ?>.000₫</td>
                <td class="control">
                <a href="adminthongkehoadon.php?madh=<?= urlencode($row['madh']) ?>" class="btn-detail">
                <i class="fa-regular fa-eye"></i> Chi tiết
                  </a>
                </td>
              </tr>
              <?php endwhile; ?>

            </tbody>
          </table>
        </div>

        <!-- Modal statistical -->
        <!-- End Modal statistical -->
        <div class="Pagination">
  <ul>
    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
    <li>
      <a href="?page=<?= $i ?>" class="inner-trang <?= $i == $page ? 'trang-chinh' : '' ?>">
        <?= $i ?>
      </a>
    </li>
    <?php endfor; ?>
  </ul>
</div>


    <!-- End adminthongkechitiet  -->

    <script src="jquery.min.js"></script>
    <script src="admin/js/bootstrap.min.js"></script>
    <script src="admin/js/main.js"></script>
    <script src="admin/js/popper.js"></script>
    <script src="assets/js/admin.js"></script>
  </body>
</html>
