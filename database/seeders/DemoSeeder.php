<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use App\Models\CartItem;

class DemoSeeder extends Seeder
{
    public function run(): void
    {
        // ===== USER TEST =====
        $user = User::firstOrCreate(
            ['email' => 'test@example.com'],
            ['name' => 'Test User', 'password' => Hash::make('12345678')]
        );
        $cart = Cart::firstOrCreate(['user_id' => $user->id]);

        // ===== DANH MỤC =====
        $catNames = ['Hoa bó','Hoa sinh nhật','Hoa cưới','Hoa khai trương','Hoa tang lễ','Hoa Giỏ','Lan Hồ Điệp'];
        $catIds   = [];

        foreach ($catNames as $name) {
            $cat = Category::firstOrCreate(
                ['slug' => Str::slug($name)],
                ['name' => $name]
            );
            $catIds[$name] = $cat->id;
        }

        // ===== HELPER: THÊM / CẬP NHẬT SẢN PHẨM =====
        $add = function(
            string $name,
            string $code,
            int $price,
            ?int $sale,
            string $cat,
            ?string $img = null,
            string $desc = ''
        ) use ($catIds) {
            return Product::updateOrCreate(
                ['code' => $code],
                [
                    'name'        => $name,
                    'category_id' => $catIds[$cat],
                    'image'       => $img, // ví dụ: 'products/lan1.png'
                    'price'       => $price,
                    'sale_price'  => $sale,
                    'description' => $desc ?: 'Bó hoa phối giấy Hàn, nơ lụa.'
                ]
            );
        };

        // ===== HOA BÓ =====
        $add('Bó Hoa Nắng Sớm',           'DH259', 200000, null,    'Hoa bó', 'products/bohoa1.png' );
        $add('Bó Hoa Không Phai', 'DH974', 300000, 250000,  'Hoa bó', 'products/bohoa2.png' );
        $add('Bó Hoa Dễ Thương',           'DH258', 250000, null,    'Hoa bó', 'products/bohoa3.png' );

        // ===== HOA SINH NHẬT =====
        $add('Sinh nhật Pastel SN101', 'SN101', 280000, 240000, 'Hoa sinh nhật', 'products/sn1.png' );
        $add('Sinh nhật Rực Rỡ SN102', 'SN102', 320000, null,   'Hoa sinh nhật', 'products/sn2.png' );
        $add('Sinh nhật Dịu Dàng SN103','SN103', 350000, 300000, 'Hoa sinh nhật', 'products/sn3.png' );

        // ===== HOA CƯỚI =====
        $add('Cưới Trắng Tinh CU201', 'CU201', 450000, null,    'Hoa cưới', 'products/hc1.png' );
        $add('Cưới Hồng Phấn CU202',  'CU202', 480000, 420000,  'Hoa cưới', 'products/hc2.png' );
        $add('Cưới Ngọc Trai CU203',  'CU203', 520000, null,    'Hoa cưới', 'products/hc3.png' );


        // ===== HOA KHAI TRƯƠNG =====
        $add('Khai trương Phát Tài KT301', 'KT301', 650000, null,   'Hoa khai trương', 'products/kt1.png' );
        $add('Khai trương Vạn Sự KT302',   'KT302', 690000, 620000, 'Hoa khai trương', 'products/kt2.png' );
        $add('Khai trương Thịnh Vượng KT303','KT303', 720000, null, 'Hoa khai trương', 'products/kt3.png' );

        // ===== HOA GIỎ =====
        $add('Giỏ Hoa Nắng Mai HG401', 'HG401', 420000, null,    'Hoa Giỏ', 'products/gio1.png' , 'Giỏ hoa vàng tươi rực rỡ.');
        $add('Giỏ Hoa Dịu Ngọt HG402', 'HG402', 460000, 430000,  'Hoa Giỏ', 'products/gio2.png' , 'Giỏ hoa pastel dịu nhẹ.');

        // ===== LAN HỒ ĐIỆP =====
        $add('Lan Hồ Điệp Trắng LHD501', 'LHD501', 980000,  null,    'Lan Hồ Điệp', 'products/lan1.png', 'Chậu lan trắng sang trọng.');
        $add('Lan Hồ Điệp Tím LHD502',   'LHD502', 1150000, 1050000, 'Lan Hồ Điệp', 'products/lan2.png', 'Chậu lan tím nổi bật.');

        // ===== THÊM 1 SẢN PHẨM VÀO GIỎ TEST =====
        $firstProduct = Product::first();
        if ($firstProduct) {
            CartItem::updateOrCreate(
                ['cart_id' => $cart->id, 'product_id' => $firstProduct->id],
                ['qty' => 1, 'price' => $firstProduct->sale_price ?? $firstProduct->price]
            );
        }
    }
}
