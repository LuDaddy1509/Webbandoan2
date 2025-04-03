<?php
include "../connect.php";

$category = isset($_POST['category']) ? $_POST['category'] : "";
$search = isset($_POST['search']) ? $_POST['search'] : "";

// Xây dựng câu truy vấn
$sql = "SELECT * FROM sanpham WHERE 1";

if ($category && $category != "") {
    $sql .= " AND Type = '" . mysqli_real_escape_string($conn, $category) . "'";
}
if ($search && $search != "") {
    $sql .= " AND Name LIKE '%" . mysqli_real_escape_string($conn, $search) . "%'";
}

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '
        <div class="col-12">
            <div class="list">
                <div class="list-left">
                    <img src="' . $row['Image'] . '" alt="' . $row['Name'] . '">
                    <div class="list-info">
                        <h4>' . $row['Name'] . '</h4>
                        <p>' . $row['Describtion'] . '</p>
                        <div class="list-category">' . $row['Type'] . '</div>
                    </div>
                </div>
                <div class="list-right">
                    <div class="list-price">' . $row['Price'] . '.000₫</div>
                    <div class="list-control">
                        <div class="list-tool">
                            <a href="adminchangeproduct.html" class="btn-edit"><i class="fa-light fa-pen-to-square"></i></a>
                            <a class="btn-delete" href="deleteproduct.php?this_id=' . $row['ID'] . '"><i class="fa-regular fa-trash"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
    }
} else {
    echo "<p>Không tìm thấy sản phẩm nào.</p>";
}

mysqli_close($conn);
?>
