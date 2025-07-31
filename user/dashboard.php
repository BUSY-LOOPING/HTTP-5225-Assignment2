<?php
require_once '../connect.php';
require_once '../session.php';

requireLogin();

$user = getCurrentUser();

// Get user's order history
$stmt = $pdo->prepare("
    SELECT o.id, o.order_date, o.total, COUNT(oi.id) as item_count 
    FROM orders o 
    LEFT JOIN order_items oi ON o.id = oi.order_id 
    WHERE o.customer_id = ? 
    GROUP BY o.id 
    ORDER BY o.order_date DESC 
    LIMIT 5
");
$stmt->execute([$_SESSION['user_id']]);
$recent_orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account - HumberStore</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .dashboard-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 2rem 0;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.2s;
        }
        .card:hover {
            transform: translateY(-2px);
        }
        .stat-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }
        .nav-link {
            border-radius: 10px;
            margin-bottom: 0.5rem;
        }
        .nav-link:hover {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="dashboard.php">
                <i class="fas fa-store me-2"></i>HumberStore
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">
                            <i class="fas fa-sign-out-alt me-1"></i>Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Dashboard Header -->
    <div class="dashboard-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1 class="mb-2">Welcome back, <?php echo htmlspecialchars($user['name']); ?>!</h1>
                    <p class="mb-0">Manage your account and view your orders</p>
                </div>
                <div class="col-md-4 text-end">
                    <i class="fas fa-user-circle" style="font-size: 4rem; opacity: 0.8;"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-3">
                            <i class="fas fa-user me-2"></i>Account Menu
                        </h5>
                        <nav class="nav flex-column">
                            <a class="nav-link active" href="dashboard.php">
                                <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                            </a>
                            <a class="nav-link" href="#">
                                <i class="fas fa-shopping-bag me-2"></i>My Orders
                            </a>
                            <a class="nav-link" href="#">
                                <i class="fas fa-heart me-2"></i>Wishlist
                            </a>
                            <a class="nav-link" href="#">
                                <i class="fas fa-user-edit me-2"></i>Edit Profile
                            </a>
                            <a class="nav-link" href="#">
                                <i class="fas fa-lock me-2"></i>Change Password
                            </a>
                        </nav>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-9">
                <!-- Account Information -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">
                            <i class="fas fa-info-circle me-2"></i>Account Information
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Name:</strong> <?php echo htmlspecialchars($user['name']); ?></p>
                                <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Address:</strong></p>
                                <p class="text-muted"><?php echo nl2br(htmlspecialchars($user['address'])); ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Orders -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">
                            <i class="fas fa-history me-2"></i>Recent Orders
                        </h5>
                    </div>
                    <div class="card-body">
                        <?php if (empty($recent_orders)): ?>
                            <div class="text-center py-4">
                                <i class="fas fa-shopping-cart" style="font-size: 3rem; color: #dee2e6;"></i>
                                <p class="text-muted mt-3">No orders yet. Start shopping!</p>
                                <a href="#" class="btn btn-primary">
                                    <i class="fas fa-shopping-bag me-2"></i>Browse Products
                                </a>
                            </div>
                        <?php else: ?>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Order #</th>
                                            <th>Date</th>
                                            <th>Items</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($recent_orders as $order): ?>
                                            <tr>
                                                <td>#<?php echo $order['id']; ?></td>
                                                <td><?php echo date('M j, Y', strtotime($order['order_date'])); ?></td>
                                                <td><?php echo $order['item_count']; ?> items</td>
                                                <td>$<?php echo number_format($order['total'], 2); ?></td>
                                                <td>
                                                    <span class="badge bg-success">Completed</span>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 