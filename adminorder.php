<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
      integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="assets/font-awesome-pro-v6-6.2.0/css/all.min.css" />
    <link rel="stylesheet" href="admin/css/style.css" />
    <link rel="stylesheet" href="assets/css/base.css" />
    <link rel="stylesheet" href="assets/css/admin.css" />
    <title>Admin</title>
    <link href="./assets/img/logo.png" rel="icon" type="image/x-icon" />
  </head>
  <body>
    <?php
include_once "./includes/headeradmin.php";

    ?>

    <!-- adminorder -->
    <div class="admin-order">
      <div class="admin-control">
        <div class="admin-control-left">
          <select name="tinh-trang-user" id="tinh-trang-user">
            <option value="0">Tất cả</option>
            <option value="1">Chưa xử lý</option>
            <option value="2">Đã xác nhận</option>
            <option value="3">Đã giao thành công</option>
            <option value="4">Đã huỷ</option>
          </select>

        </div>
        <div class="admin-control-center">
          <form action="">
            <span class="search-btn"><i class="fa-light fa-magnifying-glass"></i></span>
            <input
              id="form-search-product"
              type="text"
              class="form-search-input"
              placeholder="Tìm kiếm đơn hàng..."
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
                id="time-start-user"
                onchange="showUser()"
              />
            </div>
            <div>
              <label for="time-end">Đến</label>
              <input
                type="date"
                class="form-control-date"
                id="time-end-user"
                onchange="showUser()"
              />
            </div>
          </form>
          <a href="adminorder.php" class="reset-order"><i class="fa-light fa-arrow-rotate-right"></i></a>
        </div>
      </div>

      <div class="table">
        <table width="100%">
          <thead>
            <tr>
              <td>Mã đơn</td>
              <td>Khách hàng</td>
              <td>Ngày đặt</td>
              <td>Tổng tiền</td>
              <td>Trạng thái</td>
              <td>Thao tác</td>
            </tr>
          </thead>
          <tbody id="showOrder">
            <tr>
              <td>DH1</td>
              <td>Thanh</td>
              <td>20/11/2024</td>
              <td>100.000 ₫</td>
              <td><span id="order-status-1" class="status-complete">Đã giao thành công</span></td>
              <td class="control">
                <a href="adminchitiet.php" class="btn-detail">
                  <i class="fa-regular fa-eye"></i> Chi tiết
                </a>
              </td>
            </tr>
            <tr>
              <td>DH2</td>
              <td>Nguyen Dai</td>
              <td>12/11/2024</td>
              <td>75.000 ₫</td>
              <td><span class="status-complete">Đã giao thành công</span></td>
              <td class="control">
                <a href="adminchitiet.php" class="btn-detail">
                  <i class="fa-regular fa-eye"></i> Chi tiết
                </a>
              </td>
            </tr>
            <tr>
              <td>DH3</td>
              <td>Nguyen Hoang</td>
              <td>28/11/2024</td>
              <td>80.000 ₫</td>
              <td><span class="status-middle-complete">Đã xác nhận</span></td>
              <td class="control">
                <a href="adminchitiet.php" class="btn-detail">
                  <i class="fa-regular fa-eye"></i> Chi tiết
                </a>
              </td>
            </tr>
            <tr>
              <td>DH4</td>
              <td>Dang Khoa</td>
              <td>21/11/2024</td>
              <td>540.000 ₫</td>
              <td><span class="status-no-complete">Chưa xử lý</span></td>
              <td class="control">
                <a href="adminchitiet.php" class="btn-detail">
                  <i class="fa-regular fa-eye"></i> Chi tiết
                </a>
              </td>
            </tr>
            <tr>
              <td>DH5</td>
              <td>Lu Nhan</td>
              <td>22/11/2024</td>
              <td>75.000 ₫</td>
              <td><span class="status-no-complete">Chưa xử lý</span></td>
              <td class="control">
                <a href="adminchitiet.php" class="btn-detail">
                  <i class="fa-regular fa-eye"></i> Chi tiết
                </a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

    </div>
    <!-- End adminorder -->

    <script src="admin/js/jquery.min.js"></script>
    <script src="admin/js/bootstrap.min.js"></script>
    <script src="admin/js/main.js"></script>
    <script src="admin/js/popper.js"></script>
    <script src="assets/js/admin.js"></script>
  </body>
</html>