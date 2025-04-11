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
    include 'connect.php';

    // Handle POST request for filtering
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $ma_don_hang = isset($_POST["ma_don_hang"]) ? $_POST["ma_don_hang"] : "";
        $trang_thai = isset($_POST["tinh_trang"]) ? $_POST["tinh_trang"] : "";
        $tinh_thanh = isset($_POST["tinh_thanh"]) ? $_POST["tinh_thanh"] : "";
        $quan_huyen = isset($_POST["quan_huyen"]) ? $_POST["quan_huyen"] : "";
        $time_start = isset($_POST["time_start"]) ? $_POST["time_start"] : "";
        $time_end = isset($_POST["time_end"]) ? $_POST["time_end"] : "";

        $query = "SELECT * FROM donhang WHERE 1=1";
        if (!empty($ma_don_hang)) {
            $query .= " AND madh = '$ma_don_hang'";
        }
        if (!empty($trang_thai)) {
            $query .= " AND trangthai = '$trang_thai'";
        }
        if (!empty($tinh_thanh)) {
            $query .= " AND tinh_thanhpho = '$tinh_thanh'";
        }
        if (!empty($quan_huyen)) {
            $query .= " AND quan_huyen = '$quan_huyen'";
        }
        if (!empty($time_start) && !empty($time_end)) {
            $query .= " AND ngaytao BETWEEN '$time_start' AND '$time_end'";
        }

        $result = mysqli_query($conn, $query);
        if (!$result) {
            die("Lỗi truy vấn SQL: " . mysqli_error($conn));
        }

        $output = '<table width="100%"><thead><tr><td>Mã đơn</td><td>Khách hàng</td><td>Ngày đặt</td><td>Tổng tiền</td><td>Trạng thái</td><td>Thao tác</td></tr></thead><tbody id="showOrder">';
        $status_map = [
            'Chưa xác nhận' => 'status-no-complete',
            'Đã xác nhận' => 'status-middle-complete',
            'Đã giao thành công' => 'status-complete',
            'Đã hủy đơn' => 'status-destroy-complete'
        ];
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $status_class = $status_map[$row['trangthai']] ?? 'status-unknown';
                $output .= "<tr>
                    <td>DH{$row['madh']}</td>
                    <td>{$row['makh']}</td>
                    <td>" . date('d/m/Y', strtotime($row['ngaytao'])) . "</td>
                    <td>" . number_format($row['tongtien'], 0, ',', '.') . ".000 ₫</td>
                    <td><span class='{$status_class}' id='status-{$row['madh']}'>{$row['trangthai']}</span></td>
                    <td class='control'>
                        <a href='adminchitiet.php?madh={$row['madh']}' class='btn-detail'>
                            <i class='fa-regular fa-eye'></i> Chi tiết
                        </a>
                    </td>
                </tr>";
            }
        } else {
            $output .= '<tr><td colspan="6">Không tìm thấy kết quả.</td></tr>';
        }
        $output .= '</tbody></table>';
        echo $output;
        exit;
    }

    // Fetch all orders for initial display
    $sql = "SELECT madh, makh, ngaytao, tongtien, trangthai FROM donhang";
    $result = $conn->query($sql);
    $status_map = [
        'Chưa xác nhận' => ['Chưa xác nhận', 'status-no-complete'],
        'Đã xác nhận' => ['Đã xác nhận', 'status-middle-complete'],
        'Đã giao thành công' => ['Đã giao thành công', 'status-complete'],
        'Đã hủy đơn' => ['Đã hủy đơn', 'status-destroy-complete']
    ];
    $next_status = [
        'Chưa xác nhận' => ['Đã xác nhận', 'Đã hủy đơn'],
        'Đã xác nhận' => ['Đã giao thành công', 'Đã hủy đơn']
    ];
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
          <!-- Added Province/City and District Dropdowns -->
          <select name="tinh_thanh" id="tinh_thanh" onchange="fetchDistricts()">
            <option value="">Tỉnh/Thành phố</option>
            <!-- Populate dynamically or statically based on your data -->
            <option value="TP Hồ Chí Minh">TP Hồ Chí Minh</option>
            <!-- Add more provinces as needed -->
          </select>
          <select name="quan_huyen" id="quan_huyen">
            <option value="">Quận/Huyện</option>
            <!-- Districts will be populated dynamically via JavaScript -->
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
          <a href="adminorder.html" class="reset-order"><i class="fa-light fa-arrow-rotate-right"></i></a>
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
                <a href="adminchitiet.html" class="btn-detail">
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
                <a href="adminchitiet.html" class="btn-detail">
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
                <a href="adminchitiet.html" class="btn-detail">
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
                <a href="adminchitiet.html" class="btn-detail">
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
                <a href="adminchitiet.html" class="btn-detail">
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
    <script>
      // Sample JavaScript to populate districts based on selected province
      function fetchDistricts() {
        const province = document.getElementById("tinh_thanh").value;
        const districtSelect = document.getElementById("quan_huyen");
        districtSelect.innerHTML = '<option value="">Quận/Huyện</option>';

        // Example districts for TP Hồ Chí Minh (replace with actual data or API call)
        if (province === "TP Hồ Chí Minh") {
          const districts = [
            "Quận 1",
            "Quận 3",
            "Quận 5",
            "Quận 7",
            "Quận Bình Thạnh",
            // Add more districts as needed
          ];
          districts.forEach((district) => {
            const option = document.createElement("option");
            option.value = district;
            option.text = district;
            districtSelect.appendChild(option);
          });
        }
        // Add more conditions for other provinces if needed
        showUser();
      }

      function showUser() {
        // Existing showUser function should be updated to include province/district filters
        const status = document.getElementById("tinh-trang-user").value;
        const province = document.getElementById("tinh_thanh").value;
        const district = document.getElementById("quan_huyen").value;
        const timeStart = document.getElementById("time-start-user").value;
        const timeEnd = document.getElementById("time-end-user").value;
        const search = document.getElementById("form-search-product").value;

        // Example: Send filters to server via AJAX (adapt to your backend)
        const formData = new FormData();
        formData.append("status", status);
        formData.append("province", province);
        formData.append("district", district);
        formData.append("time_start", timeStart);
        formData.append("time_end", timeEnd);
        formData.append("search", search);

        fetch("./includes/filter_orders.php", {
          method: "POST",
          body: formData,
        })
          .then((response) => response.text())
          .then((data) => {
            document.getElementById("showOrder").innerHTML = data;
          })
          .catch((error) => console.error("Error:", error));
      }

      // Attach event listeners
      document.getElementById("tinh-trang-user").addEventListener("change", showUser);
      document.getElementById("quan_huyen").addEventListener("change", showUser);
      document.getElementById("form-search-product").addEventListener("input", showUser);
    </script>
  </body>
</html>