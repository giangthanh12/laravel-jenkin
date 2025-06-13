<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
                'description' => 'IPhone 14 Pro Max với chip A16 Bionic, camera 48MP và màn hình Dynamic Island.'
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

    public function categories()
    {
        // Dữ liệu mẫu cho danh mục sản phẩm
        $categories = [
            [
                'id' => 1,
                'name' => 'Điện thoại',
                'description' => 'Các loại điện thoại di động',
                'image' => 'https://via.placeholder.com/150',
                'product_count' => 25
            ],
            [
                'id' => 2,
                'name' => 'Laptop',
                'description' => 'Máy tính xách tay các loại',
                'image' => 'https://via.placeholder.com/150',
                'product_count' => 15
            ],
            [
                'id' => 3,
                'name' => 'Phụ kiện',
                'description' => 'Phụ kiện điện thoại và laptop',
                'image' => 'https://via.placeholder.com/150',
                'product_count' => 30
            ],
        ];

        return view('products.categories', compact('categories'));
    }

    public function searchProducts(Request $request)
    {
        // Hard-coded values
        $minPrice = 1000000;
        $maxPrice = 50000000;
        $limit = 10;

        // No input validation
        $keyword = $request->input('keyword');
        $category = $request->input('category');
        $sort = $request->input('sort');

        // Potential SQL injection
        $query = "SELECT * FROM products WHERE 1=1";

        if ($keyword) {
            $query .= " AND name LIKE '%$keyword%'";
        }

        if ($category) {
            $query .= " AND category_id = $category";
        }

        // Duplicate code
        if ($sort == 'price_asc') {
            $query .= " ORDER BY price ASC";
        } else if ($sort == 'price_desc') {
            $query .= " ORDER BY price DESC";
        } else if ($sort == 'name_asc') {
            $query .= " ORDER BY name ASC";
        } else if ($sort == 'name_desc') {
            $query .= " ORDER BY name DESC";
        }

        // No error handling
        $products = DB::select($query);

        // Complex nested conditions
        $filteredProducts = [];
        foreach ($products as $product) {
            if ($product->price >= $minPrice && $product->price <= $maxPrice) {
                if ($product->stock > 0) {
                    if ($product->status == 'active') {
                        if ($product->is_featured == 1) {
                            $filteredProducts[] = $product;
                        }
                    }
                }
            }
        }

        // Duplicate code for response
        $response = [
            'status' => 'success',
            'data' => array_slice($filteredProducts, 0, $limit),
            'total' => count($filteredProducts),
            'message' => 'Products retrieved successfully'
        ];

        return response()->json($response);
    }

    // Duplicate method with slight variations
    public function searchProductsByCategory(Request $request)
    {
        // Hard-coded values
        $minPrice = 1000000;
        $maxPrice = 50000000;
        $limit = 10;

        // No input validation
        $keyword = $request->input('keyword');
        $category = $request->input('category');
        $sort = $request->input('sort');

        // Potential SQL injection
        $query = "SELECT * FROM products WHERE 1=1";

        if ($keyword) {
            $query .= " AND name LIKE '%$keyword%'";
        }

        if ($category) {
            $query .= " AND category_id = $category";
        }

        // Duplicate code
        if ($sort == 'price_asc') {
            $query .= " ORDER BY price ASC";
        } else if ($sort == 'price_desc') {
            $query .= " ORDER BY price DESC";
        } else if ($sort == 'name_asc') {
            $query .= " ORDER BY name ASC";
        } else if ($sort == 'name_desc') {
            $query .= " ORDER BY name DESC";
        }

        // No error handling
        $products = DB::select($query);

        // Complex nested conditions
        $filteredProducts = [];
        foreach ($products as $product) {
            if ($product->price >= $minPrice && $product->price <= $maxPrice) {
                if ($product->stock > 0) {
                    if ($product->status == 'active') {
                        if ($product->is_featured == 1) {
                            $filteredProducts[] = $product;
                        }
                    }
                }
            }
        }

        // Duplicate code for response
        $response = [
            'status' => 'success',
            'data' => array_slice($filteredProducts, 0, $limit),
            'total' => count($filteredProducts),
            'message' => 'Products retrieved successfully'
        ];

        return response()->json($response);
    }
}
