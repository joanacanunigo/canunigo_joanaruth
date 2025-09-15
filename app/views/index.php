<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Management</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #ffeef8 0%, #fff0f8 25%, #ffe8f5 50%, #ffebf7 75%, #ffffff 100%);
      min-height: 100vh;
      font-family: "Times New Roman", Times, serif;
    }
    
    .container {
      background: linear-gradient(145deg, #ffffff 0%, #fdf2f8 50%, #ffffff 100%);
      border: 2px solid rgba(255, 182, 193, 0.3);
      border-radius: 20px;
      margin-top: 20px;
      margin-bottom: 20px;
      position: relative;
      box-shadow: 0 8px 32px rgba(255, 182, 193, 0.2);
      backdrop-filter: blur(10px);
    }
    
    .container::before {
      content: '';
      position: absolute;
      top: -3px;
      left: -3px;
      right: -3px;
      bottom: -3px;
      background: linear-gradient(45deg, #ffb6c1, #ffc0cb, #ffffff, #ffb6c1);
      border-radius: 23px;
      z-index: -1;
    }

    .page-header {
      margin-bottom: 30px;
      background: linear-gradient(135deg, #ffeef8, #fff0f8);
      padding: 20px;
      border-radius: 15px;
      border: 1px solid rgba(255, 182, 193, 0.2);
    }

    .page-header h2 {
      background: linear-gradient(45deg, #d63384, #e91e63, #f06292);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .card {
      border: none;
      border-radius: 15px;
      background: linear-gradient(135deg, #ffffff 0%, #fef7ff 100%);
      box-shadow: 0 4px 20px rgba(255, 182, 193, 0.15);
    }

    .table thead {
      background: linear-gradient(135deg, #ffeef8, #fdf2f8);
      color: #d63384;
      border: none;
    }

    .table thead th {
      border: none;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      padding: 15px;
    }

    .table tbody tr {
      background: rgba(255, 255, 255, 0.7);
      transition: all 0.3s ease;
    }

    .table tbody tr:hover {
      background: linear-gradient(135deg, #ffeef8, #ffffff);
      transform: translateY(-2px);
      box-shadow: 0 4px 15px rgba(255, 182, 193, 0.2);
    }

    /* Pastel Blue Buttons */
    .btn-custom {
      border-radius: 25px;
      font-weight: 500;
      padding: 10px 25px;
      transition: all 0.3s ease;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }
    
    /* All buttons now use pastel blue */
    .btn-primary, .btn-primary:hover, .btn-primary:focus, .btn-primary:active,
    .btn-success, .btn-success:hover, .btn-success:focus, .btn-success:active {
      background: linear-gradient(135deg, #a8d8ff, #b8e0ff, #c8e8ff) !important;
      border: 2px solid #87ceeb !important;
      color: #2c5282 !important;
      box-shadow: 0 4px 15px rgba(135, 206, 235, 0.3);
    }
    
    .btn-primary:hover, .btn-success:hover {
      background: linear-gradient(135deg, #87ceeb, #a8d8ff) !important;
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(135, 206, 235, 0.4);
    }
    
    .btn-outline-primary, .btn-outline-primary:hover, .btn-outline-primary:focus, .btn-outline-primary:active {
      color: #2c5282 !important;
      border: 2px solid #87ceeb !important;
      background: rgba(168, 216, 255, 0.1) !important;
    }
    
    .btn-outline-primary:hover {
      background: linear-gradient(135deg, #a8d8ff, #c8e8ff) !important;
      color: #2c5282 !important;
      transform: translateY(-2px);
    }

    .btn-outline-danger {
      color: #dc3545 !important;
      border: 2px solid #ffb3d9 !important;
      background: rgba(255, 179, 217, 0.1) !important;
    }

    .btn-outline-danger:hover {
      background: linear-gradient(135deg, #ffb3d9, #ffc0cb) !important;
      color: #721c24 !important;
      border-color: #ff8fab !important;
    }

    /* Search Bar Styles */
    .search-container {
      background: linear-gradient(135deg, #ffffff, #ffeef8);
      border-radius: 15px;
      padding: 20px;
      border: 1px solid rgba(255, 182, 193, 0.2);
      box-shadow: 0 4px 15px rgba(255, 182, 193, 0.1);
    }

    .search-container .input-group-text {
      background: linear-gradient(135deg, #a8d8ff, #c8e8ff) !important;
      border: 2px solid #87ceeb !important;
      color: #2c5282 !important;
    }

    .search-container .form-control {
      border: 2px solid rgba(135, 206, 235, 0.3);
      border-radius: 10px;
      background: rgba(255, 255, 255, 0.8);
    }

    .search-container .form-control:focus {
      border-color: #87ceeb;
      box-shadow: 0 0 0 0.2rem rgba(135, 206, 235, 0.25);
      background: #ffffff;
    }
    
    .modal-content {
      border-radius: 20px;
      background: linear-gradient(135deg, #ffffff, #ffeef8);
      border: 2px solid rgba(255, 182, 193, 0.2);
      box-shadow: 0 10px 40px rgba(255, 182, 193, 0.3);
    }

    .modal-header {
      border-bottom: 1px solid rgba(255, 182, 193, 0.2);
      background: linear-gradient(135deg, #a8d8ff, #c8e8ff);
      color: #2c5282 !important;
      border-radius: 18px 18px 0 0;
    }

    .modal-header.bg-danger {
      background: linear-gradient(135deg, #ffb3d9, #ffc0cb) !important;
      color: #721c24 !important;
    }

    .modal-footer {
      border-top: 1px solid rgba(255, 182, 193, 0.2);
      background: rgba(255, 255, 255, 0.5);
    }

    .modal-body {
      background: rgba(255, 255, 255, 0.9);
    }

    .form-label {
      color: #d63384;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      font-size: 0.85rem;
    }

    .form-control {
      border: 2px solid rgba(255, 182, 193, 0.3);
      border-radius: 10px;
      background: rgba(255, 255, 255, 0.8);
      transition: all 0.3s ease;
    }

    .form-control:focus {
      border-color: #87ceeb;
      box-shadow: 0 0 0 0.2rem rgba(135, 206, 235, 0.25);
      background: #ffffff;
    }

    /* Content Layout */
    .main-content {
      display: flex;
      gap: 20px;
      align-items: flex-start;
    }

    .search-sidebar {
      flex: 0 0 300px;
    }

    .table-content {
      flex: 1;
    }

    @media (max-width: 768px) {
      .main-content {
        flex-direction: column;
      }
      .search-sidebar {
        flex: 1;
        width: 100%;
      }
    }

    /* Gradient accents */
    .gradient-accent {
      background: linear-gradient(45deg, #ffeef8, #fff0f8, #ffe8f5);
      padding: 2px;
      border-radius: 10px;
    }
  </style>
</head>
<body>

<div class="container py-5">
  <!-- Page Header -->
  <div class="page-header text-center">
    <h2 class="fw-bold">Fashion Inventory Management</h2>
    <p class="text-muted">Add, edit, and manage your product records efficiently.</p>
  </div>

  <!-- Alerts -->
  <div class="mb-3">
    <?php 
   getMessage();
    ?>
  </div>

  <div class="main-content">
    <!-- Search Sidebar -->
    <div class="search-sidebar">
      <div class="search-container">
        <h5 class="mb-3" style="color: #d63384; font-weight: 600;">Search Products</h5>
        <?php
        $q = '';
        if (isset($_GET['q'])) {
          $q = $_GET['q'];
        }
        ?>
        <form action="<?= site_url('/'); ?>" method="get">
          <div class="mb-3">
            <div class="input-group">
              <span class="input-group-text">
                🔍
              </span>
              <input type="text" name="q" class="form-control" placeholder="Search products..." value="<?= htmlspecialchars($q); ?>">
            </div>
          </div>
          <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary btn-custom flex-fill">Search</button>
            <?php if (!empty($q)): ?>
              <a href="<?= site_url('/'); ?>" class="btn btn-outline-primary btn-custom">Clear</a>
            <?php endif; ?>
          </div>
        </form>
        
        <!-- Add Product Button -->
        <div class="mt-4">
          <button class="btn btn-success btn-custom w-100 shadow-sm" data-bs-toggle="modal" data-bs-target="#addModal">
            ✨ Add New Product
          </button>
        </div>
      </div>
    </div>

    <!-- Table Content -->
    <div class="table-content">
      <div class="card shadow-sm">
        <div class="card-body p-0">
          <table class="table table-hover align-middle mb-0 text-center">
            <thead>
              <tr>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php if(!empty($all)): ?>
                <?php foreach($all as $product): ?>
                  <tr>
                    <td class="fw-semibold" style="color: #d63384;"><?= htmlspecialchars($product['product_name']); ?></td>
                    <td><span class="badge" style="background: linear-gradient(135deg, #a8d8ff, #c8e8ff); color: #2c5282;"><?= htmlspecialchars($product['quantity']); ?></span></td>
                    <td class="fw-bold" style="color: #e91e63;">₱<?= htmlspecialchars($product['Price']); ?></td>
                    <td class="text-muted"><?= htmlspecialchars($product['created_at']); ?></td>
                    <td class="text-muted"><?= htmlspecialchars($product['updated_at']); ?></td>
                    <td>
                      <button class="btn btn-sm btn-outline-primary btn-custom me-1" data-bs-toggle="modal" data-bs-target="#editModal<?= $product['id']; ?>">Edit</button>
                      <button class="btn btn-sm btn-outline-danger btn-custom" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $product['id']; ?>">Delete</button>
                    </td>
                  </tr>
                <?php endforeach; ?>
              <?php else: ?>
                <tr>
                  <td colspan="6" class="text-muted py-5">
                    <div class="text-center">
                      <div style="font-size: 3rem; color: #ffc0cb;">📦</div>
                      <h5 style="color: #d63384;">No products found</h5>
                      <p>Start by adding your first product!</p>
                    </div>
                  </td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
          <?php
          echo $page;
          ?>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Edit and Delete Modals -->
<?php if(!empty($all)): ?>
  <?php foreach($all as $product): ?>
    <!-- Edit Modal -->
    <div class="modal fade" id="editModal<?= $product['id']; ?>" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <form action="/update-product/<?= $product['id']; ?>" method="POST">
            <div class="modal-header">
              <h5 class="modal-title fw-bold">✏️ Edit Product</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
              <input type="hidden" name="id" value="<?= $product['id']; ?>">
              <div class="mb-3">
                <label class="form-label">Product Name</label>
                <input type="text" name="product_name" class="form-control" value="<?= htmlspecialchars($product['product_name']); ?>" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Quantity</label>
                <input type="number" name="quantity" class="form-control" value="<?= htmlspecialchars($product['quantity']); ?>" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Price</label>
                <input type="number" name="Price" class="form-control" step="0.01" value="<?= htmlspecialchars($product['Price']); ?>" required>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary btn-custom">💾 Update</button>
              <button type="button" class="btn btn-light btn-custom" data-bs-dismiss="modal">Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal<?= $product['id']; ?>" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <form action="/delete-product/<?= $product['id']; ?>" method="POST">
            <div class="modal-header bg-danger">
              <h5 class="modal-title fw-bold">🗑️ Delete Product</h5>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
              <p class="mb-0">Are you sure you want to delete <strong style="color: #d63384;"><?= htmlspecialchars($product['product_name']); ?></strong>?</p>
              <input type="hidden" name="id" value="<?= $product['id']; ?>">
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-outline-danger btn-custom">🗑️ Delete</button>
              <button type="button" class="btn btn-light btn-custom" data-bs-dismiss="modal">Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
<?php endif; ?>

<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form action="/create-user" method="POST">
        <div class="modal-header">
          <h5 class="modal-title fw-bold">✨ Add New Product</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Product Name</label>
            <input type="text" name="product_name" class="form-control" placeholder="Enter product name..." required>
          </div>
          <div class="mb-3">
            <label class="form-label">Quantity</label>
            <input type="number" name="quantity" class="form-control" placeholder="Enter quantity..." required>
          </div>
          <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="number" name="Price" class="form-control" step="0.01" placeholder="Enter price..." required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success btn-custom">✨ Add Product</button>
          <button type="button" class="btn btn-light btn-custom" data-bs-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="<?= BASE_URL; ?>/public/js/alert.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
// Alert auto-dismiss functionality
document.addEventListener('DOMContentLoaded', function() {
    // Auto-dismiss alerts after 5 seconds
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(function(alert) {
        setTimeout(function() {
            if (alert.classList.contains('show')) {
                alert.classList.remove('show');
                alert.classList.add('fade');
            }
        }, 5000);
    });

    // Add smooth hover effects to table rows
    const tableRows = document.querySelectorAll('tbody tr');
    tableRows.forEach(row => {
        row.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px)';
        });
        row.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
});
</script>
</body>
</html>