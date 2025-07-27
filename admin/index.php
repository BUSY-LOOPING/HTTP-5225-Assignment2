<?php
include "connect.php"; session_start();
if (isset($_SESSION['user_id'])) {
    echo "<a href='products.php'>Products</a> | <a href='categories.php'>Categories</a> | <a href='suppliers.php'>Suppliers</a> | <a href='orders.php'>Orders</a> | <a href='logout.php'>Logout</a>"; exit;
}
if ($_POST) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $q = mysqli_query($connect, "SELECT id FROM users WHERE email='$email' AND password='$password'");
    if ($row = mysqli_fetch_assoc($q)) {
        $_SESSION['user_id'] = $row['id'];
        header("Location: products.php"); exit;
    }
}
?>
<form method="post">
    <input name="email" placeholder="Email"><input type="password" name="password"><button>Login</button>
</form>
