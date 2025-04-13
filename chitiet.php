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
      <?php
  include_once "includes/headerlogin.php";
  ?>

    <!-- ChiTiet -->

    <div class="chitiet">
      <div class="container">
        <div class="inner-chitiet">
          <div class="inner-tt">Chi tiết đơn hàng DH1</div>
          <div class="inner-vc">Ngày đặt hàng: 20/11/2024</div>
        </div>
        <div class="inner-trangthai">
          <div class="inner-ct">
            Trạng thái thanh toán: <i>Đã thanh toán</i>
          </div>
          <div class="inner-ngay">
            Trạng thái vận chuyển: <i>Đã giao hàng</i>
          </div>
        </div>
        <div class="row">
          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="inner-diachi">
              <div class="inner-ten">ĐỊA CHỈ GIAO HÀNG</div>
              <div class="inner-gth">
                <div class="inner-ten">CAO THÁI PHƯƠNG THANH</div>
                <div class="inner-dc">
                  Địa chỉ: 273 An Dương Vương, Phường 3, Quận 5, TP Hồ Chí Minh
                </div>
                <div class="inner-sdt">Số điện thoại: 0909098386</div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
            <div class="inner-diachi">
              <div class="inner-ten">THANH TOÁN</div>
              <div class="inner-gth">
                <div class="inner-tt">Thanh toán khi giao hàng</div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
            <div class="inner-diachi">
              <div class="inner-ten">GHI CHÚ</div>
              <div class="inner-gth">
                <div class="inner-ghichu">Không có ghi chú</div>
              </div>
            </div>
          </div>
        </div>
        <div class="inner-menu">
          <div class="inner-item">
            <div class="inner-info">
              <div class="inner-img">
                <img src="assets/img/products/banhmi.webp" />
              </div>
              <div class="inner-chu">
                <div class="inner-ten">Bánh mì</div>
                <div class="inner-sl">x1</div>
              </div>
            </div>
            <div class="inner-gia">20.000 ₫</div>
          </div>
          <div class="inner-item">
            <div class="inner-info">
              <div class="inner-img">
                <img
                  src="assets/img/products/bunbohue.jpg"
                  width="80px"
                  height="80px"
                />
              </div>
              <div class="inner-chu">
                <div class="inner-ten">Bún bò Huế</div>
                <div class="inner-sl">x1</div>
              </div>
            </div>
            <div class="inner-gia">50.000 ₫</div>
          </div>
          <div class="inner-tonggia">
            <div class="inner-tien">
              <div class="inner-th">Tiền hàng <span>2 món</span></div>
              <div class="inner-st">70.000 ₫</div>
            </div>
            <div class="inner-vanchuyen">
              <span class="inner-vc1">Vận chuyển</span>
              <span class="inner-vc2">30.000 ₫</span>
            </div>
            <div class="inner-total">
              <span class="inner-tong1">Tổng tiền:</span>
              <span class="inner-tong2">100.000 ₫</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- End ChiTiet -->

       <?php
  include_once "includes/footer.php";
  ?>

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
