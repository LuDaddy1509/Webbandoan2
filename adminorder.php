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
     ?>
       
       <?php
       if ($_SERVER["REQUEST_METHOD"] !== "POST") {
        include_once("./includes/headeradmin.php");
    }
include 'connect.php';

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
    
    if (mysqli_num_rows($result) > 0) {
        echo "<table border='1'>";
        echo "<tr><th>Mã ĐH</th><th>Mã KH</th><th>Ngày tạo</th><th>Tổng tiền</th><th>Trạng thái</th><th>Tỉnh/Thành</th><th>Quận/Huyện</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$row['madh']}</td>
                    <td>{$row['makh']}</td>
                    <td>{$row['ngaytao']}</td>
                    <td>{$row['tongtien']}</td>
                    <td>{$row['trangthai']}</td>
                    <td>{$row['tinh_thanhpho']}</td>
                    <td>{$row['quan_huyen']}</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Không tìm thấy kết quả.</p>";
    }
    exit; // Dừng script ở đây để không render lại HTML của trang
}
?>

<div class="admin-order">
    <div class="admin-control">
        <form id="search-form">
            <div>
                <label>Mã đơn hàng:</label>
                <input type="text" id="ma_don_hang" name="ma_don_hang" placeholder="Nhập mã đơn hàng">
            </div>

            <div>
                <label>Trạng thái đơn hàng:</label>
                <select id="tinh_trang" name="tinh_trang">
                    <option value="">Tất cả</option>
                    <option value="Chưa xác nhận">Chưa xác nhận</option>
                    <option value="Đã xác nhận">Đã xác nhận</option>
                    <option value="Đã giao thành công">Đã giao thành công</option>
                    <option value="Đã hủy đơn">Đã hủy đơn</option>
                </select>
            </div>

            <div>
                <label>Chọn tỉnh/thành:</label>
                <select id="tinh_thanh" name="tinh_thanh">
                    <option value="">Tất cả</option>
                </select>
            </div>

            <div>
                <label>Chọn quận/huyện:</label>
                <select id="quan_huyen" name="quan_huyen">
                    <option value="">Tất cả</option>
                </select>
            </div>

            <div>
                <label>Từ ngày:</label>
                <input type="date" id="time_start" name="time_start">
            </div>

            <div>
                <label>Đến ngày:</label>
                <input type="date" id="time_end" name="time_end">
            </div>

            <button type="button" id="form-search-product">Tìm kiếm</button>
        </form>
    </div>

    <div id="search-results"></div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const tinhThanhSelect = document.getElementById("tinh_thanh");
    const quanHuyenSelect = document.getElementById("quan_huyen");
    let danhSachTinhThanh = [];
    let danhSachQuanHuyen = {};

    // Tải toàn bộ danh sách tỉnh/thành và quận/huyện khi trang tải xong
    async function loadData() {
        const response = await fetch("https://provinces.open-api.vn/api/?depth=2");
        const data = await response.json();
        
        danhSachTinhThanh = data; // Lưu danh sách tỉnh/thành vào biến

        // Lưu danh sách quận/huyện dưới dạng key-value (tỉnh => danh sách quận/huyện)
        data.forEach(tinh => {
            danhSachQuanHuyen[tinh.name] = tinh.districts;
            tinhThanhSelect.innerHTML += `<option value="${tinh.name}">${tinh.name}</option>`;
        });
    }

    // Lọc quận/huyện khi chọn tỉnh/thành
    tinhThanhSelect.addEventListener("change", function () {
        const selectedTinh = tinhThanhSelect.value;
        quanHuyenSelect.innerHTML = '<option value="">Tất cả</option>'; // Reset danh sách quận/huyện

        if (selectedTinh && danhSachQuanHuyen[selectedTinh]) {
            danhSachQuanHuyen[selectedTinh].forEach(huyen => {
                quanHuyenSelect.innerHTML += `<option value="${huyen.name}">${huyen.name}</option>`;
            });
        }
    });

    (async function () {
        await loadData();
    })();

    document.getElementById("form-search-product").addEventListener("click", function () {
        const formData = new FormData(document.getElementById("search-form"));

        fetch("adminorder.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            document.getElementById("search-results").innerHTML = data;
        })
        .catch(error => console.error("Lỗi:", error));
    });

    loadTinhThanh();
});
</script>

  


        <?php
include 'connect.php';

