<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" />
    <link rel="stylesheet" href="assets/font-awesome-pro-v6-6.2.0/css/all.min.css" />
    <link rel="stylesheet" href="admin/css/style.css" />
    <link rel="stylesheet" href="assets/css/base.css" />
    <link rel="stylesheet" href="assets/css/admin.css" />
    <title>Thống Kê Khách Hàng</title>
    <link href="./assets/img/logo.png" rel="icon" type="image/x-icon" />
  </head>
  <body>
    <?php include_once "includes/headeradmin.php"; ?>

    <div class="admin-statistical">
      <div class="admin-control">
        <div class="admin-control-left">
          <!-- Optional: Add a dropdown if you want to filter by other criteria -->
        </div>
        <div class="admin-control-center">
          <form action="" class="form-search">
            <span onclick="thongKe()" class="search-btn"><i class="fa-light fa-magnifying-glass"></i></span>
            <input id="form-search-tk" type="text" class="form-search-input" placeholder="Tìm kiếm tên khách hàng..." />
          </form>
        </div>
        <div class="admin-control-right">
          <form action="" class="fillter-date">
            <div>
              <label for="time-start">Từ</label>
              <input type="date" class="form-control-date" id="time-start-tk" onchange="thongKe()" />
            </div>
            <div>
              <label for="time-end">Đến</label>
              <input type="date" class="form-control-date" id="time-end-tk" onchange="thongKe()" />
            </div>
          </form>
          <button class="reset-order" onclick="thongKe(1)">
            <i class="fa-regular fa-arrow-up-short-wide"></i>
          </button>
          <button class="reset-order" onclick="thongKe(2)">
            <i class="fa-regular fa-arrow-down-wide-short"></i>
          </button>
          <a href="adminstatistical.php" class="reset-order">
            <i class="fa-light fa-arrow-rotate-right"></i>
          </a>
        </div>
      </div>

      <div class="order-statistical">
        <div class="row">
          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="order-statistical-item">
              <div class="order-statistical-item-content">
                <p class="order-statistical-item-content-desc">Tổng số khách hàng</p>
                <h4 class="order-statistical-item-content-h" id="total-customers">0</h4>
              </div>
              <div class="order-statistical-item-icon">
                <i class="fa-light fa-users"></i>
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="order-statistical-item">
              <div class="order-statistical-item-content">
                <p class="order-statistical-item-content-desc">Tổng doanh thu</p>
                <h4 class="order-statistical-item-content-h" id="total-revenue">0 ₫</h4>
              </div>
              <div class="order-statistical-item-icon">
                <i class="fa-light fa-dollar-sign"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="table">
        <table width="100%">
          <thead>
            <tr>
              <td>STT</td>
              <td>Tên khách hàng</td>
              <td>Số đơn hàng</td>
              <td>Tổng tiền mua</td>
              <td>Chi tiết</td>
            </tr>
          </thead>
          <tbody id="showTk"></tbody>
        </table>
      </div>

      <!-- Modal for Order Details -->
      <div class="modal fade modal-form" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <table width="100%" id="modal-order-table">
                <thead>
                  <tr>
                    <th>Mã đơn</th>
                    <th>Sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th>Ngày đặt</th>
                  </tr>
                </thead>
                <tbody id="modal-order-details"></tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <!-- Pagination -->
      <div class="Pagination">
        <div class="container">
          <ul id="pagination"></ul>
        </div>
      </div>
    </div>

    <script src="admin/js/jquery.min.js"></script>
    <script src="admin/js/popper.js"></script>
    <script src="admin/js/bootstrap.min.js"></script>
    <script src="admin/js/main.js"></script>
    <script src="assets/js/admin.js"></script>
    <script>
      // Sample data (replace with actual data from your backend)
      const orders = [
        { customerId: 1, customerName: "Nguyễn Văn A", orderId: "DH1", product: "Bánh Mì", quantity: 10, price: 20000, date: "2024-11-20" },
        { customerId: 1, customerName: "Nguyễn Văn A", orderId: "DH2", product: "Phở Bò", quantity: 5, price: 50000, date: "2024-11-21" },
        { customerId: 2, customerName: "Trần Thị B", orderId: "DH3", product: "Bún Bò Huế", quantity: 8, price: 50000, date: "2024-11-22" },
        { customerId: 3, customerName: "Lê Văn C", orderId: "DH4", product: "Mì Quảng", quantity: 6, price: 40000, date: "2024-11-23" },
        { customerId: 4, customerName: "Phạm Thị D", orderId: "DH5", product: "Bánh bột lọc", quantity: 20, price: 30000, date: "2024-11-24" },
        { customerId: 5, customerName: "Hoàng Văn E", orderId: "DH6", product: "Chả cá", quantity: 4, price: 40000, date: "2024-11-25" },
        { customerId: 2, customerName: "Trần Thị B", orderId: "DH7", product: "Gỏi cuốn", quantity: 15, price: 30000, date: "2024-11-26" },
      ];

      function thongKe(sortOrder = 2, page = 1) {
        const startDate = document.getElementById("time-start-tk").value;
        const endDate = document.getElementById("time-end-tk").value;
        const searchQuery = document.getElementById("form-search-tk").value.toLowerCase();
        const itemsPerPage = 5;

        // Filter orders by date range
        let filteredOrders = orders.filter(order => {
          const orderDate = new Date(order.date);
          const start = startDate ? new Date(startDate) : null;
          const end = endDate ? new Date(endDate) : null;
          return (!start || orderDate >= start) && (!end || orderDate <= end);
        });

        // Filter by search query
        if (searchQuery) {
          filteredOrders = filteredOrders.filter(order => order.customerName.toLowerCase().includes(searchQuery));
        }

        // Group orders by customer
        const customerStats = {};
        filteredOrders.forEach(order => {
          if (!customerStats[order.customerId]) {
            customerStats[order.customerId] = {
              customerId: order.customerId, // Explicitly store customerId
              customerName: order.customerName,
              orders: [],
              total: 0,
              orderCount: 0,
            };
          }
          customerStats[order.customerId].orders.push(order);
          customerStats[order.customerId].total += order.quantity * order.price;
          customerStats[order.customerId].orderCount += 1;
        });

        // Convert to array and sort
        let customerArray = Object.values(customerStats);
        customerArray.sort((a, b) => sortOrder === 1 ? a.total - b.total : b.total - a.total);

        // Pagination
        const totalPages = Math.ceil(customerArray.length / itemsPerPage);
        const paginatedCustomers = customerArray.slice((page - 1) * itemsPerPage, page * itemsPerPage);

        // Update summary stats
        document.getElementById("total-customers").textContent = customerArray.length;
        const totalRevenue = customerArray.reduce((sum, cust) => sum + cust.total, 0);
        document.getElementById("total-revenue").textContent = totalRevenue.toLocaleString() + " ₫";

        // Render table
        const tbody = document.getElementById("showTk");
        tbody.innerHTML = "";
        paginatedCustomers.forEach((customer, index) => {
          const row = `
            <tr>
              <td>${(page - 1) * itemsPerPage + index + 1}</td>
              <td>${customer.customerName}</td>
              <td>${customer.orderCount}</td>
              <td>${customer.total.toLocaleString()} ₫</td>
              <td>
                <a href="adminthongkechitiet.php?customerId=${customer.customerId}" class="btn-detail">
                  <i class="fa-regular fa-eye"></i> Chi tiết
                </a>
              </td>
            </tr>
          `;
          tbody.innerHTML += row;
        });

        // Render pagination
        const pagination = document.getElementById("pagination");
        pagination.innerHTML = "";
        for (let i = 1; i <= totalPages; i++) {
          const li = `
            <li>
              <a href="#" class="inner-trang ${i === page ? 'trang-chinh' : ''}" onclick="thongKe(${sortOrder}, ${i}); return false;">
                ${i}
              </a>
            </li>
          `;
          pagination.innerHTML += li;
        }
      }

      function showCustomerOrders(customerId) {
        const customerOrders = orders.filter(order => order.customerId === parseInt(customerId));
        const modalBody = document.getElementById("modal-order-details");
        modalBody.innerHTML = "";
        customerOrders.forEach(order => {
          const formattedDate = order.date.split('-').reverse().join('/');
          const row = `
            <tr>
              <td>${order.orderId}</td>
              <td>${order.product}</td>
              <td>${order.quantity}</td>
              <td>${order.price.toLocaleString()} ₫</td>
              <td>${formattedDate}</td>
            </tr>
          `;
          modalBody.innerHTML += row;
        });
        $('#exampleModal').modal('show');
      }

      // Initial render
      thongKe();
    </script>
  </body>
</html>