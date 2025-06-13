<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Mục Sản Phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .category-card {
            transition: transform 0.3s ease;
            border: none;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .category-card:hover {
            transform: translateY(-5px);
        }
        .category-image {
            height: 200px;
            object-fit: cover;
        }
        .category-count {
            position: absolute;
            top: 10px;
            right: 10px;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.9em;
        }
        .category-title {
            font-size: 1.5em;
            font-weight: bold;
            margin-bottom: 10px;
            color: #333;
        }
        .category-description {
            color: #666;
            font-size: 1.1em;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container py-5">
        <h1 class="text-center mb-5">Danh Mục Sản Phẩm</h1>

        <div class="row g-4">
            @foreach($categories as $category)
            <div class="col-md-4">
                <div class="card category-card h-100">
                    <div class="position-relative">
                        <img src="{{ $category['image'] }}" class="card-img-top category-image" alt="{{ $category['name'] }}">
                        <span class="category-count">
                            <i class="fas fa-box"></i> {{ $category['product_count'] }} sản phẩm
                        </span>
                    </div>
                    <div class="card-body">
                        <h5 class="category-title">{{ $category['name'] }}</h5>
                        <p class="category-description">{{ $category['description'] }}</p>
                        <a href="#" class="btn btn-primary w-100">
                            <i class="fas fa-arrow-right"></i> Xem chi tiết
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
