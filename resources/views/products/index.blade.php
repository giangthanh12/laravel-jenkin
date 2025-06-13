<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50">
    <div class="container mx-auto px-4 py-8">
        <!-- Header -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">Danh sách sản phẩm</h1>
            <p class="text-gray-600">Khám phá các sản phẩm công nghệ mới nhất</p>
        </div>

        <!-- Search and Filter -->
        <div class="mb-8 flex flex-wrap gap-4 justify-between items-center">
            <div class="flex-1 max-w-md">
                <div class="relative">
                    <input type="text" placeholder="Tìm kiếm sản phẩm..."
                           class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <i class="fas fa-search absolute right-3 top-3 text-gray-400"></i>
                </div>
            </div>
            <div class="flex gap-4">
                <select class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Tất cả danh mục</option>
                    <option value="phone">Điện thoại</option>
                    <option value="laptop">Laptop</option>
                    <option value="tablet">Máy tính bảng</option>
                    <option value="accessory">Phụ kiện</option>
                </select>
                <select class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Sắp xếp theo</option>
                    <option value="price_asc">Giá tăng dần</option>
                    <option value="price_desc">Giá giảm dần</option>
                    <option value="name">Tên A-Z</option>
                </select>
            </div>
        </div>

        <!-- Products Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($products as $product)
            <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition duration-300 hover:scale-105">
                <div class="relative">
                    <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}"
                         class="w-full h-64 object-cover">
                    <div class="absolute top-4 right-4">
                        <span class="px-3 py-1 rounded-full text-sm font-semibold
                            {{ $product['stock'] > 30 ? 'bg-green-100 text-green-800' :
                               ($product['stock'] > 10 ? 'bg-yellow-100 text-yellow-800' :
                               'bg-red-100 text-red-800') }}">
                            {{ $product['stock'] > 0 ? 'Còn hàng' : 'Hết hàng' }}
                        </span>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <span class="px-3 py-1 rounded-full text-sm font-semibold bg-blue-100 text-blue-800">
                            {{ $product['category'] }}
                        </span>
                        <span class="text-2xl font-bold text-gray-800">
                            ${{ number_format($product['price'], 2) }}
                        </span>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $product['name'] }}</h3>
                    <p class="text-gray-600 mb-4">{{ $product['description'] }}</p>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-500">ID: #{{ $product['id'] }}</span>
                        <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-300">
                            <i class="fas fa-shopping-cart mr-2"></i>Thêm vào giỏ
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-12 flex justify-center">
            <nav class="flex items-center gap-2">
                <button class="px-4 py-2 rounded-lg border border-gray-300 hover:bg-gray-50">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="px-4 py-2 rounded-lg bg-blue-600 text-white">1</button>
                <button class="px-4 py-2 rounded-lg border border-gray-300 hover:bg-gray-50">2</button>
                <button class="px-4 py-2 rounded-lg border border-gray-300 hover:bg-gray-50">3</button>
                <button class="px-4 py-2 rounded-lg border border-gray-300 hover:bg-gray-50">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </nav>
        </div>
    </div>
</body>
</html>
