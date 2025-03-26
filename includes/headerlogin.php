<!-- header top  -->

<header class="header-top">
      <div class="container">
        <div class="inner-wrap">
          <div class="inner-left">
            <a href="login.html"
              ><img src="assets/img/logo.png" alt="logo"
            /></a>
          </div>

          <div class="inner-middle">
            <form action="" class="inner-find">
              <input type="text" placeholder="Tìm Kiếm món ăn..." />
              <a href="timkiem-login.php" class="inner-button-find">
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
                <div class="inner-register">Tài khoản</div>
                <div class="nav-link dropdown-toggle">
                <?php
                session_start();
                include "connect.php";
                echo "<p class='username'>" . $_SESSION['tenkh'] . "</p>";
                if(!isset($_SESSION['PhoneNumber'])){
                  header('location:login.php');
                }
                ?>
                </div>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="account.php"
                    ><i class="fa-regular fa-circle-user"></i>Tài khoản của
                    tôi</a
                  >
                  <a class="dropdown-item" href="productss.html"
                    ><i class="fa-solid fa-cart-shopping"></i>Đơn hàng đã mua</a
                  >
                  <a href="logout.php">
                  <button class="dropdown-item"
                    ><i class="fa-solid fa-right-from-bracket"></i>Thoát tài
                    khoản</button></a>
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
                <span class="inner-so">2</span>
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
              <form action="" method="post" id="dntk">
                <div class="row">
                  <div class="col-12">
                    <div class="form-group">
                      <label for="sdt">Số điện thoại</label>
                      <input
                        type="text"
                        id="sdt"
                        class="form-control"
                        name="PhoneNumber"
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
                        name="password"
                        placeholder="Nhập mật khẩu"
                      />
                    </div>
                  </div>
                  <div class="col-12">
                    <button type="submit" class="button">Đăng Nhập</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- End Modal login -->

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
              <div class="cart-item">
                <div class="inner-product">
                  <img src="assets/img/products/banhmi.webp" alt="Product 1" />
                  <div class="inner-gia">20.000 ₫</div>
                </div>
                <div class="inner-info">
                  <div class="inner-ten">Bánh mì</div>
                  <div class="buttons_added">
                    <input class="minus is-form" type="button" value="-" />
                    <input class="input-qty" type="text" value="1" />
                    <input class="plus is-form" type="button" value="+" />
                  </div>
                </div>
              </div>
              <div class="cart-item">
                <div class="inner-product">
                  <img src="assets/img/products/bunbohue.jpg" alt="Product 2" />
                  <div class="inner-gia">50.000 ₫</div>
                </div>
                <div class="inner-info">
                  <div class="inner-ten">Bún bò Huế</div>
                  <div class="buttons_added">
                    <input class="minus is-form" type="button" value="-" />
                    <input class="input-qty" type="text" value="1" />
                    <input class="plus is-form" type="button" value="+" />
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <div class="inner-tong">
                <div class="inner-text-tong">Tổng tiền:</div>
                <div class="inner-gia-tong">70.000 ₫</div>
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
                <a href="thanhtoan.html" class="inner-tt">Thanh toán</a>
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
              <a href="login.php">TRANG CHỦ</a>
            </li>
            <li>
              <a href="timkiemnangcao-login.php">MÓN CHAY</a>
            </li>
            <li>
              <a href="timkiemnangcao-login.php">MÓN MẶN</a>
            </li>
            <li>
              <a href="timkiemnangcao-login.php">MÓN LẨU</a>
            </li>
            <li>
              <a href="timkiemnangcao-login.php">MÓN ĂN VẶT</a>
            </li>
            <li>
              <a href="timkiemnangcao-login.php">MÓN TRÁNG MIỆNG</a>
            </li>
            <li>
              <a href="timkiemnangcao-login.phpphp">NƯỚC UỐNG</a>
            </li>
            <li>
              <a href="timkiemnangcao-login.php">MÓN KHÁC</a>
            </li>
          </ul>
        </div>
      </div>
    </header>
<link rel="stylesheet" href="assets/css/style.css">
    <!-- End header bottom  -->
