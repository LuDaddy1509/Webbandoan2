<?php 
include "connect.php";
$makh = $_SESSION['makh'];
$sql = "SELECT s.Name,s.ID, s.Image, s.Price, g.soluong, (g.soluong * s.Price) as total 
        FROM giohang g
        JOIN sanpham s ON g.masp = s.ID
        WHERE g.makh = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $makh);
$stmt->execute();
$result = $stmt->get_result();
$total_price = 0;
?>
<div class="modal fade right" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="cartModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="inner-shopping">
          <div class="inner-icon">
            <i class="fa-solid fa-basket-shopping"></i>
          </div>
          <span class="inner-text-shopping">Giỏ hàng</span>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body scrollable-modal-body">

        <?php if ($result->num_rows > 0): ?>
          <?php while ($row = $result->fetch_assoc()): 
            $total_price += $row['total'];
          ?>
         
          <div class="cart-item">

            <div class="inner-product">
              <img src="<?= htmlspecialchars($row['Image']); ?>" alt="Product Image" />
              <div class="inner-gia"><?= number_format($row['Price'], 0, ',', '.'); ?>.000₫</div>
            </div>
            <div class="inner-info">
              <div class="inner-ten"><?= htmlspecialchars($row['Name']); ?></div>
              <div class="buttons_added">
              <form action="" method="post">
  <input type="hidden" name="masp" value="<?= $row['ID'];?>">
  <input class="minus is-form" type="button" value="-" />
  <input class="input-qty" type="text" value="<?= $row['soluong']; ?>" />
  <input class="plus is-form" type="button" value="+" />
  <button type="submit" name="xoasp" class="bn-delete-product">Xoá</button>
</form>

          </div>
          </div>
          </div>
          <?php endwhile; ?>
        <?php else: ?>
          <p>🛒 Giỏ hàng của bạn đang trống.</p>
        <?php endif; ?>
      </div>
      <?php
include "connect.php";
if (isset($_POST['xoasp'])) {
    $makh = $_SESSION['makh'];
    $masp = $_POST['masp'];
    $sql = "DELETE FROM giohang WHERE makh = ? AND masp = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $makh, $masp);
    if ($stmt->execute()) {
    header("location: login.php");
    exit();
    } else {
        echo "<script>
                alert('⚠️ Lỗi khi xóa sản phẩm!');
              </script>";
    }
}
?>


      <div class="modal-footer">
        <div class="inner-tong">
          <div class="inner-text-tong">Tổng tiền:</div>
          <div class="inner-gia-tong"><?= number_format($total_price, 0, ',', '.'); ?>.000₫</div>
        </div>
        <div class="inner-nut">
          <button type="button" class="inner-tm" data-dismiss="modal" aria-label="Close">
            <i class="fa-solid fa-plus"></i>Thêm món
          </button>
          <a href="thanhtoan.php" class="inner-tt">Thanh toán</a>
        </div>
      </div>
    </div>
  </div>
</div>
<style>
  .bn-delete-product {
  background-color: #ff4d4d;
  color: white;
  border: none;
  padding: 6px 10px;
  margin-left: 10px;
  cursor: pointer;
  border-radius: 4px;
  font-size: 14px;
  transition: background-color 0.3s ease;
}
.bn-delete-product:hover {
  background-color: #e60000;
}
.modal-body {
  max-height: 600px; /* hoặc 500px tuỳ ý */
  overflow-y: auto;
  padding-right: 10px; /* để không bị cắt thanh cuộn */
}
.scrollable-modal-body {
  max-height: 510px;
  overflow-y: auto;
}


</style>
