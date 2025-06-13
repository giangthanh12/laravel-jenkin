<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // Tạo dữ liệu test cho sản phẩm
        $products = [
            [
                'id' => 1,
                'name' => 'iPhone 14 Pro Max',
                'price' => 999.99,
                'category' => 'Điện thoại',
                'stock' => 50,
                'image' => 'https://images.unsplash.com/photo-1678685888221-cda773a3dcdb?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8aXBob25lJTIwMTR8ZW58MHx8MHx8fDA%3D',
                'description' => 'iPhone 14 Pro Max với chip A16 Bionic, camera 48MP và màn hình Dynamic Island.'
            ],
            [
                'id' => 2,
                'name' => 'MacBook Pro M2',
                'price' => 1299.99,
                'category' => 'Laptop',
                'stock' => 30,
                'image' => 'https://images.unsplash.com/photo-1517336714731-489689fd1ca8?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8bWFjYm9va3xlbnwwfHwwfHx8MA%3D%3D',
                'description' => 'MacBook Pro với chip M2, màn hình Liquid Retina XDR và thời lượng pin lên đến 20 giờ.'
            ],
            [
                'id' => 3,
                'name' => 'AirPods Pro 2',
                'price' => 249.99,
                'category' => 'Phụ kiện',
                'stock' => 100,
                'image' => 'https://images.unsplash.com/photo-1600294037681-c80b4cb5b434?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8YWlycG9kc3xlbnwwfHwwfHx8MA%3D%3D',
                'description' => 'AirPods Pro 2 với chống ồn chủ động, chế độ xuyên âm và thời lượng pin lên đến 6 giờ.'
            ],
            [
                'id' => 4,
                'name' => 'iPad Pro M2',
                'price' => 799.99,
                'category' => 'Máy tính bảng',
                'stock' => 45,
                'image' => 'https://images.unsplash.com/photo-1544244015-0df4b3ffc6b0?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8aXBhZHxlbnwwfHwwfHx8MA%3D%3D',
                'description' => 'iPad Pro với chip M2, màn hình Liquid Retina XDR và hỗ trợ Apple Pencil 2.'
            ],
            [
                'id' => 5,
                'name' => 'Apple Watch Series 8',
                'price' => 399.99,
                'category' => 'Đồng hồ thông minh',
                'stock' => 60,
                'image' => 'https://images.unsplash.com/photo-1579586337278-3befd40fd17a?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8YXBwbGUlMjB3YXRjaHxlbnwwfHwwfHx8MA%3D%3D',
                'description' => 'Apple Watch Series 8 với tính năng theo dõi sức khỏe nâng cao và thời lượng pin lên đến 18 giờ.'
            ]
        ];

        return view('products.index', compact('products'));
    }
}
