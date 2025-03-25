 <!-- header top  -->

 <header>
      <div class="header-middle">
        <div class="container">
          <div class="header-middle-left">
            <div class="header-logo">
              <a href="index.php">
                <img
                  src="./assets/img/logo.png"
                  alt=""
                  class="header-logo-img"
                />
              </a>
            </div>
          </div>
                <div class="header-middle-center">
                <form id="search-form" class="form-search">
                    <span class="search-btn">
                        <i class="fa-light fa-magnifying-glass"></i>
                    </span>
                    <input
                        type="text"
                        class="form-search-input"
                        id="search-input"
                        placeholder="Tìm kiếm món ăn..."
                    />
                    <button type="submit" class="filter-btn">
                        <i class="fa-light fa-filter-list"></i><span>Lọc</span>
                    </button>
                </form>
      </div>

      <!-- Kết quả tìm kiếm -->
      <div id="search-results"></div>

          <div class="header-middle-right">
            <ul class="header-middle-right-list">
              <li class="header-middle-right-item dropdown open">
                <i class="fa-light fa-user"></i>
                <div class="auth-container">
                  <span class="text-dndk">Đăng nhập / Đăng ký</span>
                  <span class="text-tk"
                    >Tài khoản <i class="fa-sharp fa-solid fa-caret-down"></i
                  ></span>
                </div>
                <ul class="header-middle-right-menu">
                  <li>
                  <a
                    class="dropdown-item"
                    href="#"
                    data-toggle="modal"
                    data-target="#exampleModal"
                    ><i class="fa-solid fa-right-to-bracket"></i>Đăng nhập</a
                  >
                  </li>
                  <li>
                    <a
                    class="dropdown-item"
                    href="#"
                    data-toggle="modal"
                    data-target="#exampleModal-2"
                    ><i class="fa-solid fa-user-plus"></i>Đăng kí</a
                  >
                  </li>
                </ul>
              </li>
              <li class="header-middle-right-item open" data-toggle="modal"  
              data-target="#cartModal">
                <div class="cart-icon-menu">
                  <i class="fa-light fa-basket-shopping"></i>
                  <span class="count-product-cart">0</span>
                </div>
                <span>Giỏ hàng</span>
              </li>
            </ul>
          </div>
        </div>

            <!-- Modal login -->

      <div
        class="modal fade modal-form"
        id="exampleModal"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="inner-title">Đăng nhập tài khoản</h5>
              <p class="inner-desc">
                Đăng nhập thành viên để mua hàng và nhận những ưu đãi đặc biệt
                từ chúng tôi
              </p>
              <button
                type="button"
                class="close"
                data-dismiss="modal"
                aria-label="Close"
              >
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="">
                <div class="row">
                  <div class="col-12">
                    <div class="form-group">
                      <label for="sdt">Số điện thoại</label>
                      <input
                        type="text"
                        id="sdt"
                        class="form-control"
                        placeholder="Nhập số điện thoại"
                      />
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <label for="mk">Mật khẩu</label>
                      <input
                        type="password"
                        id="mk"
                        class="form-control"
                        placeholder="Nhập mật khẩu"
                      />
                    </div>
                  </div>
                  <div class="col-12">
                    <a href="login.html" class="button"> Đăng nhập </a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- End Modal login -->

      <!-- Modal register -->

      <div
        class="modal fade modal-form"
        id="exampleModal-2"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="inner-title">Đăng ký tài khoản</h5>
              <p class="inner-desc">
                Đăng ký thành viên để mua hàng và nhận những ưu đãi đặc biệt từ
                chúng tôi
              </p>
              <button
                type="button"
                class="close"
                data-dismiss="modal"
                aria-label="Close"
              >
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="">
                <div class="row">
                  <div class="col-12">
                    <div class="form-group">
                      <label for="name">Tên đầy đủ</label>
                      <input
                        type="text"
                        id="name"
                        class="form-control"
                        placeholder="VD: Thành Đại"
                      />
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <label for="sdt2">Số điện thoại</label>
                      <input
                        type="text"
                        id="sdt2"
                        class="form-control"
                        placeholder="Nhập số điện thoại"
                      />
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <label for="dc">Địa chỉ</label>
                      <input
                        type="text"
                        id="dc"
                        class="form-control"
                        placeholder="Nhập địa chỉ"
                      />
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <label for="mk2">Mật khẩu</label>
                      <input
                        type="password"
                        id="mk2"
                        class="form-control"
                        placeholder="Nhập mật khẩu"
                      />
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <label for="nhapmk">Nhập lại Mật khẩu</label>
                      <input
                        type="password"
                        id="nhapmk"
                        class="form-control"
                        placeholder="Nhập lại mật khẩu"
                      />
                    </div>
                  </div>
                  <div class="col-12">
                    <button class="button" onclick="dangKi()">Đăng kí</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- End Modal register -->

      <!-- Modal shopping -->

      <div
        class="modal fade right"
        id="cartModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="cartModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <div class="inner-shopping">
                <div class="inner-icon">
                  <i class="fa-solid fa-basket-shopping"></i>
                </div>
                <span class="inner-text-shopping">Giỏ hàng</span>
              </div>
              <button
                type="button"
                class="close"
                data-dismiss="modal"
                aria-label="Close"
              >
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="inner-icon">
                <i class="fa-solid fa-cart-xmark"></i>
              </div>
              <div class="inner-desc">
                Không có sản phẩm nào trong giỏ hàng của bạn
              </div>
            </div>
            <div class="modal-footer">
              <div class="inner-tong">
                <div class="inner-text-tong">Tổng tiền:</div>
                <div class="inner-gia-tong">0 ₫</div>
              </div>
              <div class="inner-nut">
                <button
                  type="button"
                  class="inner-tm"
                  data-dismiss="modal"
                  aria-label="Close"
                >
                  <i class="fa-solid fa-plus"></i>Thêm món
                </button>
                <button class="inner-tt inner-tt-nologin">Thanh toán</button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- End Modal shopping -->

      </div>
    </header>
    <nav class="header-bottom">
      <div class="container">
        <ul class="menu-list">
          <li class="menu-list-item">
            <a href="index.php" class="menu-link">Trang chủ</a>
          </li>
          <li class="menu-list-item" onclick="showCategory('Món chay')">
            <a href="javascript:;" class="menu-link">Món chay</a>
          </li>
          <li class="menu-list-item" onclick="showCategory('Món mặn')">
            <a href="javascript:;" class="menu-link">Món mặn</a>
          </li>
          <li class="menu-list-item" onclick="showCategory('Món lẩu')">
            <a href="javascript:;" class="menu-link">Món lẩu</a>
          </li>
          <li class="menu-list-item" onclick="showCategory('Món ăn vặt')">
            <a href="javascript:;" class="menu-link">Món ăn vặt</a>
          </li>
          <li class="menu-list-item" onclick="showCategory('Món tráng miệng')">
            <a href="javascript:;" class="menu-link">Món tráng miệng</a>
          </li>
          <li class="menu-list-item" onclick="showCategory('Nước uống')">
            <a href="javascript:;" class="menu-link">Nước uống</a>
          </li>
          <li class="menu-list-item" onclick="showCategory('Món khác')">
            <a href="javascript:;" class="menu-link">Món khác</a>
          </li>
        </ul>
      </div>
    </nav>
    <?php
