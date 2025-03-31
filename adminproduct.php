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
    ?>

      <!-- adminproduct  -->

      <div class="admin-product">
        <div class="admin-control">
          <div class="admin-control-left">
            <select name="the-loai" id="the-loai">
              <option>Tất cả</option>
              <option>Món chay</option>
              <option>Món mặn</option>
              <option>Món lẩu</option>
              <option>Món ăn vặt</option>
              <option>Món tráng miệng</option>
              <option>Nước uống</option>
              <option>Đã xóa</option>
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
                placeholder="Tìm kiếm tên món..."
              />
            </form>
          </div>
          <div class="admin-control-right">
            <a href="adminproduct.php" class="inner-nut"
              ><i class="fa-light fa-rotate-right"></i> Làm mới</a
            >
            <a href="adminaddproduct.php" class="inner-nut">
              <i class="fa-light fa-plus"></i> Thêm món mới
            </a>
          </div>
        </div>
        <div class="show-product">
          <div class="row">
          <?php
              include "database/CustomerDBconnect.php";
                $sql="SELECT * from sanpham";
                $result=mysqLi_query($conn,$sql);
              while($row=mysqli_fetch_array($result)){
                $modalId = "editModal-" . $row['ID'];
              ?>
            <div class="col-12">
              <div class="list">
                <div class="list-left">
                <img src="<?php echo $row['Image']; ?>" alt="<?php echo $row['Name']; ?>" />
                  <div class="list-info">
                    <h4><?php echo $row['Name']?></h4>
                    <p> <?php echo $row['Describtion']?> </p>
                    <div class="list-category"><?php echo $row['Type']?></div>
                  </div>
                </div>
                <div class="list-right">
                  <div class="list-price"><?php echo $row['Price'],".000₫"?></div>
                  <div class="list-control">
                    <div class="list-tool">
                      <a href="adminchangeproduct.html" class="btn-edit">
                        <i class="fa-light fa-pen-to-square"></i>
                      </a>
                      <a class="btn-delete" href="deleteproduct.php?this_id=<?php echo $row['ID']; ?>">
                            <i class="fa-regular fa-trash"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>
          </div>

          <!-- Modal Add Product  -->

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
                  <div class="inner-title">THÊM MỚI SẢN PHẨM</div>
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
                  <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                      <div class="inner-item">
                        <div class="inner-img">
                          <img src="assets/img/admin/blank-image.png" />
                        </div>
                        <div class="inner-choose">
                          <label for="choose"
                            ><i class="fa-light fa-cloud-arrow-up"></i> Chọn
                            hình ảnh</label
                          >
                          <input
                            id="choose"
                            type="file"
                            accept="image/png, image/jpg, image/jpeg, image/gif"
                          />
                        </div>
                      </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                      <div class="inner-item">
                        <form action="">
                          <div class="form-group">
                            <label for="name">Tên món</label>
                            <input
                              placeholder="Nhập tên món"
                              type="text"
                              id="name"
                              class="form-control"
                            />
                          </div>
                          <div class="inner-select">
                            <label for="select">Chọn món</label>
                            <select name="Món mặn" id="select">
                              <option>Món chay</option>
                              <option>Món mặn</option>
                              <option>Món lẩu</option>
                              <option>Món ăn vặt</option>
                              <option>Món tráng miệng</option>
                              <option>Nước uống</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="sell">Giá bán</label>
                            <input
                              type="text"
                              id="sell"
                              class="form-control"
                              placeholder="Nhập giá bán"
                            />
                          </div>
                          <div class="form-group">
                            <label for="desc">Mô tả</label>
                            <textarea
                              name="desc"
                              id="desc"
                              class="form-control"
                              placeholder="Nhập mô tả món ăn..."
                            ></textarea>
                          </div>
                          <div class="inner-add">
                            <button class="inner-nut" onclick="addMonAn()">
                              <i class="fa-solid fa-plus"></i>Thêm món
                            </button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- End Modal Add Product -->

          <!-- Modal Change Product -->

          <div
            class="modal fade"
            id="exampleModalCenter2"
            tabindex="-1"
            role="dialog"
            aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true"
          >
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <div class="inner-title">CHỈNH SỬA SẢN PHẨM</div>
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
                  <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                      <div class="inner-item">
                        <div class="inner-img">
                          <img src="assets/img/products/phobo.jpg" />
                        </div>
                        <div class="inner-choose">
                          <label for="choose"
                            ><i class="fa-light fa-cloud-arrow-up"></i> Chọn
                            hình ảnh</label
                          >
                          <input
                            id="choose"
                            type="file"
                            accept="image/png, image/jpg, image/jpeg, image/gif"
                          />
                        </div>
                      </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                      <div class="inner-item">
                        <form action="">
                          <div class="form-group">
                            <label for="name">Tên món</label>
                            <input
                              value="Phở bò"
                              type="text"
                              id="name"
                              class="form-control"
                            />
                          </div>
                          <div class="inner-select">
                            <label for="select">Chọn món</label>
                            <select name="Món mặn" id="select">
                              <option>Món chay</option>
                              <option selected>Món mặn</option>
                              <option>Món lẩu</option>
                              <option>Món ăn vặt</option>
                              <option>Món tráng miệng</option>
                              <option>Nước uống</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="sell">Giá bán</label>
                            <input
                              type="text"
                              id="sell"
                              class="form-control"
                              value="50.000 ₫"
                            />
                          </div>
                          <div class="form-group">
                            <label for="desc">Mô tả</label>
                            <textarea
                              name="desc"
                              id="desc"
                              class="form-control"
                            >
Phở là món ăn đặc trưng của Việt Nam với nước dùng trong vắt, đậm đà từ xương và gia vị. Sợi phở mềm, thường được ăn kèm với thịt bò hoặc gà thái mỏng, rau thơm, chanh và ớt. Vị thanh mát, thơm ngon của phở khiến người ăn dễ dàng mê mẩn ngay từ lần thử đầu tiên. Phở không chỉ ngon mà còn mang đậm hương vị truyền thống của ẩm thực Việt.</textarea
                            >
                          </div>
                          <div class="inner-add">
                            <button class="inner-nut" onclick="changeMonAn()">
                              <i class="fa-light fa-pencil"></i>Lưu thay đổi
                            </button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- End Modal Change Product -->
        </div>

        <!-- Pagination -->

        <div class="Pagination">
          <div class="container">
            <ul>
              <li>
                <a href="adminproduct.html" class="inner-trang trang-chinh">
                  1
                </a>
              </li>
              <li>
                <a href="adminproduct.html" class="inner-trang"> 2 </a>
              </li>
              <li>
                <a href="adminproduct.html" class="inner-trang"> 3 </a>
              </li>
              <li>
                <a href="adminproduct.html" class="inner-trang"> 4 </a>
              </li>
              <li>
                <a href="adminproduct.html" class="inner-trang"> 5 </a>
              </li>
            </ul>
          </div>
        </div>

        <!-- End Pagination -->
      </div>
    </div>

    <!-- End adminproduct  -->

    <script src="admin/js/jquery.min.js"></script>
    <script src="admin/js/bootstrap.min.js"></script>
    <script src="admin/js/main.js"></script>
    <script src="admin/js/popper.js"></script>
    <script src="assets/js/admin.js"></script>
  </body>
</html>
