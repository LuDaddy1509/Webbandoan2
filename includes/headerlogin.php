<?php
session_start();
ob_start(); 
?>
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
                  <span class="text-dndk">Tài khoản</span>
                  <span class="text-tk"
                    ><?php if(!isset($_SESSION['sdt'])){
                      header("location: index.php");
                      exit();
                    }
                    else {
                      echo htmlspecialchars($_SESSION['ten'],ENT_QUOTES, 'UTF-8');
                    }
                    ?><i class="fa-sharp fa-solid fa-caret-down"></i
                  ></span>
                </div>
                <ul class="header-middle-right-menu">
                  <li>
                  <a class="dropdown-item" href="account.php"
                    ><i class="fa-regular fa-circle-user"></i>Tài khoản của
                    tôi</a
                  >
                  </li>
                  <li>
                  <a class="dropdown-item" href=""
                    ><i class="fa-solid fa-cart-shopping"></i>Đơn hàng đã mua</a
                  >
                  </li>
                  <li>
                  <a  href="logout.php" class="dropdown-item">
                    <i class="fa-solid fa-right-from-bracket"></i>Thoát tài
                    khoản</a>
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
                <a href="thanhtoan.php" class="inner-tt">Thanh toán</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      </div>
    </header>
    <nav class="header-bottom">
  <div class="container">
    <ul class="menu-list">
      <li class="menu-list-item"><a href="login.php" class="menu-link">Trang chủ</a></li>
      <li class="menu-list-item"><a href="index.php?Type=Món chay" class="menu-link">Món chay</a></li>
      <li class="menu-list-item"><a href="index.php?Type=Món mặn" class="menu-link">Món mặn</a></li>
      <li class="menu-list-item"><a href="index.php?Type=Món lẩu" class="menu-link">Món lẩu</a></li>
      <li class="menu-list-item"><a href="index.php?Type=Món ăn vặt" class="menu-link">Món ăn vặt</a></li>
      <li class="menu-list-item"><a href="index.php?Type=Món tráng miệng" class="menu-link">Món tráng miệng</a></li>
      <li class="menu-list-item"><a href="index.php?Type=Nước uống" class="menu-link">Nước uống</a></li>
      <li class="menu-list-item"><a href="index.php?Type=Món khác" class="menu-link">Món khác</a></li>
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


    
