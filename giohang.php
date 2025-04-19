



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
<?php include "includes/headerlogin.php" ?>
<div class="ThongTin">
<div class="container">
<?php
include 'connect.php';
$makh = $_SESSION['makh'];

$sql = "
SELECT gh.*, sp.Name, sp.Image 
FROM giohang gh 
JOIN sanpham sp ON gh.masp = sp.ID 
WHERE gh.makh = ?
";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $makh);
$stmt->execute();
$result = $stmt->get_result();
?>

<table border="1" cellpadding="10">
    <tr>
        <th>Tên</th>
        <th>Đơn giá</th>
        <th>Số lượng</th>
        <th>Tổng tiền</th>
        <th>Hành động</th>
    </tr>
    <?php $tong = 0; while ($row = $result->fetch_assoc()): ?>
    <tr data-id="<?= $row['masp'] ?>">
        <td><?= $row['Name'] ?></td>
        <td><?= number_format($row['dongia']) ?>.000đ</td>
        <td><button class="minus">-</button>
        <input type="number" class="qty" value="<?= $row['soluong'] ?>" min="1" style="width:50px; text-align:center;">
        <button class="plus">+</button></td>
        <td><?= number_format($row['tongtien']) ?>.000đ</td>
        <td><button class="remove">Xoá</button></td>
    </tr>
    <?php $tong += $row['tongtien']; endwhile; ?>
</table>

<h3>Tổng cộng: <?= number_format($tong) ?>.000đ</h3>
<form action="<?php echo isset($_SESSION['makh']) ? 'thanhtoan.php?makh=' . urlencode($_SESSION['makh']) : 'giohang.php'; ?>" method="post">
    <button type="submit" class="btn btn-success">🛒 Thanh toán</button>
</form>
</div>
</div>
<?php include "includes/footer.php"; ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
  $('.plus').click(function() {
        let row = $(this).closest('tr');
        let input = row.find('.qty');
        let val = parseInt(input.val()) || 1;
        let id = row.data('id');

        $.post('capnhat_giohang.php', { masp: id, soluong: val + 1 }, function() {
            location.reload();
        });
    });
    $('.minus').click(function() {
        let row = $(this).closest('tr');
        let input = row.find('.qty');
        let val = parseInt(input.val()) || 1;
        let id = row.data('id');
        if (val > 1) {
            $.post('capnhat_giohang.php', { masp: id, soluong: val - 1 }, function() {
                location.reload();
            });
        }
    });
    $('.qty').change(function() {
        let row = $(this).closest('tr');
        let id = row.data('id');
        let qty = $(this).val();

        $.post('capnhat_gio.php', { masp: id, soluong: qty }, function() {
            location.reload();
        });
    });

$('.remove').click(function(){
    let row = $(this).closest('tr');
    let id = row.data('id');
    $.post('xoa_giohang.php', { masp: id }, function(){
        location.reload();
    });
});
});
</script>
</body>
</html>