header("Content-Type: application/json; charset=UTF-8");
include "connect.php";
if ($conn->connect_error) {
    die(json_encode(["error" => "Kết nối thất bại: " . $conn->connect_error]));
}

// Sử dụng UTF-8 chuẩn (utf8_unicode_ci)
$conn->set_charset("utf8");
$conn->query("SET NAMES 'utf8' COLLATE 'utf8_unicode_ci'");

// Nhận dữ liệu từ request
$name = $_POST["name"] ?? '';
$category = $_POST["category"] ?? '';
$min_price = $_POST["min_price"] ?? '';
$max_price = $_POST["max_price"] ?? '';
$sort_order = $_POST["sort_order"] ?? 0; // 1 = ASC, 2 = DESC

$sql = "SELECT * FROM sanpham WHERE 1";

// Tìm theo tên gần đúng
if (!empty($name)) {
    $escaped_name = $conn->real_escape_string($name);
    $sql .= " AND (name LIKE '%$escaped_name%' OR SOUNDEX(name) = SOUNDEX('$escaped_name'))";
}

// Lọc theo danh mục
if (!empty($category) && $category !== "Tất cả") {
    $sql .= " AND category = '" . $conn->real_escape_string($category) . "'";
}

// Lọc theo giá
if (!empty($min_price)) {
    $sql .= " AND price >= " . (float)$min_price;
}
if (!empty($max_price)) {
    $sql .= " AND price <= " . (float)$max_price;
}

// Sắp xếp dữ liệu
if ($sort_order == 1) {
    $sql .= " ORDER BY price ASC";
} elseif ($sort_order == 2) {
    $sql .= " ORDER BY price DESC";
}

$result = $conn->query($sql);
$products = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}

// Trả về JSON chuẩn UTF-8
echo json_encode($products, JSON_UNESCAPED_UNICODE);
$conn->close();
?>

    <!-- End header top  -->