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
    include_once "includes/headeradmin.php";
    include "database/CustomerDBconnect.php";
    if (isset($_POST['addcustomer'])){
      $makh="";
      $tenkh=$_POST['tenkh'];
      $matkhau=$_POST['matkhau'];
      $diachi=$_POST['diachi'];
      $sodienthoai=$_POST['sodienthoai'];

      $sql="INSERT INTO khachhang(makh, tenkh, matkhau, diachi, sodienthoai)
      VALUES('$makh','$tenkh','$matkhau','$diachi','$sodienthoai');
      ";
      
      mysqli_query($conn,$sql);
    }
    ?>
      <!-- admincustomer  -->

      <div class="admin-customer">
        <div class="admin-control">
          <div class="admin-control-left">
            <select name="tinh-trang-user" id="tinh-trang-user">
              <option value="0">Tất cả</option>
              <option value="1">Hoạt động</option>
              <option value="2">Bị khóa</option>
            </select>
          </div>
          <div class="admin-control-center">
            <form action="">
              <span class="search-btn"
                ><i class="fa-light fa-magnifying-glass"></i
              ></span>
              <input
                id="form-search-product"
                type="text"
                class="form-search-input"
                placeholder="Tìm kiếm khách hàng..."
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
            <a href="admincustomer.html" class="reset-order"
              ><i class="fa-light fa-arrow-rotate-right"></i
            ></a>
            <button
              class="inner-nut"
              data-toggle="modal"
              data-target="#exampleModal"
            >
              <i class="fa-light fa-plus"></i> <span>Thêm khách hàng</span>
            </button>
          </div>
        </div>

        <div class="table">
          <table width="100%">
            <thead>
              <tr>
                <td>STT</td>
                <td>Họ và tên</td>
                <td>Liên hệ</td>
                <td>Mật khẩu</td>
                <td>Tình trạng</td>
                <td></td>
              </tr>
            </thead>
            <tbody>
              <?php
                $sql="SELECT * from khachhang";
                $result=mysqLi_query($conn,$sql);
              while($row=mysqli_fetch_array($result)){
              ?>
                <td><?php echo $row['makh']?></td>
                <td><?php echo $row['tenkh']?></td>
                <td><?php echo $row['sodienthoai']?></td>
                <td><?php echo $row['matkhau']?></td>
                <!-- ??? -->
                <td><span class="status-no-complete">Bị khóa</span></td>
                <td class="control control-table">
                  <a
                    href="admincustomer.php?this_id=<?php echo $row['makh']?>"
                    class="btn-edit"
                    name="btn-edit"
                    data-toggle="modal"
                    data-target="#exampleModal-2"
                  >
                    <i class="fa-light fa-pen-to-square"></i>
                    
                    </a>
                  <a
                    href="admincustomerunclock.html"
                    class="btn-delete"
                    id="delete-account"
                    onclick="khoaKhachHang()"
                  >
                    <i class="fa-regular fa-lock"></i>
                  </a>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>

        <!-- Modal Add Customer  -->

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
                <div class="inner-title">THÊM KHÁCH HÀNG MỚI</div>
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
                <form action="admincustomer.php" method="post">
                  <div class="row">
                    <div class="col-12">
                      <div class="form-group">
                        <label for="tenkh">Tên đầy đủ</label>
                        <input
                          type="text"
                          name="tenkh"
                          class="form-control"
                          placeholder="VD: Thành Đại"
                        />
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-group">
                        <label for="sodienthoai">Số điện thoại</label>
                        <input
                          type="text"
                          name="sodienthoai"
                          class="form-control"
                          placeholder="Nhập số điện thoại"
                        />
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-group">
                        <label for="diachi">Địa chỉ</label>
                        <input
                          type="text"
                          name="diachi"
                          class="form-control"
                          placeholder="Nhập địa chỉ"
                        />
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-group">
                        <label for="matkhau">Mật khẩu</label>
                        <input
                          type="text"
                          name="matkhau"
                          class="form-control"
                          placeholder="Nhập mật khẩu"
                        />
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="inner-add">
                        <button
                          type="submit"
                          class="inner-nut"
                          name="addcustomer"
                        >
                          Đăng ký
                        </button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

        <!-- End Modal Add Customer  -->

        <!-- Modal Change Customer  -->
        <?php
                $sql="SELECT * from khachhang";
                $result=mysqLi_query($conn,$sql);
              while($row=mysqli_fetch_array($result)){
                $modalId = "editModal-" . $row['makh'];
              ?>
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
                <div class="inner-title">CHỈNH SỬA THÔNG TIN</div>
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
                          value="<?php echo $row['tenkh']?>"
                        />
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-group">
                        <label for="name">Số điện thoại</label>
                        <input
                          type="text"
                          id="name"
                          class="form-control"
                          value="<?php echo $row['sodienthoai']?>"
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
                          value="<?php echo $row['diachi']?>"
                        />
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-group">
                        <label for="mk">Mật khẩu</label>
                        <input
                          type="text"
                          id="mk"
                          class="form-control"
                          value="<?php echo $row['matkhau']?>"
                        />
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="inner-add">
                        <button
                          type="button"
                          class="inner-nut"
                          onclick="changeKhachHang()"
                        >
                          <i class="fa-regular fa-floppy-disk"></i>
                          Lưu thông tin
                        </button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <?php } ?>
        <!-- End Modal Change Customer  -->
      </div>
    </div>

    <!-- End admincustomer  -->

    <script src="admin/js/jquery.min.js"></script>
    <script src="admin/js/bootstrap.min.js"></script>
    <script src="admin/js/main.js"></script>
    <script src="admin/js/popper.js"></script>
    <script src="assets/js/admin.js"></script>
  </body>
</html>
