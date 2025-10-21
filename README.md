# 🌸 Mộc Hoa – Flower Shop (Laravel + Tailwind + MySQL)
Họ tên: Đỗ Như Phú - 23010553

        Lục Thị Thu Hằng -23010137

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
# 🖼️ Ảnh chụp màn hình


## Trang chủ / Danh mục
<img width="1896" height="909" alt="image" src="https://github.com/user-attachments/assets/db0e679b-e2c4-4189-9efa-2c1c5f46f123" />


## Danh sách sản phẩm
<img width="1916" height="907" alt="image" src="https://github.com/user-attachments/assets/387f8fe9-2262-4f11-8b0f-9396ae5e5491" />
<img width="1919" height="908" alt="image" src="https://github.com/user-attachments/assets/b4350bd4-bec3-477f-8a2f-ba7e1bd6a2ae" />


## Chi tiết sản phẩm
<img width="1895" height="905" alt="image" src="https://github.com/user-attachments/assets/8cc711e3-bc4c-420f-b661-6b85fc7cd107" />


## Giỏ hàng
<img width="1915" height="907" alt="image" src="https://github.com/user-attachments/assets/ff81b770-f6b3-4275-af75-0fbc489fdf6e" />

# 💡 Code minh họa
- Model
<img width="200" height="161" alt="image" src="https://github.com/user-attachments/assets/fe8df26b-65cb-43de-a17c-e89b07d8b748" />

- Controller
<img width="317" height="189" alt="image" src="https://github.com/user-attachments/assets/5ca312fe-d936-49c7-aa5f-c81f42dfc6ab" />

- View
<img width="429" height="415" alt="image" src="https://github.com/user-attachments/assets/9c410dab-e9e2-403c-9773-c2883dea5c0b" />

# Youtube demo
https://youtu.be/ddYPu8Svihc
