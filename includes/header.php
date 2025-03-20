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
              <a href="index.php">TRANG CHỦ</a>
            </li>
            <li>
              <a href="timkiemnangcao.php">MÓN CHAY</a>
            </li>
            <li>
              <a href="timkiemnangcao.php">MÓN MẶN</a>
            </li>
            <li>
              <a href="timkiemnangcao.php">MÓN LẨU</a>
            </li>
            <li>
              <a href="timkiemnangcao.php">MÓN ĂN VẶT</a>
            </li>
            <li>
              <a href="timkiemnangcao.php">MÓN TRÁNG MIỆNG</a>
            </li>
            <li>
              <a href="timkiemnangcao-2.php">NƯỚC UỐNG</a>
            </li>
            <li>
              <a href="timkiemnangcao.php">HẢI SẢN</a>
            </li>
          </ul>
        </div>
      </div>
    </header>

    <!-- End header bottom  -->