// Truy vấn lấy dữ liệu từ bảng donhang
$sql = "SELECT madh, makh, ngaytao, tongtien, trangthai FROM donhang";
$result = $conn->query($sql);

// Mảng ánh xạ trạng thái đơn hàng sang tên hiển thị và class CSS
$status_map = [
    'Chưa xác nhận' => ['Chưa xác nhận', 'status-no-complete'],
    'Đã xác nhận' => ['Đã xác nhận', 'status-middle-complete'],
    'Đã giao thành công' => ['Đã giao thành công', 'status-complete'],
    'Đã hủy đơn' => ['Đã hủy đơn', 'status-destroy-complete']
];

$next_status = [
    'Chưa xác nhận' => ['Đã xác nhận'],
        'Đã xác nhận' => ['Đã giao thành công', 'Đã hủy đơn']
];
?>

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
                <td>Xem thêm</td>
            </tr>
        </thead>
        <tbody id="showOrder">
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo 'DH' . $row['madh']; ?></td>
                    <td><?php echo $row['makh']; ?></td>
                    <td><?php echo date('d/m/Y', strtotime($row['ngaytao'])); ?></td>
                    <td><?php echo number_format($row['tongtien'], 0, ',', '.') . '.000 ₫'; ?></td>
                    <td>
                        <?php 
                        $status = $row['trangthai'];
                        $status_text = $status_map[$status][0] ?? 'Không xác định';
                        $status_class = $status_map[$status][1] ?? 'status-unknown';
                        ?>
                        <span class="<?php echo $status_class; ?>" id="status-<?php echo $row['madh']; ?>">
                            <?php echo $status_text; ?>
                        </span>
                    </td>
                    <td class="control">
                        <select id="update-status-<?php echo $row['madh']; ?>">
                            <option value="">Chọn trạng thái</option>
                            <?php if (isset($next_status[$status])): ?>
                                <?php foreach ($next_status[$status] as $new_status): ?>
                                    <option value="<?php echo $new_status; ?>"><?php echo $new_status; ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        <button onclick="updateStatus(<?php echo $row['madh']; ?>)">Cập nhật</button>
                    </td>
                    <td class="control">
                  <a href="adminchitiet.php" class="btn-detail">
                    <i class="fa-regular fa-eye"></i> Chi tiết
                  </a>
                </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<script>
function updateStatus(madh) {
    let selectElement = document.getElementById(`update-status-${madh}`);
    let newStatus = selectElement.value;
    if (!newStatus) {
        alert("Vui lòng chọn trạng thái mới");
        return;
    }

    let formData = new FormData();
    formData.append("madh", madh);
    formData.append("newStatus", newStatus);

    fetch("./includes/update_status.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        if (data === "success") {
            let statusElement = document.getElementById(`status-${madh}`);
            statusElement.innerText = newStatus;

            // Cập nhật class trạng thái
            let statusClasses = {
                "Chưa xác nhận": "status-no-complete",
                "Đã xác nhận": "status-middle-complete",
                "Đã giao thành công": "status-complete",
                "Đã hủy đơn": "status-destroy-complete"
            };
            statusElement.className = statusClasses[newStatus] || "status-unknown";

            // Cập nhật dropdown (next_status)
            let nextStatusOptions = {
                "Chưa xác nhận": ["Đã xác nhận", "Đã hủy đơn"],
                "Đã xác nhận": ["Đã giao thành công", "Đã hủy đơn"],
                "Đã giao thành công": [],
                "Đã hủy đơn": []
            };

            // Xóa tất cả option cũ
            selectElement.innerHTML = '<option value="">Chọn trạng thái</option>';

            // Thêm các option mới tương ứng với trạng thái mới
            if (nextStatusOptions[newStatus]) {
                nextStatusOptions[newStatus].forEach(status => {
                    let option = document.createElement("option");
                    option.value = status;
                    option.innerText = status;
                    selectElement.appendChild(option);
                });
            }

            alert("Cập nhật thành công!");
        } else {
            alert("Có lỗi xảy ra: " + data);
        }
    })
    .catch(error => console.error("Lỗi: ", error));
}


</script>


        
        <!-- End Modal Admin Order -->
      </div>
    </div>

    <!-- End adminorder  -->

    <script src="admin/js/jquery.min.js"></script>
    <script src="admin/js/bootstrap.min.js"></script>
    <script src="admin/js/main.js"></script>
    <script src="admin/js/popper.js"></script>
    <script src="assets/js/admin.js"></script>
  </body>
</html>
