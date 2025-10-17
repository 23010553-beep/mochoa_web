# 🌸 Mộc Hoa – Flower Shop (Laravel + Tailwind + MySQL)
Họ tên: Đỗ Như Phú

MSSV: 23010553

Lớp: Thiết kế web nâng cao-1-1-25(COUR01.TH7)

Môn: Thiết kế web nâng cao

# 🔎 Giới thiệu Project

- Đây là ứng dụng bán hoa online xây dựng bằng **Laravel + Tailwind CSS + MySQL**.

- Website cung cấp danh mục hoa (hoa bó, sinh nhật, cưới, khai trương, hoa giỏ, lan hồ điệp), tìm kiếm, xem chi tiết, giỏ hàng và đặt mua.
## 🎯 Chức năng chính
- Đăng ký / Đăng nhập (Breeze).

- Duyệt danh mục và sản phẩm.

- Tìm kiếm sản phẩm theo từ khoá.

- Giỏ hàng: thêm/xoá/cập nhật số lượng.

- Xem chi tiết sản phẩm.

- Seeder dữ liệu mẫu (sản phẩm & danh mục).

- Bảo mật CSRF, validate form theo route.

- Giao diện responsive (Tailwind CSS).
# 🗺️ Sơ đồ Dự Án (Mermaid)
## Cấu trúc tổng quan
```mermaid
flowchart TB
    A[Khách truy cập] --> B[Trang chủ / Danh mục]
    B --> C{Chọn danh mục}
    C -->|Hoa bó| P1[Danh sách sản phẩm]
    C -->|Hoa sinh nhật| P2[Danh sách sản phẩm]
    C -->|Hoa cưới| P3[Danh sách sản phẩm]
    C -->|Khai trương| P4[Danh sách sản phẩm]
    C -->|Hoa giỏ| P5[Danh sách sản phẩm]
    C -->|Lan hồ điệp| P6[Danh sách sản phẩm]
    P1 --> D[Chi tiết sản phẩm]
    P2 --> D
    P3 --> D
    P4 --> D
    P5 --> D
    P6 --> D
    D --> E[Thêm giỏ hàng]
    E --> F[Giỏ hàng]
    F --> G[Đặt hàng]
    G --> H[(MySQL)]
```
## Luồng thêm sản phẩm (Add to cart)
```mermaid
flowchart TD
    S[Bắt đầu] --> V[Chọn sản phẩm]
    V --> C{Còn hàng?}
    C -- Không --> X[Kết thúc]
    C -- Có --> A[Chọn số lượng]
    A --> T[Thêm vào giỏ hàng]
    T --> U[Lưu CartItem vào DB]
    U --> Y[Hiển thị giỏ hàng]
    Y --> X[Kết thúc]
```
## Luồng thanh toán đơn giản
```mermaid
flowchart TD
    A[Giỏ hàng] --> B[Nhập thông tin nhận hàng]
    B --> C[Đặt hàng]
    C --> D[Lưu đơn hàng & items vào DB]
    D --> E[Thông báo thành công]
```
