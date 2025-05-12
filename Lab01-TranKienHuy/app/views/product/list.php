<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand" href="/Lab01-TranKienHuy/Product/list">Quản lý sản phẩm</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="/Lab01-TranKienHuy/Product/list">Danh sách sản phẩm</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row mb-4">
            <div class="col-md-8">
                <h1 class="display-5">Danh sách sản phẩm</h1>
            </div>
            <div class="col-md-4 text-md-end d-flex align-items-center justify-content-md-end">
                <a href="/Lab01-TranKienHuy/Product/add" class="btn btn-success">
                    <i class="bi bi-plus-circle me-2"></i>Thêm sản phẩm mới
                </a>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php foreach ($products as $product): ?>
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($product->getName(), ENT_QUOTES, 'UTF-8'); ?></h5>
                        <p class="card-text"><?php echo htmlspecialchars($product->getDescription(), ENT_QUOTES, 'UTF-8'); ?></p>
                        <p class="card-text fw-bold text-primary">
                            Giá: <?php echo number_format(htmlspecialchars($product->getPrice(), ENT_QUOTES, 'UTF-8')); ?> VND
                        </p>
                    </div>
                    <div class="card-footer bg-transparent border-0 d-flex justify-content-end">
                        <a href="/Lab01-TranKienHuy/Product/edit/<?php echo $product->getID(); ?>" class="btn btn-warning btn-sm me-2">
                            <i class="bi bi-pencil-square me-1"></i>Sửa
                        </a>
                        <a href="/Lab01-TranKienHuy/Product/delete/<?php echo $product->getID(); ?>" 
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">
                            <i class="bi bi-trash me-1"></i>Xóa
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- If No Products -->
        <?php if (empty($products)): ?>
        <div class="alert alert-info mt-4">
            <i class="bi bi-info-circle me-2"></i>Không có sản phẩm nào. Hãy thêm sản phẩm mới!
        </div>
        <?php endif; ?>
    </div>

    <footer class="bg-light py-4 mt-5">
        <div class="container text-center">
            <p class="text-muted mb-0">© 2280601252_TranKienHuy</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>