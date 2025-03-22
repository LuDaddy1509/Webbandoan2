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
            <form action="" class="form-search">
              <span class="search-btn"
                ><i class="fa-light fa-magnifying-glass"></i
              ></span>
              <input
                type="text"
                class="form-search-input"
                placeholder="Tìm kiếm món ăn..."
                oninput="searchProducts()"
              />
              <button class="filter-btn">
                <i class="fa-light fa-filter-list"></i><span>Lọc</span>
              </button>
            </form>
          </div>
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
    <div class="advanced-search">
      <div class="container">
        <div class="advanced-search-category">
          <span>Phân loại </span>
          <select
            name=""
            id="advanced-search-category-select"
            onchange="searchProducts()"
          >
            <option>Tất cả</option>
            <option>Món chay</option>
            <option>Món mặn</option>
            <option>Món lẩu</option>
            <option>Món ăn vặt</option>
            <option>Món tráng miệng</option>
            <option>Nước uống</option>
          </select>
        </div>
        <div class="advanced-search-price">
          <span>Giá từ</span>
          <input
            type="number"
            placeholder="tối thiểu"
            id="min-price"
            onchange="searchProducts()"
          />
          <span>đến</span>
          <input
            type="number"
            placeholder="tối đa"
            id="max-price"
            onchange="searchProducts()"
          />
          <button id="advanced-search-price-btn">
            <i class="fa-light fa-magnifying-glass-dollar"></i>
          </button>
        </div>
        <div class="advanced-search-control">
          <button id="sort-ascending" onclick="searchProducts(1)">
            <i class="fa-regular fa-arrow-up-short-wide"></i>
          </button>
          <button id="sort-descending" onclick="searchProducts(2)">
            <i class="fa-regular fa-arrow-down-wide-short"></i>
          </button>
          <button id="reset-search" onclick="searchProducts(0)">
            <i class="fa-light fa-arrow-rotate-right"></i>
          </button>
          <button onclick="closeSearchAdvanced()">
            <i class="fa-light fa-xmark"></i>
          </button>
        </div>
      </div>
    </div>


    <!-- End header top  -->