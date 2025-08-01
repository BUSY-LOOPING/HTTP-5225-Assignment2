<?php
include('../includes/connect.php');
include('../auth/session.php');
include('../categories/functions.php');
include('../suppliers/functions.php');
include('functions.php');

$search = isset($_GET['search']) ? $_GET['search'] : '';
$category_id = isset($_GET['category_id']) ? $_GET['category_id'] : null;
$supplier_id = isset($_GET['supplier_id']) ? $_GET['supplier_id'] : null;

$products = search_products($connect, $search, $category_id, $supplier_id);
$categories = get_categories($connect);
$suppliers = get_suppliers($connect);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Products Management System</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container mt-5">
    <div class="row">
      <div class="col">
        <h1 class="display-5 mb-4">Product Directory</h1>
        <a href="add.php" class="btn btn-primary mb-3">Add New Product</a>

        <form method="GET" class="mb-4">
          <div class="row g-3">
            <div class="col-md-4">
              <input type="text" name="search" class="form-control" placeholder="Search products..." value="<?php echo $search; ?>">
            </div>
            <div class="col-md-3">
              <select name="category_id" class="form-select">
                <option value="">All Categories</option>
                <?php while ($category = mysqli_fetch_assoc($categories)): ?>
                  <option value="<?php echo $category['id']; ?>" <?php echo $category_id == $category['id'] ? 'selected' : ''; ?>>
                    <?php echo $category['name']; ?>
                  </option>
                <?php endwhile; ?>
              </select>
            </div>
            <div class="col-md-3">
              <select name="supplier_id" class="form-select">
                <option value="">All Suppliers</option>
                <?php while ($supplier = mysqli_fetch_assoc($suppliers)): ?>
                  <option value="<?php echo $supplier['id']; ?>" <?php echo $supplier_id == $supplier['id'] ? 'selected' : ''; ?>>
                    <?php echo $supplier['name']; ?>
                  </option>
                <?php endwhile; ?>
              </select>
            </div>
            <div class="col-md-2">
              <button type="submit" class="btn btn-secondary w-100">Filter</button>
            </div>
          </div>
        </form>

        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Product ID</th>
              <th>Image</th>
              <th>Name</th>
              <th>Price</th>
              <th>Stock</th>
              <th>Category</th>
              <th>Supplier</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($row = mysqli_fetch_assoc($products)): ?>
              <tr>
                <td><?php echo $row['id']; ?></td>
                <td><img src="../../<?php echo !empty($row['image']) ? $row['image'] : 'media/default.jpg'; ?>" alt="<?php echo $row['name']; ?>" class="img-fluid" style="max-width: 100px;"></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['price']; ?></td>
                <td><?php echo $row['stock']; ?></td>
                <td><?php echo $row['category']; ?></td>
                <td><?php echo $row['supplier']; ?></td>
                <td>
                  <a href="detail.php?id=<?php echo intval($row['id']); ?>" class="btn btn-sm btn-warning">Edit</a>
                  <a href="delete.php?id=<?php echo intval($row['id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">Delete</a>
                </td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>