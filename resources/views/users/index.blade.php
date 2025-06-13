<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách người dùng</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50">
    <div class="container mx-auto px-4 py-8">
        <!-- Header -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">Quản lý người dùng</h1>
            <p class="text-gray-600">Danh sách người dùng trong hệ thống</p>
        </div>

        <!-- Search and Filter -->
        <div class="mb-8 flex flex-wrap gap-4 justify-between items-center">
            <div class="flex-1 max-w-md">
                <div class="relative">
                    <input type="text" placeholder="Tìm kiếm người dùng..."
                           class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <i class="fas fa-search absolute right-3 top-3 text-gray-400"></i>
                </div>
            </div>
            <div class="flex gap-4">
                <select class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Tất cả phòng ban</option>
                    <option value="IT">IT</option>
                    <option value="Marketing">Marketing</option>
                    <option value="Sales">Sales</option>
                    <option value="HR">HR</option>
                </select>
                <select class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Tất cả vai trò</option>
                    <option value="Admin">Admin</option>
                    <option value="Editor">Editor</option>
                    <option value="User">User</option>
                </select>
                <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-300">
                    <i class="fas fa-plus mr-2"></i>Thêm người dùng
                </button>
            </div>
        </div>

        <!-- Users Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($users as $user)
            <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition duration-300 hover:scale-105">
                <div class="p-6">
                    <div class="flex items-center space-x-4 mb-4">
                        <img src="{{ $user['avatar'] }}" alt="{{ $user['name'] }}"
                             class="w-16 h-16 rounded-full object-cover border-4 border-gray-100">
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800">{{ $user['name'] }}</h3>
                            <p class="text-gray-600">{{ $user['email'] }}</p>
                        </div>
                    </div>

                    <div class="space-y-3">
                        <div class="flex items-center justify-between">
                            <span class="text-gray-600">Vai trò:</span>
                            <span class="px-3 py-1 rounded-full text-sm font-semibold
                                {{ $user['role'] === 'Admin' ? 'bg-red-100 text-red-800' :
                                   ($user['role'] === 'Editor' ? 'bg-yellow-100 text-yellow-800' :
                                   'bg-green-100 text-green-800') }}">
                                {{ $user['role'] }}
                            </span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-gray-600">Phòng ban:</span>
                            <span class="font-medium text-gray-800">{{ $user['department'] }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-gray-600">Trạng thái:</span>
                            <span class="px-3 py-1 rounded-full text-sm font-semibold
                                {{ $user['status'] === 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $user['status'] === 'active' ? 'Đang hoạt động' : 'Không hoạt động' }}
                            </span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-gray-600">Đăng nhập cuối:</span>
                            <span class="text-sm text-gray-500">{{ $user['last_login'] }}</span>
                        </div>
                    </div>

                    <div class="mt-6 flex justify-end space-x-3">
                        <button class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition duration-300">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition duration-300">
                            <i class="fas fa-trash"></i>
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
