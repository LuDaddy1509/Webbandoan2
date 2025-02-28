
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

    <header class="header-top">
      <div class="container">
        <div class="inner-wrap">
          <div class="inner-left">
            <a href="index.html"
              ><img src="assets/img/logo.png" alt="logo"
            /></a>
          </div>

          <div class="inner-middle">
            <form action="" class="inner-find">
              <input type="text" placeholder="Tìm Kiếm món ăn..." />
              <a href="timkiem.html" class="inner-button-find">
                <i class="fa-solid fa-magnifying-glass"></i>
              </a>
            </form>
          </div>

          <div class="inner-right">
            <div class="inner-account">
              <a
                class="inner-icon"
                href="#"
                id="navbarDropdown"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                <i class="fa-regular fa-user"></i>
              </a>
              <a
                class="inner-info"
                href="#"
                id="navbarDropdown"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                <div class="inner-register">Đăng nhập / Đăng ký</div>
                <div class="nav-link dropdown-toggle">Tài khoản</div>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a
                    class="dropdown-item"
                    href="#"
                    data-toggle="modal"
                    data-target="#exampleModal"
                    ><i class="fa-solid fa-right-to-bracket"></i>Đăng nhập</a
                  >
                  <a
                    class="dropdown-item"
                    href="#"
                    data-toggle="modal"
                    data-target="#exampleModal-2"
                    ><i class="fa-solid fa-user-plus"></i>Đăng kí</a
                  >
                </div>
              </a>
            </div>
            <div
              class="inner-shopping"
              data-toggle="modal"
              data-target="#cartModal"
            >
              <div class="inner-icon">
                <i class="fa-solid fa-basket-shopping"></i>
                <span class="inner-so">0</span>
              </div>
              <span class="inner-text-shopping">Giỏ hàng</span>
            </div>
          </div>
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
    </header>

    <!-- End header top  -->

    <!-- header bottom  -->

    <header class="header-bottom">
      <div class="container">
        <div class="inner-menu">
          <ul>
            <li>
              <a href="index.html">TRANG CHỦ</a>
            </li>
            <li>
              <a href="timkiemnangcao.html">MÓN CHAY</a>
            </li>
            <li>
              <a href="timkiemnangcao.html">MÓN MẶN</a>
            </li>
            <li>
              <a href="timkiemnangcao.html">MÓN LẨU</a>
            </li>
            <li>
              <a href="timkiemnangcao.html">MÓN ĂN VẶT</a>
            </li>
            <li>
              <a href="timkiemnangcao.html">MÓN TRÁNG MIỆNG</a>
            </li>
            <li>
              <a href="timkiemnangcao-2.html">NƯỚC UỐNG</a>
            </li>
            <li>
              <a href="timkiemnangcao.html">MÓN KHÁC</a>
            </li>
          </ul>
        </div>
      </div>
    </header>

    <!-- End header bottom  -->

    <!-- Banner -->

    <div class="Banner">
      <div class="container">
        <div class="inner-img">
          <img src="assets/img/banner.jpg" alt="banner" />
        </div>
      </div>
    </div>

    <!-- End Banner -->

    <!-- Service -->

    <div class="Service">
      <div class="container">
        <div class="row">
          <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="inner-item">
              <div class="inner-icon">
                <i class="fa-solid fa-truck-fast"></i>
              </div>
              <div class="inner-info">
                <div class="inner-chu1">GIAO HÀNG NHANH</div>
                <div class="inner-chu2">Cho tất cả đơn hàng</div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="inner-item">
              <div class="inner-icon">
                <i class="fa-solid fa-shield-heart"></i>
              </div>
              <div class="inner-info">
                <div class="inner-chu1">SẢN PHẨM AN TOÀN</div>
                <div class="inner-chu2">Cam kết chất lượng</div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="inner-item">
              <div class="inner-icon">
                <i class="fa-solid fa-headset"></i>
              </div>
              <div class="inner-info">
                <div class="inner-chu1">HỖ TRỢ 24/7</div>
                <div class="inner-chu2">Tất cả ngày trong tuần</div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="inner-item">
              <div class="inner-icon">
                <i class="fa-solid fa-coins"></i>
              </div>
              <div class="inner-info">
                <div class="inner-chu1">HOÀN LẠI TIỀN</div>
                <div class="inner-chu2">Nếu không hài lòng</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- End Service -->
    <?php
    include "connect.php";

    // Số sản phẩm trên mỗi trang
    $limit = 12;

    // Xác định trang hiện tại (mặc định là 1)
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $page = max($page, 1); // Đảm bảo trang không nhỏ hơn 1

    // Tính OFFSET
    $offset = ($page - 1) * $limit;

    // Truy vấn danh sách sản phẩm theo phân trang
    $stmt = $conn->prepare("SELECT * FROM sanpham LIMIT ? OFFSET ?");
    $stmt->bind_param("ii", $limit, $offset);
    $stmt->execute();
    $result = $stmt->get_result();
     // Lấy tổng số sản phẩm để tính tổng số trang (chỉ cần tính 1 lần)
     $total_result = $conn->query("SELECT COUNT(*) as total FROM sanpham");
     $total_row = $total_result->fetch_assoc();
     $total_products = $total_row['total'];
     $total_pages = ($total_products > 0) ? ceil($total_products / $limit) : 1;
