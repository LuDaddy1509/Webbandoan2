<?php 
include "connect.php";
$makh = $_SESSION['makh'];

$sql = "SELECT s.Name, s.Image, s.Price, g.soluong, (g.soluong * s.Price) as total 
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

      <div class="modal-body">
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
                <input class="minus is-form" type="button" value="-" />
                <input class="input-qty" type="text" value="<?= $row['soluong']; ?>" />
                <input class="plus is-form" type="button" value="+" />
              </div>
            </div>
          </div>
          <?php endwhile; ?>
        <?php else: ?>
          <p>🛒 Giỏ hàng của bạn đang trống.</p>
        <?php endif; ?>
      </div>

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
