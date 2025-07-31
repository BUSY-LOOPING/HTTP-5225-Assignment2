<?php
require_once 'connect.php';
require_once 'session.php';

redirectIfLoggedIn();

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    $address = trim($_POST['address'] ?? '');
    
    // Validation
    if (empty($name) || empty($email) || empty($password) || empty($address)) {
        $error = 'All fields are required.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Please enter a valid email address.';
    } elseif (strlen($password) < 6) {
        $error = 'Password must be at least 6 characters long.';
    } elseif ($password !== $confirm_password) {
        $error = 'Passwords do not match.';
    } else {
        // Check if email already exists
        $stmt = $pdo->prepare("SELECT id FROM customers WHERE email = ?");
        $stmt->execute([$email]);
        
        if ($stmt->fetch()) {
            $error = 'Email address is already registered.';
        } else {
            // Hash password and insert user
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            
            $stmt = $pdo->prepare("INSERT INTO customers (name, email, password, address) VALUES (?, ?, ?, ?)");
            
            if ($stmt->execute([$name, $email, $hashed_password, $address])) {
                $success = 'Registration successful! You can now log in.';
            } else {
                $error = 'Registration failed. Please try again.';
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - HumberStore</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .auth-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .auth-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            padding: 2rem;
            width: 100%;
            max-width: 400px;
        }
        .auth-header {
            text-align: center;
            margin-bottom: 2rem;
        }
        .auth-header i {
            font-size: 3rem;
            color: #007bff;
            margin-bottom: 1rem;
        }
        .form-floating {
            margin-bottom: 1rem;
        }
        .btn-auth {
            width: 100%;
            padding: 0.75rem;
            font-size: 1.1rem;
            border-radius: 10px;
        }
        .auth-footer {
            text-align: center;
            margin-top: 1.5rem;
        }
    </style>
</head>
<body>
    <div class="auth-container">
        <div class="auth-card">
            <div class="auth-header">
                <i class="fas fa-user-plus"></i>
                <h2>Create Account</h2>
                <p class="text-muted">Join HumberStore today</p>
            </div>

            <?php if ($error): ?>
                <div class="alert alert-danger" role="alert">
                    <i class="fas fa-exclamation-triangle me-2"></i><?php echo htmlspecialchars($error); ?>
                </div>
            <?php endif; ?>

            <?php if ($success): ?>
                <div class="alert alert-success" role="alert">
                    <i class="fas fa-check-circle me-2"></i><?php echo htmlspecialchars($success); ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="">
                <div class="form-floating">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Full Name" 
                           value="<?php echo htmlspecialchars($_POST['name'] ?? ''); ?>" required>
                    <label for="name">Full Name</label>
                </div>

                <div class="form-floating">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" 
                           value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>" required>
                    <label for="email">Email Address</label>
                </div>

                <div class="form-floating">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    <label for="password">Password</label>
                </div>

                <div class="form-floating">
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required>
                    <label for="confirm_password">Confirm Password</label>
                </div>

                <div class="form-floating">
                    <textarea class="form-control" id="address" name="address" placeholder="Address" style="height: 100px" required><?php echo htmlspecialchars($_POST['address'] ?? ''); ?></textarea>
                    <label for="address">Address</label>
                </div>

                <button type="submit" class="btn btn-primary btn-auth">
                    <i class="fas fa-user-plus me-2"></i>Create Account
                </button>
            </form>

            <div class="auth-footer">
                <p class="mb-0">Already have an account? <a href="login.php" class="text-decoration-none">Sign In</a></p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 