?>

      <!-- Products -->


      <div class="Products">
          <div class="container">
              <div class="row">
                  <div class="col-xl-12">
                      <div class="inner-title">Khám phá thực đơn của chúng tôi</div>
                  </div> 

                  <?php while ($row = $result->fetch_assoc()): ?>
                  <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
                      <div class="inner-item">
                          <a href="chitietsp.php?id=<?= $row['ID']; ?>" class="inner-img">
                              <img src="<?= htmlspecialchars($row['Image']); ?>" />
                          </a>
                          <div class="inner-info">
                              <div class="inner-ten"><?= htmlspecialchars($row['Name']); ?></div>
                              <div class="inner-gia"><?= number_format($row['Price']); ?>.000 ₫</div>
                              <a href="chitietsp.php?id=<?= $row['ID']; ?>" class="inner-muahang">
                                  <i class="fa-solid fa-cart-plus"></i> ĐẶT MÓN
                              </a>
                          </div>
                      </div>
                  </div>
                  <?php endwhile; ?>
              </div> <!-- Đóng row đúng chỗ -->
          </div>
      </div>

              <!-- Đóng Products -->

      <!-- Modal order -->

      <div
        class="modal fade"
        id="exampleModalCenter"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true"
      >
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <div class="inner-hinh">
                <img src="assets/img/products/phobo.jpg" />
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
              <div class="inner-name">Phở bò</div>
              <div class="inner-info">
                <div class="inner-gia">50.000 ₫</div>
                <div class="inner-sl">
                  <input class="inner-dau" type="button" value="-" />
                  <span class="inner-so">1</span>
                  <input class="inner-dau" type="button" value="+" />
                </div>
              </div>
              <p class="inner-desc">
                Phở là món ăn đặc trưng của Việt Nam với nước dùng trong vắt,
                đậm đà từ xương và gia vị. Sợi phở mềm, thường được ăn kèm với
                thịt bò hoặc gà thái mỏng, rau thơm, chanh và ớt. Vị thanh mát,
                thơm ngon của phở khiến người ăn dễ dàng mê mẩn ngay từ lần thử
                đầu tiên. Phở không chỉ ngon mà còn mang đậm hương vị truyền
                thống của ẩm thực Việt.
              </p>
            </div>
            <div class="modal-footer">
              <div class="inner-giaca">
                <div class="inner-chu">Thành tiền</div>
                <div class="inner-so">50.000 ₫</div>
              </div>
              <div class="inner-thanhtoan">
                <button type="button" class="inner-nut1" onclick="notLogin()">
                  Thêm vào giỏ hàng <i class="fa-solid fa-basket-shopping"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- End Modal order -->
    </div>

    <!-- Phân trang -->
<div class="Pagination">
    <div class="container">
        <ul>
            <?php
            // Hiển thị nút trang đầu tiên
            if ($page >= 1) {
                echo '<li><a href="?page=1" class="inner-trang">1</a></li>';
            }

            // Hiển thị dấu "..." nếu trang hiện tại lớn hơn 3
            if ($page > 3) {
                echo '<li><span>...</span></li>';
            }

            // Tính toán phạm vi các trang cần hiển thị
            $start_page = max(2, $page - 1); // Bắt đầu từ trang 2 hoặc trang hiện tại trừ 1
            $end_page = min($total_pages - 1, $page + 1); // Kết thúc ở trang cuối cùng trừ 1 hoặc trang hiện tại cộng 1

            // Hiển thị các trang trong phạm vi
            for ($i = $start_page; $i <= $end_page; $i++) {
                $active_class = ($i == $page) ? 'trang-chinh' : '';
                echo '<li><a href="?page=' . $i . '" class="inner-trang ' . $active_class . '">' . $i . '</a></li>';
            }

            // Hiển thị dấu "..." nếu trang hiện tại nhỏ hơn tổng số trang trừ 2
            if ($page < $total_pages - 2) {
                echo '<li><span>...</span></li>';
            }

            // Hiển thị nút trang cuối cùng
            if ($page < $total_pages) {
                echo '<li><a href="?page=' . $total_pages . '" class="inner-trang">' . $total_pages . '</a></li>';
            }
            ?>
        </ul>
    </div>
