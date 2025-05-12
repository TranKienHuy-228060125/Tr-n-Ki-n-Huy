<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <script>
    function validateForm() {
        let name = document.getElementById('name').value;
        let price = document.getElementById('price').value;
        let errors = [];
        
        if (name.length < 10 || name.length > 100) {
            errors.push('Tên sản phẩm phải có từ 10 đến 100 ký tự.');
        }
        
        if (price <= 0 || isNaN(price)) {
            errors.push('Giá phải là một số dương lớn hơn 0.');
        }
        
        if (errors.length > 0) {
            let errorHtml = '<div class="alert alert-danger"><ul class="mb-0">';
            errors.forEach(error => {
                errorHtml += '<li>' + error + '</li>';
            });
            errorHtml += '</ul></div>';
            
            document.getElementById('validation-errors').innerHTML = errorHtml;
            return false;
        }
        return true;
    }
    </script>
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
                        <a class="nav-link" href="/Lab01-TranKienHuy/Product/list">Danh sách sản phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Lab01-TranKienHuy/Product/add">Thêm sản phẩm</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card shadow">
                    <div class="card-header bg-light d-flex justify-content-between align-items-center">
                        <h1 class="card-title h4 mb-0">Sửa sản phẩm</h1>
                        <span class="badge bg-secondary">ID: <?php echo $product->getID(); ?></span>
                    </div>
                    <div class="card-body">
                        <!-- Validation errors will be shown here -->
                        <div id="validation-errors"></div>

                        <!-- Edit Product Form -->
                        <form method="POST" action="/Lab01-TranKienHuy/Product/edit/<?php echo $product->getID(); ?>" onsubmit="return validateForm();" class="needs-validation">
                            <div class="mb-3">
                                <label for="name" class="form-label">Tên sản phẩm:</label>
                                <input type="text" class="form-control" id="name" name="name" 
                                       value="<?php echo htmlspecialchars($product->getName(), ENT_QUOTES, 'UTF-8'); ?>" required>
                                <div class="form-text">Tên sản phẩm phải có từ 10 đến 100 ký tự</div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="description" class="form-label">Mô tả:</label>
                                <textarea class="form-control" id="description" name="description" rows="4" required><?php echo htmlspecialchars($product->getDescription(), ENT_QUOTES, 'UTF-8'); ?></textarea>
                            </div>
                            
                            <div class="mb-3">
                                <label for="price" class="form-label">Giá:</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="price" name="price" 
                                           value="<?php echo htmlspecialchars($product->getPrice(), ENT_QUOTES, 'UTF-8'); ?>" required>
                                    <span class="input-group-text">VND</span>
                                </div>
                                <div class="form-text">Giá phải là một số dương lớn hơn 0</div>
                            </div>
                            
                            <div class="d-flex gap-2 mt-4">
                                <button type="submit" class="btn btn-warning">
                                    <i class="bi bi-save me-2"></i>Lưu thay đổi
                                </button>
                                <a href="/Lab01-TranKienHuy/Product/list" class="btn btn-secondary">
                                    <i class="bi bi-arrow-left me-2"></i>Quay lại danh sách
                                </a>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Danger Zone -->
                <div class="card mt-4 border-danger">
                    <div class="card-header text-bg-danger">
                        <h5 class="mb-0">Cảnh báo!</h5>
                    </div>
                    <div class="card-body">
                        <p>Cẩn thận: Hành động này không thể hoàn tác!</p>
                        <a href="/Lab01-TranKienHuy/Product/delete/<?php echo $product->getID(); ?>" 
                           class="btn btn-outline-danger"
                           onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">
                            <i class="bi bi-trash me-2"></i>Xóa sản phẩm
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-light py-4 mt-5">
        <div class="container text-center">
            <p class="text-muted mb-0">© 2280601252_TranKienHuy</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>