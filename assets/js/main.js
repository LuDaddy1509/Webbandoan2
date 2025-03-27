// Open Search Advanced
document.querySelector(".filter-btn").addEventListener("click", (e) => {
  e.preventDefault();
  document.querySelector(".advanced-search").classList.toggle("open");
  document.getElementById("home-service").scrollIntoView();
});

document.querySelector(".form-search-input").addEventListener("click", (e) => {
  e.preventDefault();
  document.getElementById("home-service").scrollIntoView();
});

function closeSearchAdvanced() {
  document.querySelector(".advanced-search").classList.toggle("open");
}

document.querySelectorAll(".inner-img a").forEach(function (item) {
  item.addEventListener("click", function (event) {
    event.preventDefault();
  });
});

function dangKi() {
  alert("Đăng kí thành công");
}

function thanhToan() {
  alert("Món ăn đã được thêm vào giỏ hàng !");
}

let lastScrollY = window.scrollY;
const headerBottom = document.querySelector(".header-bottom");

window.addEventListener("scroll", () => {
  if (window.scrollY > lastScrollY) {
    headerBottom.classList.add("hide");
    headerBottom.classList.remove("show");
  } else {
    headerBottom.classList.add("show");
    headerBottom.classList.remove("hide");
  }
  lastScrollY = window.scrollY;
});

function capNhat() {
  alert("Cập nhật thông tin thành công !");
}

function thayDoi() {
  alert("Đổi mật khẩu thành công !");
}

function tinhTien() {
  alert("Thanh toán thành công !");
}

function notLogin() {
  alert("Chưa đăng nhập tài khoản !");
}

document.addEventListener("DOMContentLoaded", function () {
  // Gán sự kiện mở/tắt bộ lọc
  let toggleFilterBtn = document.getElementById("toggle-filter-btn");
  let advancedSearch = document.getElementById("advanced-search"); // Sửa lỗi querySelector

  if (toggleFilterBtn && advancedSearch) {
      toggleFilterBtn.addEventListener("click", function () {
          advancedSearch.classList.toggle("active");
      });
  }

  // Gán sự kiện khi nhấn nút tìm kiếm
  let searchBtn = document.getElementById("advanced-search-price-btn");
  if (searchBtn) {
      searchBtn.addEventListener("click", function () {
          searchProducts();
      });
  }
});

function searchProducts(sortOrder = 0) {
  let name = document.getElementById("search-input")?.value.trim() || "";
  let category = document.getElementById("advanced-search-category-select")?.value || "";
  let minPrice = document.getElementById("min-price")?.value;
  let maxPrice = document.getElementById("max-price")?.value;

  minPrice = minPrice ? parseFloat(minPrice) : null;
  maxPrice = maxPrice ? parseFloat(maxPrice) : null;

  let formData = new FormData();
  formData.append("name", name);
  formData.append("category", category);
  if (minPrice !== null) formData.append("min_price", minPrice);
  if (maxPrice !== null) formData.append("max_price", maxPrice);
  formData.append("sort_order", sortOrder);

 fetch("includes/search.php", {
      method: "POST",
      body: formData
  })
  .then(response => response.json())
  .then(data => {
      let resultContainer = document.getElementById("search-results");
      resultContainer.innerHTML = ""; 

      console.log("Dữ liệu trả về từ PHP:", data); // Kiểm tra toàn bộ dữ liệu

      if (!Array.isArray(data) || data.length === 0) {
          resultContainer.innerHTML = "<p>Không tìm thấy sản phẩm phù hợp.</p>";
          return;
      }

      data.forEach(product => {
          console.log("Product data:", product); // Debug từng sản phẩm
          console.log("Product Image URL:", product.Image); // Kiểm tra URL
          if (!product.Image) {
              console.error("LỖI: product.Image bị undefined hoặc rỗng!");
              return;
          }

          let productHTML = `
          <div class="Products">
          <div class="container">
              <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
                      <div class="inner-item">
                          <a href="chitietsp.php?id=${product.ID}" class="inner-img">
                              <img src="${product.Image}" />
                          </a>
                          <div class="inner-info">
                              <div class="inner-ten">${product.Name}</div>
                              <div class="inner-gia">${product.Price}.000 ₫</div>
                              <a href="chitietsp.php?id=<?= ${product.ID}; ?>" class="inner-muahang">
                                  <i class="fa-solid fa-cart-plus"></i> ĐẶT MÓN
                              </a>
                          </div>
                      </div>
                  </div>
              </div> <!-- Đóng row đúng chỗ -->
          </div>
      </div>

              
          `;
          resultContainer.innerHTML += productHTML;
      });
  })
  .catch(error => console.error("Lỗi khi tìm kiếm sản phẩm:", error));

}