</div>
<!-- Đóng phân trang -->
    

    <!-- Footer-top -->

    <div class="Footer-top">
      <div class="container">
        <div class="row">
          <div class="col-xl-4 col-lg-4 col-md-12">
            <div class="inner-logo">
              <img src="assets/img/logo.png" alt="logo" />
            </div>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-6">
            <div class="inner-text">
              <div class="inner-chu1">Đăng ký nhận tin</div>
              <div class="inner-chu2">Nhận thông tin mới nhất từ chúng tôi</div>
            </div>
          </div>
          <div class="col-xl-5 col-lg-5 col-md-6">
            <form action="" class="inner-form">
              <input type="text" placeholder="Nhập email của bạn" />
              <button class="inner-sub">
                ĐĂNG KÝ <i class="fa-solid fa-arrow-right"></i>
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- End Footer-top -->

    <!-- Footer-middle -->

    <div class="Footer-middle">
      <div class="container">
        <div class="row">
          <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
            <div class="inner-text">Về chúng tôi</div>
            <p class="inner-desc">
              Đặc Sản 3 Miền là thương hiệu được thành lập vào năm 2023 với tiêu
              chí đặt chất lượng sản phẩm lên hàng đầu.
            </p>
            <div class="inner-icon">
              <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
              <a href="#"><i class="fa-brands fa-twitter"></i></a>
              <a href="#"><i class="fa-brands fa-instagram"></i></a>
              <a href="#"><i class="fa-brands fa-tiktok"></i></a>
            </div>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="inner-text">liên kết</div>
            <ul>
              <li>
                <a href="#"
                  ><i class="fa-solid fa-arrow-right"></i>Về chúng tôi</a
                >
              </li>
              <li>
                <a href="#"><i class="fa-solid fa-arrow-right"></i>Thực đơn</a>
              </li>
              <li>
                <a href="#"
                  ><i class="fa-solid fa-arrow-right"></i>Điều khoản</a
                >
              </li>
              <li>
                <a href="#"><i class="fa-solid fa-arrow-right"></i>Liên Hệ</a>
              </li>
              <li>
                <a href="#"><i class="fa-solid fa-arrow-right"></i>Tin tức</a>
              </li>
            </ul>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="inner-text">thực đơn</div>
            <ul class="inner-menu">
              <li>
                <a href="#"><i class="fa-solid fa-arrow-right"></i>Điểm tâm</a>
              </li>
              <li>
                <a href="#"><i class="fa-solid fa-arrow-right"></i>Món chay</a>
              </li>
              <li>
                <a href="#"><i class="fa-solid fa-arrow-right"></i>Món mặn</a>
              </li>
              <li>
                <a href="#"><i class="fa-solid fa-arrow-right"></i>Nước uống</a>
              </li>
              <li>
                <a href="#"
                  ><i class="fa-solid fa-arrow-right"></i>Tráng miệng</a
                >
              </li>
            </ul>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="inner-text">liên hệ</div>
            <div class="inner-contact">
              <div class="inner-icon">
                <i class="fa-solid fa-location-dot"></i>
              </div>
              <div class="inner-diachi">
                <div class="inner-chu1">40/15 Tô Hiệu, P. Tân Thới Hòa</div>
                <div class="inner-chu2">Quận Tân Phú, TP Hồ Chí Minh</div>
              </div>
            </div>
            <div class="inner-contact">
              <div class="inner-icon">
                <i class="fa-solid fa-phone"></i>
              </div>
              <div class="inner-diachi">
                <div class="inner-chu1">0123 456 789</div>
                <div class="inner-chu2">0987 654 321</div>
              </div>
            </div>
            <div class="inner-contact">
              <div class="inner-icon">
                <i class="fa-regular fa-envelope"></i>
              </div>
              <div class="inner-diachi">
                <div class="inner-chu1">hđkn@gmail.com</div>
                <div class="inner-chu2">gacon@domain.com</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- End Footer-middle -->

    <!-- Footer-bottom -->

    <div class="Footer-bottom">
      <div class="container">
        <div class="row">
          <div class="col-xl-12">
            <div class="inner-end">
              Copyright 2023 ĐS3M. All Rights Reserved.
            </div>
          </div>
        </div>
      </div>
    </div>

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
